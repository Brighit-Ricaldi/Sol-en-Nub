@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')

}}
@endif

<a href="{{url('contactos/create')}}" class="btn btn-success">Agregar contacto</a>
<br>
<table class="table table-light table-hover">
<thead class="thead-light">
<tr>
    <th scope="col">Codigo</th>
    <th scope="col">Foto</th>
    <th scope="col">Nombre</th>
    <th scope="col">Apellido</th>
    <th scope="col">Email</th>
    <th scope="col">Celular</th>
    <th scope="col">Acciones</th>
</tr>
</thead>
<tbody>
@foreach($contactos as $contacto)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>
            <img src="{{ asset('storage').'/'.$contacto->Foto}}" class="img-thumbnail img-fluid" alt="" width="100">  
        </td>
        <td>{{$contacto->Nombre}}</td>
        <td>{{$contacto->Apellido}}</td>
        <td>{{$contacto->Email}}</td>
        <td>{{$contacto->Celular}}</td>
        <td>
        <a class="btn btn-warning" href="{{url('/contactos/'.$contacto->id.'/edit')}}" >Editar</a>
        <form  method="post" action="{{url('/contactos/'.$contacto->id)}}" style="display:inline">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrar?');" >Borrar</button>
        </form>
        </td>
        
    </tr>  
@endforeach
</tbody>
</table>
</div>
@endsection