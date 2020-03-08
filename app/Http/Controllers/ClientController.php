<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Client;
use App\Travel;
 
class ClientController extends Controller
{
    /**
     * Muestra un listado de los clientes existentes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Client::orderBy('id','DESC')->paginate(3);
        return view('index',compact('clientes')); 
    }

    /**
      Muestra el listado de viajes asociados a un email dado
     * @param  string  $email del cliente
     * @return view
     */
    public function showTravels($email)
    {        
        $travels=Travel::where('email_cliente', $email)->get();
        return view('travels',compact('travels'));
    }

     /**
     * Elimina el registro de la tabla clientes
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect()->action('ClientController@index')->with('success','Registro eliminado satisfactoriamente');
    }
}