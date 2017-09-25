<?php
include('../conexao/connections.php');

if(isset($_SESSION['login']) && isset($_SESSION['senha'])){

	$login_login = $_SESSION['login'];
	$senha_login = $_SESSION['senha'];

	//query (Consulta de Login)
	$query_consulta = "SELECT * FROM usuarios WHERE username = '$login_login' AND senha = '$senha_login'";
	$res_select = mysqli_query($con, $query_consulta);
	$res_select_saida = mysqli_fetch_assoc($res_select);
	$rowcount=mysqli_num_rows($res_select);


	$_SESSION['nome_usuario'] = $res_select_saida['nome'];
	$_SESSION['nivel'] = $res_select_saida['nivel'];
	$_SESSION['id'] = $res_select_saida['id'];
	$_SESSION['status_votacao'] = $res_select_saida['status_votacao'];

	if ($rowcount == 0){
		echo "<script>alert('Falha ao Acessar, Tente novamente!');</script>";
		echo "<script>location.href='admin.php';</script>"; 
	}


}else{
	echo "<script>alert('Você será redirecionado para a página de Login!');</script>";
	echo "<script>location.href='admin.php';</script>"; 
}

?>