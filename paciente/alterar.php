<?php
include $_SERVER['DOCUMENT_ROOT']."/conexao.php";
$connect = mysql_connect($servername, $username, $password);
$db = mysql_select_db($dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_GET['alterar'])){
    $idpessoa = $_GET['alterar'];
    $query = sprintf("SELECT id, nome, endereco, sus, contato FROM paciente WHERE id = $idpessoa");
    $dados = mysql_query($query, $connect) or die(mysql_error());
    $row = mysql_fetch_assoc($dados);
  }

if(isset($_POST['id'])){
    $id_paciente = $_POST['id'];
    $nome = $_POST['nome_paciente'];
    $endereco = $_POST['endereco'];
    $sus = $_POST['sus'];
    $contato = $_POST['contato'];
    $sql_up = "UPDATE paciente SET nome='$nome', endereco='$endereco', sus='$sus', contato='$contato' WHERE id=$id_paciente";
    $result = $conn->query($sql_up);
    if ($conn->query($sql_up) === TRUE) {
    header('Location: ../paciente.php');
    } else {
    echo "Error updating record: " . $conn->error;
    }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<br>
<div class="container">
<!-- <a class="btn btn-outline-primary" href="ver/">Pesquisar Pacientes</a> -->
<form method="POST" action="alterar.php">
<input type="hidden" name="id" value="<? echo $row['id'];?>">
  <h4 class="text-center">Alterar dados do Paciente</h4>
 
  <ul class="list-group text-info">
  <div class="form-group">
    <li class="list-group-item"><label>Nome:</label><input class="form-control" type="text" name="nome_paciente" value="<? echo $row['nome'];?>"></li>
    <li class="list-group-item"><label>Endereço:</label><input class="form-control" type="text" name="endereco" value="<? echo $row['endereco'];?>"></li>
    <li class="list-group-item"><label>Contato:</label><input class="form-control" type="text" name="contato" value="<? echo $row['contato'];?>"></li>
    <li class="list-group-item"><label>CNS:</label><input class="form-control" type="text" name="sus" value="<? echo $row['sus'];?>"></li>
    <li class="list-group-item"><input class="form-control btn btn-success" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"></li>
  </div>
  </ul>
  </form>
  <br>
  </ul>
</div>