@extends('layouts.app')
@section('title')
    Create Domain
@endsection
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="inline-block d-flex align-items-center justify-content-between pt-4 pl-4 pr-4">
                    <h3>Add your domain to our website and get a backlink!</h3>
                   <a href="{{ route('home') }}" class="btn btn-sm btn-warning">Back</a>
                </div>
                <hr>
                <div class="card-body">
                    <div class="mt-2">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif    
                    </div>
                    <register-domain :categories="{{ $categories }}" :subcategories="{{ $subcategories }}"></register-domain>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
