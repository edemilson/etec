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
          <?php 
            if(isset($_GET['editar'])){
              $resultCategoria = $conexao->query('SELECT * FROM categoria WHERE cat_id = '.$_GET['id']);
              if($resultCategoria->rowCount()){
                $data = $resultCategoria->fetchAll();
              }
            }
          ?>
          <form method="post" action="acoes_categoria.php">
            <input type="hidden" value="<?=$data[0]['cat_id']?>" id="idcategoria" name="idcategoria" />
            <label>Nome da categoria</label>
            <br>
            <input type="text" value="<?=$data[0]['cat_desc']?>" id="categoria" name="categoria" />
            <br>
            <input type="submit" value="Gravar" />
          </form>
          
        </div>
        <div style="clear: both;"></div>
      </div>
      
      <?php
        require('../parts/rodape.php');
      ?>
    </div>
  </body>
</html>