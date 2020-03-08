@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Listado de Clientes</h3></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Documento</th>
               <th>Nombres</th>
               <th>Apellidos</th>
               <th>Email</th>               
               <th>Dirección</th>
               <th>Teléfono</th>               
               <th>Viajes</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($clientes->count())  
              @foreach($clientes as $client)  
              <tr>
                <td>{{$client->documento}}</td>
                <td>{{$client->nombre}}</td>
                <td>{{$client->apellido}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->direccion}}</td>
                <td>{{$client->telefono}}</td>
                <td style="text-align: center;"><a class="btn btn-primary btn-xs" href="showTravels/{{$client->email}}" ><span class="glyphicon glyphicon-plane"></span></a></td>                
                <td style="text-align: center;">
                  <form action="{{action('ClientController@destroy', $client->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay clientes !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $clientes->links() }}
    </div>
  </div>
</section>

@endsection
