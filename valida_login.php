<?php 
    session_start();
    $_SESSION['autenticado'] = false;
    //Usuarios do sistema
    $usuario_perfil_id = null;
    $perfil_id = null;
    $perfis = [1 => 'Administrativo', 2 => 'Usuario'];

    //Usuarios cadastrados
    $usuarios_app = array(
        array('id' => 1,'email' => 'adm@hotmail.com','senha' => '123456','perfil_id' =>1),
        array('id' => 2,'email' => 'user@hotmail.com','senha' => '123456', 'perfil_id' =>1),
        array('id' => 3,'email' => 'flavio@hotmail.com','senha' => '123456','perfil_id' =>2),
        array('id' => 4,'email' => 'lucas@hotmail.com','senha' => '123456','perfil_id' =>2)
    );
    //tentativa de login
    $login = ["email" => $_POST['email'],"senha" => $_POST['senha']];

    $acesso = false;
    //verificando se a conta utilizada como tentativa de login esta cadastrada
    foreach($usuarios_app as $user){       
        if($user['email'] == $login['email'] && $user['senha'] == $login['senha']){
            $acesso = true;
            $usuario_perfil_id = $user['perfil_id'];
            $perfil_id = $user['id'];
        }

    }
    //autenticando acesso e guardando id e perfil_id do usuario para o controle de contas
    if($acesso){
        $_SESSION['autenticado'] = true;
        $_SESSION['id'] = $perfil_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        
        header('Location: home.php');
    }else {
        header('Location:index.php?login=erro');
        $_SESSION['autenticado'] = false;
    }


?>