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


if(isset($_GET['excluir'])){
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Erro ao tentar excluir registro " . $conn->connect_error);
} 
  $id = $_GET['excluir'];
  $querydeleta = "DELETE FROM especialidade WHERE id = $id;";
  mysqli_query($con,$querydeleta) or die("Erro ao tentar excluir registro");
  header('Location: especialidade.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
echo $head_style;
?>
</head>
<body>
<br>
<div class="container">
<!-- <a class="btn btn-outline-primary" href="ver/">Pesquisar Pacientes</a> -->
<form method="POST" action="cadastro.php">
  <h4 class="text-center">Cadastro de Especialidade</h4>
 
  <ul class="list-group text-info">
  <div class="form-group">
    <li class="list-group-item"><label>Nome:</label><input class="form-control" type="text" name="nome_especialidade"></li>
    <li class="list-group-item"><input class="form-control btn btn-success" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"></li>
  </div>
  </ul>
  </form>
  <table class="table table-sm text-center">
    <thead>
      <tr>
        <th>#</th>
        <th>Especialidade</th>
        <th class="right">Excluir</th>
      </tr>
    </thead>
     <tbody>
  <?php 
    
  if($total > 0) {

    do {
      $id_esp = $row['id'];
      $url = "$PHP_SELF?id=$id_esp";
      $url_exclir = "$PHP_SELF?excluir=$id_esp";
?>  
    <tbody>
      <tr>
        <td ><?php echo $row['id'];?></td>
        <td ><?php echo $row['nome'];?></td> 
        <td ><?php echo "<a class='text-dark btn btn-outline-danger' href='$url_exclir'>excluir</a>";?></td>      
      </tr>
   
    <?php
       }
  while($row = mysql_fetch_assoc($dados));
  }
 
    ?>

  </tbody>
  </table> 

<?php
$sql = mysql_query("SELECT * FROM especialidade");
 
$lpp = 10; // Especifique quantos resultados você quer por página
$total = mysql_num_rows($sql); // Esta função irá retornar o total de linhas na tabela
$paginas = ceil($total / $lpp); // Retorna o total de páginas
if(!isset($pagina)) { $pagina = 0; } // Especifica uma valor para variavel pagina caso a mesma não esteja setada
$inicio = $pagina * $lpp; // Retorna qual será a primeira linha a ser mostrada no MySQL
$sql = mysql_query("SELECT * FROM especialidade LIMIT $inicio, $lpp"); // Executa a query no MySQL com o limite de linhas.
 ?>
<ul class="pagination pagination-lg">
<?php
$contapagina = $pagina + 1;


if($pagina > 0) {
   $menos = $pagina - 1;
   $url = "$PHP_SELF?pagina=$menos";
   echo " <li><a href='$url'>Anterior</a></li>"; // Vai para a página anterior
}
for($i=0;$i<$paginas;$i++) { // Gera um loop com o link para as páginas
   $url = "'$PHP_SELF'?pagina=$i";
}
  echo " <li class='active'><a href='$url'> ".$contapagina."ª de $total resultados</a></li>";

if($pagina < ($paginas - 1)) {
   $mais = $pagina + 1;
   $url = "$PHP_SELF?pagina=$mais";
   echo " <li><a href='$url'>Próxima</a></li>";
}
for($i=0;$i<$paginas;$i++) { // Gera um loop com o link para as páginas
   $url = "'$PHP_SELF'?pagina=$i";
}

?>
</ul>
</div>