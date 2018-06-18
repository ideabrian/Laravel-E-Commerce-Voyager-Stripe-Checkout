@extends('layouts.mainApp')

@section('title', 'Shopping Cart')

@section('content')
    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div id="message-container">
                            @if(session()->has('success_message'))
                                <div class="alert alert-success">
                                    {{ session()->get('success_message') }}
                                </div>
                            @endif

                            @if ($errors->count()>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <div class="cart_title">Shopping Cart</div>
                        @if(Cart::count() > 0)
                            <p> {{Cart::count()}} item(s) in shopping cart</p>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach(Cart::content() as $item)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{asset('/frontend/images/shopping_cart.jpg')}}" alt="{{$item->model->name}}"></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{$item->model->name}}</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text">
                                                    <select name="quantity" data-id="{{$item->rowId}}" class="cart_item_qty_select">
                                                        @for($i=1; $i<5+1; $i++)
                                                            <option @if($item->qty == $i) selected @endif>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{$item->model->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Amount</div>
                                                <div class="cart_item_text">£ {{ (floatval($item->qty) * floatval($item->price)) }}</div>
                                            </div>
                                            <div class="cart_item_action cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <div class="cart_item_action">
                                                    <div class="cart_item_save">
                                                        <form action="{{route('cart.switchToSaveForLater',$item->rowId)}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link"><i class="fa fa-history"></i> Save for later</button>
                                                        </form>
                                                    </div>
                                                    <div class="cart_item_remove">
                                                        <form method="post" action="{{route('cart.destroy', $item->rowId)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-link"><i class="fa fa-trash-alt"></i> Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Sub Total:</div>
                                <div class="order_total_amount">£ {{Cart::subtotal()}}</div>
                            </div>
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Tax:</div>
                                <div class="order_total_amount">£ {{Cart::tax()}}</div>
                            </div>
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">£ {{Cart::total()}}</div>
                            </div>
                        </div>


                        <div class="cart_buttons">
                            <a href="{{route('shop.index')}}" class="button cart_button_clear">Continue shopping</a>
                            <a href="{{route('checkout.index')}}" class="button cart_button_checkout">Checkout</a>
                        </div>

                        @else
                            <div class="alert alert-info">
                                No items in cart.
                            </div>
                            <div class="cart_buttons">
                                <a href="{{route('shop.index')}}" class="button cart_button_clear">Continue shopping</a>
                            </div>
                        @endif

                        <div class="cart_title">Save For Later</div>
                        @if(Cart::instance('saveForLater')->count() > 0)
                            <p> {{Cart::instance('saveForLater')->count()}} item(s) in save for later</p>
                            <div class="cart_items">
                                <ul class="cart_list">
                                    @foreach(Cart::instance('saveForLater')->content() as $item)
                                        <li class="cart_item clearfix">
                                            <div class="cart_item_image"><img src="{{asset('/frontend/images/shopping_cart.jpg')}}" alt="{{$item->model->name}}"></div>
                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title">Name</div>
                                                    <div class="cart_item_text">{{$item->model->name}}</div>
                                                </div>
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Quantity</div>
                                                    <div class="cart_item_text">1</div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Price</div>
                                                    <div class="cart_item_text">{{$item->model->price}}</div>
                                                </div>
                                                <div class="cart_item_total cart_info_col">
                                                    <div class="cart_item_title">Total</div>
                                                    <div class="cart_item_text">$2000</div>
                                                </div>
                                                <div class="cart_item_action cart_info_col">
                                                    <div class="cart_item_title">Action</div>
                                                    <div class="cart_item_save">
                                                        <form action="{{route('saveForLater.switchToCart',$item->rowId)}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$item->model->id}}">
                                                            <input type="hidden" name="name" value="{{$item->model->name}}">
                                                            <input type="hidden" name="price" value="{{$item->model->price}}">
                                                            <button type="submit" class="btn btn-outline-info btn-sm">Move to cart</button>
                                                        </form>
                                                    </div>
                                                    <div class="cart_item_remove">
                                                        <form method="post" action="{{route('saveForLater.destroy', $item->rowId)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        @else
                            <div class="alert alert-info">
                                No items in save for later..
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="{{asset('/frontend/images/send.png')}}" alt=""></div>
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
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/cart_responsive.css')}}">
@endsection


@section('scripts')
    <script src="{{asset('/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
    <script src="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
    <script src="{{asset('/frontend/plugins/easing/easing.js')}}"></script>

    <script>
        $(document).ready(function () {
            const classname = document.querySelectorAll('.cart_item_qty_select');

            Array.from(classname).forEach(function (element) {
                element.addEventListener('change', function () {
                    const id = element.getAttribute('data-id');
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then((response) => {
                        console.log(response);
                        window.location.href = '{{route("cart.index")}}'
                    })
                    .catch((error) => {
                        console.log(error);
                        window.location.href = '{{route("cart.index")}}'
                    })
                });
            });
        });
    </script>
@endsection