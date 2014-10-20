@extends('shared.layout')

@section('form')

<div class="row marketing">
	<h3>Product</h3>
			
		<div class="form-group">
			{{Form::label('description', 'Description')}} : {{ $product->description}}
		</div>
			
		<div class="form-group">
			{{Form::label('price', 'Price')}} : {{ $product->price}}
		</div>			
		
		<div class="form-group">
			{{Form::label('salesman_id', 'Salesman')}} : {{$salesman->name.' '.$salesman->lastname}}
		</div>		
</div>
@stop