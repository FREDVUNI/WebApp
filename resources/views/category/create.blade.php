@extends('layouts.app')
@section('title')
    Create Category
@endsection
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="inline-block d-flex align-items-center justify-content-between pt-4 pl-4 pr-4">
                    <h3>Category</h3>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
                <hr>
                <div class="card-body">
                    <div class="mt-2">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif    
                    </div>
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Category</label>
                            <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" placeholder="Enter the category" value="{{ old('category') }}">
                            @error('category')
                               <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit the category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
