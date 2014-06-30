<?php

  $result = $conexao->query('SELECT * FROM categoria');
  if($result->rowCount()){
    echo '<div class="lista-categoria">';
    echo '<div class="lista-categoria-titulo">Categorias</div>';
    foreach($result as $row){
      echo '<a class="lista-categoria-item" href="categoria.php?id='.$row['cat_id'].'">'.$row['cat_desc'].'</a>';
    }
    echo '</div>';
  }

?>