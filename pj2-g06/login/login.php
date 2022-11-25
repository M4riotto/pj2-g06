<?php
session_start();
require('conexao.php');//junta o código do outro arquivo

if(empty($_POST['usuario']) || empty($_POST['senha'])) {//empty = vazio
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);//evita erros do sql ;
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);//A consulta acnotece

$row = mysqli_num_rows($result);//numero de linha retornadas

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	$_SESSION['logado'] = true;//se logado verdade
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['logado'] = false;//se não falso
	$_SESSION['usuario'] = '';
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}