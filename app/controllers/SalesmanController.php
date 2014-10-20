<?php
class SalesmanController extends BaseController {

	public function showSalesmans(){
		$salesmans = Salesman::all();
		// obtenemos todos los salesmans y los pasamos a la vista
		return View::make('salesman.index', array('salesmans' => $salesmans));
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
		
		if(!Request::ajax()){
			$salesmans = Salesman::all();
			$salesman = $salesmans->find($id);
			// obtenemos todos los salesmans y los pasamos a la vista
			return View::make('salesman.show', array('salesmans' => $salesmans, 'salesman' => $salesman));
		}
		else
		{
			$salesman = Salesman::find($id);
			return View::make('salesman.show',array('salesman' => $salesman));
		}
	}
	

	public function create(){	
		return View::make('salesman.create');
	}
}