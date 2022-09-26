<?php

namespace App\Modules\Page\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\Page\Models\ContactUs;
use App\DataTables\Backend\Page\ContactUsDataTable;
use App\Libraries\Encryption;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(ContactUsDataTable $dataTable)
     {
       return $dataTable->render("Page::backend.contact.contact-us.index");
     }

    public function show($Id)
    {
      $decodedId        = Encryption::decodeId($Id);
      $contact          = ContactUs::find($decodedId);
      if($contact->status == 'Not Seen')
      $contact->update(['status' => 'Seen']);
      $data['contactUs'] = $contact;
      return view("Page::backend.contact.contact-us.view",$data);
    }

     public function delete($contactId)
     {
        $decodedId = Encryption::decodeId($contactId);
        $contact   = ContactUs::find($decodedId);
        $contact->delete();
        session()->flash('flash_success', 'Message deleted successfully!');
     }

}
