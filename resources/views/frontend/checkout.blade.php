@extends('layouts.front')

@section('title')
Checkout
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"> <a href="{{ url('/')}}">Home</a>/
                <a href="{{ url('cart') }}">Cart</a>/
                <a href="{{ url('checkout') }}">Checkout</a>
            </h6>
        </div>
    </div>
    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control fname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control lname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt3">
                                <label for="">Email</label>
                                <input type="text" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt3">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Adress 1">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt3">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Adress 2">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt3">
                                <label for="">City</label>
                                <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt3">
                                <label for="">State</label>
                                <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt3">
                                <label for="">Country</label>
                                <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6 mt3">
                                <label for="">Pin Code</label>
                                <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartItems as $cartItem)
                                    <tr>
                                        <td>{{ $cartItem->products->name }}</td>
                                        <td>{{ $cartItem->product_quantity}}</td>
                                        <td>{{ $cartItem->products->selling_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        @if($cartItems->count() > 0)
                        <button type="submit" class="btn btn-success float-end w-100">Place Order</button>
                        <button type="button" class="btn btn-primary float-end w-100 mt-3 razorpay_btn">Pay with Razorpay</button>
                        @else
                        <h4 class="text-center">Your <i class="fas fa-shopping-cart"></i> Cart Is Empty</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection