@extends('frontend.layouts.app')
@section('header-css')
<style>
    .media img {
    width: 60px;
    height: 60px
    }

   .reply,.comment-cancle,.comment-reply {
        cursor: pointer;
    }
	.hidden{
		display: none;
	}
  </style>
@endsection
@section('content')
   <section class="blog-section py-5">
        <div class="container">
            <div class="border-bottom cbb1 mb-3rem">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title pb-4 pb-md-4 position-relative">
                            <h2 class="title">From Our Blog </h2>
                            <p class="text">The latest news, videos, and discussion topics</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 mb-3rem">
                    <div class="single-blog text-left">
                        <a class="blog-thumb zoom-in d-block overflow-hidden" href="{{ url('/blogs/'.\App\Libraries\Encryption::encodeId($blog->id)) }}">
                            <img src="{{ !$blog->image ? url('/assets/frontend/img/not-found.png') : url('uploads/blog/'.$blog->image) }}" alt="blog-thumb-naile">
                        </a>
                        <div class="blog-post-content pt-5">
                            <h3 class="title"><a href="{{ url('/blogs/'.\App\Libraries\Encryption::encodeId($blog->id)) }}">{{ $blog->title }}</a></h3>
                            <h5 class="sub-title font-style-normal"> Posted by <a class="blog-link" href="#">{{ $blog->user->name }}</a> <span class="separator">/</span> {{ \Carbon\Carbon::parse($blog->created_at)->format('d F,Y') }}
                            </h5>
                            <p class="text">
                               {!! $blog->content !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3rem">
                    <aside class="blog-left-sidebar">
                        <div class="sidebar-widget mb-5">
                            @foreach ($blogs as $featured)
                            <div class="blog-media-list mb-5 media">
                                <div class="post-thumb mr-4">
                                    <a href="{{route('blog-show',\App\Libraries\Encryption::encodeId($featured->id))}}">
                                        <img src="{{ !$featured->image ? url('/assets/frontend/img/not-found.png') : url('uploads/blog/'.$featured->image) }}" style="height: 100px" alt="blog-thumb-naile">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="sub-title"><a href="{{route('blog-show',\App\Libraries\Encryption::encodeId($featured->id))}}">{{ $featured->title }}</a></h5>
                                    <span class="date">{!! Str::Limit($featured->content,80) !!}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>

            <div class="row col-lg-9 mb-3rem">
                <div class="card p-4 w-100">
                       <h2 class="p-4 font-bold">Leave a Comment</h2>
                    <div class="row">
                       <div class="col-md-12 mb-3">
                       <div class="form-group">
                          <form id="main-comment-form" method="post">
                              @csrf
                             <div class="py-4 text-center success-section text-success"></div>
                             <textarea style="font-size:15px" name="comment" placeholder="Add your comment here" class="form-control text-dark" rows="5"></textarea>
                             <input hidden type="text" name="blog_id" value="{{ $blog->id }}">
                             <div class="text-danger error-section pl-1 pt-2"></div>
                             <div class="mt-2 text-right">
                                <button class="btn btn-secondary" style="font-size:15px" type="submit">Comment</button>
                             </div>
                          </form>
                       </div>
                       <div class="col-md-12">
                          <div class="row">
                          <h3 class="p-2">Comments (<span id="totalComment">{{ $totalComment }}</span>)</h3>
                             <div class="col-md-12" id="comment-content">

                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
            </div>

        </div>
    </section>
@endsection

@section('footer-script')
<script>
    $(document).ready(function(){
       var page = 1;
       var commentId = [];
       var _token = $('meta[name="csrf-token"]').attr('content');
       let params = {'blog_id': {{$blog->id}},'comment_id':commentId,'_token' : _token};

    //    call load_comment() funcation in page landing time
       load_comment(params);

       function load_comment(params){
        $.ajax({
         url: "{{ route('blog.comment.load') }}"+"?page=" + page,
         method:"POST",
         data:params,
         success:function(response)
         {
          if(response.status)
          {
              $('.more').remove();
              $('#comment-content').append(response.data);
          }
          else
            $('.more').remove();
            if($('#comment-content').find('.comment-body').length == 0)
                $('#comment-content').append('<div class="comment-body"></div>');

         }
        })
       }

     $(document).on('click', '.more', function(){
        page++;
        var _token = $('meta[name="csrf-token"]').attr('content');
        let params = {'blog_id': {{$blog->id}},'comment_id':commentId,'_token' : _token};
        $('.more').html('<b>Loading...</b>');
        load_comment(params);
     });

     // new comment

     $("#main-comment-form").bind("submit", function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        let formHtml = $(this);
        if ($(formHtml).find('textarea').val() == "")
        {
            $(formHtml).find('.error-section').text('The comment field is required');
            $(formHtml).find('.success-section').text('');
            return false;
        }
        $.ajax({
            type: "POST",
            url: "{{ route('blog.comment.store') }}",
            data: formData,
            dataType: "JSON",
            async: false,
            success: function(response)
            {
             if(response.status)
             {
                $(formHtml).find('.success').text(response.message);
                $(formHtml).find('.error-section').text('');
                $(".comment-body").last().append(response.data);
                $('#totalComment').text(parseInt($('#totalComment').text())+1);
                commentId.push(response.id);
             }
             else
             {
                $(formHtml).find('.error-section').text(response.message);
                $(formHtml).find('.success-section').text('');
             }
              $(formHtml)[0].reset();
            },
            error: function(data,status, errorThrown){
                $(formHtml).find('.error-section').text(data['responseJSON']['message']);
             }
         });
     });


   // reply comment

     $(document).on("submit",".reply-comment-form",function() {
            event.preventDefault();
            var formData = $(this).serialize();
            let formHtml = $(this);
            if ($(formHtml).find('textarea').val() == "") {
				$(formHtml).find('.error-section').text('The comment field is required');
				return false;
            }
            $.ajax({
            type: "POST",
            url: "{{ route('blog.comment.store') }}",
            data: formData,
            dataType: "JSON",
            async: false,
            success: function(response)
            {
             if(response.status)
             {
                $(formHtml).find('.success').text(response.message);
                $(formHtml).find('.error-section').text('');
                $(formHtml).parent().parent().parent().append(response.data);
                $('#totalComment').text(parseInt($('#totalComment').text())+1);
             }
             else
             {
                $(formHtml).find('.error-section').text(response.message);
                $(formHtml).find('.success-section').text('');
             }
              $(formHtml)[0].reset();
            },
            error: function(data,status, errorThrown){
                $(formHtml).find('.error-section').text(data['responseJSON']['message']);
             }
         });
        });

    });
</script>

<script>
 $(document).ready(function() {
    $(document).on("click",".reply",function() {
        let parentHtml = $(this).parent().parent();
		$(parentHtml).find('.reply-section').removeClass('hidden');
    });

    $(document).on("click",".comment-cancle",function() {
        let parentHtml = $(this).parent().parent().parent();
		$(parentHtml).addClass('hidden');
    });
});

</script>
@endsection
