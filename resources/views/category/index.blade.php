@extends('layouts.master')

@section('title', 'Category')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="">
                <h3 class="card-title mb-1">Category</h3>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('category.create') }}">Create Category</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-stripped">
                <thead class="thead-dark">
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($category->count() == 0)
                        <tr>
                            <td colspan="3" class="text-center text-danger"><b>Please Input Some Data</b></td>
                        </tr>
                    @else
                    @foreach($category as $c)
                    <tr>
                        <td>{{ $c->categoryid }}</td>
                        <td>{{ $c->name }}</td>
                        <td>
                            <form action="{{ route('category.destroy',$c->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <tfoot class="thead-dark">
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection