<?php
class ProductsController extends BaseController {

	public function index(){

		$products = Product::all();
		$salesmans = Salesman::all();		
		// buscamos todos los products y todos los salesmans y los pasamos a la vista
		return View::make('products.index', array('products' => $products, 'salesmans'=> $salesmans))
			->nest('content_inner', 'products.create', array('salesmans' => $salesmans));
	}	
	
	public function show($id) {
		$products = Product::all();
		$salesmans = Salesman::all();
		$product = Product::find($id);
		if(!is_null($product)){
			$salesman = Salesman::find($product->salesman_id);
			// buscamos todos los products y todos los salesmans y los pasamos a la vista
			return View::make('products.index', array('products' => $products, 'salesmans'=> $salesmans))
				->nest('content_inner', 'products.show', array('product' => $product, 'salesman' => $salesman));
		}
		return Redirect::to('products');			
	}
	
	public function edit($id)
    {
        $products = Product::all();
		$salesmans = Salesman::all();
		$product = Product::find($id);
		$salesman = Salesman::find($product->salesman_id);
        
//         if (is_null($product))
//         {
//             return Redirect::to('products');
//         }
        
        return View::make('products.index', array('products' => $products, 'salesmans'=> $salesmans))
			->nest('content_inner', 'products.edit', array('product' => $product, 'salesmans' => $salesmans));
    }
    
    public function createProduct(){
    
    	$response = Product::addProduct(Input::all());
    
    	if ($response['error'] == true){
    		return Redirect::to('products')
    			->withErrors($response['message'] )
    			->withInput();
    	}
    	
    	return Redirect::to('products')->with('message', $response['message']);
    	
    }
    
    public function updateProduct($id){
    	$product = Product::find($id);
    	
    	$response = Product::updateProduct(Input::all(), $product);
    	
    	if ($response['error'] == true){
    		return Redirect::route('products.edit', $id)
    			->with('message', 'There were validation errors.')
    			->withErrors($response['message'] )
    			->withInput();
    	}
    	    	
    	return Redirect::back()->with('message', $response['message']);    	
    }
}