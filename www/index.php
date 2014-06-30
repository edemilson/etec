<?php
  require('database/conecta.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Portal de Notícias</title>
    <?php
      require('parts/load.php');
    ?>
  </head>
  <body>
    <div class="content">
      <?php
        require('parts/menu.php');
      ?>
      
      <div class=content-center>
        <div class="box-esquerdo">
          <?php
            require('parts/categoria.php');
          ?>
          <br>
          <?php
            require('parts/top.php');
          ?>
        </div>
        <div class="box-direito">
          
          <?php

            $resultItem = $conexao->query('
              SELECT * FROM noticia 
              INNER JOIN autor ON aut_id = not_autor_id 
              ORDER BY not_data DESC            
            ');

            if($resultItem->rowCount()){
              foreach($resultItem as $row){
                echo '
                  <div class="post">
                    <div class="img-post">
                      <a href="noticia.php?id='.$row['not_id'].'"><img src="public/imagens/'.$row['not_foto'].'.jpg" /></a>
                    </div>
                    <div class="post-texto">
                      <div class="post-titulo"><a href="noticia.php?id='.$row['not_id'].'">'.$row['not_titulo'].'</a></div>
                      <div class="post-autor">por: '.$row['aut_nome'].'</div>
                      <div class="post-data">'.$row['not_data'].' </div>
                      <div class="post-noticia">
                        '.substr($row['not_texto'], 0, 150).'... ler mais...
                      </div>
                    </div>
                  </div>
                ';
              }
            }

          ?>
          
        </div>
        <div style="clear: both;"></div>
      </div>
      
      <?php
        require('parts/rodape.php');
      ?>
    </div>
  </body>
</html>