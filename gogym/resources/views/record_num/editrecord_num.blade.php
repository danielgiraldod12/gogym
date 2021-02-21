@extends('adminlte::page')

@section('title', 'Datatables - Edit')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-body">
            <h1>Editar Ficha</h1>
            <form method="POST" action="{{ route('updatern', $id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Num Ficha</label>
                <input value="{{$id->record_num}}" class="form-control" type="text" id="record_num" name="record_num" required >
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
            <button type="submit" class="btn btn-primary" onclick="return editconf()">ACTUALIZAR</button><br><br>
            <p id="parrafo"></p>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{asset('js/datatables.js')}}"></script>
@endsection
