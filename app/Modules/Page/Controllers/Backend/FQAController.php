<?php

namespace App\Modules\Page\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Page\Models\FQA;
use App\DataTables\Backend\Page\FQADataTable;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use App\Libraries\Encryption;

class FQAController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FQADataTable $dataTable)
    {
        return $dataTable->render("Page::backend.fqa.index");
    }

    public function create()
    {
        return view("Page::backend.fqa.create");
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'question'   => ['required', Rule::unique('fqas')->where(function ($query)
                                {  $query->whereNull('deleted_at');})
                            ],
            'answer'     => 'required',
            'status'     => 'required'
        ]);

        $FQA = new FQA();
        $FQA->question   = $request->input('question');
        $FQA->answer     = $request->input('answer');
        $FQA->status     = $request->input('status');
        $FQA->save();

        return redirect(route('admin.fqas.index'))->with('flash_success', 'FQA created successfully.');
    }

    public function show($FQAId)
    {
        $decodedId    = Encryption::decodeId($FQAId);
        $data['FQA']  = FQA::with('user')->find($decodedId);
        return view("Page::backend.fqa.view", $data);
    }

    public function edit($FQAId)
    {
        $decodedId    = Encryption::decodeId($FQAId);
        $data['FQA']  = FQA::find($decodedId);
        return view("Page::backend.fqa.edit",$data);
    }

    public function update(Request $request, $FQAId)
    {
        $decodedId = Encryption::decodeId($FQAId);
        $this->validate($request, [
            'question'      => ['required', Rule::unique('fqas')->ignore($decodedId)->where(function ($query)
                                {  $query->whereNull('deleted_at');})
                            ],
            'answer'     => 'required',
            'status'     => 'required'
        ]);

        $FQA             = FQA::find($decodedId);
        $FQA->question   = $request->input('question');
        $FQA->answer     = $request->input('answer');
        $FQA->status     = $request->input('status');
        $FQA->save();

        return redirect(route('admin.fqas.index'))->with('flash_success', 'FQA updated successfully.');
    }

    public function delete($FQAId)
    {
        $decodedId = Encryption::decodeId($FQAId);
        $FQA = FQA::find($decodedId);
        $FQA->delete();
        session()->flash('flash_success', 'FQA deleted successfully!');
    }
}
