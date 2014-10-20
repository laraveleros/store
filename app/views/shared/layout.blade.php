<!DOCTYPE html>
<html>
	<head>
		<title>Store</title>
		
		{{HTML::style('css/bootstrap.min.css')}}
		{{HTML::style('css/jumbotron-narrow.css')}}
		
	</head>
	<body>
		<div class="container">
			<div class="header">
				
				<ul class="nav nav-pills pull-right">
					<li>{{HTML::link('/', 'Initial')}}</li>
					<li>{{HTML::link('salesman', 'Salesmans')}}</li>
					<li>{{HTML::link('products', 'Products')}}</li>					
				</ul>
				
				<h3 class="text-muted">Store</h3>				
			</div>
			
			@yield('form')
			@yield('content')
			
			<div class="footer">
				<p>&copy; PHP</p>
			</div>
		</div>
		
		<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
		
		{{HTML::script('js/bootstrap.min.js')}}
		
	</body>
</html>
