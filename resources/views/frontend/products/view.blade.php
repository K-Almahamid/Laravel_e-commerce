@extends('layouts.front')

@section('title',$products->name)

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0"> <a href="{{ url('category')}}">Collections</a>/
            <a href="{{ url('category/'.$products->category->slug) }}"> {{ $products->category->name }} /
                <a href="{{ url('category/'.$products->category->slug.'/'.$products->slug) }}"> {{ $products->name}}</a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mt-4 border-right">
                    <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-100" alt="">
                </div>
                <div class="col-md-8 ">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        @if ($products->trending == 1)
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending tag">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3">Original Price : <s>${{ $products->original_price }}</s> </label>
                    <label class="mb-3 fw-bold">Selling Price : ${{ $products->selling_price }}</label>
                    <p class="mt-35">
                        {!! $products->small_description !!}
                    </p>
                    <br>
                    @if ($products->quantity > 0)
                    <label class="badge bg-success">In Stock</label>
                    @else
                    <label class="badge bg-danger">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $products->id }}" class="product_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width:130px">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" value="1" name="quantity" id="number"
                                    class="quantity-input form-control text-center">
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br />
                            @if ($products->quantity > 0)
                            <button type="button" class="btn btn-primary me-3 addToCartBtn float-start ">Add to cart
                                <i class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button type="button" class="btn btn-success me-3 addToWishlistBtn float-start">Add to
                                wishlist <i class="fa fa-heart"></i></button>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <h3 class="mb-3">Description</h3>
                    <p class="mt-35">
                        {!! $products->small_description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {

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

    $('.addToWishlistBtn').click(function (e) { 
        e.preventDefault();
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    var product_id = $(this).closest('.product_data').find('.product_id').val();
    var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();

    $.ajax({
        method: "POST",
        url: "/add-to-wishlist",
        data: {
            'product_id' : product_id ,
            'product_quantity' : product_quantity,
        },
        success: function (response) {
            swal(response.status);
        }
    });
        
    });

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

</script>
@endsection