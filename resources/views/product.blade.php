@extends('layouts.mainApp')

@section('title', $product->name)

@section('content')
    <!-- Single Product -->

    <div class="single_product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-3">
                    <div class="navigation">
                        <ul class="list-inline-item">
                            <li class="list-inline-item"><a href="/">Home</a> <i class="fa fa-angle-double-right"></i> </li>
                            <li class="list-inline-item"><a href="{{route('shop.index')}}">Shop</a> <i class="fa fa-angle-double-right"></i> </li>
                            <li class="list-inline-item"><a href="{{route('shop.productShow', $product->slug)}}">{{$product->name}}</a> </li>
                        </ul>
                    </div>
                </div>
                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="images/single_4.jpg"><img src="{{asset('/frontend/images/single_4.jpg')}}" alt=""></li>
                        <li data-image="images/single_2.jpg"><img src="{{asset('/frontend/images/single_2.jpg')}}" alt=""></li>
                        <li data-image="images/single_3.jpg"><img src="{{asset('/frontend/images/single_3.jpg')}}" alt=""></li>
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{asset('/frontend/images/single_4.jpg')}}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">Laptops</div>
                        <div class="product_name">{{$product->name}}</div>
                        <div class="product_description">{!! $product->details !!}</div>
                        <div class="rating_r rating_r_4 product_rating"></div>
                        <div class="order_info d-flex flex-row">
                            <form action="{{route('cart.store')}}" method="post">
                                @csrf
                                @method('POST')
                                <div class="clearfix" style="z-index: 1000;">

                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix">
                                        <span>Quantity: </span>
                                        <input id="quantity_input" name="qty" type="text" pattern="[0-5]*" value="1">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="product_price">$ {{$product->price}}</div>
                                <div class="button_container">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                        <input type="hidden" name="name" value="{{$product->name}}">
                                        <input type="hidden" name="price" value="{{$product->price}}">
                                        <button type="submit" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product_text"><p>{!! $product->description !!}</p></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recently Viewed -->

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Recently Viewed</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">
                            @foreach($products as $recentlyItem)
                                <!-- Recently Viewed Item -->
                                    <div class="owl-item">
                                        <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="viewed_image"><img src="{{asset('/frontend/images/view_1.jpg')}}" alt=""></div>
                                            <div class="viewed_content text-center">
                                                <div class="viewed_price">$ {{$recentlyItem->price}}<span></span></div>
                                                <div class="viewed_name"><a href="{{route('shop.productShow', $recentlyItem->slug)}}">{{$recentlyItem->name}}</a></div>
                                            </div>
                                            <ul class="item_marks">
                                                <li class="item_mark item_discount">-25%</li>
                                                <li class="item_mark item_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/plugins/slick-1.8.0/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/product_styles.css')}}">
@endsection

@section('scripts')

    <script src="{{asset('/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{asset('/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
    <script src="{{asset('/frontend/plugins/easing/easing.js')}}"></script>
    <script src="{{asset('/frontend/js/product_custom.js')}}"></script>
@endsection