<?php
 ini_set('default_charset','UTF-8');
 //include $_SERVER['DOCUMENT_ROOT']."/conexao.php";
 include $_SERVER['DOCUMENT_ROOT']."/style.php";
 $servername = "localhost";
 $username = "root";
 $password = "37371406";
 $dbname = "cdpessoa";
 $PHP_SELF = $_SERVER['PHP_SELF'] ;

// // Create connection
// // ------- funçaozinha pra mostrar as especialidades ---------
 function mostraespecialidade($esp){
 $connect = mysql_connect('localhost','root','37371406');
 $db = mysql_select_db('cdpessoa');
 $query = sprintf("SELECT nome FROM especialidade WHERE id = $esp");
 $dados = mysql_query($query, $connect) or die(mysql_error());
 $row = mysql_fetch_assoc($dados);
 $result = $row['nome'];
 mysql_close();
 		return $result;
 	} // ----------------------------------------


 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 } 

$sql = "SELECT id, nome, endereco, contato, espec, data_rec, data_marc FROM marcacao";
$result = $conn->query($sql);
	
	if(isset($_GET['excluir'])){
	  $idpessoa = $_GET['excluir'];
	  $querydeleta = "DELETE FROM marcacao WHERE id = $idpessoa;";
	  mysqli_query($conn,$querydeleta) or die("Erro ao tentar excluir registro");
	  header('Location: index.php');
	}
	if(isset($_GET['alterar'])){
		$idpessoa = $_GET['alterar'];
	  }
?>
<html>
<head>
<?php
echo $head_style;
?>	
	 	<style type="text/css" title="currentStyle">
			@import "Styles/demo_table.css";
		</style>
		
		<script type="text/javascript" language="javascript" src="Scripts/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="Scripts/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#paulista2013').dataTable();
			} );
		</script>
<style type="text/css">
table {
	width:100%;
	border-collapse:collapse;
	border:1px solid #CCC;
}

#paulista2013 tr {
	border:1px solid #CCC;
}

#paulista2013 td {
	width:90px;
	height:40px;
	padding:10px;
	border:1px solid #CCC;
}
#tdend{
	width:270px;
	height:40px;
	padding:10px;
	border:1px solid #CCC;
}
#tdnome{
	width:260px;
	height:40px;
	padding:10px;
	border:1px solid #CCC;
}
#tdesp{
	width:120px;
	height:40px;
	padding:10px;
	border:1px solid #CCC;
}
</style>
</head>
<body>
<?php

?>
<br>
<div class="container">
<!-- <h3><a href="../cad.php">Cadastrar paciente</a></h3>-->
<h4>Pesquisa de Marcações</h4>
<br>
<table id="paulista2013">
<thead>
	<tr>
		<th id="tdnome">Nome</th><th id="tdend">Endereço</th><th>Contato</th><th id="tdesp">Especialidade</th><th>Data de Recebimento</th><th>Data de Marcação</th><th>Ação</th><th>&nbsp;</th>
		
		</tr>
</thead>
	<tbody>
<?php 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$data_rec = date('d/m/Y', strtotime($row["data_rec"]));
		$data_marc = date('d/m/Y', strtotime($row["data_marc"]));
		if($data_marc == '31/12/1969'){
			$data_marc = "<small class='text-danger'><abbr title='PEDIDO DE MARCAÇÂO EM ABERTO'>EM ESPERA</abbr></small>";
		}
	$idpessoa = $row['id'];
      $url = "$PHP_SELF?excluir=$idpessoa";
		echo "		<tr>
						<td>" . $row["nome"]. "</td><td>" . $row["endereco"]. "</td><td>" . $row["contato"]. "</td><td>" .mostraespecialidade($row["espec"]). "</td><td>" .$data_rec. "</td>
						<td>" . $data_marc . "</td><td><a class='text-dark btn btn-outline-danger' href='$url'>excluir</a></td><td><a class='text-dark btn btn-outline-info' href='acao.php?alterar=".$row["id"]."'>alterar</a></td>
					</tr>
";
      //  " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "Não a resultados";
}
$conn->close();
?>
	<tbody>	
</table>
</div>
</body>
</html>
 

