<?php
class ProductsController extends BaseController {

	public function showProducts(){

		$products = Product::all();
		$salesmans = Salesman::all();		
		// buscamos todos los products y todos los salesmans y los pasamos a la vista
		return View::make('products.index', array('products' => $products, 'salesmans'=> $salesmans))
			->nest('content_inner', 'products.create', array('salesmans' => $salesmans));
	}

	public function createProduct(){

		$response = Product::addProduct(Input::all());

		if ($response['error'] == true){
			return Redirect::to('products')->withErrors($response['message'] )->withInput();
		}else{
			return Redirect::to('products')->with('message', $response['message']);
		}
	}
	
	public function show($id) {
		$products = Product::all();
		$salesmans = Salesman::all();
		$product = Product::find($id);
		$salesman = Salesman::find($product->salesman_id);
		// buscamos todos los products y todos los salesmans y los pasamos a la vista
		return View::make('products.index', array('products' => $products, 'salesmans'=> $salesmans))
			->nest('content_inner', 'products.show', array('product' => $product, 'salesman' => $salesman));
	}
}