<?php

namespace App\Modules\User\Controllers\Frontend;
use App\Events\SendEmail;
use App\Libraries\CommonFunction;
use App\Libraries\Encryption;
use App\Modules\User\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ForgetPasswordController extends Controller
{

    public function forgetPassword()
    {
        return view("User::frontend.forget-password");
    }

    public function forgetPasswordRequest(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email'
        ]);

        try{
            $email = $request->input('email');
            $user = User::where('email',$email)->first();

            if(!$user)
                return redirect()->back()->with('flash_danger','Invalid email address!');

            if($user->email_verified_at){
                $lastEmailVerifiedHours = Carbon::parse($user->email_verified_at)->diffInHours();
                if($lastEmailVerifiedHours<24) return redirect()->back()->with('flash_danger','Verification link has already sent.');
            }


            $user->user_hash = Hash::make($user->email);
            $user->user_hash = str_replace("/","",$user->user_hash);
            $user->email_verified_at = Carbon::now();
            $user->save();

            $verificationLink = url('/reset-password/'.$user->user_hash);
            $authority = env('APP_NAME','LankaBangla CAS');

            $emailData['to'] = $user->email;
            $emailData['cc'] = "hasibkamal.cse@gmail.com";
            $emailData['subject'] = "Forget password";

            $emailData['content'] = "<strong>Dear $user->first_name $user->last_name,</strong> <br/><br/>
            <span>Greetings from The $authority.!</span> <br/><br/>
            <span>Someone requested to reset your password from system. If you requested, Please click on the link below to set your password again.</span> <br/>
            <a target='_blank' href='$verificationLink'>Set your password</a><br/><br/>
            <span>If you are not requested, please ignore the mail.</span><br/><br/>";

            $emailQueue = CommonFunction::emailQueue($emailData);
            event(new SendEmail($emailQueue));
            return redirect('/forget-password')->with('flash_success', 'Verification link sent to your email address.');
        }catch (\Exception $e){
            return redirect('/forget-password')->with('flash_danger', $e->getMessage());
        }


    }

    public function resetPassword($userHash)
    {
        $user = User::where('user_hash',$userHash)->first();

        if(!$user)
            return redirect('/forget-password')->with('flash_danger','Verification link expired.');

        $data['user'] = $user;
        return view("User::frontend.reset-password",$data);

    }

    public function resetPasswordRequest($userId,Request $request)
    {
        $this->validate($request,[
            'new_password'      => 'required|min:6',
            'confirm_password'  => 'required'
        ]);

        $newPassword = $request->get('new_password');
        $confirmPassword = $request->get('confirm_password');

        if($newPassword != $confirmPassword)
            return redirect()->back()->with('flash_danger','New password and confirm password does not match.');

        $decodedUserId = Encryption::decodeId($userId);
        $user = User::find($decodedUserId);
        $user->password = Hash::make($newPassword);
        $user->password_changed_at = Carbon::now();
        $user->user_hash = null;
        $user->email_verified_at = null;
        $user->save();
        return redirect('/login')->with('flash_success', 'Your password changed successfully.');
    }





}
