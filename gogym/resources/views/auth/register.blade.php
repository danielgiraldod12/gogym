@extends('layouts.background')

@section('title' , 'GoGym! - Register')

@section('content')
<div class="register-box">
    <form method="POST" action="{{ route('register') }}"><br>
        @csrf
        <div class="user-box"><br><br>
            <select type="text" id="typeOfIdentification" name="typeOfIdentification" required>
                <option value="T.I" selected>T.I</option>
                <option value="C.C">C.C</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
            </select>
            <label>Tipo Documento</label>
        </div>

        <div class="user-box">
            <input type="text" id="identification_num" name="identification_num" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57  event.charCode <=122)">
            <label>Num. Documento</label>
        </div>

        <div class="user-box">
            <input type="text" id="name" name="name" required onkeypress="return (event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122 )">
            <label>Nombre</label>
        </div>

        <div class="user-box">
            <input type="email" id="email" name="email" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122 || event.charCode ==64 || event.charCode ==46 )">
            <label>Correo electronico</label>
        </div>

        <div class="user-box"><br><br>
            <select type="text" id="id_record_num" name="id_record_num" required>
                <option value="1" selected>2061250</option>
            </select>
            <label>Ficha</label>
        </div>

        <div class="user-box"><br><br>
            <select type="text" id="id_training_program" name="id_training_program" required>
               <option value="1" selected>ADSI</option>
               <option value="2" selected>Multimedia</option>
            </select>
            <label>Programa</label>
        </div>

        <div class="user-box"><br><br>
            <select type="text" id="id_training_center" name="id_training_center" required>
               <option value="1" selected>CTGI</option>
            </select>
            <label>Centro</label>
        </div>

        <div class="user-box">
            <input type="password" id="password" name="password" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122)">
            <label>Contraseña</label>
        </div>

        <div class="user-box">
            <input type="password" id="password_confirmation" name="password_confirmation" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122)">
            <label for="password_confirmation" value="">Confirmar Contraseña</label>
        </div>

        <div class="user-box"><br><br>
        <select type="text" id="id_rol" name="id_rol" required>
           <option value="3" selected>Usuario</option>
            <option disabled value="1">Administrador</option>
            <option disabled value="2">Moderador</option>
        </select>
        <label>Rol</label>
        </div>

        <button type="submit" >REGISTRAR
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button><br>
            </div>
        </form>
</div>
@endsection
