@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Add Product</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Widgets</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <form action="{{ route('products.post') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="name" placeholder="Input Product Name"
                                class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Input Description Product"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="sku" class="form-label">Code Product</label>
                            <input type="text" name="sku" id="sku" placeholder="Input Code Product"
                                class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" id="price" placeholder="Input Price"
                                class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" id="stock" placeholder="Input Stock Products"
                                class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('products') }}" class="btn btn-sm btn-outline-danger mr-2">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
