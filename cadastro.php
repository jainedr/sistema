<?php 
include $_SERVER['DOCUMENT_ROOT']."/conexao.php";

if(isset($_POST['nome'])){
$nome = $_POST['nome'];
$endereco =  $_POST['endereco'];
$contato = $_POST['telefone'];
$espec = $_POST['espec'];
$sus = $_POST['sus'];
$date_pc = date('Y-m-d');
$data_rec = $date_pc;
$data_marc = $_POST['data_marc']; 
// if($_POST['data_marc']==NULL){
//   $data_marc = NULL;
// }

//$data_rec = date('d/m/Y', strtotime($date_pc));
//$data_marc = date('d/m/Y', strtotime($_POST['data_marc']));
$connect = mysql_connect($servername,$username,$password);
$db = mysql_select_db($dbname);
$query_select = "SELECT nome FROM marcacao WHERE nome = '$nome'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['nome'];

  if($nome == "" || $nome == null)
    echo"<script language='javascript' type='text/javascript'>alert('O campo Nome deve ser preenchido');window.location.href='cad.php';</script>"; 
      $query = "INSERT INTO marcacao (nome, endereco, contato, espec, data_rec, data_marc, sus) VALUES ('$nome','$endereco','$contato',$espec,'$data_rec','$data_marc','$sus')";
      $insert = mysql_query($query,$connect);
    if($insert)
        echo"<script language='javascript' type='text/javascript'>alert('Paciente cadastrado com sucesso!');window.location.href='cad.php'</script>";
        echo"<script language='javascript' type='text/javascript'>alert('Não foi possivel fazer o cadastro!');window.location.href='cad.php'</script>";
    
}

if(isset($_POST['nome_especialidade'])){
  $nome = $_POST['nome_especialidade'];
  $connect = mysql_connect($servername,$username,$password);
  $db = mysql_select_db($dbname);
  $query_select = "SELECT nome FROM especialidade WHERE nome = '$nome'";
  $select = mysql_query($query_select,$connect);
  $array = mysql_fetch_array($select);
  $logarray = $array['nome'];
  
    if($nome == "" || $nome == null){
      
      echo"<script language='javascript' type='text/javascript'>alert('O campo Nome deve ser preenchido');window.location.href='especialidade.php';</script>";
  
      }else{
        if($logarray == $nome){
          mysql_close();
          echo"<script language='javascript' type='text/javascript'>alert('Essa especialidade já existe');window.location.href='especialidade.php';</script>";
          die();  
        }
        else{
          $query = "INSERT INTO especialidade (nome) VALUES ('$nome')";
          $insert = mysql_query($query,$connect);
           if($insert){
            mysql_close();
            echo"<script language='javascript' type='text/javascript'>alert('especialidade cadastrada com sucesso!');window.location.href='especialidade.php'</script>";
          }
           
          }
    }
  

}


    
?>