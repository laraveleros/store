@extends('shared.layout')

@section('content')
<h3>Salesmans</h3>
<div class="list-group">
	@foreach($salesmans as $salesman)
		<a href="{{ URL::route('salesman.show', $salesman->id) }}" class="list-group-item">{{$salesman->name.' '.$salesman->lastname }}</a>
	@endforeach
</div>
@stop


@section('form')
	@include('salesman.create')
@stop