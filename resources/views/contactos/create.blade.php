@extends('layouts.app')

@section('content')
<div class="container">

@if(count($errors)>0)
<div class="alert alert-primary" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{url('contactos')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="form-group">
<label for="Nombre" class="control-label">{{'Nombre'}}</label>
<input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" name="Nombre" id="Nombre" value="">
{!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>')!!}

</div>

<div class="form-group">
<label for="Apellido" class="control-label {{$errors->has('Apellido')?'is-invalid':''}} ">{{'Apellido'}}</label>
<input type="text" class="form-control {{$errors->has('Apellido')?'is-invalid':''}}" name="Apellido" id="Apellido" value="">
{!! $errors->first('Apellido', '<div class="invalid-feedback">:message</div>')!!}
</div>

<div class="form-group">
<label for="Email" class="control-label">{{'Email'}}</label>
<input type="email" class="form-control {{$errors->has('Email')?'is-invalid':''}}" name="Email" id="Email" value="">
{!! $errors->first('Email', '<div class="invalid-feedback">:message</div>')!!}
</div>

<div class="form-group">
<label for="Celular" class="control-label">{{'Celular'}}</label>
<input type="text" class="form-control {{$errors->has('Celular')?'is-invalid':''}}" name="Celular" id="Celular" value="">
{!! $errors->first('Celular', '<div class="invalid-feedback">:message</div>')!!}
</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>
<input type="file" class="form-control {{$errors->has('Foto')?'is-invalid':''}}" name="Foto" id="Foto" value="">
{!! $errors->first('Foto', '<div class="invalid-feedback">:message</div>')!!}
</div>

<div class="form-group">
<input type="submit" class="btn btn-success" value="Agregar">
<a href="{{url('contactos')}}" class="btn btn-info">Regresar</a>
</div>
</form>

</div>
@endsection