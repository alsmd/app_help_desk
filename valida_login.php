<?php 
    session_start();
    $_SESSION['autenticado'] = false;
    //Usuarios do sistema
    $usuarios_app = array(
        array('email' => 'adm@teste.com','senha' => '123456'),
        array('email' => 'user@teste.com','senha' => 'abcd')
    );

    $login = ["email" => $_POST['email'],"senha" => $_POST['senha']];

    $acesso = false;

    foreach($usuarios_app as $user){       
        if($user['email'] == $login['email'] && $user['senha'] == $login['senha']){
            $acesso = true;
        }

    }

    if($acesso){
        $_SESSION['autenticado'] = true;
        header('Location: home.php');
    }else {
        header('Location:index.php?login=erro');
        $_SESSION['autenticado'] = false;
    }


?>