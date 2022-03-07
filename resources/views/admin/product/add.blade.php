@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add Products</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3 ml-3">
                    <select class="form-select mb-3 border border-light" name="category_id" >
                        <option value="">Select a Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" class="form-control border border-light" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control border border-light" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Small Description </label>
                    <textarea name="small_description" rows="3" class="form-control border border-light"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description </label>
                    <textarea name="description" rows="3" class="form-control border border-light"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Original Price</label>
                    <input type="number" class="form-control border border-light" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Selling Price</label>
                    <input type="number" class="form-control border border-light" name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Tax</label>
                    <input type="number" class="form-control border border-light" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" class="form-control border border-light" name="quantity">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <textarea name="meta_title" rows="3" class="form-control border border-light"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control border border-light"></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3" class="form-control border border-light"></textarea>
                </div>
                <div class="col-md-12 mb-4">
                    <input type="file" class="form-control border border-light" name="image">
                </div>
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection