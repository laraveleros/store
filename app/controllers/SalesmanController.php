<?php
class SalesmanController extends BaseController {

	public function showSalesmans(){
		$salesmans = Salesman::all();
		// obtenemos todos los salesmans y los pasamos a la vista
		return View::make('salesman.list', array('salesmans' => $salesmans));
	}

	public function createSalesman(){

		// llamamos a la función de add salesman en el modelo y le pasamos los datos del formulario
		$response = Salesman::addSalesman(Input::all());

		// Dependiendo de la response del modelo
		// retornamos los messages de error con los datos viejos del formulario
		// o un message de éxito de la operación
		if ($response['error'] == true){
			return Redirect::to('salesman')->withErrors($response['message'] )->withInput();
		}else{
			return Redirect::to('salesman')->with('message', $response['message']);
		}
	}
	

	public function show($id){	
		$salesmans = Salesman::all();
		$salesman = $salesmans->find($id);
		
		// obtenemos todos los salesmans y los pasamos a la vista
		return View::make('salesman.show', array('salesmans' => $salesmans, 'salesman' => $salesman));
	}
}