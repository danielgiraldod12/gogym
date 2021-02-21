@extends('adminlte::page')

@section('title', 'Datatables - Create')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-body">
            <h1>Crear Ficha</h1>
            <form method="POST" action="{{ route('crearrn') }}">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label>Num Ficha</label>
                        <input class="form-control" type="text" id="record_num" name="record_num" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    </div>
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
                <button type="submit" class="btn btn-primary">REGISTRAR</button><br><br>
            </form>
        </div>
    </div>
</div>
@endsection
