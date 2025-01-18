@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Products</h1>
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
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                        Add Product
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Code Product</th>
                                <th>Price</th>
                                <th>stock</th>
                                <th>Category</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        @foreach ($products as $product)
                            <tbody>
                                <tr>
                                    <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description ?? '-' }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ 'Rp' . number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                                class="btn btn-sm btn-warning mr-2">Update</a>
                                            <form action="{{ route('products.delete', ['id' => $product->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah anda yakin untuk menghapus product ini?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer">{{ $products->links() }}</div>
            </div>
        </div>
    </div>
@endsection
