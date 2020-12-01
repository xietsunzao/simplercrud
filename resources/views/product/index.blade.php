@extends('layouts.master')

@section('title', 'Product')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="">
                <h3 class="card-title mb-1">Product</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('product.create') }}">Create Product</a>
            </div>
        </div>
        <div class="card-body">
            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success fade show" role="alert">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-warning fade show" role="alert">{{ session('error') }}</div>
            @endif
            {{-- /.Alert --}}

            <table class="table table-stripped">
                <thead class="thead-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Price</th>
                        <th>Product Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($product->count() == 0)
                        <tr>
                            <td colspan="6" class="text-center text-danger"><strong>Please Input Some Data</strong></td>
                        </tr>
                    @else
                    @foreach($product as $c)
                    <tr>
                        <td>{{ $c->productid }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->category }}</td>
                        <td>{{ $c->price }}</td>
                        <td>{{ $c->description }}</td>
                        <td>
                            <form action="{{ route('product.destroy',$c->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                            <a class="btn btn-secondary" href="{{ route('product.edit', $c->id) }}">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot class="thead-dark">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Product Price</th>
                        <th>Product Description</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection