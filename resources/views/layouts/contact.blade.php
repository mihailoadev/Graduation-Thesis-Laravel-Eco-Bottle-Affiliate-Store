@extends('layouts.main')
@section('content')

<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Contact us</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="{{route('welcome')}}">Home</a></li>
                <li>Contact us</li>
            </ul>
        </div>
    </div>
</section>


<section class="contact-section">
    <div class="auto-container">
        <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 big-column">
            <div class="sec-title">
                <h2>Get In Touch</h2>
                <p>We'd love to hear from you! Drop us a message and we'll get back to you promptly.</p>                
            </div>
            <div class="form-inner">
                <form method="post" action="mail.php" id="contact-form" class="default-form" novalidate="novalidate">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input type="text" name="username" placeholder="Name" required="" aria-required="true">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email" required="" aria-required="true">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input type="text" name="subject" placeholder="Subject" required="" aria-required="true">
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input type="text" name="phone" placeholder="Phone" required="" aria-required="true">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                            <button type="submit" class="theme-btn-two" name="submit-form" disabled>Submit Message<i class="flaticon-right-1"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection