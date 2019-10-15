<?php
ini_set('default_charset','UTF-8');
include $_SERVER['DOCUMENT_ROOT']."/conexao.php";
// $servername = "localhost";
// $username = "root";
// $password = "37371406";
// $dbname = "cdpessoa";
$PHP_SELF = $_SERVER['PHP_SELF'] ;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET['alterar'])){
    $idpessoa = $_GET['alterar'];
    $sql = "SELECT id, nome, endereco, contato, espec, data_rec, data_marc FROM marcacao WHERE id = $idpessoa";
    $result = $conn->query($sql);
  }

  $connect = mysql_connect($servername,$username,$password);
  $db = mysql_select_db($dbname);
  $query = sprintf("SELECT * FROM especialidade");
  $dados = mysql_query($query, $connect) or die(mysql_error());
  $rowe = mysql_fetch_assoc($dados);
  $total = mysql_num_rows($dados);



if(isset($_POST['nome'])){
$idpessoa = $_POST['id'];  
$nome = $_POST['nome'];
$endereco =  $_POST['endereco'];
$contato = $_POST['contato'];
//$espec = $_POST['espec'];
//$data_rec = $_POST['data_rec'];
$data_marc = $_POST['data_marc'];
$sql_up = "UPDATE marcacao SET nome='$nome', endereco='$endereco', contato='$contato', data_marc='$data_marc' WHERE id=$idpessoa";
$result = $conn->query($sql_up);
if ($conn->query($sql_up) === TRUE) {
  header('Location: index.php');
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
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
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
    $nome_pessoa = $row["nome"];
    $endereco = $row["endereco"];
    $contato = $row["contato"];
    $especialidade = $row['espec'];
    $especialidade = mostraespecialidade($especialidade,$servername,$username,$password,$dbname);
    $data_rec = $row["data_rec"];
    $data_marc = $row["data_marc"];
    }
    }
 
?>
<div class="container">
<form method="POST" action="acao.php">
  <h3 class="text-center">Alterar dados - <?php echo $nome_pessoa?></h3>
 <input type="hidden" name="id" value="<?php echo $idpessoa;?>">
  <ul class="list-group text-info">
  <div class="form-group">
    <li class="list-group-item"><label>Nome:</label><input class="form-control" type="text" name="nome" value="<?php echo $nome_pessoa?>"></li>
    <li class="list-group-item"><label>Endereço:</label><input class="form-control" type="text" name="endereco" value="<?php echo $endereco?>"></li>
    <li class="list-group-item"><label>Contato:</label><input class="form-control" type="text" name="contato" value="<?php echo $contato?>"></li>
    <li class="list-group-item"><label>Data de Marcação:</label><input class="form-control" type="date" name="data_marc"></li>
    <li class="list-group-item"><input class="form-control btn btn-success" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"></li>
  </div>
  </ul>
  </form>
</div>