<?php
session_start();
include('../conexao/connections.php');

	//query (Consulta de Liberacao Votacao)
	$query_consulta_liberacao = "SELECT * FROM config WHERE id = 1";
	$res_select_liberacao = mysqli_query($con, $query_consulta_liberacao);
	$res_select_saida_liberacao = mysqli_fetch_assoc($res_select_liberacao);
	
	$_SESSION['liberacao'] = $res_select_saida_liberacao['status_liberacao'];

?>