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
          <a href="cadastro_noticia.php">Nova Noticia</a>
          <table class="table">
            <tr class="table-head">
              <td class="table-titulo">
                Titulo do post
              </td>
              <td class="table-data">
                Data publicação
              </td>
              <td class="table-comandos">
                
              </td>
            </tr>
            
            <?php
                    
                  $resultPost = $conexao->query('SELECT * FROM noticia WHERE not_autor_id = '.$_SESSION['usuario']['aut_id']);
                  if($resultPost->rowCount()){
                    foreach($resultPost as $row){
                      echo '
                          <tr>
                            <td class="table-titulo">
                              '.$row['not_titulo'].'
                            </td>
                            <td class="table-data">
                              '.$row['not_data'].'
                            </td>
                            <td class="table-comandos">
                              <a href="cadastro_noticia.php?id='.$row['not_id'].'&editar">editar</a> | <a href="acoes_noticia.php?id='.$row['not_id'].'&deletar">excluir</a>
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