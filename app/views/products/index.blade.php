@extends('shared.layout')

@section('content')
	
	@yield('content_inner')
	
	<h3>Products</h3>
	<div class="list-group">
		@foreach($products as $product)
			<a href="{{ URL::route('products.show', $product->id) }}" class="list-group-item">{{$product->description.' '.$product->price}}</a>			
		@endforeach
	</div>
@stop