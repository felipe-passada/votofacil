<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<title>Urna - Cadastro de Aluno</title>

<link rel="stylesheet" type="text/css" href="css_admin/estilo.css"/>
<link rel="stylesheet" type="text/css" href="css_admin/reset.min.css"/>

</head>
<body>

<?php include("header/menu_admin.php");?>

<?php 
if (isset($_POST['Inserir']) && isset($_POST['login']) && $_POST['login']!=''){
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$login = $_POST['login'];
$email = $_POST['email'];
$nivel = 'aluno';
$status = 0;

//query (Insert)
$query_insert = "INSERT INTO usuarios (nome,username,senha,nivel,email,status_votacao) VALUES('$nome','$login','$senha','$nivel','$email','$status')";
$res_insert = mysqli_query($con, $query_insert);
if($res_insert){
echo "<script>alert('Aluno cadastrado com sucesso!');</script>";
}
}
?>

<div id="estrutura">
	<div id="content">

		<div class="segura_cadastro">

		<div class="tit_pags">Cadasto de Aluno &nbsp&nbsp<i><img src="img/aluno.jpg" width="50"></i></div>

		<div class="sub_tit_pags">Preencha os Dados</div>

			<form method="post" autocomplete="off">
				<label class="label_cad">Nome</label><br>
				<input type="text" name="nome" id="nome" required="required" class="form_cad">
				<label class="label_cad">E-mail</label><br>
				<input type="email" name="email" id="email" required="required" class="form_cad">
				<label class="label_cad">Login</label><br>
				<input type="text" name="login" id="login" required="required" class="form_cad">
				<label class="label_cad">Senha</label><br>
				<input type="password" name="senha" id="senha" required="required" class="form_cad">
				<label class="label_cad">Confirmação da Senha</label><br>
				<input type="password" name="confirmacao" id="confirmacao" required="required" class="form_cad">
				<br><br>
				<input type="checkbox" name="confirmacao" class="form_check" required="required"><span class="form_check_txt2">Clique para confirmar o cadastro!</span>
				<br>
				<input type="submit" name="Inserir" value="Inserir" class="btn_cad">
				<br><br><br><br> 
			</form>
		</div>

	</div>
</div>
</body>
</html>