@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Product Details</div>

                <div class="panel-body">
                    <div class="product-details">
                        <h2>{{ $product->name }}</h2>
                        <p>{{ $product->description }}</p>
                        <span class="text-2xl font-black" style="color:#F0AC06">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
