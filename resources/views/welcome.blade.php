@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <div class="py-3">
                 <h1 class="textt">
                     Link building is one of the most important thing in <span class="textmaincolor">SEO</span>
                 </h1>
            </div>
             <div>
                 <h5>Every Little helps, Submit your domain and get a do follow backlink from our website</h5>
             </div>
            <div class="py-3">
                 <a href="{{ route('domain.create') }}" class="btn btn-primary domain-submit">Submit your domain</a>
             </div>
        </div>
        <div class="col-md-6 image">
            <div class="d-flex justify-content-end align-items-center">
                <img src="{{ asset('images/loader-image.gif') }}" alt="main-image" class="w-100 py-5 pl-5">
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <h3 class="font-weight-bold">Categories</h3>
        <display-category :categories="{{ $categories }}" :subcategories="{{ $subcategories }}" :domains="{{ $domains }}"><display-category/>
    </div>
</div>
@endsection
