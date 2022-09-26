<?php

namespace App\Modules\Profile\Controllers\Frontend;

use App\Modules\User\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{


    public function index()
    {
        return view("Profile::frontend.my-account");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->get('name');
        $user->designation = $request->get('designation');
        $user->company_name = $request->get('company_name');
        $user->country = $request->get('country');
        $user->nationality = $request->get('nationality');
        $user->date_of_birth = $request->get('date_of_birth');
        $user->permanent_address = $request->get('permanent_address');

        $prefix = date('Ymd_');
        $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            $mime_type = $file->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('profile')->withInput()->with('flash_danger','Profile image must be png or jpg or jpeg format!');
            }

            $path = 'uploads/profile/';
            if(!is_dir($path)){
                mkdir($path,0755,true);
            }

            $fileName = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $user->photo = $fileName;
        }

        $user->save();
        return redirect('profile')->with('flash_success','Profile updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request){
        $dataRule = [
            'old_password' => 'required',
            'new_password' => [
                'required',
                'min:6'
//            'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,}$/'
            ],
            'confirm_new_password' => [
                'required',
                'same:new_password',
            ]
        ];


        $validator = Validator::make($request->all(), $dataRule);
        if ($validator->fails())
            return redirect('profile#pills-password')->withErrors($validator)->withInput();

        try {
            $old_password = $request->get('old_password');
            $new_password = $request->get('new_password');

            if (!(Hash::check($old_password,auth()->user()->password)))
                return redirect('profile#pills-password')->with('flash_danger', 'Given password does\'t match!');

            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($new_password);
            $user->password_changed_at = Carbon::now();
            $user->save();
            return redirect('profile#pills-password')->with('flash_success','Password updated successfully!');
        } catch (\Exception $e) {
            return redirect('profile#pills-password')->with('flash_danger','Something went wrong!');
        }
    }
}
