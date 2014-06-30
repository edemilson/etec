<?php

  if(!$_SESSION['usuario']['aut_id'] > 0){
    session_destroy();
    header("location:/admin");
  }

?>