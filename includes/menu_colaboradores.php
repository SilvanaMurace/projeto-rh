<?php 
  require '../config/config.php'; 
/*
  session_start();

  if(isset($_SESSION['apelidoUsuario'])){
    true; }
  else{  
  	$_SESSION['loginErro'] = "Erro - Entre novamente no sistema";
  	header('Location: /gravar/Index.php');

  }

*/
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
	  <title> Sistema Santo Inácio </title>

    <link rel="stylesheet" type="text/css" href="../public/assets/css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../public/assets/css/icon.min.css">  
    <link rel="stylesheet" type="text/css" href="../public/assets/css/stinacio.css">  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="../public/assets/js/formatData.js"></script>
   <?php
      require 'ajax.php'; 
   ?>

</head>
<body>

  <?php require 'administrativa.php'; ?>

  <div class="ui vertical menu" style="width: 200px; margin-top: 20px;">
    <div class="item">
      <div class="header">Colaboradores</div>
      <div class="menu">
        <a href="cadastrar_main_colaborador.php" class="item">Cadastro Básico</a>
        <a href="cadastrar_main_colabcompl.php"  class="item">Cadastro Complementar</a>
        <a href="cadastrar_main_depend.php"      class="item">Cadastro de Dependentes</a>
        <a href="cadastrar_main_colabevento.php" class="item">Cadastro de Eventos</a>
        <a href="alterar_main_colaborador.php"   class="item">Alteração de Cadastros</a>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="../public/assets/js/semantic.min.js"></script>
 
</body>
 
</html>
