@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control border border-light" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control border border-light" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description </label>
                    <textarea name="description" rows="3" class="form-control border border-light"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Papular</label>
                    <input type="checkbox" name="papular">
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