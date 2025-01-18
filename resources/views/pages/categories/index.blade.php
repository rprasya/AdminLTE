@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Category</h1>
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
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
                        Add Category
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Name</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                        @foreach ($categories as $category)
                            <tbody>
                                <tr>
                                    <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('categories.edit', ['id' => $category->id]) }}"
                                                class="btn btn-sm btn-warning mr-2">Update</a>
                                            <form action="{{ route('categories.delete', ['id' => $category->id]) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apakah anda yakin untuk menghapus category ini?')">
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
                <div class="card-footer">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
