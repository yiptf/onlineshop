@extends('layout.master')

@section('title')
    Online Shop
@endsection

@section('content')

<div class="row">
@foreach($products as $product)
    <div class="col-sm-3 col-md-3">      
        <img src="{{ $product->imagePath }}" alt=".." class="img-thumbnail">
        <h3>{{ $product->name }}</h3>
        <h3>{{ $product->price }}</h3>
        <a href="/shop/products/{{ $product->id }}" class="btn btn-success pull-right" role="button">Details</a>
    </div>
@endforeach
</div>


@if(Auth::check() && Auth::user()->isAdmin)
<div class="text-right">
    <a href="/shop/products/create" class="btn btn-dark">Create new product</a>
</div>
@endif
@endsection