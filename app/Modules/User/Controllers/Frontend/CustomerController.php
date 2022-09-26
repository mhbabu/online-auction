<?php

namespace App\Modules\User\Controllers\Frontend;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{

    public function index()
    {
        return view("User::frontend.forget-password");
    }

    public function signup(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'date_of_birth' => 'required',
            'nid' => 'required'
        ],[
          'nid.required' => 'The nid number is required',
        ]);

        $emailCheck = User::where('email',$request->input('email'))->first();
        if($emailCheck){
            session()->put('flash_danger', 'Email address already exist!!!');
            return redirect()->back()->withInput();
        }

//        $mobile =  substr($request->input('mobile'),-11,11);
//        $mobileCheck = User::where(DB::raw('RIGHT(mobile,11)'),$mobile)->first();
//        if($mobileCheck){
//            session()->put('flash_danger', 'Mobile number already exist!!!');
//            return redirect()->back()->withInput();
//        }

        $customer = User::firstOrNew(['email'=>$request->input('email')]);
        $customer->user_type = '2x202';
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $customer->date_of_birth = $request->input('date_of_birth');
        $customer->nid = $request->input('nid');
        $customer->passport = $request->input('passport');
        $customer->status = 1;
        $customer->save();

        /*
         * Email Queue
         */

//        if(!$customer)
//            return redirect()->back()->with('flash_danger','Invalid email address!');
//
//        if($customer->email_verified_at){
//            $lastEmailVerifiedHours = Carbon::parse($customer->email_verified_at)->diffInHours();
//            if($lastEmailVerifiedHours < 24) return redirect()->back()->with('flash_danger','Verification link has already sent.');
//        }
//
//        $customer->user_hash = Hash::make($customer->email);
//        $customer->user_hash = str_replace("/","",$customer->user_hash);
//        $customer->email_verified_at = Carbon::now();
//        $customer->save();
//
//        $verificationLink = url('/verify-account/'.$customer->user_hash);
//        $authority = env('APP_NAME','Auction');
//
//        $emailData['to'] = $customer->email;
//        $emailData['cc'] = "hasibkamal.cse@gmail.com";
//        $emailData['subject'] = "Forget password";
//
//        $emailData['content'] = "<strong>Dear $customer->name</strong> <br/><br/>
//            <span>Greetings from The $authority.!</span> <br/><br/>
//            <span>Your accoun has created successfully in our system. If you requested, Please click on the link below to verify your account.</span> <br/>
//            <a target='_blank' href='$verificationLink'>Verify your account</a><br/><br/>";
//
//        $emailQueue = CommonFunction::emailQueue($emailData);
//        event(new SendEmail($emailQueue));
//        return redirect('/forget-password')->with('flash_success', 'Verification link sent to your email address.');
//
//        event(new SendEmailEvent($emailQueue));
//        return redirect(route('users.index'))->with('flash_message','User created successfully');



        session()->put('flash_success', 'Success!! You can login after approve from system admin.');
        return redirect('/login');

//        $email = [
//            'to' => [$customer->email],
//            'cc' => [config('misc.email_cc')],
//            'subject' => "Hello",
//            'content' => "Body"
//        ];
//        event(new SendEmail($email));
    }
}
