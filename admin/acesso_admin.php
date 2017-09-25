<?php
session_start();
require('../conexao/connections.php');

if($_POST['enviar']){
 
$login = $_POST['login'];
$senha = $_POST['senha'];

$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;

//query (Consulta de Login)
$query_consulta = "SELECT * FROM usuarios WHERE username = '$login' AND senha = '$senha'";
$res_select = mysqli_query($con, $query_consulta);
$rowcount=mysqli_num_rows($res_select);

if ($rowcount == 0){
	echo "<script>alert('Falha ao Acessar, Tente novamente!');</script>";
	echo "<script>location.href='admin.php';</script>"; 
}else{
	echo "<script>location.href='administracao.php';</script>"; 
}



}
?>