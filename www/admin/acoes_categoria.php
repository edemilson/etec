<?php
  require('checalogado.php');
  require('../database/conecta.php');

  if(isset($_GET['deletar'])){
      if($_GET['id']){
        $conexao->query('
                DELETE FROM categoria WHERE cat_id = '.$_GET['id'].'   
              ');
        header("location:http://phpower-124398.sae1.nitrousbox.com/admin/categorias.php?msg=delete");
      }else{
        header("location:http://phpower-124398.sae1.nitrousbox.com/admin/categorias.php?msg=erro");
      }
    return;
    }

  if(!$_POST['idcategoria']){
    
    $conexao->query('
              INSERT INTO categoria (cat_desc) Values ("'.$_POST['categoria'].'")         
            ');
    
    header("location:http://phpower-124398.sae1.nitrousbox.com/admin/categorias.php?msg=save");
    
  }else{
    
    $conexao->query('
              UPDATE categoria SET cat_desc="'.$_POST['categoria'].'" WHERE cat_id = '.$_POST['idcategoria'].'         
            ');
    
    header("location:http://phpower-124398.sae1.nitrousbox.com/admin/categorias.php?msg=update");
    
  }
  
?>