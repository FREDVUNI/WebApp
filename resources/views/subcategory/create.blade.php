@extends('layouts.app')
@section('title')
    Create Subcategory
@endsection
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="inline-block d-flex align-items-center justify-content-between pt-4 pl-4 pr-4">
                    <h3>Subcategories</h3>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
                <hr>
                <div class="card-body">
                    <div class="mt-2">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif    
                    </div>
                    <form action="{{ route('subcategory.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">category</label>
                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Choose a category</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                            @error('category')
                               <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Subcategory</label>
                            <input type="text" name="subcategory" id="subcategory" class="form-control @error('subcategory') is-invalid @enderror" placeholder="Enter the subcategory" value="{{ old('subcategory') }}">
                            @error('subcategory')
                               <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark">Submit the subcategory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
