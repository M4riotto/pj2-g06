<?php
include('verifica_login.php');
?>

<!DOCTYPE html>
<html lang="pt - BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--link do boots-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>painel</title>
</head>
<style>
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<body >
    <header>
        <h2>Olá, <?php echo $_SESSION['usuario'];?></h2>
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