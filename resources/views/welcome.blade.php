@extends('layouts.main')
@section('content')

<!-- banner-section -->
<section class="banner-style-three alternet-2">
    <div class="large-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 carousel-column">
                <div class="carousel-content">
                    <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
                        <div class="slide-item" style="background-image: url('assets/images/resource/banner1.jpg');">
                            <div class="pattern-layer" style="background-image: url('assets/images/shape/shape-8.png');"></div>
                            <div class="content-box">
                                <h1>Hydrate Responsibly</h1>
                                <p>Stay hydrated responsibly with eco-conscious bottle choices.</p>
                                <div class="btn-box">
                                    <a href="{{route('shop')}}">Browse Collection<i class="flaticon-right-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item" style="background-image: url('assets/images/resource/banner2.jpg');">
                            <div class="pattern-layer" style="background-image: url('assets/images/shape/shape-8.png');"></div>
                            <div class="content-box">
                                <h1>Planet-Care Choices</h1>
                                <p>Choose sustainable choices with eco-friendly bottle options.</p>
                                <div class="btn-box">
                                    <a href="{{route('shop')}}">Find Your Bottle<i class="flaticon-right-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item" style="background-image: url('assets/images/resource/banner3.jpg');">
                            <div class="pattern-layer" style="background-image: url('assets/images/shape/shape-8.png');"></div>
                            <div class="content-box">
                                <h1>Stylish Sustainability</h1>
                                <p>Explore chic, eco-friendly options that blend style with sustainability.</p>
                                <div class="btn-box">
                                    <a href="{{route('shop')}}">Explore Now<i class="flaticon-right-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 inner-column">
                <div class="inner-box">
                    <div class="single-item">
                        <figure class="image-box"><img src="{{asset('assets/images/resource/discount.png')}}" alt=""></figure>
                        <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-9.png);"></div>
                        <div class="inner centred">
                            <h3>Get 25% Off</h3>                            
                            <a href="{{route('shop')}}">Original Cap<i class="flaticon-right-1"></i></a>
                        </div>
                    </div>
                    <div class="single-item">
                        <figure class="image-box"><img src="{{asset('assets/images/resource/discount2.png')}}" alt=""></figure>
                        <div class="pattern-layer"></div>
                        <div class="inner">
                            <h3>Brew Lid</h3>
                            <a href="{{route('shop')}}">Shop Now<i class="flaticon-right-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->


<!-- service-section -->
<section class="service-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="fa-solid fa-truck"></i></div>
                            <h3><a href="{{route('welcome')}}">Free Shipping</a></h3>
                            <p>Enjoy free shipping on all orders!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="fa-solid fa-leaf"></i></div>
                            <h3><a href="{{route('welcome')}}">Eco-friendly</a></h3>
                            <p>Committed to eco-sustainability.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="fa-solid fa-headset"></i></div>
                            <h3><a href="{{route('welcome')}}">Customer Support</a></h3>
                            <p>Get 24/7 assistance from our support team.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                    <div class="service-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="fa-solid fa-undo-alt"></i></div>
                            <h3><a href="{{route('welcome')}}">Easy Returns</a></h3>
                            <p>Return items within 30 days for eco-exchanges.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service-section end -->

<!-- shop-style-three -->
<section class="shop-style-three">
    <div class="large-container">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-12 col-sm-12 advice-column">
                <div class="advice-block wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="advice-box centred gray-bg">
                        <h3>Tumbler (350ml)</h3>
                        <h2>Exclusive Discount</h2>
                        <div class="price"><span><del>€35.00</del> €25.00</span></div>
                        <figure class="image-box"><img src="{{asset('assets/images/resource/exclusive.png')}}" alt=""></figure>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 shop-column">
                <div class="shop-inner">
                    <div class="tabs-box">
                        <div class="tab-btn-box clearfix">
                            <h2>Top Selling Items</h2>
                        </div>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="tab-1">
                                <div class="row clearfix">
                                    @foreach($products as $product)
                                    <div class="col-lg-4 col-md-6 col-sm-12 shop-block">
                                        <div class="shop-block-three">
                                            <div class="inner-box">
                                                <figure class="image-box">
                                                    <img src="{{asset('uploads/products/' . $product->image)}}" alt="">
                                                    <span class="category">New</span>
                                                    <ul class="info-list clearfix">
                                                        <li>                                                            
                                                            <a onclick="addToCart(this)" style="cursor: pointer;" data-id="{{$product->id}}" data-quantity="1" id="addCart">
                                                                <i class="flaticon-shopping-cart-1"></i>
                                                            </a>
                                                            <span>Add to cart</span>
                                                        </li>
                                                    </ul>
                                                </figure>
                                                <div class="lower-content">
                                                    <a href="{{route('product', $product->slug)}}">{{$product->name}}</a>
                                                    <span class="price">€{{$product->price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop-style-three -->


<!-- deals-style-two -->
<section class="deals-style-two">
    <div class="large-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                <div class="single-item wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"><img src="{{asset('assets/images/resource/sale1.png')}}" alt=""></figure>
                        <h4>Deal of the month</h4>
                        <h2>Brew Set (350ml)</h2>
                        <div class="price"><span><del>€50.00</del> €40.00</span></div>
                        <div class="timer">
                            <div class="cs-countdown" data-countdown="09/30/2024 23:59:59"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 single-column">
                <div class="single-item wow fadeInRight animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <figure class="image-box"> <img src="{{asset('assets/images/resource/sale2.png')}}" alt=""></figure>
                        <h4>Deal of the month</h4>
                        <h2>Travel Mug (350ml)</h2>
                        <div class="price"><span><del>€35.00</del> €25.00</span></div>
                        <div class="timer">
                            <div class="cs-countdown" data-countdown="09/30/2024 23:59:59"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- deals-style-two end -->

<!-- cta-style -->
<section class="cta-style-two" style="background-image: url(assets/images/resource/sale.jpg); margin-top:50px; margin-bottom:50px;">
    <div class="auto-container">
        <div class="inner-box">
            <div class="inner">
                <h2>Save up to 50% today!</h2>
                <p> Discover our new collection of eco-friendly bottles. Join us in our mission to reduce plastic waste and promote a sustainable lifestyle.</p>
                <a href="{{route('shop')}}" class="theme-btn-three">Shop Now<i class="flaticon-right-1"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- cta-style end -->

<script>
    function addToCart(element) {
        var id = $(element).data('id');
        var quantity = $(element).data('quantity');

        $.ajax({
            url: "{{route('cart-store')}}",
            method: "POST",
            data: {
                id: id,
                quantity: quantity,
                _token: '{{csrf_token()}}'
            },
            success: function(data) {
                if (data.success) {
                    // Show success notification
                    Toastify({
                        text: 'Product added to cart successfully, Click to see the cart!',
                        duration: 3000,
                        gravity: 'bottom', // 'top' or 'bottom'
                        position: 'right', // 'left', 'center', or 'right'
                        backgroundColor: '#4FCBFB',
                        onClick: function() {
                            window.location.href = "{{ route('cart') }}";
                        }
                    }).showToast();
                } else {
                    // Show error notification
                    Toastify({
                        text: 'Something went wrong',
                        duration: 1000,
                        gravity: 'bottom',
                        position: 'right',
                        backgroundColor: '#eb3b5a',
                    }).showToast();
                }
                $('#item-count').text(data.items);
            },
            error: function() {
                alert('Error in the AJAX request');
            }
        });
    }
</script>

@endsection