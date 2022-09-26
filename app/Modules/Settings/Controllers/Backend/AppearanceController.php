<?php

namespace App\Modules\Settings\Controllers\Backend;

use App\Modules\Settings\Models\Appearance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AppearanceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['appearance'] = Appearance::first();
        return view("Settings::backend.appearance.index", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'description' => 'required',
            'address' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            'google_plus' => 'required',
            'pinterest' => 'required'
        ]);

        $appearance = Appearance::findOrNew(1);
        $appearance->name = $request->input('name');
        $appearance->email = $request->input('email');
        $appearance->phone = $request->input('phone');
        $appearance->website = $request->input('website');
        $appearance->status = 1;
        $appearance->description = $request->input('description');
        $appearance->address = $request->input('address');
        $appearance->facebook = $request->input('facebook');
        $appearance->youtube = $request->input('youtube');
        $appearance->instagram = $request->input('instagram');
        $appearance->twitter = $request->input('twitter');
        $appearance->linkedin = $request->input('linkedin');
        $appearance->google_plus = $request->input('google_plus');
        $appearance->pinterest = $request->input('pinterest');

        $path = "uploads/appearance";
        if ($request->hasFile('logo')) {
            $_appLogo = $request->file('logo');
            $mimeType = $_appLogo->getClientMimeType();
            if (!in_array($mimeType, ['image/jpg', 'image/jpeg', 'image/png']))
                return redirect()->back();
            if (!file_exists($path))
                mkdir($path, 0777, true);

            $appLogo = trim(sprintf('%s', uniqid('Company_', true))) . '.' . $_appLogo->getClientOriginalExtension();
            Image::make($_appLogo->getRealPath())->resize(300, 300)->save($path . '/' . $appLogo);
            $appearance->logo = $appLogo;
        }
        $appearance->save();

        return redirect()->back()->with('flash_success', 'Appearance saved successfully');
    }
}
