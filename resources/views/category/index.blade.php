@extends('layouts.app')
@section('title')
    Categories
@endsection
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="inline-block d-flex align-items-center justify-content-between pt-4 pl-4 pr-4">
                    <h3>All Categories</h3>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
                <hr>
                <div class="card-body">
                    <category-component :categories="{{ $category }}"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
