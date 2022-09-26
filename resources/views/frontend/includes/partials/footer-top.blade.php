<div class="footer-top">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4 col-md-6">
                <div class="footer-item">
                    <a href="{{ url('/') }}"><img alt="image" src="{{ url('/assets/frontend/images/bg/footer-logo.png') }}"></a>
                    <p>Lorem ipsum dolor sit amet consecte tur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore.</p>
{{--                    <form>--}}
{{--                        <div class="input-with-btn d-flex jusify-content-start align-items-strech">--}}
{{--                            <input type="text" placeholder="Enter your email">--}}
{{--                            <button type="submit"><img alt="image" src="{{ url('assets/frontend/images/icons/send-icon.svg') }}"></button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex justify-content-lg-center">
                <div class="footer-item">
                    <h5>Quick Links</h5>
                    <ul class="footer-list">
                        <li><a href="{{ url('/all-products') }}">All Product</a></li>
                        @foreach(\App\Libraries\CommonFunction::getAllProductCategories() as $category)
                            <li><a href="{{ url('product-categories/'.\App\Libraries\Encryption::encodeId($category->id)) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="footer-item">
                    <h5>Upcoming..</h5>
                    <ul class="recent-feed-list">
                        @if(\App\Libraries\CommonFunction::getUpcomingProducts())
                            @foreach(\App\Libraries\CommonFunction::getUpcomingProducts() as $product)
                                <li class="single-feed">
                                    <div class="feed-img">
                                        <a href="{{ route('product-details',$product->slug) }}"><img alt="image" src="{{ url($product->photo_path) }}" height="64" width="64"></a>
                                    </div>
                                    <div class="feed-content">
                                        <h6><a href="{{ route('product-details',$product->slug) }}">{{ $product->title }}</a>
                                        </h6>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
