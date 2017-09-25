<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<title>Urna - Votação</title>

<link rel="stylesheet" type="text/css" href="css_admin/estilo.css"/>
<link rel="stylesheet" type="text/css" href="css_admin/reset.min.css"/>

</head>
<body>

<?php include("header/menu_admin.php");?>

<?php 

error_reporting(0);
ini_set(“display_errors”, 0 );

if ($_SESSION['status_votacao'] != '0'){
	echo "<script>alert('Você já votou!');</script>";
	echo "<script>location.href='admin.php';</script>"; 
}

//query (Consulta candidatos de turma)
$query_consulta_turma = "SELECT * FROM usuarios WHERE nivel = 'turma' ORDER BY nome";
$res_select_turma = mysqli_query($con, $query_consulta_turma);

//query (Consulta candidatos de curso)
$query_consulta_curso = "SELECT * FROM usuarios WHERE nivel = 'curso' ORDER BY nome";
$res_select_curso = mysqli_query($con, $query_consulta_curso);

//query (Consulta candidatos de unidade)
$query_consulta_unidade = "SELECT * FROM usuarios WHERE nivel = 'unidade' ORDER BY nome";
$res_select_unidade = mysqli_query($con, $query_consulta_unidade);

if (isset($_POST['Votar'])){
$candidato_turma = $_POST['candidato_turma'];
$candidato_curso = $_POST['candidato_curso'];
$candidato_unidade = $_POST['candidato_unidade'];

//query (Alter) ATUALIZA O VOTO DOS CANDIDATOS SELECIONADOS
$query_up_voto_turma = "UPDATE eleicao SET votos = votos+1 WHERE id_candidato = $candidato_turma";
$res_up_voto_turma = mysqli_query($con, $query_up_voto_turma);

$query_up_voto_curso = "UPDATE eleicao SET votos = votos+1 WHERE id_candidato = $candidato_curso";
$res_up_voto_curso = mysqli_query($con, $query_up_voto_curso);

$query_up_voto_unidade = "UPDATE eleicao SET votos = votos+1 WHERE id_candidato = $candidato_unidade";
$res_up_voto_unidade = mysqli_query($con, $query_up_voto_unidade);

//query (Alter) ATUALIZA O VOTO DO USUARIO SE ELE FOR CANDIDADO OU ALUNO, E PROIBE FUTURAMENTE O VOTO NOVAMENTE
if(($_SESSION['nivel'] == 'usuario') || ($_SESSION['nivel'] == 'turma') || ($_SESSION['nivel'] == 'unidade') || ($_SESSION['nivel'] == 'curso') || ($_SESSION['nivel'] == 'aluno')){
	$query_atualiza_status_votacao = "UPDATE usuarios SET status_votacao = 1 WHERE id = ".$_SESSION['id']."";
	$res_atualiza_status_votacao = mysqli_query($con, $query_atualiza_status_votacao);
}

//VE SE AS LINHAS FORAM AFETADAS PARA ASSIM VALIDAR A VOTACAO
$teste_turma = mysqli_affected_rows($query_up_voto_turma);
$teste_curso = mysqli_affected_rows($query_up_voto_curso);
$teste_unidade = mysqli_affected_rows($query_up_voto_unidade);

if($teste_turma != '0' && $teste_curso != '0' && $teste_unidade != '0'){
echo "<script>
alert('Voto depositado!');
location.href='administracao.php';
</script>";
}else{
echo "<script>
alert('Falha na votação!');
</script>";	
}

}
?>

<div id="estrutura">
	<div id="content">

		<div class="segura_cadastro">

		<div class="tit_pags">Votação<i><img src="img/urna.png" width="50"></i></div>

		<form method="post" action="" autocomplete="off">	
		<label class="label_cad">Candidato à Turma</label><br>
		<select required="required" class="form_cad2" name="candidato_turma" required="required">
		<?php while ($linha_turma = mysqli_fetch_assoc($res_select_turma)) { ?>
			<option value="<?=$linha_turma['id']?>" required="required"><?=$linha_turma['nome']?></option>
		<?php } ?>
			<option>Abstenção</option>
			<option>Branco</option>
			<option>Nulo</option>
		</select>
		<label class="label_cad">Candidato à Curso</label><br>
		<select required="required" class="form_cad2" name="candidato_curso" required="required">
		<?php while ($linha_curso = mysqli_fetch_assoc($res_select_curso)) { ?>
			<option value="<?=$linha_curso['id']?>" required="required"><?=$linha_curso['nome']?></option>
		<?php } ?>
			<option>Abstenção</option>
			<option>Branco</option>
			<option>Nulo</option>
		</select>
		<label class="label_cad">Candidato à Unidade</label><br>
		<select required="required" class="form_cad2" name="candidato_unidade" required="required">
		<?php while ($linha_unidade = mysqli_fetch_assoc($res_select_unidade)) { ?>	
			<option value="<?=$linha_unidade['id']?>" required="required"><?=$linha_unidade['nome']?></option>
		<?php } ?>
			<option>Abstenção</option>
			<option>Branco</option>
			<option>Nulo</option>
		</select>
		<br><br>
		<input type="checkbox" name="confirmacao" class="form_check" required="required"><span class="form_check_txt">Clique para confirmar seu voto!</span>
		<br>
		<input type="submit" name="Votar" value="Votar" class="btn_cad">
		<br><br><br><br> 
		</form>

		</div>

	</div>
</div>
</body>
</html>