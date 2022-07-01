<?php
    
    
    // Las cookies son temporales dependiendo en donde las inicializamos y el tiempo q les demos, las cookies corre en todo el dominio del proyecto
    //  Seria mejor inicializarlas cuando se accede al Login correctamente para tenerlas desde q se logee
    setcookie("lasin", "Esta es una prueba de la Cookie");   #   NombreCookie, valorCookie, tiempoCookie(time()+seg)
?>