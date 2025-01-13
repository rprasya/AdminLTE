@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Update Category</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
                <div class="card">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" name="name" id="name" placeholder="Input Product Name"
                                autocomplete="off"
                                class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                value="{{ old('name', $category->name) }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('categories') }}" class="btn btn-sm btn-outline-danger mr-2">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-warning">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
