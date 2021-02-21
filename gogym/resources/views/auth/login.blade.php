@extends('./layouts.background')

@section('title', 'GoGym|Login')

@section('content')
    <div class="login-box">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong style="color:orangered;">{{ $message }}</strong>
            </span><br>
        @enderror
        <form method="POST" action="{{ route('login') }}" onsubmit="return login()">
            @csrf
            <div class="user-box">
                <input type="text" id="email" name="email" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122 || event.charCode ==64 || event.charCode ==46 )">
                <label>Correo electronico</label>
            </div>

            <div class="user-box">
                <input type="password" id="password" name="password" required onkeypress="return (event.charCode >= 48 && event.charCode <= 57 || event.charCode >=65 && event.charCode <=90 || event.charCode >=97 && event.charCode <=122)">
                <label>Contraseña</label>
            </div>
            <div class="contentbtniniciar">
             <button type="submit" class="button-loggin" >Iniciar sesión
                <span></span>
                <span></span>
                <span></span>
                <span></span>
             </button><br><br>
            </div>

        <div class="contenedorDebajoLogin">
            <div class="blockContent">
                <label>
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="blockContent2">
                @if (Route::has('password.request'))
                    <a class="rutaPassRecuperet" href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
        </div>
        </form>
    </div>
@endsection

@section('js')
<script src="{{asset('js/validacion.js')}}"></script>
@endsection
