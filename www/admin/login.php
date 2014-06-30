<?php
  $data = $_POST;
  login($data);

  function login($data){
    
    include('../database/conecta.php');
    
    $result = $conexao->query('SELECT * FROM autor WHERE aut_usuario = "'.$data['login'].'" AND aut_senha = "'.$data['password'].'" LIMIT 0, 1');
    if($result->rowCount()){
      foreach($result as $row){
        $_SESSION['usuario'] = $row;
        header("location:/");
      }
    }else{
      header("location:http://phpower-124398.sae1.nitrousbox.com/admin/index.php?erro=login");
    }
    
  }

?>