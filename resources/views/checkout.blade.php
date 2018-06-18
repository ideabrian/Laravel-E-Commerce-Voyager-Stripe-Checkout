@extends('layouts.mainApp')

@section('title', 'Checkout')

@section('content')
    <div class="checkout_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 pb-5">
                    <div class="cart_container">
                        <div id="message-container">
                            @if(session()->has('success_message'))
                                <div class="alert alert-success">
                                    {{ session()->get('success_message') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="cart_title">Checkout</div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="checkout_form_title"><h3>Billing Details</h3></div>
                        <form id="payment-form" action="{{route('checkout.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Address :</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="enter email" value="{{old('email')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="full-name">Full Name :</label>
                                <input type="text" id="full-name" class="form-control" name="name" placeholder="enter your full name" value="{{old('name')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address :</label>
                                <input type="text" id="address" class="form-control" name="address" placeholder="enter address" value="{{old('address')}}" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">City</label>
                                    <input id="inputCity" class="form-control" type="text" name="city" placeholder="City" value="{{old('city')}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputProvince">Province</label>
                                    <input id="inputProvince" class="form-control" type="text" name="province" placeholder="province" value="{{old('province')}}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPostalCode">Postal Code</label>
                                    <input id="inputPostalCode" class="form-control" type="text" name="postal_code" placeholder="postal code" value="{{old('postal_code')}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPhone">Phone</label>
                                    <input id="inputPhone" class="form-control" type="text" name="phone" placeholder="phone" value="{{old('phone')}}" required>
                                </div>
                            </div>
                            <div class="checkout_form_title"><h3>Payment Details</h3></div>

                            <div class="form-group">
                                <label for="name-on-card">Name on Card :</label>
                                <input type="text" id="name-on-card" class="form-control" name="card_name" placeholder="Name on card" value="{{old('card_name')}}" required>
                            </div>

                            <div class="form-group">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>


                            {{--<div class="form-group">--}}
                                {{--<label class="col-form-label">Address :</label>--}}
                                {{--<input type="text" class="form-control" name="card_address" placeholder="enter address">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="col-form-label">Credit Card Number :</label>--}}
                                {{--<input type="text" class="form-control" name="card_number" placeholder="Credit card number">--}}
                            {{--</div>--}}
                            {{--<div class="form-row">--}}
                                {{--<div class="form-group col-md-6">--}}
                                    {{--<label for="inputExpiry">Expiry Date</label>--}}
                                    {{--<input id="inputExpiry" class="form-control" type="text" name="card_expiry" placeholder="Expiry Date">--}}
                                {{--</div>--}}
                                {{--<div class="form-group col-md-6">--}}
                                    {{--<label for="inputCVC">CVC Code</label>--}}
                                    {{--<input id="inputCVC" class="form-control" type="text" name="card_cvc" placeholder="CVC Code">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <button type="submit" id="complete-order" class="btn btn-block btn-info">Complete Order</button>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="checkout_form_title"><h3>Your Order</h3></div>

                    @foreach(Cart::content() as $item)
                    <!-- Checkout product item-->
                    <div class="checkout_product_wrap">
                        <div class="col-md-4 col-lg-4 col-sm-4 checkout_product_image"><img src="{{asset('/frontend/images/view_4.jpg')}}"> </div>
                        <div class="col-md-7 col-lg-7 col-sm-8 checkout_product_detail">
                            <h4></h4>
                            <p></p>
                            <ul>
                                <li><h5>{{$item->model->name}}</h5></li>
                                <li>{{$item->model->details}}</li>
                                <li>£ {{$item->model->price}}</li>
                            </ul>
                        </div>
                        <div class="col-md-1 col-lg-1 col-sm-1 checkout_qty justify-content-center">{{$item->qty}}</div>
                    </div>
                    @endforeach

                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Sub Total:</div>
                            <div class="order_total_amount">£ {{Cart::subtotal()}}</div>
                        </div>
                        @if(!session()->get('coupon'))
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Tax:</div>
                                <div class="order_total_amount">£ {{Cart::tax()}}</div>
                            </div>
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">£ {{Cart::total()}}</div>
                            </div>
                        @endif
                        @if(session()->has('coupon'))

                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">
                                    Discount ({{session()->get('coupon')['name']}})
                                    <form style="display: inline" action="{{route('coupon.destroy')}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link">Remove</button>
                                    </form>
                                </div>
                                <div class="order_total_amount">-£ {{session()->get('coupon')['discount']}}</div>
                            </div>
                            <hr>
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">New Subtotal:</div>
                                <div class="order_total_amount">{{$newSubtotal}}</div>
                            </div>
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">New tax:</div>
                                <div class="order_total_amount">{{$newTax}}</div>
                            </div>
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">New Total:</div>
                                <div class="order_total_amount">£ {{$newTotal}}</div>
                            </div>
                        @endif

                    </div>

                    @if(!session()->has('coupon'))
                        <!-- coupon -->
                            <div class="have-code-wrap">
                                <h5>Have a Code ?</h5>
                                <div class="have-code-container">
                                    <form action="{{route('coupon.store')}}" method="post">
                                        @csrf
                                        <input class="form-control" type="text" id="coupon_code" name="coupon_code">
                                        <button type="submit" class="btn btn-primary">Apply</button>
                                    </form>
                                </div>
                            </div>
                    @endif
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
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function () {
            // Create a Stripe client.
            var stripe = Stripe('pk_test_survD1b8nLbyDCzuqpeIfWRZ');

            // Create an instance of Elements.
            var elements = stripe.elements();


            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode:true,
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                //Disable the submit button to repeated clicks
                document.getElementById('complete-order').disabled = true;

                var options = {
                    name : document.getElementById('name-on-card').value,
                    address_line1 : document.getElementById('address').value,
                    address_city : document.getElementById('inputCity').value,
                    address_state: document.getElementById('inputProvince').value,
                    address_zip : document.getElementById('inputPostalCode').value
                }

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;

                        //Enable the submit button
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }
        });
    </script>
@endsection