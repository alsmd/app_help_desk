<?php 

    //estamos trabalhando na montagem do texto
    //implode('#', $_POST);
    session_start();
    $titulo = str_replace("#","-",$_POST['titulo']);
    $categoria = str_replace("#","-",$_POST['categoria']);
    $descricao = str_replace("#","-",$_POST['descricao']);
    $texto = $titulo .'#'. $categoria .'#'.$descricao .'#'.$_SESSION['id']. PHP_EOL;

    //abrindo o arquivo
  $arquivo = fopen('../../../app_help_desk/arquivo.hd','a');

    //escrevendo o texto
    fwrite($arquivo, $texto);
    //fechando o arquivo
    fclose($arquivo);

    header('Location:../pags/abrir_chamado.php?chamado=true');
?>