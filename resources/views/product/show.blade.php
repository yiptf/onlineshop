@extends('layout.master')

@section('title')
    Online Shop
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Details</div>
                    <div class="card-body">
                    <img src="{{ $product->imagePath }}" alt=".." class="img-thumbnail">
                    <h3>{{ $product->name }}</h3>
                    <h3>{{ $product->price }}</h3>
                    @if(Auth::user() && !Auth::user()->isAdmin)
                        <div class="text-right">
                            <form action="/shop/{{ $product->id }}/add" method="post">
                            @csrf
                            <label for="quantity">Quantity</label>
                            <input name="quantity" type="number" min="0" required>
                            <small id="emailHelp" class="form-text text-muted">Please enter the quantity</small>
                            @error('price') <p style="color: red;">{{ $message }}</p>@enderror
                            <button class="btn btn-success pull-right">Add</button>
                            </form>
                        </div>
                    @endif
                    @if(Auth::check() && Auth::user()->isAdmin)
                        <div class="text-right">
                            <a href="/shop/products/{{ $product->id }}/edit" class="btn btn-success pull-right">Edit</a>
                            <form action="/shop/products/{{ $product->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-success pull-right">Delete</button>
                            </form>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection