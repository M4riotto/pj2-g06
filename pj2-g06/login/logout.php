<?php
session_start();//possibilita trabalhar com seção nesse arquivo
session_destroy();//destrói a seção
header('Location: index.php');//redireciona para a pagina selecionada
exit();