@if (!$data->parent_id)
<div class="comment-body">
<hr>
<div class="media mb-5">
    <img class="mr-3 rounded-circle" src="https://ui-avatars.com/api/?name={{ $data->user->name }}&amp;color=7F9CF5&amp;background=EBF4FF&amp;size=160">
    <div class="media-body">
       <div class="row px-5 mt-2">
          <div class="d-flex justify-content-between w-100">
            <p class="font-weight-bold">{{ $data->user->name }}</p>
             <p>{{ $data->created_at->diffForHumans() }}</p>
          </div>
          <div class="my-2 w-100">
            {{ $data->comment }}
          </div>
          <div class="d-block mb-2 w-100">
             <span class="text-secondary reply"><i class="fa fa-reply pr-2"></i>reply</span>
          </div>
          <div class="reply-section w-100 hidden">
             <form class="reply-comment-form" method="post">
                 @csrf
                <textarea  style="font-size:15px" name="comment" class="form-control" rows="5"></textarea>
                <input hidden type="text" name="parent_id" value="{{ $data->id }}">
                <input hidden type="text" name="blog_id" value="{{ $data->blog_id }}">
                <div class="error-section text-danger pl-1 pt-2"></div>
                <div class="mt-2 text-info">
                   <span style="font-size:15px" class="pr-3 comment-cancle text-success btn">Cancel</span>
                   <button style="font-size:12px" type="submit" class="btn btn-secondary comment-reply">Reply</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
</div>
 @else
 <div class="media mt-5">
    <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ $data->user->name }}&amp;color=7F9CF5&amp;background=EBF4FF&amp;size=160">
    <div class="media-body px-5">
        <div class="row mt-2">
            <div class="d-flex justify-content-between w-100">
                <p class="font-weight-bold">{{ $data->user->name }}</p>
                <p>{{ $data->created_at->diffForHumans() }}</p>
            </div>
            <div class="my-2 w-100">
                {{ $data->comment }}
            </div>
        </div>
    </div>
</div>
@endif


