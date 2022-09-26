<?php

namespace App\Modules\Blog\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Blog\Models\Blog;
use App\DataTables\Backend\Blog\BlogDataTable;
use Illuminate\Validation\Rule;
use App\Libraries\Encryption;


class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render("Blog::backend.blog.index");
    }

    public function create()
    {
        return view("Blog::backend.blog.create");
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title'      => ['required', Rule::unique('blogs')->where(function ($query)
                                {  $query->whereNull('deleted_at');})
                            ],
            'image'      => 'required|image|mimes:jpeg,jpg,png,svg|max:1024',
            'content'    => 'required',
            'status'     => 'required'
        ]);

        $blog = new Blog();
        $blog->title    = $request->input('title');
        $blog->content  = $request->input('content');
        $blog->featured = $request->input('featured');
        $blog->status   = $request->input('status');

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            if($file->isValid())
            {
                $blog->image   = storeImage('blog',$file);
            }
            else
            {
                return null;
            }

          }

        $blog->save();
        return redirect(route('admin.blogs.index'))->with('flash_success', 'Blog created successfully.');
    }

    public function show($blogId)
    {
        $decodedId = Encryption::decodeId($blogId);
        $data['blog'] = Blog::with('user')->find($decodedId);
        return view("Blog::backend.blog.view", $data);
    }

    public function edit($blogId)
    {
        $decodedId = Encryption::decodeId($blogId);
        $data['blog'] = Blog::find($decodedId);
        return view("Blog::backend.blog.edit", $data);
    }

    public function update(Request $request, $blogId)
    {
        $decodedId = Encryption::decodeId($blogId);
        $this->validate($request, [
            'title'      => ['required', Rule::unique('blogs')->ignore($decodedId)->where(function ($query)
                                {  $query->whereNull('deleted_at');})
                            ],
            'image'      => 'sometimes|mimes:jpeg,jpg,png,svg|max:1024',
            'content'    => 'required',
            'status'     => 'required'
        ]);

        $blog           = Blog::find($decodedId);
        $blog->title    = $request->input('title');
        $blog->content  = $request->input('content');
        $blog->featured = $request->input('featured');
        $blog->status   = $request->input('status');


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                deleteExistingImage('blog', $blog->image);
                $blog->image = storeImage('blog', $file);
            } else
                return null;
        }

        $blog->save();
        return redirect(route('admin.blogs.index'))->with('flash_success', 'Blog updated successfully.');
    }

    public function delete($blogId)
    {
        $decodedId = Encryption::decodeId($blogId);
        $blog = Blog::find($decodedId);
        deleteExistingImage('blog', $blog->image);
        $blog->delete();
        session()->flash('flash_success', 'Blog deleted successfully!');
    }
}
