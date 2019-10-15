<?php
include $_SERVER['DOCUMENT_ROOT']."/conexao.php";
include $_SERVER['DOCUMENT_ROOT']."/style.php";

$connect = mysql_connect($servername, $username, $password);
$db = mysql_select_db($dbname);
$query = sprintf("SELECT * FROM especialidade");
$dados = mysql_query($query, $connect) or die(mysql_error());
$row = mysql_fetch_assoc($dados);
$total = mysql_num_rows($dados);
$PHP_SELF = $_SERVER['PHP_SELF'];


if(isset($_POST['data_fin']) && isset($_POST['data_in'])){
    $data_in = $_POST['data_in'];
    $data_fin = $_POST['data_fin'];
    $query = sprintf("SELECT * FROM marcacao WHERE data_marc = '0000-00-00' AND data_rec BETWEEN '$data_in' AND '$data_fin' order by data_rec desc");
    $dadosm = mysql_query($query, $connect) or die(mysql_error());
    $rowm = mysql_fetch_assoc($dadosm);
    $totalm = mysql_num_rows($dadosm);
    
}

?>

<!DOCTYPE html>
<html lang="en">
<?php
echo $head_style;
?>
<!-- <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
</head>  -->
<body>
<script src="../autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="../autocomplete/autocomplete.css">
<br>
<div class="container">
<h5><p class="text-center">Relatorio - PACIENTES EM ESPERA</p></h5>
<form action="" method="post">
<ul class="list-group text-info">
  <div class="form-group">
  <li class="list-group-item"><label>Data inicial:</label><input class="form-control" type="date" name="data_in"></li>
  <li class="list-group-item"><label>Data final:</label><input class="form-control" type="date" name="data_fin"></li>
  <li class="list-group-item"><input class="form-control btn btn-success" type="submit" value="PESQUISAR"  name="PESQUISAR"></li>
  </ul>
  </form>

  <table class="table table-bordered table-sm text-center">
  <thead>
	<tr>
		<th >Nome</th><th >Endereço</th><th>Contato</th><th >Especialidade</th><th>Data de Recebimento</th><th>Data de Marcação</th>
		
		</tr>
</thead>
     <tbody>
  <?php 
  if(isset($_POST['data_fin']) && isset($_POST['data_in'])) {
    do {
      $esp = mostraespecialidade($rowm["espec"],$servername,$username,$password,$dbname);
      @$data_marc = date('d/m/Y', strtotime($row["data_marc"]));
      if($data_marc == '31/12/1969'){
        $data_marc = "<small class='text-danger'><abbr title='PEDIDO DE MARCAÇÂO EM ABERTO'>EM ESPERA</abbr></small>";
      }
        echo "<tr>
        <td>" .$rowm["nome"]. "</td><td>" .$rowm["endereco"]. "</td><td>" .$rowm["contato"]. "</td><td>" .$esp. "</td><td>" .$rowm["data_rec"]. "</td>
        <td>" .$data_marc. "</td></tr>";
       }
  while($rowm = mysql_fetch_assoc($dadosm));
  }
 
    ?>

  </tbody>
  </table> 

  </div>
  </body>
</html>
