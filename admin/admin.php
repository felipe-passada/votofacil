<!DOCTYPE html>
<?php require('validacoes/destroi_log.php'); ?>
<html>
<meta charset="utf-8"/>
<head>
	<title>Votação - Acesso</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0" />

<link rel="stylesheet" type="text/css" href="css_admin/reset.min.css">
<link href="css_admin/estilo.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="js/validacoes_login.js"></script>
</head>
<body>
<div id="estrutura">
<div id="content">
<div class="tamanho">
	<div class="segura_login">
		<div class="img_logo_admin"><img src="img/meulogo.png" width="200" class="img_tam"></div>
		<div class="tit_login">Acesso a Votação</div>
		<form action="acesso_admin.php" method="post" onSubmit="return valida_dados(this)">
			<div class="alinha_form">
			<label class="format_label">Login:</label><br>
			<input type="login" name="login" class="format_form" placeholder="Digite o Login:" required="required">
			</div>
			<div class="alinha_form">
			<label class="format_label">Senha:</label><br>
			<input type="password" name="senha" class="format_form" placeholder="Digite sua Senha:" required="required">
			</div>
			<div class="alinha_form">
			<input type="submit" name="acessar" id="acessar" value="Acessar" class="btn_acesso">
			<input type="hidden" name="enviar" id="enviar" value="enviar">
			</div>
		</form>
	</div>
</div>
</div>
</div>
</body>
</html>