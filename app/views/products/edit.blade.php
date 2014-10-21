<div class="row marketing">
	<h3>Edit Product</h3>
	
	{{ Form::open(['route'=>['products.update', $product->id]]) }}
		@if (Session::get('message'))
			<div class="alter alter-success">{{Session::get('message')}}</div>			
		@endif
		<div class="form-group">
			{{Form::label('description', 'Description')}}
			{{Form::text('description', Input::old('description', $product->description), array('class'=>'form-control', 'placeholder' => 'product description', 'autocomplete'=>'off'))}}
		</div>
			@if( $errors->has('description') )
				<div class="alert alert-danger">
				@foreach($errors->get('description') as $error)
					*{{ $error}}<br/>
				@endforeach					
				</div>				
			@endif
			
		<div class="form-group">
			{{Form::label('price', 'Price')}}
			{{Form::text('price', Input::old('price', $product->price), array('class'=>'form-control', 'placeholder' => 'product price', 'autocomplete'=>'off'))}}
		</div>
			@if( $errors->has('price') )
				<div class="alert alert-danger">
				@foreach($errors->get('price') as $error)
					*{{ $error}}<br/>
				@endforeach					
				</div>				
			@endif
			
		<div class="form-group">
			{{Form::label('salesman_id', 'Salesman')}}			
			<select class="form-control" name="salesman_id">
				@foreach($salesmans as $salesman)
					@if($salesman->id === $product->salesman_id)
						<option value="{{$salesman->id}}" selected >{{$salesman->name.' '.$salesman->lastname}} </option>					
					@else
						<option value="{{$salesman->id}}">{{$salesman->name.' '.$salesman->lastname}} </option>
					@endif
					
				@endforeach
			</select>			
		</div>
			@if( $errors->has('salesman_id') )
				<div class="alert alert-danger">
				@foreach($errors->get('salesman_id') as $error)
					*{{ $error}}</br>
				@endforeach					
				</div>				
			@endif
			
		{{Form::submit('Update', array('class' => 'btn btn-success'))}}			
		{{ HTML::linkRoute('products.show', 'Cancel', $product->id, array('class' => 'btn')) }}
		
	{{ Form::close() }}
</div>