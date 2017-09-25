<?php require('validacoes/valida_votacao.php'); ?>
<?php require('validacoes/valida_log.php'); ?>
<div class="img_admin">
		<a href="administracao.php"><img src="img/meulogo.png" width="160"></a>
		<div style="float: right; margin-right: 20px; margin-bottom: 10px;">
		<a href="admin.php"><img src="img/sair.png" width="40"></a>
		</div>
	</div>
	<div class="frase_login">
	<span class="txt_frase_login">Bem-Vindo, <?=$_SESSION['nome_usuario']?></span>
	</div>

<script language="Javascript" type="text/javascript">
function alerta0() {
  alert("A votação ainda não esta liberada!")
}
function alerta1() {
  alert("A votação está encerrada!")
}
</script>

<header>
	<div class="menu_admin">
		<?php if (($_SESSION['nivel'] == 'admin') || ($_SESSION['nivel'] == 'usuario') || ($_SESSION['nivel'] == 'turma') || ($_SESSION['nivel'] == 'unidade') || ($_SESSION['nivel'] == 'curso') || ($_SESSION['nivel'] == 'aluno')) { ?>
		<?php if ($_SESSION['liberacao'] == '0') { ?>
		<div class="item_menu_admin"><a href="#" onClick="alerta0()">VOTAÇÃO</a></div>
		<?php } ?>
		<?php if ($_SESSION['liberacao'] == '2') { ?>
		<div class="item_menu_admin"><a href="#" onClick="alerta1()">VOTAÇÃO</a></div>
		<?php } ?>
		<?php if ($_SESSION['liberacao'] == '1') { ?>
		<div class="item_menu_admin"><a href="votacao.php">VOTAÇÃO</a></div>
		<?php } ?>
		<?php } ?>
		<?php if (($_SESSION['nivel'] == 'admin') || (($_SESSION['nivel'] == 'usuario')) || (($_SESSION['nivel'] == 'turma')) || (($_SESSION['nivel'] == 'unidade')) || (($_SESSION['nivel'] == 'curso')) || (($_SESSION['nivel'] == 'aluno'))) { ?>
		<div class="item_menu_admin"><a href="candidatos.php">CANDIDATOS</a></div>
		<?php } ?>
		<?php if (($_SESSION['nivel'] == 'admin')) { ?>
		<div class="item_menu_admin"><a href="cadastro.php">CADASTRO</a></div>
		<?php } ?>
		<?php if (($_SESSION['nivel'] == 'admin')) { ?>
		<div class="item_menu_admin"><a href="configuracoes.php">CONFIGURAÇÕES</a></div>
		<?php } ?>
	</div>
</header>