@extends('layout.master')

@section('title')
    Online Shop
@endsection

@section('content')
    
@if(Session::has('cart') && $totalQty > 0)
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <ul class="list-group">
            @foreach($products as $product)
             <li class="list-group-item">
                <span class="badge">{{ $product['qty'] }}</span>
                <strong>{{ $product['item']['name'] }}</strong>
                <span class="label label-success">{{ $product['price'] }}</span>
             </li>
             <form action="/shop/{{ $product['item']['id'] }}/remove" method="post">
             @csrf
             @method('DELETE')
             <button class="btn btn-primary">Remove order</button>
             </form>            
            @endforeach
        </ul>
    </div>
</div>


<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total Quantity:{{ $totalQty }}</strong>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total Price:{{ $totalPrice }}</strong>
    </div>
</div>
    
@else
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>No items in cart</strong>
    </div> 
@endif
@endsection