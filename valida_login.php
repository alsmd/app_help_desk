<?php 
    session_start();
    $_SESSION['autenticado'] = false;
    //Usuarios do sistema
    $usuarios_app = array(
        array('email' => 'adm@hotmail.com','senha' => '123456'),
        array('email' => 'user@hotmail.com','senha' => '123456'),
        array('email' => 'flavio@hotmail.com','senha' => '123456'),
        array('email' => 'lucas@hotmail.com','senha' => '123456')
    );

    $login = ["email" => $_POST['email'],"senha" => $_POST['senha']];
    $_SESSION['email'] = $login['email'];
    $acesso = false;

    foreach($usuarios_app as $user){       
        if($user['email'] == $login['email'] && $user['senha'] == $login['senha']){
            $acesso = true;
        }

    }

    if($acesso){
        $_SESSION['autenticado'] = true;
        $_SESSION['email'] = $login['email'];
        header('Location: home.php');
    }else {
        header('Location:index.php?login=erro');
        $_SESSION['autenticado'] = false;
    }


?>