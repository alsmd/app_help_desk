<?php 

    session_start();

    //remover indices do array de sessão
    //unset()
    foreach($_SESSION as $indice => $item){
        unset($_SESSION[$indice]);
    }
    header('Location: ../pags/index.php');


    //destruir a variavel de sessão

/*     session_destroy();


    header('Location: index.php'); 

 */

?>