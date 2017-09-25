<!DOCTYPE html>
<html>
<meta charset="utf-8"/>
<head>
	<title>Urna - Candidatos</title>

<link rel="stylesheet" type="text/css" href="css_admin/estilo.css"/>
<link rel="stylesheet" type="text/css" href="css_admin/reset.min.css">
</head>
<body>

<?php include("header/menu_admin.php");?>

<?php
//query (Consulta candidatos de turma)
$query_consulta_turma = "SELECT * FROM usuarios WHERE nivel = 'turma' ORDER BY nome";
$res_select_turma = mysqli_query($con, $query_consulta_turma);

//query (Consulta candidatos de curso)
$query_consulta_curso = "SELECT * FROM usuarios WHERE nivel = 'curso' ORDER BY nome";
$res_select_curso = mysqli_query($con, $query_consulta_curso);

//query (Consulta candidatos de unidade)
$query_consulta_unidade = "SELECT * FROM usuarios WHERE nivel = 'unidade' ORDER BY nome";
$res_select_unidade = mysqli_query($con, $query_consulta_unidade);
?>

<div id="estrutura">
	<div id="content">

		<div class="tit_pags">Candidatos à Representante de Turma</div>

		<div class="segura_candidatos">
			<?php while ($linha_turma = mysqli_fetch_assoc($res_select_turma)) { ?>
			<div class="all_candidato">
				<div class="foto_candidato"><img src="<?=$linha_turma['foto'];?>" width='220' height='150' style=' border-radius: 5px;'></div>
				<div class="nome_candidato"><?=$linha_turma['nome'];?></div>
				<div class="proposta_candidato"><?=$linha_turma['proposta'];?></div>
			</div>
			<?php } ?>
		</div>


		<div class="tit_pags">Candidatos à Representante de Curso</div>

		<div class="segura_candidatos">
			<?php while ($linha_curso = mysqli_fetch_assoc($res_select_curso)) { ?>
			<div class="all_candidato">
				<div class="foto_candidato"><img src="<?=$linha_curso['foto'];?>" width='220' height='150' style=' border-radius: 5px;'></div>
				<div class="nome_candidato"><?=$linha_curso['nome'];?></div>
				<div class="proposta_candidato"><?=$linha_curso['proposta'];?></div>
			</div>
			<?php } ?>
		</div>


		<div class="tit_pags">Candidatos à Representande da Unidade</div>

		<div class="segura_candidatos">
			<?php while ($linha_unidade = mysqli_fetch_assoc($res_select_unidade)) { ?>
			<div class="all_candidato">
				<div class="foto_candidato"><img src="<?=$linha_unidade['foto'];?>" width='220' height='150' style=' border-radius: 5px;'></div>
				<div class="nome_candidato"><?=$linha_unidade['nome'];?></div>
				<div class="proposta_candidato"><?=$linha_unidade['proposta'];?></div>
			</div>
			<?php } ?>
		</div>

	</div>
</div>
</body>
</html>