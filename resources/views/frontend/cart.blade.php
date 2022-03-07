@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"> <a href="{{ url('/')}}">Home</a>/
                <a href="{{ url('cart') }}">Cart</a>
            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow">
            @if($cartItems->count() > 0)
            <div class="card-body">
                @php $total = 0 ; @endphp
                @foreach ($cartItems as $cartItem)
                <div class="row  product_data">
                    <div class="col-md-2 my-auto">
                        <img src="{{ asset('assets/uploads/products/'.$cartItem->products->image) }}" height="70px"
                            width="70px" alt="">
                    </div>
                    <div class="col-md-3 my-auto">
                        <h6>{{ $cartItem->products->name }}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>${{ $cartItem->products->selling_price }}</h6>
                    </div>
                    <div class="col-md-3 my-auto">
                        <input type="hidden" class="product_id" value="{{ $cartItem->product_id }}">
                        @if ($cartItem->products->quantity >= $cartItem->product_quantity)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width:130px">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                            <input type="text" value="{{ $cartItem->product_quantity }}" name="quantity" id="number"
                                class="quantity-input form-control text-center">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                        @php $total += $cartItem->products->selling_price * $cartItem->product_quantity ; @endphp
                        @else
                        <label class="badge bg-danger">Out of Stock</label>
                        @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="card-footer">
                <h6 class="mt-2">Total Price : ${{ $total }}
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end mb-2">Proceed to checkout</a>
                </h6>
            </div>
            @else
            <div class="card-body text-center">
                <h2>Your <i class="fas fa-shopping-cart"></i> Cart Is Empty</h2>
                <a href="{{ url('category') }}" class="btn btn-outline-success float-end">Continue Shopping</a>
            </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $('.increment-btn').click(function (e) { 
                e.preventDefault();

                var inc_value = $(this).closest('.product_data').find('.quantity-input').val();
                var value = parseInt(inc_value,10);
                value = isNaN(value) ? 0 : value ;
                if(value < 10) {
                    value++;
                    $(this).closest('.product_data').find('.quantity-input').val(value);
                }
            });

             $('.decrement-btn').click(function (e) { 
                e.preventDefault();

                var dec_value = $(this).closest('.product_data').find('.quantity-input').val();
                var value = parseInt(dec_value,10);
                value = isNaN(value) ? 0 : value ;
                if(value > 1) {
                    value--;
                    $(this).closest('.product_data').find('.quantity-input').val(value);
                }
            });

            $('.delete-cart-item').click(function (e) { 
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.product_id').val();
                $.ajax({
                    method: "POST",
                    url: "delete-cart-item",
                    data: {
                        'product_id':product_id,
                    },
                    success: function (response) {
                        window.location.reload();
                        swal('',response.status,'success');
                    }
                });
            });

            $('.changeQuantity').click(function (e) { 
                e.preventDefault();
                var prod_id = $(this).closest('.product_data').find('.product_id').val();
                var quantity = $(this).closest('.product_data').find('.quantity-input').val();
                data ={
                   'product_id' : prod_id ,
                   'product_quantity' : quantity ,
                }
                $.ajax({
                    method: "POST",
                    url: "update-cart",
                    data: data,
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });

        });

</script>
@endsection