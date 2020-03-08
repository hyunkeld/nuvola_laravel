@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Listado viajes del Cliente</h3></div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Email</th>
               <th>Pais</th>
               <th>Departamento</th>
               <th>Ciudad</th>               
               <th>Fecha Viaje</th>
               <th>Observación</th>  
             </thead>
             <tbody>
              @if($travels->count())  
              @foreach($travels as $travel)  
              <tr>
                <td>{{$travel->email_cliente}}</td>
                <td>{{$travel->pais}}</td>
                <td>{{$travel->departamento}}</td>
                <td>{{$travel->ciudad}}</td>
                <td>{{$travel->fecha_viaje}}</td>
                <td>{{$travel->comment}}</td>               
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="6">No hay viajes !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
        <div class="row">
        	<div class="col-xs-2 col-sm-2 col-md-2">			
				<a href="/index" class="btn btn-info btn-block" >Volver</a>
			</div>           
		</div>
      </div>
     
    </div>
  </div>
</section>

@endsection
