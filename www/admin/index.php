<?php
  require('../database/conecta.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Área Administrativa - Login</title>
    <?php
      require('../parts/load.php');
    ?>
  </head>
  <body>
    <div class="background-login">
      <div class="login-box">
        <div class="area-administrativa">Área Administrativa</div>
        <br>
        <br>
        <?php 
          if(isset($_GET['erro'])) 
            echo 'Erro de usuário e senha, tente novamente!'
        ?>
        <form method="post" action="login.php">
          <label>Nome de usuário:</label>
          <br>
          <input type="text" value="" id="login" name="login" />
          <br>
          <label>Senha:</label>
          <br>
          <input type="password" value="" id="password" name="password" />
          <br>
          <br>
          <input type="submit" value="Entrar" id="entrar" name="entrar" />
        </form>
      </div>
    </div>
  </body>
</html>