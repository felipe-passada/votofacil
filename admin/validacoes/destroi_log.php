<?php 
session_start();
if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
	unset($_SESSION['login']);
	unset($_SESSION['senha']);
}
?>