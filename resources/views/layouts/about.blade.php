@extends('layouts.main')
@section('content')

<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>About Us</h1>
            <ul class="bread-crumb clearfix">
                <li><i class="flaticon-home-1"></i><a href="{{route('welcome')}}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section>


<section class="about-section">
    <div class="auto-container">
        <div class="row align-items-center clearfix">
            <div class="col-lg-8 col-md-8 col-sm-12 text-column">
                <div class="text-inner">
                    <h2><span>Eco</span>Bottle</h2>
                    <h3>Your Eco-Friendly Choice</h3>
                    <p>Welcome to EcoBottle, your dedicated eco-friendly affiliate store committed to sustainable hydration solutions. At EcoBottle, we specialize in offering a diverse range of eco-friendly bottles and their spare parts through our innovative web application developed using the Laravel framework.</p>
                    <p>Driven by our passion for environmental sustainability, EcoBottle aims to make a positive impact by promoting reusable and eco-conscious products. Our platform connects customers with high-quality bottles and accessories, ensuring both functionality and eco-friendliness in every purchase.</p>
                    <p>Explore our curated selection, join us in reducing single-use plastics, and embrace a greener lifestyle with EcoBottle.</p>
                    <a href="{{route('contact')}}" class="theme-btn-three">Contact Us<i class="flaticon-right-1"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 image-column">
                <figure class="image-box"><img src="assets/images/resource/about.jpg" alt="" style="max-width: 100%; height: auto;"></figure>
            </div>
        </div>
    </div>
</section>



@endsection