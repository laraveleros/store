<div class="row marketing">
	<h3>Create Salesman</h3>
	
	{{ Form::open(array('url' => 'salesman')) }}
		@if (Session::get('message'))
			<div class="alter alter-success">{{Session::get('message')}}</div>			
		@endif
		<div class="form-group">
			{{Form::label('name', 'Name')}}
			{{Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder' => 'salesman name', 'autocomplete'=>'off'))}}
		</div>
			@if( $errors->has('name') )
				<div class="alert alert-danger">
				@foreach($errors->get('name') as $error)
					*{{ $error}}<br/>
				@endforeach					
				</div>				
			@endif
			
		<div class="form-group">
			{{Form::label('lastname', 'Lastname')}}
			{{Form::text('lastname', Input::old('lastname'), array('class'=>'form-control', 'placeholder' => 'salesman last name', 'autocomplete'=>'off'))}}
		</div>
			@if( $errors->has('lastname') )
				<div class="alert alert-danger">
				@foreach($errors->get('lastname') as $error)
					*{{ $error}}<br/>
				@endforeach					
				</div>				
			@endif
			
		{{Form::submit('Save', array('class' => 'btn btn-success'))}}			
		{{Form::reset('Reset', array('class' => 'btn btn-default'))}}
		
	{{ Form::close() }}
</div>