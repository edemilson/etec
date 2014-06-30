<?php

  $resultTop = $conexao->query('SELECT * FROM noticia ORDER BY not_visualizacao DESC LIMIT 0, 8');
  if($resultTop->rowCount()){
    echo '<div class="lista-top">';
    echo '<div class="lista-top-titulo">Top Notícias</div>';
    foreach($resultTop as $row){
      echo '
        <div class="lista-top-box">
          <a class="lista-top-item" href="noticia.php?id='.$row['not_id'].'">
            <img class="top-image" src="public/imagens/'.$row['not_foto'].'.jpg" />
            '.substr($row['not_texto'], 0, 70).'...
          </a>
        </div>
      ';
    }
    echo '</div>';
  }

?>
