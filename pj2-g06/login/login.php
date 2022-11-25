<?php
session_start(); /* serve para iniciar uma sessão */
require('conexao.php');//junta o código do outro arquivo

if(empty($_POST['usuario']) || empty($_POST['senha'])) {//empty = vazio
	header('Location: index.php'); /* se estiver vazio é para retornar para index.php */
	exit(); /* como se fosse o break */
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);// mysqli_real_escape_string: evita erros do sql ;
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select usuario from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')"; /* query: consulta.
md5: ele criptografica a senha. */

$result = mysqli_query($conexao, $query);//A consulta acontece. $conexao passará conexao com o banco, após isso $query passará o que está em cima na variavel.

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