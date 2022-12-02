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
    <!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico"> -->
    <title>PAINEL</title>
    <link rel="stylesheet" href="../assets/custom.css">
    <link rel="stylesheet" href="../assets/custom_painel.css">
</head>

<body >
    <header>
        <h2>Olá, <span><?php echo $_SESSION['nome'];?>!</span></h2><!--pegando a variavel global e o que esta salvo como o nome da pessoa-->
        <h2><a href="logout.php">Sair</a></h2>
        <a href="Eventos_Cadastrados.php"><h2>Eventos Cadastrados</h2></a>
    </header>

    <div class="caixa">
        <form onsubmit="insertEventos(event)">
            <h2>Cadastrar Evento</h2><br>
            <p class="p1">Cadastre o <span id="numero">1</span>º evento</p>
            <p class="p1" id="cx"></p>

            <label for="POST-name">Nome:</label>
            <input id="POST-name" type="text" name="nome"><br>

            <label for="POST-name">Capa:</label>
            <input id="POST-name" type="text" name="capa"><br>

            <div class="cx1">
                <label for="POST-name">Categoria:</label>
                <select name="categoria" id="POST-name">
                    <option value="selecione" selected disabled>Selecione</option>
                    <option value="festas">Festas</option>
                    <option value="halloween">Halloween</option>
                    <option value="palestras">Palestras</option>
                    <option value="standUP">StandUP</option>
                    <option value="workshops">Workshops</option>
                </select>

                <label for="POST-name">Limite de Pessoas:</label>
                <input type="number" name="limiteP" id="POST-name">
            </div><br>

            <div class="cx1">
                <label for="POST-name">Data:</label>
                <input id="POST-name" type="date" name="dia">

                <label for="POST-name">Horário:</label>
                <input id="POST-name" type="time" name="horario">
            </div><br>

            <label for="POST-name">Local:</label>
            <input type="text" name="endereco" id="POST-name"><br>

            <div class="cx1">
                <label for="POST-name">Município:</label>
                <input type="text" name="municipio" id="POST-name">

                <label for="POST-name">UF:</label>
                <select id="POST-name" name="uf">
                    <option value="selecione" selected disabled >Selecione</option>
                    <option value="AC">AC</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AM">AM</option>
                    <option value="BA">BA</option>
                    <option value="CE">CE</option>
                    <option value="ES">ES</option>
                    <option value="GO">GO</option>
                    <option value="MA">MA</option>
                    <option value="MT">MT</option>
                    <option value="MS">MS</option>
                    <option value="MG">MG</option>
                    <option value="PA">PA</option>
                    <option value="PB">PB</option>
                    <option value="PR">PR</option>
                    <option value="PE">PE</option>
                    <option value="PI">PI</option>
                    <option value="RJ">RJ</option>
                    <option value="RN">RN</option>
                    <option value="RS">RS</option>
                    <option value="RO">RO</option>
                    <option value="RR">RR</option>
                    <option value="SC">SC</option>
                    <option value="SP">SP</option>
                    <option value="SE">SE</option>
                    <option value="TO">TO</option>
                    <option value="DF">DF</option>                    
                </select>
            </div><br>

            <label for="POST-name">Descrição:</label><br>
            <textarea name="descricao" id="POST-name" cols="50" rows="5"></textarea><br>

            <input id="enviar" type="submit" value="Cadastrar" onclick="botoes();">   
        </form>
    </div> <br><br>
<hr>
    <div class="caixa2">
        <form onsubmit="insertParticipantes(event)">
            <h2>Cadastrar Participantes</h2><br>

            <label for="POST-name">CPF:</label>
            <input type="text" id="POST-name" name="cpf"><br>

            <label for="POST-name">Nome:</label>
            <input type="text" id="POST-name" name="nomeP"><br>

            <label for="POST-name">Sexo:</label>
            <select name="sexo" id="POST-name">
                <option value="selecione" selected disabled>Selecione</option>
                <option value="feminino">F</option>
                <option value="masculino">M</option>
                <option value="indefinido">I</option>
            </select><br>

            <label for="POST-name">Descrição:</label>
            <textarea name="descricaoP" id="POST-name" cols="30" rows="10"></textarea><br>

            <input id="cadastrar" type="submit" value="Cadastrar">
        </form>
    </div>
<hr>
    <div class="caixa3">
        <label>Pague R$5,00 para cadastrar uma a capa do seu evento em nosso Slide principal por 1 dia</label>
        <input type="button" value="Pagar" id="pagar" onclick="imagem_slide()">
        <a href="#modal-cadastrarIMG"><input type="button" id="cadastrar-img" value="Clique aqui e Cadastre" disabled="disabled" onclick="showModalCadastrar('#modal-cadastrarIMG')"></input></a>
    </div>

    <!--modal cadastrar-->
  <div class="modal" id="modal-cadastrarIMG" onclick="hideModalCadastrar('#modal-cadastrarIMG', event)">
    <div class="modal-body">
        <h1>Cadastrar imagem</h1>
        <form onsubmit="insertSlide(event)">
          <label for="capa">Capa:</label>
          <input type="text" name="capa" required placeholder="Cole link de imagem">
          <label for="titulo">Titulo do evento:</label>
          <input type="text" name="titulo" placeholder="Um titulo de até 20 letras">
          <label for="descricao">Descrição:</label>
          <input type="text" name="descricao" placeholder="Uma descrição de até 50 letras">  <br>       
          <input type="submit" value="Cadastrar" onclick="closeAllModalCadastrar()"></input>
        </form>
    </div>
</div>

    <script src="../assets/script.js"></script>
</body>
</html>