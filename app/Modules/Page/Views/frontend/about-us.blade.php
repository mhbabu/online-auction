@extends('frontend.layouts.app')
@section('content')
<section class="blog-section py-6rem">
        <div class="container">
            <div class="border-bottom cbb1 mb-3rem">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title pb-4 pb-md-4 position-relative">
                            <h2 class="title">About Us </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="single-blog text-left">
                        <div class="">
                            @if($about)
                                {!! $about->body !!}
                            @else
                                <h3 class="text-cnter">No Data found</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection



