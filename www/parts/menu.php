<div class="menu">
  <div class="logo">
    <a class="link" href="/">Portal de Notícias</a>
  </div>
  <div class="option-menu">
    <?php if(isset($_SESSION['usuario'])){ ?>
     <a class="link" href="/admin/home.php"> Olá <?=$_SESSION['usuario']['aut_nome'];?>, acessar área administrativa </a>| <a class="link" href="/admin/logout.php">Sair</a>
    <?php }else{ ?>
      <a class="link" href="/admin">Conectar para Publicar</a>
    <?php } ?>
  </div>
</div>