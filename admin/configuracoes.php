<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<title>Urna - Configurações</title>

<link rel="stylesheet" type="text/css" href="css_admin/estilo.css"/>
<link rel="stylesheet" type="text/css" href="css_admin/reset.min.css"/>

</head>
<body>

<?php include("header/menu_admin.php");?>

<?php 
if (isset($_POST['Alterar']) && isset($_POST['status_liberacao']) && $_POST['status_liberacao']!=''){
$status_escolhido = $_POST['status_liberacao'];
$senha_passada = $_POST['senha'];

//query (Alter)
$query_altera_sistema = "UPDATE config SET status_liberacao = '$status_escolhido' WHERE id = 1 AND senha = '$senha_passada'";
$res_altera_sistema = mysqli_query($con, $query_altera_sistema);

if($res_altera_sistema == TRUE){
echo "<script>location.href='configuracoes.php';</script>";
}

}
?>

<div id="estrutura">
	<div id="content">

		<div class="segura_cadastro">

		<div class="tit_pags">Configurações &nbsp&nbsp<i><img src="img/engrenagem.png" width="50"></i></div>

		<div class="status_system">
			<?php if ($_SESSION['liberacao'] == '0') { ?>
				<div class="status_yellow">Votação Não Liberada</div>
			<?php } ?>
			<?php if ($_SESSION['liberacao'] == '1') { ?>
				<div class="status_green">Votação Liberada</div>
			<?php } ?>
			<?php if ($_SESSION['liberacao'] == '2') { ?>
				<div class="status_red">Votação Encerrada</div>
			<?php } ?>
		</div>

		<form method="post" action="" autocomplete="off">	
		<label class="label_cad">Selecione</label><br>
		<select required="required" class="form_cad2" name="status_liberacao">
			<option>Selecione</option>
			<option value="1">Liberar Votação</option>
			<option value="0">Bloquear Votação</option>
			<option value="2">Encerrar Votação</option>
		</select>
		<label class="label_cad">Senha</label><br>
		<input type="password" name="senha" id="senha" required="required" class="form_cad">
		<br><br>
		<input type="submit" name="Alterar" value="Alterar" class="btn_cad">
		<br><br><br><br> 
		</form<>

		<?php if ($_SESSION['liberacao'] == '2') { ?>
		<div class="botao_resultado">
			<a href="classificacao.php" class="btn_classificacao">Ver Classificação</a>
		</div>
		<?php } ?>

		<br><br><br><br> 

		</div>

	</div>
</div>
</body>
</html>