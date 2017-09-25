<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<title>Urna - Cadastro de Candidato</title>

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
$nivel = $_POST['nivel'];
$proposta = $_POST['proposta'];
$status = 0;

$uploaddir = 'img/candidatos/';
$uploadfile = $uploaddir . basename($_FILES['foto']['name']);

date_default_timezone_set("Brazil/East");

$ext = strtolower(substr($_FILES['foto']['name'],-4));
$new_name = date("d.m.Y-H.i.s") . $ext;

$upload = move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile.$new_name);

if($upload){

$nomearquivo = $uploadfile.$new_name;

//query (Insert Usuário)
$query_insert_usuario = "INSERT INTO usuarios (nome,username,senha,nivel,email,foto,proposta,status_votacao) VALUES('$nome','$login','$senha','$nivel','$email','$nomearquivo','$proposta','$status')";
$res_insert_usuario = mysqli_query($con, $query_insert_usuario);

$ultimo_id = mysqli_insert_id($con);

//query (Insert Votação)
$query_insert_votacao = "INSERT INTO eleicao (nome,votos,id_candidato) VALUES('$nome','0','$ultimo_id')";
$res_insert_votacao = mysqli_query($con, $query_insert_votacao);


if($res_insert_usuario && $res_insert_votacao){
echo "<script>
alert('Candidato cadastrado com sucesso!');
</script>";
}else{
echo "<script>
alert('Erro ao cadastrar o Candidato!');
</script>";	
}

}
}
?>

<div id="estrutura">
	<div id="content">

		<div class="segura_cadastro">

		<div class="tit_pags">Cadasto de Candidato &nbsp&nbsp&nbsp<i><img src="img/prof.jpg" width="50"></i> </div>

		<div class="sub_tit_pags">Preencha os Dados</div>

			<form method="post" action="" enctype="multipart/form-data" autocomplete="off">			
				<label class="label_cad">Nome</label><br>
				<input type="text" name="nome" required="required" class="form_cad">
				<label class="label_cad">E-mail</label><br>
				<input type="email" name="email" required="required" class="form_cad">
				<label class="label_cad">Login</label><br>
				<input type="text" name="login"  required="required" class="form_cad">
				<label class="label_cad">Senha</label><br>
				<input type="password" name="senha"  required="required" class="form_cad">
				<label class="label_cad">Confirmação da Senha</label><br>
				<input type="password" name="confirmacao"  required="required" class="form_cad">
				<label class="label_cad"> Tipo de Candidato</label><br>
				<select required="required" class="form_cad2" name="nivel">
					<option value="turma">Representante de Turma</option>
					<option value="curso">Representante de Curso</option>
					<option value="unidade">Representande da Unidade</option>
				</select>
				<label class="label_cad">Proposta</label><br>
				<textarea required="required" name="proposta" class="form_text" rows="6"></textarea>
				<label class="label_cad">Foto do Candidato</label><br>
				<input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
				<input name="foto" id="foto" type="file" required="required" class="form_cad"  />
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