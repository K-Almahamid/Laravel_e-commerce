@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')
<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View
                        <a href="{{ url('my-orders') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="" >First Name</label>
                            <div class="border p-2">{{ $orders->fname }}</div>
                            <label for="" class="mt-2">Last Name</label>
                            <div class="border p-2">{{ $orders->lname }}</div>
                            <label for="" class="mt-2">Email</label>
                            <div class="border p-2">{{ $orders->email }}</div>
                            <label for="" class="mt-2">Contact Number</label>
                            <div class="border p-2">{{ $orders->phone }}</div>
                            <label for="" class="mt-2">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address1 }},<br>
                                {{ $orders->address2 }},<br>
                                {{ $orders->city }},<br>
                                {{ $orders->state }},
                                {{ $orders->country }}
                            </div>
                            <label for="" class="mt-2">Zib Code</label>
                            <div class="border p-2">{{ $orders->pincode }}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                            <hr>
                            <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->quantity}}</td>
                                        <td>${{ $item->price}}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/products/'.$item->products->image ) }}" width="50px" alt="Product Image" srcset="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total : <span class="float-end">${{ $orders->total_price }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection