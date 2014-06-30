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
          <a href="cadastro_categoria.php">Nova Categoria</a>
          <table class="table">
            <tr class="table-head">
              <td class="table-titulo">
                Titulo da categoria
              </td>
              <td class="table-comandos">
                
              </td>
            </tr>
            
            <?php
                    
                  $resultCategoria = $conexao->query('SELECT * FROM categoria');
                  if($resultCategoria->rowCount()){
                    foreach($resultCategoria as $row){
                      echo '
                          <tr>
                            <td class="table-titulo">
                              '.$row['cat_desc'].'
                            </td>
                            <td class="table-comandos">
                              <a href="cadastro_categoria.php?id='.$row['cat_id'].'&editar">editar</a> | <a href="acoes_categoria.php?id='.$row['cat_id'].'&deletar">excluir</a>
                            </td>
                          </tr>
                      ';
                    }
                  }

            ?>

          </table>
          
        </div>
        <div style="clear: both;"></div>
      </div>
      
      <?php
        require('../parts/rodape.php');
      ?>
    </div>
  </body>
</html>