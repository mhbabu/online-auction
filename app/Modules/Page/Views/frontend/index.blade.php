@extends('frontend.layouts.app')
@section('content')
<section class="blog-section py-6rem">
        <div class="container">
            <div class="border-bottom cbb1 mb-3rem">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title pb-4 pb-md-4 position-relative">
                            <h2 class="title">{{ $key }} </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="single-blog text-left">
                        {!! $page ? $page->body : ''  !!}
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection



