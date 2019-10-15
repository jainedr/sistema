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


if(isset($_POST['espec'])){
    $especialidade = $_POST['espec'];
    $data_in = $_POST['data_in'];
    $data_fin = $_POST['data_fin'];
    $query = sprintf("SELECT * FROM marcacao WHERE espec ='$especialidade' AND data_rec BETWEEN '$data_in' AND '$data_fin' order by data_rec desc");
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
<h5><p class="text-center">Relatorio por Especialidade/data</p></h5>
<form action="" method="post">
<ul class="list-group text-info">
  <div class="form-group">
  <li class="list-group-item"><label>Data inicial:</label><input class="form-control" type="date" name="data_in" required></li>
  <li class="list-group-item"><label>Data final:</label><input class="form-control" type="date" name="data_fin" required></li>
    <li class="list-group-item"> <label for="sel1">Especialidade: <small><?php //echo " &nbsp;total $total";?></small></label>
  <select class="form-control" id="sel1" name="espec" required>
  <option disabled selected>Especialidade...</option>
    <?php
  if($total > 0 ) {
    do {
    ?> 
  <option value="<?php echo $row['id'];?>"><?php echo $row['nome'];?></option>
  <?php
  }
  while($row = mysql_fetch_assoc($dados));
  }
    ?>
  </select></li>
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
	if(isset($_POST['espec']) && $totalm >= 0) {
		$esp = mostraespecialidade($rowm["espec"],$servername,$username,$password,$dbname);
		$date = date('d/m/Y', strtotime($row["data_rec"]));
		do {
			echo "<tr>
			<td>" .$rowm["nome"]. "</td><td>" .$rowm["endereco"]. "</td><td>" .$rowm["contato"]. "</td><td>" .$esp. "</td><td>" .$date. "</td>
			<td>" .$rowm["data_marc"]. "</td></tr>";
		}while($rowm = mysql_fetch_assoc($dadosm));
		
	}
 
    ?>

  </tbody>
  </table> 

  </div>
  </body>
</html>