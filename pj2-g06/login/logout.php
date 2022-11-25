<?php
/* Lá no botão sair quando o usuario está logado, ele iniciará uma seção e verificará as seções abertas e depois destroirá todas elas */
session_start();//possibilita trabalhar com seção nesse arquivo
session_destroy();//destrói a seção
header('Location: index.php');//redireciona para a pagina selecionada
exit();