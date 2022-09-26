<?php

namespace App\Modules\Page\Controllers\Backend;

use App\Modules\Page\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function page($key)
    {
        $data['page'] = Page:: whereKey($key)->first();
        $data['key']  = $key;
        return view("Page::backend.page",$data);
    }

    public function pageUpdate(Request $request,$key)
    {
        $this->validate($request, [
            'body'       => 'required',
            'status'     => 'required'
        ]);

        $page = Page::updateOrCreate(['key' => $key], [
            'body'   => $request->input('body'),
            'status' => $request->input('status')
        ]);

        $data['page'] = $page;
        $data['key'] = $key;
        return redirect()->back()->with('flash_success',"$key updated successfully.");
    }

    public function AboutUs($key)
    {
        $data['page'] = Page:: whereKey($key)->first();
        $data['key'] = $key;
        return view("Page::backend.page",$data);
    }

    public function aboutUsUpdate(Request $request,$key)
    {
        $this->validate($request, [
            'body'       => 'required',
            'status'     => 'required'
        ]);

        $page = Page::updateOrCreate(['key' => $key], [
            'body'   => $request->input('body'),
            'status' => $request->input('status')
        ]);

        $data['page'] = $page;
        $data['key'] = $key;
        return redirect()->back()->with('flash_success',"$key updated successfully.");
    }

    public function contact($key)
    {
        $data['page'] = Page:: whereKey($key)->first();
        $data['key'] = $key;
        return view("Page::backend.page",$data);
    }

    public function contactInfo()
    {
        $contactInfo = Page::find('contact-info');
        $data['status']      = $contactInfo ? $contactInfo->status : '';
        $data['contactInfo'] = $contactInfo ? json_decode($contactInfo->body,true) : [];
        return view("Page::backend.contact.contact-info.index",$data);
    }

    public function contactInfoStore(Request $request)
    {
        $this->validate($request, [
            'contactInfo.*'   => 'required',
            'status'          => 'required',
        ],[],[
            'contactInfo.phone'    => 'Phone',
            'contactInfo.email'    => 'Email',
            'contactInfo.address'  => 'Address',
            'contactInfo.status'   => 'Status',
        ]);
        
        Page::updateOrCreate(['key' => 'contact-info'], [
            'body'   => json_encode($request->input('contactInfo')),
            'status' => $request->input('status')
        ]);

        return redirect(route('admin.contact-info.index'))->with('flash_success',"Contact Info updated successfully.");
    }

}
