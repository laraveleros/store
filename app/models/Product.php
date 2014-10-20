<?php
class Product extends Eloquent  {

	protected $table = 'product';
	protected $fillable = array('description', 'price', 'salesman_id');

	public static function addProduct($input){

		$response = array();

		$rules =  array(
				'salesman_id'  => 'required',
				'description'  => array('required', 'max:255'),
				'price' => array('required', 'numeric'),
		);

		$validator = Validator::make($input, $rules);

		if ($validator->fails()){
			$response['message'] = $validator;
			$response['error']   = true;
		}else{

			$product = static::create($input);

			$response['message'] = 'Product created!';
			$response['error']   = false;
			$response['data']    = $product;
		}

		return $response;
	}
}