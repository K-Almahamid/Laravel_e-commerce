@extends('layouts.front')

@section('title')
My Wishlist
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"> <a href="{{ url('/')}}">Home</a>/
            <a href="{{ url('wishlist') }}">Wishlist</a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow">
        <div class="card-body">
            @if($wishlist->count() > 0)
            @foreach ($wishlist as $item)
            <div class="row  product_data">
                <div class="col-md-2 my-auto">
                    <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px"
                        alt="">
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>${{ $item->products->selling_price }}</h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="product_id" value="{{ $item->product_id }}">
                    @if ($item->products->quantity >= $item->product_quantity)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width:130px">
                        <button class="input-group-text  decrement-btn">-</button>
                        <input type="text" value="1" name="quantity" id="number"
                            class="quantity-input form-control text-center">
                        <button class="input-group-text  increment-btn">+</button>
                    </div>
                    @else
                    <label class="badge bg-danger">Out of Stock</label>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-success addToCartBtn"><i class="fas fa-shopping-cart"></i> Add to Cart
                    </button>
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <h4 class="text-center">There are no products in your Wshlist <i class="fas fa-heart"></i> </h4>
        @endif
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
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


            $('.addToCartBtn').click(function (e) { 
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id' : product_id ,
                'product_quantity' : product_quantity,
            },
            success: function (response) {
                swal(response.status);
            }
        });
        });

        $('.remove-wishlist-item').click(function (e) { 
            e.preventDefault();
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
            var product_id = $(this).closest('.product_data').find('.product_id').val();
                $.ajax({
                    method: "POST",
                    url: "delete-wishlist-item",
                    data: {
                        'product_id':product_id,
                    },
                    success: function (response) {
                        window.location.reload();
                        swal('',response.status,'success');
                    }
                });
        });

        });


</script>
@endsection