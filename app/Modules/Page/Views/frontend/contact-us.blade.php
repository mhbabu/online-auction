@extends('frontend.layouts.app')
@section('content')
<nav class="breadcrumb-section bg-white pt-5 pb-6rem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">contact us</li>
                    </ol>
                </div>
            </div>
        </div>
    </nav>
  <section class="contact-section pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-5">
                    <!--  contact page side content  -->
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Contact Us</h3>
                        <p class="contact-page-message mb-30">Claritas est etiam processus dynamicus, qui sequitur
                            mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus
                            parum claram anteposuerit litterarum formas human.</p>
                        <!--  single contact block  -->

                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Address</h4>
                            @foreach (explode('|',$contactInfo['address'] ?? '') as $address)
                            <p> {{ $address }} </p>
                            @endforeach
                        </div>

                        <!--  End of single contact block -->

                        <!--  single contact block -->

                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Phone</h4>
                            @foreach (explode('|',$contactInfo['phone'] ?? '') as $phone)
                            <p> {{ $phone }} </p>
                            @endforeach
                        </div>

                        <!-- End of single contact block -->

                        <!--  single contact block -->

                        <div class="single-contact-block">
                            <h4><i class="fas fa-envelope"></i> Email</h4>
                            @foreach (explode('|',$contactInfo['email'] ?? '') as $email)
                            <p> {{ $email }} </p>
                            @endforeach
                        </div>

                        <!--=======  End of single contact block  =======-->
                    </div>

                    <!--=======  End of contact page side content  =======-->

                </div>
                <div class="col-lg-6 col-12 mb-5">
                    <!--  contact form content -->
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Tell Us Your Message</h3>
                        <div class="contact-form">
                            <form action="{{ route('contact-us') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Your Name <span class="required">*</span></label>
                                    <input type="text" name="name" id="customername" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Email <span class="required">*</span></label>
                                    <input type="email" name="email" id="customerEmail" required>
                                </div>
                                <div class="form-group">
                                    <label>Subject <span class="required">*</span></label>
                                    <input type="text" name="subject" id="contactSubject" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Message <span class="required">*</span></label>
                                    <textarea name="message" id="contactMessage" required></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" value="submit" id="submit" class="btn btn-dark3" name="submit">submit</button>
                                </div>
                            </form>
                        </div>
                        <p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
                    </div>
                    <!-- End of contact -->
                </div>
            </div>
        </div>
 </section>
 <div class="map">
    <iframe src="{{ $contactInfo['map'] ?? '' }}"></iframe>
</div>
@endsection



