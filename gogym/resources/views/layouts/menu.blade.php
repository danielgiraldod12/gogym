<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> <!-- link de los iconos -->
  
</head>
<body>
    <!-- header menu -->
    <header>
    <a href="{{route("home")}}" class="logo">Go<span>Gym</span></a>
        <div class="menu"></div>
        <ul>
            <li><a href="{{route("home")}}">Inicio</a></li>
            <li><a href="{{route("home")}}#IMC">Imc</a></li>
            <li><a href="#">Calendario</a></li>
            <li><a href="{{route("home")}}#contactenos">Contáctenos</a></li>
            <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
        </ul>
    </header>
<!-- seccion baner -->
    <section class="baner" id="home">
        <div class="textbx">
            <h2>Bienvenidos a <br><span class="span1">Go</span><span>Gym</span></h2>
            <a href="#nosotros" class="btn">Acerca de nosotros</a>
        </div>
    </section>
    <!--seccion acerca de nosotros -->
    <section class="indiceMasaCorporal" id="IMC">
        <div class="tiuloImc">
            <h2>INDICE DE MASA CORPORAL</h2>
       </div>
        <div class="contenidoImc">
       <div class="contenido1imc">
        @yield('contentimc')
        </div>
        <div class="contentCalculaimc" >
         <div class="contentsection1" id="contentsection1">
            <div class="bmi-gender">
                <a class="btn-gender" id="male">
                    <img alt="Masculino" src="https://www.clinicalascondes.cl/Dev_CLC/media/Imagenes/redi_imc/btn-man.png"> <br>
                    <span class="caption">Masculino</span> 
                </a>
                <a class="btn-gender"  id="female">
                 <img alt="Femenino" src="https://www.clinicalascondes.cl/Dev_CLC/media/Imagenes/redi_imc/btn-woman.png"><br>
                 <span class="caption">Femenino</span>
                 </a>
                </div>
         </div>
         <div class="contentsection2" id="contentsection2">
         <div class="parraf">
            <h2>¿Cómo se mide el IMC?</h2><br>
            <p >
                La fórmula del IMC es el peso 
                en kilógramos dividido por el 
                cuadrado de la altura en 
                metros (kg/m2). <br><br> El IMC es una 
                indicación simple de la relación 
                entre el peso y la talla que se 
                utiliza frecuentemente para 
                identificar el sobrepeso y la 
                obesidad en los adultos, tanto a 
                nivel individual como 
                poblacional.</p>
         </div>
         </div>

         
         <div class="sectionform" id="formimcprincipal">
             <div class="form">
                 <form action=""  >
                    <span>Peso (Kg)</span>
                    <input type="number" name="valorPeso"  id="valorPeso" value="" min="0" max="150"><br>
                    <span>Altura(CM)</span>
                    <input type="number" name="valorAltura" id="valorAltura" value="" min="0" max="150"><br>
                    <button type="button" onclick="calcular()">Resultado</button>
                    <button type="reset"  onclick="limpiar()">Limpiar</button>
                 </form>
             </div>
         </div>
         <div class="row" id="resultado">
            <div >
                <div class="form-group">
                    <label>IMC</label>
                    <h4 id="imc" >estado</h4>
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <h4 id="estado" >estado</h4>
                </div>
                <div>
                    <h2>Tabla de Imc</h2>
                </div>
                <div>
                    <img src="{{ asset('img/IMC.jpg') }}" alt="">
                </div>
                <div class="titulorecomendacion"> <h1>Recomendación</h1></div>
               <div class="mensjaeimc" id="delgado" >
                   <p>La delgadez puede deberse a diversos factores, 
                    tales como genéticos y dietéticos. Independiente de su causa, 
                    es importante para tu bienestar mantener un peso saludable.</p>
               </div>
               <div class="mensjaeimc" id="normal" >
                <p>Una dieta balanceada y ejercicio ayudan a mantenerse en esta categoría.</p>
               </div>

               <div class="mensjaeimc" id="sobrepeso" >
               <p>  Una mala alimentación y hábitos sedentarios pueden contribuir a 
                acumular grasa en tu cuerpo, lo que puede llevar a problemas médicos en el futuro.</p>
               </div>

               <div class="mensjaeimc" id="obeso" >
                <p>Cuidado, la obesidad genera complicaciones mayores en el 
                    organismo y acorta la vida. Es esencial abordar este estado con una 
                    dieta balanceada, ejercicio y, en determinadas ocasiones, con cirugía.</p>
               </div><br>
               <div class="butonimcc">
                <button type="reset"  onclick="cancelar()">Volver</button>
            </div>
            </div>
        </div>
        </div>
        </div>
       </section>

<!--seccion acerca de nosotros -->
    <section class="acerca_de_nosotros" id="nosotros">
        <div class="tiuloAcerca">
            <h2>ACERCA DE NOSOTROS</h2>
       </div>
        <div class="contenido">
       <div class="contenido1">
        @yield('content')
        </div>
        <div class="imgAcerca">
        <img src="{{ asset('img/img1.jpg') }}" class="foto">
        </div>
        </div>
       </section>
   @yield('contentt')
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <!-- este script lo que hace es dar clase al header con el nombre sticky cuando hay scroll
    y ya desde el css se configura -->
    <script type="text/javascript">
     window.addEventListener('scroll',function(){
         var header=document.querySelector('header');
         header.classList.toggle('sticky',window.scrollY >0);
     });
    </script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/funciones.js"></script>

</body>
</html>
