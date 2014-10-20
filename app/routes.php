<?php

Route::get('/', function()
{  
    // Con la funcion with() podemos traer todos los salesmanes
    // con sus respectivos products. Esta funcion recibe como parametro
    // alguna relacion que tenga el modelo al que se este llamando y
    // la incluye en los resultados que devuelve el get()
    $salesmans = Salesman::with('products')->get();
    return View::make('initial', array('salesmans'=> $salesmans));
    
    //$salesmans = Salesman::all();    
    //return View::make('initial')->with('salesmans', $salesmans);
});
 
Route::get('salesman', 'SalesmanController@showSalesmans');
 
Route::post('salesman', 'SalesmanController@createSalesman');
 
Route::get('products', 'ProductsController@showProducts');
 
Route::post('products', 'ProductsController@createProduct');

Route::get("salesman/{id}", [
"as"   => "salesman.show",
"uses" => "SalesmanController@show"
]);

Route::get("products/{id}", [
"as"   => "products.show",
"uses" => "ProductsController@show"
]);
