@extends('shared.layout')

@section('content')
<h3>Salesmans</h3>
{{ HTML::linkRoute('salesman.create', 'New', null, array(
							'data-view-action' => 'create',
							'class' => 'btn btn-default'
						)) }}
<div class="list-group">
	@foreach($salesmans as $salesman)
	
		{{ HTML::linkRoute('salesman.show', $salesman->name.' '.$salesman->lastname, array($salesman->id), array(
							'data-view-action' => 'show',
							'class' => 'list-group-item'
						)) }}
	@endforeach
</div>
@stop

@section('form')
	@include('salesman.create')
@stop
