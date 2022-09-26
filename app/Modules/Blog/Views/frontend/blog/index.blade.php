@extends('frontend.layouts.app')
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
                <div class="col-lg-9">
                    <div class="row">
                    @forelse($blogs as $blog)
                    <div class="col-12 col-md-6 col-xl-4 mb-3rem">
                            <div class="single-blog text-left">
                                <a class="blog-thumb zoom-in d-block overflow-hidden" href="{{route('blog-show',\App\Libraries\Encryption::encodeId($blog->id))}}">
                                    <img src="{{ !$blog->image ? url('/assets/frontend/img/not-found.png') : url('uploads/blog/'.$blog->image) }}" style="height: 200px" alt="blog-thumb-naile">
                                </a>
                                <div class="blog-post-content">
                                    <h5 class="sub-title"> Posted by <a class="blog-link" href="#">{{ $blog->user->name }}</a> <span class="separator">/</span> {{ \Carbon\Carbon::parse($blog->created_at)->format('d F,Y') }}</h5>
                                    <h3 class="title"><a href="{{route('blog-show',\App\Libraries\Encryption::encodeId($blog->id))}}">{{ $blog->title }}</a></h3>
                                    <p class="text">
                                       {!! Str::Limit($blog->content,140) !!}
                                    </p>
                                </div>
                                <div class="blog-post-content">
                                    <a class="read-more" href="{{route('blog-show',\App\Libraries\Encryption::encodeId($blog->id))}}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    </div>
                </div>
                <div class="col-lg-3 mb-3rem order-lg-first">
                    <aside class="blog-left-sidebar">
                        <div class="sidebar-widget mb-5">
                            <h3 class="post-title py-3">Featured Post</h3>
                            @foreach ($featuredBlogs as $featured)
                            <div class="blog-media-list mb-5 media">
                                <div class="post-thumb mr-4">
                                    <a href="{{route('blog-show',\App\Libraries\Encryption::encodeId($featured->id))}}">
                                        <img src="{{ !$featured->image ? url('/assets/frontend/img/not-found.png') : url('uploads/blog/'.$featured->image) }}" style="height: 100px" alt="{{ $featured->title }}">
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
        </div>
    </section>
@endsection



