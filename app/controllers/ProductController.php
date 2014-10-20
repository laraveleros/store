<?php
class ProductController extends BaseController {

	public function showProducts(){

		$products = Product::all();
		$salesmans = Salesman::all();
		// buscamos todos los products y todos los salesmans y los pasamos a la vista
		return View::make('product.list', array('products' => $products, 'salesmans'=> $salesmans));
	}

	public function createProduct(){

		$response = Product::addProduct(Input::all());

		if ($response['error'] == true){
			return Redirect::to('product')->withErrors($response['message'] )->withInput();
		}else{
			return Redirect::to('product')->with('message', $response['message']);
		}
	}
}