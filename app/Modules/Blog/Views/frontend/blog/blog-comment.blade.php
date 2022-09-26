@if(!$comments->isEmpty())
<div class="comment-body">
    @foreach($comments as $parentComment)
    <hr>
    <div class="media mb-5">
     <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ $parentComment->user->name }}&amp;color=7F9CF5&amp;background=EBF4FF&amp;size=160">
     <div class="media-body">
        <div class="row px-5 mt-2">
            <div class="d-flex justify-content-between w-100">
                <p class="font-weight-bold">{{ $parentComment->user->name }}</p>
                <p>{{ $parentComment->created_at->diffForHumans() }}</p>
            </div>
            <div class="my-2 w-100">
                {{ $parentComment->comment }}
            </div>
            <div class="d-block mb-2 w-100">
                <span class="text-secondary reply"><i class="fa fa-reply pr-2"></i>reply</span>
            </div>
            <div class="reply-section w-100 hidden">
                <form class="reply-comment-form" method="post">
                    @csrf
                    <textarea  style="font-size:15px" name="comment" class="form-control" rows="5"></textarea>
                    <input hidden type="text" name="parent_id" value="{{ $parentComment->id }}">
                    <input hidden type="text" name="blog_id" value="{{ $parentComment->blog_id }}">
                    <div class="error-section text-danger pl-1 pt-2"></div>
                    <div class="mt-2 text-info">
                    <span style="font-size:15px" class="pr-3 comment-cancle text-success btn">Cancel</span>
                    <button style="font-size:12px" type="submit" class="btn btn-secondary comment-reply">Reply</button>
                    </div>
                </form>
            </div>
        </div>
        @foreach ($parentComment->childComments as $child)
        <div class="media mt-4">
            <img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ $child->user->name }}&amp;color=7F9CF5&amp;background=EBF4FF&amp;size=160">
            <div class="media-body px-5 mt-2">
                <div class="row">
                    <div class="d-flex justify-content-between w-100">
                        <p class="font-weight-bold">{{ $child->user->name }}</p>
                        <p>{{ $child->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="my-2 w-100">
                        {{ $child->comment }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
     </div>
    </div>
    @endforeach
</div>
@if($comments->hasMorePages())
<div class="mb-5 text-center">
    <button type="button" class="more btn btn-success btn-lg" name="button">More</button>
</div>
@endif
@endif
