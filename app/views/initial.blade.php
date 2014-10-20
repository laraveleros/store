@extends('shared.layout')

@section('content')

<div class="jumbotron">
	<h1>Store</h1>
	<p class="lead">Allow create Salesman and products in its sections</p>	
</div>

<div class="row marketing">

	@foreach($salesmans as $salesman)
		<div class="panel panel-primary">
		
			<div class="panel-heading">{{$salesman->name.' '.$salesman->lastname}}</div>
			
			<ul class="list-group">
			
				@foreach($salesman->products as $product)				
					<li class="list-group-item">{{$product->description .' '. $product->price}}</li>				
				@endforeach
			
			</ul>
			
		</div>
	@endforeach

</div>

@stop
