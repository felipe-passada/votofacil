<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<title>Administração - Cadastro</title>

<link rel="stylesheet" type="text/css" href="css_admin/estilo.css"/>
<link rel="stylesheet" type="text/css" href="css_admin/reset.min.css">
</head>
<body>

<?php include("header/menu_admin.php");?>

<div id="estrutura">
	<div id="content">

		<div class="tit_pags">Área de Cadastro</div>

		<div class="sub_tit_pags">Selecione o Tipo de Cadastro</div>

		<div class="segura_botoes_escolha">
			<div class="botao_escolha">
				<a href="cadastro_aluno.php"><i><img src="img/aluno.jpg" width="50"></i> Cadastro de Aluno</a>
			</div>
			<div class="botao_escolha">
				<a href="cadastro_candidato.php"><i><img src="img/prof.jpg" width="50"></i> Cadastro de Candidato</a>
			</div>
		</div>

	</div>
</div>
</body>
</html>