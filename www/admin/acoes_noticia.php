<?php
  
  require('../database/conecta.php');
  require('checalogado.php');

  if(isset($_GET['deletar'])){
    if($_GET['id']){
      $conexao->query('
              DELETE FROM noticia WHERE not_id = '.$_GET['id'].' AND not_autor_id = '.$_SESSION['usuario']['aut_id'].'   
            ');
      header("location:http://phpower-124398.sae1.nitrousbox.com/admin/noticias.php?msg=delete");
    }else{
      header("location:http://phpower-124398.sae1.nitrousbox.com/admin/noticias.php?msg=erro");
    }
    return;
  }

  if(!$_POST['idnoticia']){

    $conexao->query('
              INSERT INTO noticia (not_titulo, not_data, not_autor_id, not_texto, not_categoria_id) Values ("'.$_POST['titulo'].'", NOW(), '.$_SESSION['usuario']['aut_id'].', "'.$_POST['texto'].'", '.$_POST['categoriaid'].')         
            ');
    
    $idFoto = $conexao->lastInsertId(); 
  
    if($_FILES['foto']['size'] > 0){
      $uploaddir = '../public/imagens/';
      $uploadfile = $uploaddir . $_FILES['foto']['name'];
      if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $idFoto.'.jpg')){
        $conexao->query('
                UPDATE noticia SET not_foto="'.$idFoto.'" WHERE not_id = '.$idFoto.'         
              ');
      }
    }

    header("location:http://phpower-124398.sae1.nitrousbox.com/admin/noticias.php?msg=save");
    
  }else{

    $conexao->query('
              UPDATE noticia SET not_titulo="'.$_POST['titulo'].'", not_data=NOW(), not_texto="'.$_POST['texto'].'", not_categoria_id= '.$_POST['categoriaid'].' WHERE not_id = '.$_POST['idnoticia'].'         
            ');
    
    if($_FILES['foto']['size'] > 0){
      $uploaddir = '../public/imagens/';
      $uploadfile = $uploaddir . $_FILES['foto']['name'];
      if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $_POST['idnoticia'].'.jpg')){
        $conexao->query('
                UPDATE noticia SET not_foto="'.$_POST['idnoticia'].'" WHERE not_id = '.$_POST['idnoticia'].'         
              ');
      }
    }
    
    header("location:http://phpower-124398.sae1.nitrousbox.com/admin/noticias.php?msg=update");
    
  }
  
?>