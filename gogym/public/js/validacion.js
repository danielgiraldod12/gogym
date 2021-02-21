function login(){
    email = document.getElementById('email');/* creo la variable email y la asocio al id email del html */
    password = document.getElementById('password');/* creo la variable password y la asocio al id password del html */


    if(email.value.length <= 2 || email.value.length >= 11)/* si email tiene 2 o menos caracteres o 11 o mas*/
        {   /* entonces */
            alert("Debe ingresar un usuario de entre 3 y 10 caracteres"); /* alerta */
            email.focus(); /* hara scroll en la pagina web hasta que el elemento email sea visible en la ventana*/
            return false; /* no enviara el form*/
        }


    if(password.value.length <= 3 || password.value.length >= 13) /*si password tiene 3 o menos caracteres y 13 o mas*/
        {   /* entonces */
            alert("Debe ingresar una contraseña de entre 4 y 12 caracteres"); /* alerta */
            password.focus(); /* hara scroll en la pagina web hasta que el elemento password sea visible en la ventana*/
            return false; /* no enviara el form */
        }
    }

    function contactenos(){
    fullname = document.getElementById('fullname');/* creo la variable fullname y la asocio al id fullname del html */
    email = document.getElementById('email');/* creo la variable email y la asocio al id email del html */

    if(fullname.value.length <= 6 || fullname.value.length >= 31) /* si fullname tiene 7 o menos de 8 caracteres o 31 o mas */
        {   /* entonces */
            alert("Debe ingresar un nombre completo entre 7 y 30 caracteres"); /* alerta */
            fullname.focus(); /* hara scroll en la pagina web hasta que el elemento fullname sea visible en la ventana */
            return false; /* no enviara el form */
        }


        if(email.value.length <= 7) /* si email tiene 7 o menos caracteres */
        {   /*  entonces */
            alert("Debe ingresar un correo electronico de minimo 8 caracteres");/*alerta */
            email.focus();/*hara scroll en la pagina web hasta que el elemento email sea visible en la ventana */
            return false; /* no enviara el form */
        }

    }
