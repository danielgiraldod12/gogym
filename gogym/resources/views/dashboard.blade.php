@extends('adminlte::page')

@section('title' , 'Dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">
            <div class="col-sm-6">
                <h1>Sistema de Administracion de GoGym </h1>
            </div>
        </div>
    </div>
</div>

<div class="row">
<!-- Caja 1 -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-primary" style=" top: 5px">
        <div class="inner">
            <h3><?php echo $NumUsers ?></h3>
            <p>Numero de Usuarios</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <a class="small-box-footer" href="{{route('users')}}">
        Tabla Usuarios
        <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<!-- Caja 2 -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-success" style="top: 5px">
        <div class="inner">
            <h3><?php echo $NumFichas ?></h3>
            <p>Numero de Fichas</p>
        </div>
        <div class="icon">
            <i class="fas fa-hashtag"></i>
        </div>
        <a class="small-box-footer" href="{{route('record_num')}}">
            Tabla Fichas
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<!-- Caja 3 -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-white" style="top: 5px">
        <div class="inner">
            <h3><?php echo $NumEvents ?></h3>
            <p>Eventos Activos</p>
        </div>
        <div class="icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <a class="small-box-footer" href="{{route('events')}}">
            Tabla Eventos
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
<!-- Caja 4 -->
<div class="col-lg-3 col-6">
    <div class="small-box bg-warning" style="top: 5px">
        <div class="inner">
            <h3>2</h3>
            <p>Numero de Programas</p>
        </div>
        <div class="icon">
            <i class="fas fa-school"></i>
        </div>
        <a class="small-box-footer" href="#">
            Tabla Programas
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <div class="small-box bg-danger" style="top: 5px">
        <div class="inner">
            <h3>TOMAR ASISTENCIA</h3>
            <p>controla la asistencia</p>
        </div>
        <div class="icon">
            <i class="fas fa-school"></i>
        </div>
        <a class="small-box-footer" href="#">
            ir
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
@endsection






