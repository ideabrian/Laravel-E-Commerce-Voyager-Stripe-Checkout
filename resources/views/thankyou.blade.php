@extends('layouts.mainApp')

@section('title', 'Thank You!')

@section('content')
    <!-- Single Blog Post -->

    <div class="single_post">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="single_post_title">Thank You!</div>
                    <div class="single_post_text">
                        <p></p>

                        <div class="single_post_quote text-center">

                            <div class="quote_text">Your order has been successfully received.</div>
                            <div class="quote_name"></div>
                            <a href="/" class="btn btn-outline-secondary">Home Page</a>
                        </div>

                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="images/send.png" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="#" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                                <button class="newsletter_button">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/regular_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/regular_responsive.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/easing/easing.js')}}"></script>
    <script src="{{asset('/frontend/js/regular_custom.js')}}"></script>
@endsection