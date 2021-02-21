@extends('adminlte::page')

@section('title', 'Datatables|Create ')

@section('content')
<div class="d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-body">
            <h1>Crear Evento</h1>
            <form method="POST" action="{{ route('crearevents') }}">
                @csrf
                <div class="form-group">

                    <div class="form-group">
                        <label>Titulo del evento </label>
                        <input class="form-control" type="text" id="title" name="title" value="{{old('title')}}" required>
                    <br>
                        @error('title')
                        <small style="color: red; font-size: 15px">*{{$message}}</small>
                        <br>
                        <br>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Fecha del evento</label>
                    <input type="date" class="form-control" id="datetime" name="date" value="{{old('date')}}" required>
                    <br>
                    @error('date')
                    <small  style="color: red; font-size: 15px">*{{$message}}</small>
                    <br>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Descripcion del evento</label><br>
                    <textarea cols="50" rows="2" id="description" name="description" required>{{old('description')}}</textarea>
                    <br>
                    @error('description')
                    <small  style="color: red; font-size: 15px">*{{$message}}</small>
                    <br>
                    <br>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Estado del evento</label><br>
                    <select name="state" id="state" required>
                        <option value="Activo">Activo</option>
                        <option value="Finalizado">Finalizado</option>
                    </select>
                    <br>
                    @error('state')
                    <small  style="color: red; font-size: 15px">*{{$message}}</small>
                    <br>
                    <br>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button><br><br>
            </form>
        </div>
    </div>
</div>
@endsection

