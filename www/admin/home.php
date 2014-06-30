<?php
  require('../database/conecta.php');
  require('checalogado.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Área Administrativa</title>
    <?php
      require('../parts/load.php');
    ?>
  </head>
  <body>
    <div class="content">
      <?php
        require('../parts/menu.php');
      ?>
      
      <div class=content-center>
        <div class="box-esquerdo">
          <?php
            require('../parts/menu_admin.php');
          ?>
        </div>
        <div class="box-direito">
          <p>Bem vindo ao painel administrativo</p>
        </div>
        <div style="clear: both;"></div>
      </div>
      
      <?php
        require('../parts/rodape.php');
      ?>
    </div>
  </body>
</html>