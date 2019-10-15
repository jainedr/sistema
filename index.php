<?
include $_SERVER['DOCUMENT_ROOT']."/conexao.php";
include $_SERVER['DOCUMENT_ROOT']."/style.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
echo $head_style;
?>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-info navbar-dark fixed-top">
<ul class="navbar-nav">
<li class="nav-item">
  <a class="navbar-brand center" href="index.php">&nbsp;&nbsp;&nbsp;
  <img src="img/logo.jpeg" alt="Logo" class="rounded d-inline-block align-top" style="width:119px;">
  </a>
  </li>&nbsp;&nbsp;&nbsp;
  </ul>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link font-weight-bolder text-light btn btn-outline-dark" href="../cad.php" target="iframe_a">CADASTRAR MARCAÇÕES</a>
      </li>&nbsp;
      <li class="nav-item">
        <a class="nav-link font-weight-bolder text-light btn btn-outline-dark" href="especialidade.php" target="iframe_a">CADASTRAR ESPECIALIDADE</a>
        </li>  &nbsp;
        <li class="nav-item">
        <a class="nav-link font-weight-bolder text-light btn btn-outline-dark" href="paciente.php" target="iframe_a">CADASTRAR PACIENTE</a>
      </li>    &nbsp;
      <li class="nav-item">
      <div class="dropdown">
  <a class="nav-link font-weight-bolder text-light btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" href="paciente.php" target="iframe_a">RELATÓRIOS</a>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="relatorio/relatorio_esp.php" target="iframe_a">POR ESPECIALIDADE</a>
    <a class="dropdown-item" href="relatorio/relatorio_data.php" target="iframe_a">EM ESPERA</a>
    <a class="dropdown-item" href="ver/" target="iframe_a">TODAS AS MARCAÇÕES</a> 
  </div>
</div>
      </li>    &nbsp;
    </ul>
  </div>  
</nav>
<br>
<div class="jumbotron text-center">
<iframe height="1500px" width="100%" src="ver/" name="iframe_a" border="0"></iframe>
   <!-- fim do iframe -->
</div>
</body>
</html>
