@extends('adminlte::page')

@section('title', 'Datatables - Edit')

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
    <h1>Editar Usuario</h1>
    <form method="POST" action="{{ route('update', $id) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Tipo Documento</label>
        @php($selected =!empty($query->typeOfIdentification) ? $query->typeOfIdentification : '')
        <select class="form-control" type="text" id="typeOfIdentification" name="typeOfIdentification" required>
            <option value="T.I" {{ $selected=='T.I'  ? 'selected':''}}>T.I</option>
            <option value="C.C" {{ $selected=='C.C'  ? 'selected':''}}>C.C</option>
            <option value="Pasaporte" {{ $selected=='Pasaporte'  ? 'selected':''}}>Pasaporte</option>
            <option value="Carnet de Extranjeria" {{ $selected=='Carnet de Extranjeria'  ? 'selected':''}}>Carnet de Extranjeria</option>
        </select>
    </div>
    <div class="form-group">
        <label>Num. Documento</label>
        <input value="{{$id->identification_num}}" class="form-control" type="text" id="identification_num" name="identification_num" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57  event.charCode <=122)">
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <input value="{{$id->name}}" class="form-control" type="text" id="name" name="name" required onkeypress="return (event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122 )">
    </div>
    <div class="form-group">
        <label>Correo electronico</label>
        <input value="{{$id->email}}" class="form-control" type="email" id="email" name="email" required required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122 || event.charCode ==64 || event.charCode ==46 )">
    </div>
    <div class="form-group">
        <label>Ficha</label>
        <!-- Condicional de una linea para que en el select este seleccionada la opcion
        que el usuario tenga guardada en la bd-->
        @php($selected = !empty($query->id_record_num) ? $query->id_record_num : '')
        <select class="form-control" type="text" id="id_record_num" name="id_record_num" required>
            <!--Hago un foreach en el select para que me traiga las diferentes fichas
            que hay en la tabla fichas y me las muestre como opciones -->
            @foreach ($record_num as $id)
            <option value="{{$id->id}}" {{$selected == $id->id ? 'selected' : ''}}>{{$id->record_num}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Programa</label>
        <!-- Condicional de una linea para que en el select este seleccionada la opcion
        que el usuario tenga guardada en la bd-->
        @php($selected = !empty($query->id_training_program) ? $query->id_training_program : '')
        <select class="form-control" type="text" id="id_training_program" name="id_training_program" required>
            <!--Hago un foreach en el select para que me traiga los diferentes programas
            que hay en la tabla programas y me los muestre como opciones -->
            @foreach ($training_program as $id)
            <option value="{{$id->id}}" {{$selected == $id->id ? 'selected' : ''}}>{{$id->name_program}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Centro</label>
        <!-- Condicional de una linea para que en el select este seleccionada la opcion
        que el usuario tenga guardada en la bd-->
        @php($selected = !empty($query->id_training_center) ? $query->id_training_center : '')
        <select class="form-control" type="text" id="id_training_center" name="id_training_center" required>
            <!--Hago un foreach en el select para que me traiga los diferentes centros
            que hay en la tabla centros y me los muestre como opciones -->
            @foreach ($training_center as $id)
            <option value="{{$id->id}}" {{$selected == $id->id ? 'selected' : ''}}>{{$id->name_center}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
    <label>Rol</label>
    <!-- Condicional de una linea para que en el select este seleccionada la opcion
    que el usuario tenga guardada en la bd-->
    @php($selected = !empty($query->id_rol) ? $query->id_rol : '')
        <select class="form-control" type="text" id="id_rol" name="id_rol" >
            <!--Hago un foreach en el select para que me traiga los diferentes roles
            que hay en la tabla roles y me los muestre como opciones -->
            @foreach ($rol as $id)
            <option value="{{$id->id}}" {{$selected == $id->id ? 'selected' : ''}}>{{$id->rol_name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary" onclick="return editconf()">ACTUALIZAR</button><br><br>
    <p id="parrafo"></p>
</form>
</div>
</div>
@endsection

@section('js')
<script src="{{asset('js/datatables.js')}}"></script>
@endsection
