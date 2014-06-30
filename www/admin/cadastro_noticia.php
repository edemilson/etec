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
              $resultNoticia = $conexao->query('SELECT * FROM noticia WHERE not_id = '.$_GET['id'].' AND not_autor_id =  '.$_SESSION['usuario']['aut_id']);
              if($resultNoticia->rowCount()){
                $data = $resultNoticia->fetchAll();
              }
            }
          ?>
          <form method="post" action="acoes_noticia.php" enctype="multipart/form-data">
            <input type="hidden" value="<?=$data[0]['not_id']?>" id="idnoticia" name="idnoticia" />
            <label>Titulo da Noticia</label>
            <br>
            <input type="text" value="<?=$data[0]['not_titulo']?>" id="titulo" name="titulo" />
            <br>
            <label>Categoria</label>
            <br>
            <select name="categoriaid" id="categoriaid">
              <option>Selecione uma Categoria</option>
              <?php
                    
                  $resultCategoria = $conexao->query('SELECT * FROM categoria');
                  if($resultCategoria->rowCount()){
                    foreach($resultCategoria as $row){
                      if($data[0]['not_categoria_id'] == $row['cat_id']){
                        echo '<option selected value="'.$row['cat_id'].'">'.$row['cat_desc'].'</option>';
                      }else{
                        echo '<option value="'.$row['cat_id'].'">'.$row['cat_desc'].'</option>';
                      }
                    }
                  }
              ?>
            </select>
            <br>
            <label>Imagem do Post</label>
            <br>
            <input type="file" value="" id="foto" name="foto" />
            <br>
            <label>Conteúdo da Noticia</label>
            <br>
            <textarea cols="75" rows="10" id="texto" name="texto"><?=$data[0]['not_texto']?></textarea>
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