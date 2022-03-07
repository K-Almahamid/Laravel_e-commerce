@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit/Update Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3 ml-3">
                    <select class="form-select mb-3 border border-light" >
                        <option value="">{{ $products->category->name }}</option>
                      </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control border border-light" value="{{  $products->name }}" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control border border-light" value="{{  $products->slug }}" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description </label>
                    <textarea name="small_description" rows="3" class="form-control border border-light">{{  $products->small_description }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description </label>
                    <textarea name="description" rows="3" class="form-control border border-light">{{  $products->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Original Price</label>
                    <input type="number" class="form-control border border-light" value="{{  $products->original_price }}" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Selling Price</label>
                    <input type="number" class="form-control border border-light" value="{{  $products->selling_price }}" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Tax</label>
                    <input type="number" class="form-control border border-light" value="{{  $products->tax }}" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" class="form-control border border-light" value="{{  $products->quantity }}" name="quantity">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{ $products->status =='1' ? 'checked' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending" {{ $products->trending =='1' ? 'checked' : '' }}>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <textarea name="meta_title" rows="3" class="form-control border border-light">{{  $products->meta_title }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control border border-light">{{  $products->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control border border-light">{{  $products->meta_description }}</textarea>
                </div>
                @if($products->image)
                <img src="{{ asset('assets/uploads/products/'.$products->image) }}" class="w-10 mb-3" alt="Products image">
                @endif
                <div class="col-md-12 mb-4">
                    <input type="file" class="form-control border border-light"  name="image">
                </div>
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection