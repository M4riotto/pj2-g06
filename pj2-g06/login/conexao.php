<?php
define('HOST', '127.0.0.1');/*cria uma constante que pode ser acessada*/
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'login');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar'); /* die é como se fosse o else do ifelse */