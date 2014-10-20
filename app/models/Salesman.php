<?php
class Salesman extends Eloquent  {

	protected $table = 'salesman';
	// declaramos la tabla que usa el modelo
	protected $fillable = array('name', 'lastname');
	// declaramos los campos con los que se puede create el objeto desde el form

	public function products(){
		// creamos una relación con el modelo de Product
		return $this->hasMany('Product', 'salesman_id');
	}

	public static function addSalesman($input){
		// función que recibe como parámetro la información del formulario para create el Salesman

		$response = array();

		// Declaramos rules para validar que el name y lastname sean obligatorios y de longitud maxima 100
		$rules =  array(
				'name'  => array('required', 'max:100'),
				'lastname' => array('required', 'max:100'),
		);

		$validator = Validator::make($input, $rules);

		// verificamos que los datos cumplan la validación
		if ($validator->fails()){

			// si no cumple las rules se van a devolver los errores al controlador
			$response['message'] = $validator;
			$response['error']   = true;
		}else{

			// en caso de cumplir las rules se crea el objeto Salesman
			$salesman = static::create($input);

			// se retorna un message de éxito al controlador
			$response['message'] = 'Salesman created!';
			$response['error']   = false;
			$response['data']    = $salesman;
		}

		return $response;
	}
}