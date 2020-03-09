<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\Filters\Filter;
use Spatie\QueryBuilder\AllowedFilter;
use App\Client;
use App\Travel;
use QueryBuilder;

class ApiController extends Controller
{
     public function getAllClients() {
      //Se listan los clientes creados
     	//$clients = Client::get()->toJson(JSON_PRETTY_PRINT);
       
	     $clients =   QueryBuilder::for(Client::class)
	    ->allowedFilters([
	        AllowedFilter::exact('nombre')->ignore(null),
	        AllowedFilter::exact('apellido')->ignore(null),
	        AllowedFilter::exact('email')->ignore(null),
	    ])
	    ->paginate(10)->toJson(JSON_PRETTY_PRINT);
	     return response($clients, 200);
    }

    public function createClient(Request $request) {
        //Se crea un nuevo registro en tabla clientes
        $client = new Client;
	    $client->documento = $request->documento;
	    $client->nombre = $request->nombre;
	    $client->apellido = $request->apellido;
	    $client->nombre_completo = $request->nombre_completo;
	    $client->telefono = $request->telefono;
	    $client->email = $request->email;
	    $client->direccion = $request->direccion;
	    $client->comment = $request->comment;
	    $client->save();

	    return response()->json([
	        "message" => "cliente insertado exitosamente"
	    ], 201);
    }

    public function getClient($id) {
      //Se obtiene el cliente especificado
    	if (Client::where('id', $id)->exists()) {
	        $client = Client::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
	        return response($client, 200);
        } else {
	        return response()->json([
	          "message" => "Id cliente no encontrado"
	        ], 404);
        }
    }

    public function updateClient(Request $request, $id) {
        //Actualiza un registro en la tabla clientes
    	if (Client::where('id', $id)->exists()) {
	        $client = Client::find($id);
	        $client->documento = is_null($request->documento) ? $client->documento : $request->documento;
	        $client->nombre = is_null($request->nombre) ? $client->nombre : $request->nombre;
	        $client->apellido = is_null($request->apellido) ? $client->apellido : $request->apellido;
	        $client->telefono = is_null($request->telefono) ? $client->telefono : $request->telefono;
	        $client->email = is_null($request->email) ? $client->email : $request->email;
	        $client->direccion = is_null($request->direccion) ? $client->direccion : $request->direccion;
	        $client->comment = is_null($request->comment) ? $client->comment : $request->comment;
	        $client->save();

	        return response()->json([
	            "message" => "Cliente actualizado satisfactoriamente"
	        ], 200);
	        } else {
	        return response()->json([
	            "message" => "Cliente no encontrado"
	        ], 404);
	        
	    }
    }

    public function deleteClient ($id) {
        //Eliminia un registro de la tabla clientes
    	if(Client::where('id', $id)->exists()) {
	        $client = Client::find($id);
	        $client->delete();

	        return response()->json([
	          "message" => "Cliente eliminado"
	        ], 202);
	    } else {
	        return response()->json([
	          "message" => "Cliente no encontrado"
	        ], 404);
	    }
    }

	public function createTravel(Request $request) {
        //Se inserta en tabla viajes
		$bodyContent = $request->getContent();
		$xml = simplexml_load_string($bodyContent);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);

		foreach ($array as $item) {
			foreach ($item as $key => $value) {
				if (is_array($value)) {
				Travel::create($item[$key]);
				} else {
				Travel::create($item);
				}
			}
		}

		return response()->json([
			"message" => "viajes insertados exitosamente"
		], 201);
    }	

     public function getAllTravels() {
      //Se listan los clientes creados
     	$travels = Travel::get()->toJson(JSON_PRETTY_PRINT);
        return response($travels, 200);
    }

    public function getTravelsByEmail($mail) {
        //Se listan los viajes del cliente
        if (Travel::where('email_cliente', $mail)->exists()) {
	        $travel = Travel::where('email_cliente', $mail)->get()->toJson(JSON_PRETTY_PRINT);
	        return response($travel, 200);
        } else {
	        return response()->json([
	          "message" => "No se encontraron viajes para el cliente"
	        ], 404);
        }     	
    }
}
