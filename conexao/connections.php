<?php

//parametros da conexao
header('Content-Type: text/html; charset=utf-8');
$servidor_bd = "localhost";
$usuario_bd = "root";
$senha_bd = "";
$banco_bd = "urna";

//conectar e seleciona o banco
$con = mysqli_connect($servidor_bd, $usuario_bd, $senha_bd, $banco_bd);
//$db = @mysqli_select_db($banco,$con);

@mysqli_query("SET NAMES 'utf8'");
@mysqli_query('SET character_set_connection=utf8');
@mysqli_query('SET character_set_client=utf8');
@mysqli_query('SET character_set_results=utf8');

?>