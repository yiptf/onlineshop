@extends('layout.master')

@section('title')
    Online Shop
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create product</div>
                    <div class="card-body">
                        <form action="/shop/products" method="post">
                            @csrf
                            @include('layout.form')
                            <button type="submit" class="btn btn-primary">Create product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection