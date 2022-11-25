<?php
session_start();
if(!$_SESSION['logado']) {//se logado = false, redireciona para pagina indicada
	header('Location: index.php');
	exit();
}//verifica se o usuario esta logado || require em paginas que precisam estar autenticado