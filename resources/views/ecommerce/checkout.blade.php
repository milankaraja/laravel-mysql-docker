@extends('ecommerce.layout')

@section('title', 'Checkout')

@section('extra-css')
<script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

    <div class="container">

        <h1 class="checkout">Checkout</h1>
        <div class="checkout-section">
            <div>
                <form action="#">
                    <h2>Billing Details</h2>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="">
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="">
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province" value="">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <h2>Payment Details</h2>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="">
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="expiry">Expiry</label>
                            <input type="text" class="form-control" id="expiry" name="expiry" placeholder="MM/DD">
                        </div>
                        <div class="form-group">
                            <label for="cvc">CVC Code</label>
                            <input type="text" class="form-control" id="cvc" name="cvc" value="">
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <input type="submit" class="button-primary full-width" value="Complete Order">

                    <form id="payment-form">
                        <div id="card-element">
                            <!-- Elements will create input elements here -->
                        </div>

                        <!-- We'll put the error messages in this element -->
                        <div id="card-errors" role="alert"></div>

                        <button id="submit">Submit Payment</button>
                        </form>
                </form>
            </div>



            <div class="checkout-table-container">
                <h2>Your Order</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item )
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="/img/macbook-pro.png" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{$item ->model->name}}</div>
                                <div class="checkout-table-description">{{$item ->model->details}}</div>
                                <div class="checkout-table-price">{{$item ->model->presentPrice()}}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{$item ->qty}}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->

                    @endforeach


                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Subtotal <br>

                        Tax <br>
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{presentPrice(Cart::subtotal())}} <br>

                        {{presentPrice(Cart::tax())}} <br>
                        <span class="checkout-totals-total">{{presentPrice(Cart::total())}}</span>

                    </div>
                </div> <!-- end checkout-totals -->

                <div class="have-code">Have a Code?</div>
                        
                <div class="have-code-container">
                    <form action="#">
                        <input type="text">
                        <input type="submit" class="button" value="Apply">
                    </form>
                </div>
            </div>

        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
   <script>
    (function(){
        // Set your publishable key: remember to change this to your live publishable key in production
        // See your keys here: https://dashboard.stripe.com/apikeys
        var stripe = Stripe('pk_test_51LwgATAHMegOSNkTG0yrJ435Fy38NLVLjgG7fCM53RKuA6aaynNLXviPiwUTiEsWMFLjKrwIfWV882TAmO2W7ZXk00434lHw41');
        var elements = stripe.elements();

        // Set up Stripe.js and Elements to use in checkout form
        var elements = stripe.elements();
        var style = {
        base: {
            color: "#32325d",
        }
        };

        var card = elements.create("card", { style: style });
        card.mount("#card-element");
        card.on('change', ({error}) => {
        let displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
        } else {
            displayError.textContent = '';
        }
        });
        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        // If the client secret was rendered server-side as a data-secret attribute
        // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
        stripe.confirmCardPayment(clientSecret, {
            payment_method: {
            card: card,
            billing_details: {
                name: 'Jenny Rosen'
            }
            }
            }).then(function(result) {
                if (result.error) {
                // Show error to your customer (for example, insufficient funds)
                console.log(result.error.message);
                } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    // Show a success message to your customer
                    // There's a risk of the customer closing the window before callback
                    // execution. Set up a webhook or plugin to listen for the
                    // payment_intent.succeeded event that handles any business critical
                    // post-payment actions.
                }
                }
            });
            });

        })();

    

   </script>
@endsection