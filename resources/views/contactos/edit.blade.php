@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/contactos/' .$contacto->id)}}"  class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PATCH')}}

<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" class="form-control" name="Nombre" id="Nombre" value="{{$contacto->Nombre}}">
</div>

<div class="form-group">
<label for="Apellido" class="control-label">{{'Apellido'}}</label>
<input type="text" class="form-control" name="Apellido" id="Apellido" value="{{$contacto->Apellido}}">
</div>

<div class="form-group">
<label for="Email" class="control-label">{{'Email'}}</label>
<input type="email" class="form-control" name="Email" id="Email" value="{{$contacto->Email}}">
</div>

<div class="form-group">
<label for="Celular" class="control-label">{{'Celular'}}</label>
<input type="text" class="form-control" name="Celular" id="Celular" value="{{$contacto->Celular}}">
</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>
<img src="{{ asset('storage').'/'.$contacto->Foto}}" alt="" width="200"> 
<input type="file" class="form-control" name="Foto" id="Foto" value="{{$contacto->Foto}}">
</div>

<div class="form-group">
<input type="submit" class="btn btn-warning" value="Editar">
<a href="{{url('contactos')}}" class="btn btn-info">Regresar</a>
</div>
</form>
</div>
@endsection
