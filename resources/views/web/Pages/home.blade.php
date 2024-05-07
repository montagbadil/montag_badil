@extends('web.pages.montag_layout')
@section('title', 'Home Page')
@section('content')
    <div class="page-wrapper">
        @include('web.pages.header')
        <section class="main-slider">
            <div class="swiper-container thm-swiper__slider"
                data-swiper-options='{
    "slidesPerView": 1,
    "loop": true,
    "effect": "fade",
    "autoplay": {
        "delay": 5000
    },
    "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
    }
    }'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url({{ asset('assets/images/main-slider/main-slider-1-1.jpg);') }}">
                        </div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 text-center">
                                    <h2><span>Oragnic</span> <br>
                                        Food Market</h2>
                                    {{-- <a href="products.html" class=" thm-btn">Order Now</a> --}}
                                    <!-- /.thm-btn dynamic-radius -->
                                </div><!-- /.col-lg-7 text-right -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="image-layer"
                            style="background-image: url({{ asset('assets/images/main-slider/main-slider-1-2.jpg);') }}">
                        </div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 text-center">
                                    <h2><span>Oragnic</span> <br>
                                        Food Market</h2>
                                    {{-- <a href="products.html" class=" thm-btn">Order Now</a> --}}
                                    <!-- /.thm-btn dynamic-radius -->
                                </div><!-- /.col-lg-7 text-right -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.swiper-slide -->
                </div><!-- /.swiper-wrapper -->

                <!-- If we need navigation buttons -->
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next"><i
                            class="organik-icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i
                            class="organik-icon-right-arrow"></i></div>
                </div><!-- /.main-slider__nav -->

            </div><!-- /.swiper-container thm-swiper__slider -->
        </section><!-- /.main-slider -->

        <section class="feature-box">
            <div class="container">
                <div class="inner-container wow fadeInUp" data-wow-duration="1500ms">
                    <div class="thm-tiny__slider" id="contact-infos-box"
                        data-tiny-options='{
            "container": "#contact-infos-box",
            "items": 1,
            "slideBy": "page",
            "gutter": 0,
            "mouseDrag": true,
            "autoplay": true,
            "nav": false,
            "controlsPosition": "bottom",
            "controlsText": ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
            "autoplayButtonOutput": false,
            "responsive": {
                "640": {
                  "items": 2,
                  "gutter": 30
                },
                "992": {
                  "gutter": 30,
                  "items": 3
                },
                "1200": {
                  "disable": true
                }
              }
        }'>
                        <div>
                            <div class="feature-box__single">
                                <i class="organik-icon-global-shipping feature-box__icon"></i>
                                <div class="feature-box__content">
                                    <h3>Return Policy</h3>
                                    <p>Money back guarantee</p>
                                </div><!-- /.feature-box__content -->
                            </div><!-- /.feature-box__single -->
                        </div>
                        <div>
                            <div class="feature-box__single">
                                <i class="organik-icon-delivery-truck feature-box__icon"></i>
                                <div class="feature-box__content">
                                    <h3>Free Shipping</h3>
                                    <p>On all orders over $25.00</p>
                                </div><!-- /.feature-box__content -->
                            </div><!-- /.feature-box__single -->
                        </div>
                        <div>
                            <div class="feature-box__single">
                                <i class="organik-icon-online-store feature-box__icon"></i>
                                <div class="feature-box__content">
                                    <h3>Store Locator</h3>
                                    <p>Find your nearest store</p>
                                </div><!-- /.feature-box__content -->
                            </div><!-- /.feature-box__single -->
                        </div>
                    </div>
                </div><!-- /.inner-container -->
            </div><!-- /.container -->
        </section><!-- /.feature-box -->

        <section class="new-products">
            <img src="{{ asset('assets/images/shapes/new-product-shape-1.png') }}" alt=""
                class="new-products__shape-1">
            <div class="container">
                <div class="new-products__top">
                    <div class="block-title ">
                        <div class="block-title__decor"></div><!-- /.block-title__decor -->
                        <p>Recently Added</p>
                        <h3>New Products</h3>
                    </div><!-- /.block-title -->

                    <ul class="post-filter filters list-unstyled">
                        <li class="active filter" data-filter=".filter-item">All</li>
                        @foreach ($categories as $category)
                            <li class="filter" data-filter=".{{ $category->name }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div><!-- /.new-products__top -->

                <div class="row filter-layout">
                    @foreach ($categories as $category)
                        @foreach ($category->brands as $brand)
                            <div class="col-lg-4 col-md-6 filter-item {{ $category->name }}">
                                <div class="product-card__two">
                                    <div class="product-card__two-image">
                                        <img id="edit_image" src="{{ Storage::disk('public')->url($brand->image) }}"
                                            alt="{{ $brand->name }}">
                                        <div class="product-card__two-image-content">
                                            <a href="{{ route('brand.details', $brand->id) }}" target="_blank"><i
                                                    class="organik-icon-visibility"></i></a>
                                        </div><!-- /.product-card__two-image-content -->
                                    </div><!-- /.product-card__two-image -->
                                    <div class="product-card__two-content">
                                        <h3><a href="{{ route('brand.details', $brand->id) }}"
                                                target="_blank">{{ $brand->name }}</a>
                                        </h3>
                                        {{-- <p>{{ $brand->description }}</p> --}}
                                    </div><!-- /.product-card__two-content -->
                                </div><!-- /.product-card__two -->
                            </div><!-- /.col-lg-4 -->
                        @endforeach
                    @endforeach
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.new-products -->

        <section class="offer-banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                        <div class="offer-banner__box"
                            style="background-image: url({{ asset('assets/images/resources/offer-banner-1-1.jpg);') }}">
                            <div class="offer-banner__content">
                                <h3><span>100%</span> <br>Organic</h3>
                                <p>Quality Organic Food Store</p>
                                {{-- <a href="products.html" class="thm-btn">Order Now</a><!-- /.thm-btn --> --}}
                            </div><!-- /.offer-banner__content -->
                        </div><!-- /.offer-banner__box -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="offer-banner__box"
                            style="background-image: url({{ asset('assets/images/resources/offer-banner-1-2.jpg);') }}">
                            <div class="offer-banner__content">
                                <h3><span>100%</span> <br>Organic</h3>
                                <p>Quality Organic Food Store</p>
                                {{-- <a href="products.html" class="thm-btn">Order Now</a><!-- /.thm-btn --> --}}
                            </div><!-- /.offer-banner__content -->
                        </div><!-- /.offer-banner__box -->
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.offer-banner -->

        <section class="funfact-one jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 50%">
            <img src="{{ asset('assets/images/backgrounds/funfact-bg-1-1.jpg') }}" class="jarallax-img" alt="">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-6 col-lg-3  wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                        <div class="funfact-one__single">
                            <h3 class="odometer" data-count="8080">00</h3>
                            <p>Organic Products Available</p>
                        </div><!-- /.funfact-one__single -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3  wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="100ms">
                        <div class="funfact-one__single">
                            <h3 class="odometer" data-count="697">00</h3>
                            <p>Healthy Recipes</p>
                        </div><!-- /.funfact-one__single -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3  wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="funfact-one__single">
                            <h3 class="odometer" data-count="440">00</h3>
                            <p>Expert Team Mebers</p>
                        </div><!-- /.funfact-one__single -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                    <div class="col-md-6 col-lg-3  wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="300ms">
                        <div class="funfact-one__single">
                            <h3 class="odometer" data-count="2870">00</h3>
                            <p>Satisfied Customers</p>
                        </div><!-- /.funfact-one__single -->
                    </div><!-- /.col-md-6 col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.funfact-one -->

        <section class="call-to-action">
            <img src="{{ asset('assets/images/shapes/call-shape-1.png') }}" alt=""
                class="call-to-action__shape-1">
            <img src="{{ asset('assets/images/shapes/call-shape-2.png') }}" alt=""
                class="call-to-action__shape-2 wow fadeInLeft" data-wow-duration="1500ms">
            <h2 class="floated-text">Oragnic</h2><!-- /.floated-text -->
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-6 clearfix">
                        <img src="{{ asset('assets/images/resources/call-1-1.jpg') }}" class="call-to-action__image"
                            alt="">
                    </div><!-- /.col-md-12 col-lg-12 col-xl-12 -->
                    <div class="col-md-12 col-lg-12 col-xl-6 clearfix">
                        <div class="call-to-action__content">
                            <div class="block-title text-left">
                                <div class="block-title__decor"
                                    style="background-image: url({{ asset('assets/images/shapes/leaf-2-1.png);') }}">
                                </div>
                                <!-- /.block-title__decor -->
                                <p>Shopping Store</p>
                                <h3>Organic Food Only</h3>
                            </div><!-- /.block-title -->
                            <p>There are many variations of passages of lorem ipsum available but the majority have
                                suffered
                                alteration in some form by injected humor or random word.</p>
                            <div class="call-to-action__wrap">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="call-to-action__box">
                                            <i class="organik-icon-farmer"></i>
                                            <h3>Professional
                                                Farmers</h3>
                                        </div><!-- /.call-to-action__box -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="call-to-action__box">
                                            <i class="organik-icon-farm"></i>
                                            <h3>Solution
                                                for Farming</h3>
                                        </div><!-- /.call-to-action__box -->
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                            </div><!-- /.call-to-action__wrap -->
                            {{-- <a href="products.html" class="thm-btn">Order Now</a><!-- /.thm-btn --> --}}
                        </div><!-- /.call-to-action__content -->
                    </div><!-- /.col-md-12 col-lg-12 col-xl-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.call-to-action -->

        <div class="client-carousel ">
            <div class="container">
                <div class="thm-swiper__slider swiper-container"
                    data-swiper-options='{"spaceBetween": 140, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 3
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 5
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 5
                }
            }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('assets/images/resources/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                    </div><!-- /.swiper-wrapper -->
                </div><!-- /.thm-swiper__slider -->
            </div><!-- /.container -->
        </div><!-- /.client-carousel -->

        <section class="call-to-action-two">
            <img src="{{ asset('assets/images/shapes/call-shape-2-1.png') }}" alt=""
                class="call-to-action-two__shape-1">
            <img src="{{ asset('assets/images/shapes/call-shape-2-2.png') }}" alt=""
                class="call-to-action-two__shape-2">
            <img src="{{ asset('assets/images/shapes/call-shape-2-3.png') }}" alt=""
                class="call-to-action-two__shape-3">
            <img src="{{ asset('assets/images/shapes/call-shape-2-4.png') }}" alt=""
                class="call-to-action-two__shape-4">
            <img src="{{ asset('assets/images/shapes/call-shape-2-5.png') }}" alt=""
                class="call-to-action-two__shape-5">
            <img src="{{ asset('assets/images/shapes/call-shape-2-6.png') }}" alt=""
                class="call-to-action-two__shape-6">
            <div class="container">
                <div class="row flex-xl-row-reverse">
                    <div class="col-lg-12 col-xl-6">
                        <div class="call-to-action-two__image">
                            <h2 class="floated-text">Healthy</h2><!-- /.floated-text -->
                            <img src="{{ asset('assets/images/resources/call-2-1.png') }}" alt="">
                        </div><!-- /.call-to-action-two__image -->
                    </div><!-- /.col-md-6 -->
                    <div class="col-lg-12 col-xl-6">
                        <div class="call-to-action-two__content">
                            <div class="block-title text-left">
                                <div class="block-title__decor"></div><!-- /.block-title__decor -->
                                <p>Pure Organic Products</p>
                                <h3>Everyday Fresh Food</h3>
                            </div><!-- /.block-title -->
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Duis aute irure dolor in reprehen in derit.</h4>
                                    <p>Voluptate velit essects quis tempor orci. Suspendisse that potenti faucibus.</p>
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <ul class="list-unstyled">
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            Refresing to get such a touch
                                        </li>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            Duis aute irure dolor in
                                        </li>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            Reprehenderit in voluptate
                                        </li>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            Velit esse cillum dolore eu
                                        </li>
                                        <li>
                                            <i class="far fa-check-circle"></i>
                                            Fugiat nulla pariatur
                                        </li>
                                    </ul><!-- /.list-unstyled -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            {{-- <a href="products.html" class="thm-btn">Order Now</a><!-- /.thm-btn --> --}}
                        </div><!-- /.call-to-action-two__content -->
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.call-to-action-two -->

        <section class="testimonials-one">
            <div class="testimonials-one__head">
                <div class="container">
                    <div class="block-title text-center">
                        <div class="block-title__decor"></div><!-- /.block-title__decor -->
                        <p>Our Testimonials</p>
                        <h3>What People Say?</h3>
                    </div><!-- /.block-title -->
                </div><!-- /.container -->
            </div><!-- /.testimonials-one__head -->
            <div class="container">
                <div class="thm-tiny__slider" id="testimonials-one-box"
                    data-tiny-options='{
            "container": "#testimonials-one-box",
            "items": 1,
            "slideBy": "page",
            "gutter": 0,
            "mouseDrag": true,
            "autoplay": true,
            "nav": false,
            "controlsPosition": "bottom",
            "controlsText": ["<i class=\"fa fa-angle-left\"></i>", "<i class=\"fa fa-angle-right\"></i>"],
            "autoplayButtonOutput": false,
            "responsive": {
                "640": {
                  "items": 2,
                  "gutter": 30
                },
                "992": {
                  "gutter": 30,
                  "items": 3
                },
                "1200": {
                  "disable": true
                }
              }
        }'>
                    <div>
                        <div class="testimonials-one__single">
                            <div class="testimonials-one__image">
                                <img src="{{ asset('assets/images/resources/testi-1-1.png') }}" alt="">
                            </div><!-- /.testimonials-one__image -->
                            <div class="testimonials-one__content">
                                <p>I was very impresed by the osfins service lorem ipsum is simply free text used by
                                    copy typing
                                    refreshing. Neque porro est qui dolorem ipsum.</p>
                                <h3>Winnie Collier</h3>
                                <span>Customer</span>
                            </div><!-- /.testimonials-one__content -->
                        </div><!-- /.testimonials-one__single -->
                    </div>
                    <div>
                        <div class="testimonials-one__single">
                            <div class="testimonials-one__image">
                                <img src="{{ asset('assets/images/resources/testi-1-2.png') }}" alt="">
                            </div><!-- /.testimonials-one__image -->
                            <div class="testimonials-one__content">
                                <p>I was very impresed by the osfins service lorem ipsum is simply free text used by
                                    copy typing
                                    refreshing. Neque porro est qui dolorem ipsum.</p>
                                <h3>Helen Woods</h3>
                                <span>Customer</span>
                            </div><!-- /.testimonials-one__content -->
                        </div><!-- /.testimonials-one__single -->
                    </div>
                    <div>
                        <div class="testimonials-one__single">
                            <div class="testimonials-one__image">
                                <img src="{{ asset('assets/images/resources/testi-1-3.png') }}" alt="">
                            </div><!-- /.testimonials-one__image -->
                            <div class="testimonials-one__content">
                                <p>I was very impresed by the osfins service lorem ipsum is simply free text used by
                                    copy typing
                                    refreshing. Neque porro est qui dolorem ipsum.</p>
                                <h3>Ethan Thomas</h3>
                                <span>Customer</span>
                            </div><!-- /.testimonials-one__content -->
                        </div><!-- /.testimonials-one__single -->
                    </div>
                </div>
            </div><!-- /.container -->
        </section><!-- /.testimonials-one -->
        @include('web.pages.footer')
    </div><!-- /.page-wrapper -->
    @include('web.pages.mob_header')
@endsection
