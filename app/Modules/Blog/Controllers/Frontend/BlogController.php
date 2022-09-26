<?php

namespace App\Modules\Blog\Controllers\Frontend;

use App\Modules\Blog\Models\Blog;
use App\Modules\Blog\Models\BlogComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\Encryption;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    public function index()
    {
       $data['blogs']         = Blog::Active()->latest()->paginate(15);
       $data['featuredBlogs'] = Blog::whereFeatured(true)->Active()->latest()->take(5)->get();
       return view("Blog::frontend.blog.index",$data);
    }

    public function showBlog($blogId)
    {
       $decodedId = Encryption::decodeId($blogId);
       $data['blog'] = Blog::Active()->find($decodedId);
       $data['blogs'] = Blog::inRandomOrder()->Active()->take(2)->get();
       $data['totalComment'] = BlogComment::whereBlogId($decodedId)->count();
       return view("Blog::frontend.blog.view",$data);
    }

    public function storeComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|max:500',
        ]);

        if ($validator->fails())
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);


        if(!auth()->check())
            return response()->json([
                'status' => false,
                'message' => 'Please login first',
            ]);


            $data['data'] = BlogComment::create([
                'user_id'   => auth()->user()->id,
                'blog_id'   => $request->blog_id,
                'comment'   => $request->comment,
                'parent_id' => $request->parent_id ?? null
            ]);

        return response()->json([
            'status'  => true,
            'message' => 'Your comment has been submitted',
            'id'      => $data['data']->id,
            'data'    => view('Blog::frontend.blog.reply-comment', $data)->render(),
        ]);
    }

   public function loadComment(Request $request)
   {
    if ($request->ajax())
    {
        $validator  = Validator::make($request->all(), [
          'blog_id' => 'required|exists:blogs,id',
        ]);

        if ($validator->fails())
           return response()->json([
            'status' => false,
            'message' => $validator->errors()->first(),
           ]);

           $data['comments'] =  BlogComment::with('user:id,name','childComments', 'childComments.user:id,name')
           ->join('users', function ($join) {
             $join->on('users.id', '=', 'blog_comments.user_id')
               ->where(['users.status' => true]);
           })
           ->select('blog_comments.*')
           ->whereNull('blog_comments.parent_id')
           ->whereNotIn('blog_comments.id',[$request->comment_id?? 0])
           ->where('blog_comments.blog_id',$request->blog_id)
           ->paginate(10);

           $data['page'] = $request->page;

           return response()->json([
            'status' => $data['comments']->count() ? true : false,
            'data'   => view('Blog::frontend.blog.blog-comment', $data)->render(),
           ]);
      }
   }


}
