@extends('layouts.menu')

@section('title' , 'GoGym')

@section('contentimc')
<h3>¿Que es el índice de masa corporal?</h3>
<p>El Índice de Masa Corporal (IMC) es una medida 
    de asociación entre el peso y la talla de una persona.
    El IMC es usado como uno de varios indicadores 
    para evaluar el estado nutricional. <br><br>
    
    El IMC constituye la medida poblacional más útil del 
    sobrepeso y la obesidad, pues la forma de calcularlo no
    varía en función del sexo ni de la edad en la población 
    adulta. No obstante, debe considerarse como una guía 
    aproximativa, pues puede no corresponder al mismo 
    grado de gordura en diferentes individuos.<br><br>
    
    La Organización Mundial de la Salud, ha propuesto una 
    clasificación del estado nutricional dependiendo del IMC 
    de una persona.</p>
@endsection

@section('content')
    <h3>¿Que es Gogym?</h3>
    <p>GoGym! es un proyecto realizado por estudiantes del SENA y hecho para el SENA, el
        objetivo de este proyecto es hacerle más fácil la administración del gimnasio al encargado
        del mismo, dándole diferentes herramientas que le permitan tener control e información  
        de los usuarios, también contamos con diferentes secciones y funcionalidades 
        para los usuarios, como por ejemplo consultar el calendario para descubrir que hay de nuevo
        en el SENA o poder calcular su propio IMC desde la misma página web</p>


@endsection
@section('contentt')
        <!-- seccion contactenos -->
        <section class="contactenos" id="contactenos">
            <div class="bobeda">
                <h2>CONTACTENOS</h2>
                <br>
                <p>Hola, Si te gusta nuestro trabajo te invitamos a contactarnos, ofrecemos los mejores servicios y precios ¿que esperas?</p>
            </div>
            <!-- informacion  -->
            <div class="contenido">
                <div class="contactenosInfo">
                    <h3>Información de contácto</h3>
                    <div class="contactenosInfoBx">
                        <div class="box">
                            <div class="icono">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="texto">
                                <h3>Dirección</h3>
                                <p>Manrique </p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icono">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="texto">
                                <h3>Teléfono</h3>
                                <p>3013149955</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icono">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <div class="texto">
                                <h3>Correo</h3>
                                <p>swedenAdsi@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
               <!--  formulario -->
                <div class="formBx">
                    <form action="{{route('contactanos.store')}}"  method="POST" id="form">
                        @csrf
                        <h3>Mensaje a GoGym</h3>
                        <div class="formularioNombre" id="formularioNombre">
                        <div class="formulario__grupo-input">
                        <input type="text" name="name" id="nombre" placeholder="Nombre completo" value="{{old('name')}}" required>
                        </div>
                        @error('name')
                        <small>*{{$message}}</small>
                        <br>
                        <br>
                        @enderror
                        </div>


                        <div class="formulario__grupo" id="grupo__correo">
                        <div class="formulario__grupo-input">
                        <input type="email"  id="email" placeholder="Email" name="correo"value="{{old('email')}}" required>
                        </div>
                        @error('correo')
                        <small>*{{$message}}</small>
                        <br>
                        <br>
                        @enderror
                        </div>


                        <textarea placeholder="Tu mensaje" name="mensaje" required>{{old('mensaje')}}</textarea>
                        @error('mensaje')
                        <small>*{{$message}}</small>
                        <br>
                        <br>
                        @enderror

                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" class="butonEnviar">Enviar</button>
                    </div>
                    </form>
                    </div>
                    </div>
                    </section>
 @if (session('info'))  {{-- si existe la variable de sesion info esa alerta se ejecuta --}}
    <script>
        alert("{{session('info')}}")
    </script>
@endif
@endsection
