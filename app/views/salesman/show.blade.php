

<div class="row marketing">
	<h3>Salesman</h3>
	
		@if (Session::get('message'))
			<div class="alter alter-success">{{Session::get('message')}}</div>			
		@endif
		<div class="form-group">
			{{Form::label('name', 'Name')}} : {{ $salesman->name }}
		</div>
			
		<div class="form-group">
			{{Form::label('lastname', 'Lastname')}} : {{ $salesman->lastname }}
		</div>			
		
</div>
