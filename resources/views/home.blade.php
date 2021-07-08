@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="inline-block d-flex align-items-center justify-content-between pt-4 pl-4 pr-4">
                    <h3>Dashboard</h3>
                    <form class="inline-block" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-warning">Logout</button>
                    </form>
                </div>
                <hr>
                <div class="card-body">
                    You are logged in!
                    <div class="mt-2">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif    
                    </div>
                    <div class="d-flex justify-items-between mt-2">
                        <a href="{{ route('category.create') }}" class="btn btn-success w-50 m-1">Add New Category</a>
                        <a href="{{ route('category.index') }}" class="btn btn-success w-50 m-1">View All Categories</a>
                    </div>
                    <div class="d-flex justify-items-between mt-2">
                        <a href="{{ route('subcategory.create') }}" class="btn btn-success w-50 m-1">Add New Subcategory</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
