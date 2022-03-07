@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Edit/Update Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control border border-light" value="{{ $category->name }}"
                        name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control border border-light" value="{{ $category->slug }}"
                        name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Description </label>
                    <textarea name="description" rows="3"
                        class="form-control border border-light">{{ $category->description }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" {{ $category->status =='1' ? 'checked' : '' }}>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Papular</label>
                    <input type="checkbox" name="papular" {{ $category->papular =='1' ? 'checked' : '' }}>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <textarea name="meta_title" rows="3"
                        class="form-control border border-light"> {{ $category->meta_title }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3"
                        class="form-control border border-light">{{ $category->meta_keywords }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" rows="3"
                        class="form-control border border-light">{{ $category->meta_descrip }}</textarea>
                </div>
                @if($category->image)
                <img src="{{ asset('assets/uploads/category/'.$category->image) }}" class="w-10 mb-3" alt="Category image">
                @endif
                <div class="col-md-12 mb-4">
                    <input type="file" class="form-control border border-light" name="image">
                </div>
                <div class="col-md-12 ">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection