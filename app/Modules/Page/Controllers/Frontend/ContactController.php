<?php

namespace App\Modules\Page\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Page\Models\Page;
use App\Modules\Page\Models\ContactUs;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = Page::Active()->find('contact-info');
        $data['contactInfo'] = $contactInfo ? json_decode($contactInfo->body,true) : [];
        return view("Page::frontend.contact-us",$data);
    }

    public function contactUsStore(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'subject'   => 'required',
            'message'   => 'required'
        ]);

        $contact            = new ContactUs();
        $contact->name      = $request->input('name');
        $contact->email     = $request->input('email');
        $contact->subject   = $request->input('subject');
        $contact->message   = $request->input('message');
        $contact->save();
        return redirect(route('contact-us'))->with('flash_success', 'Message send successfully.');
    }
}
