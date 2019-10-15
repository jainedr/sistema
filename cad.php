<script>
// ['Maçã', 'Banana', 'Laranja']
var countries = [];
var var_incrementa_array = "";
//alert(countries);
</script>
<?php
//session_start();
include $_SERVER['DOCUMENT_ROOT']."/conexao.php";
include $_SERVER['DOCUMENT_ROOT']."/style.php";

//session_destroy();
$connect = mysql_connect($servername,$username,$password);
$db = mysql_select_db($dbname);
$query = sprintf("SELECT * FROM especialidade");
$queryy = sprintf("SELECT nome FROM paciente");
$dados = mysql_query($query, $connect) or die(mysql_error());
$dadoss = mysql_query($queryy, $connect) or die(mysql_error());

$rowe = mysql_fetch_assoc($dados);
$total = mysql_num_rows($dados);

$num=0;
//$_SESSION["pos"] = $num;
while ($row = mysql_fetch_assoc($dadoss)) {
  //$_SESSION["pacientes"][$_SESSION["pos"]] = $row['nome'];
  ?>
  <script> 
  var_incrementa_array = "<?php echo $row['nome'];?>";
  countries.push(var_incrementa_array);
  </script>
  <?php
  //$_SESSION["pos"]++;
  $num++;

}
if(isset($_POST['myCountry'])){
  $nome = $_POST['myCountry'];
  $query = sprintf("SELECT nome, endereco, sus, contato FROM paciente WHERE nome = $nome");
  $dados = mysql_query($query, $connect) or die(mysql_error());
  $row = mysql_fetch_assoc($dados);
  $endereço = "";
}


?>
<!DOCTYPE html>
<html lang="en">
<?php
echo $head_style;
?>
  <script src="autocomplete/autocomplete.js"></script>
  <link rel="stylesheet" href="autocomplete/autocomplete.css">

<body>
<br>
<div class="container">
<!-- <a class="btn btn-outline-primary" href="ver/">Pesquisar Pacientes</a> -->
<!--Make sure the form has the autocomplete function switched off:-->
<h5 class="text-center ">CADASTRE AQUI O ENCAMINHAMENTO</h5>
<br>
<form autocomplete="off" action="cadastro.php" method="post">
<ul class="list-group text-info">
  <div class="form-group">
  <li class="list-group-item"><label>Paciente:</label><input class="form-control" id="myInput" type="text" name="nome" placeholder="Digite o nome do paciente"></li>
  <br>
    <li class="list-group-item"><label>Endereço :</label><input class="form-control" type="text" name="endereco"></li>
    <li class="list-group-item"><label>Contato :</label><input class="form-control" type="text" name="telefone"></li>
    <li class="list-group-item"><label>CNS :</label><input class="form-control" type="text" name="sus"></li>
    <li class="list-group-item"> <label for="sel1">Especialidade: <?php //echo "(cadastradas:$total)";?></label>
  <select class="form-control" id="sel1" name="espec">
  <option disabled selected>Especialidade</option>
    <?php
  if($total > 0) {
    do {
    ?> 
  <option value="<?php echo $rowe['id'];?>"><?php echo $rowe['nome'];?></option>
  <?php
  }
  while($rowe = mysql_fetch_assoc($dados));
  }
    ?>
  </select></li>
    <!-- <li class="list-group-item"><label>Data de Recebimento:</label><input class="form-control" type="date" name="data_rec"></li> -->
    <li class="list-group-item"><label>Data de Marcação:</label><input class="form-control" type="date" name="data_marc"></li>
    <li class="list-group-item"><input class="form-control btn btn-success" type="submit" value="Cadastrar" id="cadastrar" name="cadastrar"></li>
  </div>
  </ul>
  </form>
</div>
<script>
autocomplete(document.getElementById("myInput"), countries);
</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click', '#myInputautocomplete-list div', function(){
      var $endereco = $("input[name='endereco']");
      var $telefone = $("input[name='telefone']");
      var $sus = $("input[name='sus']");

      $endereco.val('Carregando...');
      $telefone.val('Carregando...');
      $sus.val('Carregando...');
        $.getJSON(
          'function.php',
          { nome: $(this).children('input')[0].defaultValue },
          function( json )
          {
            $endereco.val( json.endereco );
            $telefone.val( json.telefone );
            $sus.val( json.sus );
            
          }
        );
    });
  });
  </script>