<?php
ini_set('default_charset','UTF-8');
date_default_timezone_set('America/Sao_Paulo');

$servername = "localhost";
$username = "root";
$password = "37371406";
$dbname = "cdpessoa";
$db = mysql_select_db('cdpessoa');
$PHP_SELF = $_SERVER['PHP_SELF'] ;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// ------- funçaozinha pra mostrar as especialidades ---------
function mostraespecialidade($esp,$servername,$username,$password,$dbname){
$connect = mysql_connect($servername,$username,$password);
$db = mysql_select_db($dbname);
$query = sprintf("SELECT nome FROM especialidade WHERE id = $esp");
$dados = mysql_query($query, $connect) or die(mysql_error());
$row = mysql_fetch_assoc($dados);
$result = $row['nome'];
		return $result;
	} // ----------------------------------------
// ------- funçaozinha pra retornar id da especialidades ---------
function mostra_id_especialidade($esp,$servername,$username,$password,$dbname){
	$connect = mysql_connect($servername,$username,$password);
	$db = mysql_select_db($dbname);
	$query = sprintf("SELECT id FROM especialidade WHERE nome = $esp");
	$dados = mysql_query($query, $connect) or die(mysql_error());
	$row = mysql_fetch_assoc($dados);
	$result = $row['id'];
			return $result;
		} // ----------------------------------------
		
?>