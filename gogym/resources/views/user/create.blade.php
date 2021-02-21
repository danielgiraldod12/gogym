@extends('adminlte::page')

@section('title', 'Datatables - Create')

@section('content')
@if(Session::has('message'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif
<div class="d-flex justify-content-center">
<div class="card w-50">
    <div class="card-body">
        <h1>Crear Usuario</h1>
        <div class="col">
            <div class="col">
                <form method="POST" action="{{ route('crear') }}">
                    @csrf  
                    <div class="form-group">
                        <label>Tipo Documento</label>
                        <select class="form-control" type="text" id="typeOfIdentification" name="typeOfIdentification" required>
                            <option value="T.I" selected>T.I</option>
                            <option value="C.C">C.C</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Num. Documento</label>
                        <input class="form-control" type="text" id="identification_num" name="identification_num" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" type="text" id="name" name="name" required onkeypress="return (event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122)">
                    </div>
                    <div class="form-group">
                        <label>Correo electronico</label>
                        <input class="form-control" type="email" id="email" name="email" required required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122 || event.charCode ==64 || event.charCode ==46 )">
                    </div>
                    <div class="form-group">
                        <label>Ficha</label>
                        <select class="form-control" type="text" id="id_record_num" name="id_record_num" required>
                            <!--Hago un foreach en el select para que me traiga las diferentes fichas
                            que hay en la tabla fichas y me las muestre como opciones -->
                            @foreach ($queryFicha as $id)
                            <option value="{{$id->id}}">{{$id->record_num}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Programa</label>
                        <select class="form-control" type="text" id="id_training_program" name="id_training_program" required>
                            <!--Hago un foreach en el select para que me traiga los diferentes programas
                            que hay en la tabla programas y me los muestre como opciones -->
                            @foreach ($queryPrograma as $id)
                            <option value="{{$id->id}}">{{$id->name_program}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Centro</label>
                        <select class="form-control" type="text" id="id_training_center" name="id_training_center" required>
                            <!--Hago un foreach en el select para que me traiga los diferentes centros
                            que hay en la tabla centros y me los muestre como opciones -->
                            @foreach ($queryCentro as $id)
                            <option value="{{$id->id}}">{{$id->name_center}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input class="form-control" type="password" id="password" name="password" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122)">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" value="">Confirmar Contraseña</label>
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122)">
                    </div>
                    -->
                    <div class="form-group">
                    <label>Rol</label>
                        <select class="form-control" type="text" id="id_rol" name="id_rol" >
                            <!--Hago un foreach en el select para que me traiga los diferentes roles
                            que hay en la tabla roles y me los muestre como opciones -->
                            @foreach ($queryRol as $id)
                        <option value="{{$id->id}}">{{$id->rol_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">REGISTRAR</button><br><br>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
