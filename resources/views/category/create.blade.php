@extends('layouts.master')

@section('title', 'Category Add')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-1">Category Add</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="categoryid">Category ID</label>
                    <input type="text" id="categoryid" name="categoryid" class="form-control @error('name') is-invalid @enderror">
                    @error('categoryid')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-success">
                        SAVE
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection