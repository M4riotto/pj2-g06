<?php
session_start();
ob_start();
include_once 'database/database.php';

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))){//isset = existir
    $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Necessário realizar o login para acessar a página!</p>";
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <title>PAINEL</title>
</head>
<style>
    *{
        margin:0;
        padding:0;
    }

    form{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    span{
        color: red;
    }

    header{
        display: flex;
        justify-content: space-around;
        align-items: center;
        background-color: green;
        height: 80px;
    }
</style>
<body >
    <header>
        <h2>Olá, <span><?php echo $_SESSION['nome'];?>!</span></h2><!--pegando a variavel global e o que esta salvo como o nome da pessoa-->
        <h2><a href="logout.php">Sair</a></h2>
    </header>   
<br><br>
        
        <form onsubmit="insertEventos(event)">
            <h2>Cadastro de evento</h2>
            <label for="POST-name">Nome do evento:</label>
            <input id="POST-name" type="text" name="nome">
            <br>
            <label for="POST-name">Capa do evento:</label>
            <input id="POST-name" type="text" name="capa">
            <br>
            <label for="POST-name">Descrição:</label>
            <input id="POST-name" type="text" name="descricao">
            <br>
            <label for="POST-name">Data:</label>
            <input id="POST-name" type="text" name="dia">
            <br>
            <label for="POST-name">Horario:</label>
            <input id="POST-name" type="text" name="horario">
            <br>
            <input type="submit" value="Enviar">          
        </form>

        <script src="../assets/script.js"></script>
</body>
</html>