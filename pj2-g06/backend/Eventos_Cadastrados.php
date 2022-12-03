<?php
    session_start();
    ob_start();
    include_once 'database/database.php';

    require 'login/confirmacao_login.php';   
?>

<!DOCTYPE html>
<html lang="pt - BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto Integrador II</title>

  <!--css bots-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!--js boot-->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets/custom.css">
</head>
<body onload="loadEventosPainel()">
  <div class="wrapper">
  <header>
        <h2>Olá, <span><?php echo $_SESSION['nome'];?>!</span></h2><!--pegando a variavel global e o que esta salvo como o nome da pessoa-->
        <h2><a href="logout.php">Sair</a></h2>
        <a href="painel.php">Voltar para o cadastro</a>
    </header>

  <!--categorias-->
  <div class="categoria m-0 mt-3 mb-3">
    <div class="botoes_categoria">
      <button class="ml-3">Categorias</button>
      <!-- <button class="mr-3">Ver tudo</button> -->
    </div>
    
    <div class="cat justify-content-between">
      <a href="#festas"><img src="../img/categoria.png" alt="Categoria x" width="115" height="150"></a>
      <a href="#palestras"><img src="../img/categoria.png" alt="Categoria x" width="115" height="150"></a>
      <a href="#halloween"><img src="../img/categoria.png" alt="Categoria x" width="115" height="150"></a>
      <a href="#standUP"><img src="../img/categoria.png" alt="Categoria x" width="115" height="150"></a>
      <a href="#workshops"><img src="../img/categoria.png" alt="Categoria x" width="115" height="150"></a>
    </div><!-- .cat -->
  </div> <!-- .categoria -->

  <!-- Carousel -->
  <div class="carousel slide mb-4" id="carouselhome" data-ride="carousel">
    <!-- div que irá sustentar as imagens e textos do carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/carousel0.jpg" alt="" class="img-fluid d-block">
        <div class="carousel-caption d-none d-block">
          <h3>Lorem ipsum.</h3>
          <p class="d-none d-sm-block">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
      </div> <!-- Item 1 do carousel -->
      <div class="carousel-item">
        <img src="../img/carousel1.jpg" alt="" class="img-fluid d-block">
        <div class="carousel-caption d-none d-block">
          <h3>Esse, ipsam</h3>
          <p class="d-none d-sm-block">Maxime cum commod filum exercitationem temporibus assumenda.</p>
        </div>
      </div> <!-- Item 2 do carousel -->
      <div class="carousel-item">
        <img src="../img/carousel2.jpg" alt="" class="img-fluid d-block">
        <div class="carousel-caption d-none d-block">
          <h3>Esse, ipsam</h3>
          <p class="d-none d-sm-block">Maxime cum commod filum exercitationem temporibus assumenda.</p>
        </div>
      </div> <!-- Item 3 do carousel -->

      <!-- Controles '<' '>' dos slides -->
      <a href="#carouselhome" class="carousel-control-prev" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a href="#carouselhome" class="carousel-control-next" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Próximo</span>
      </a>

      <!-- Lista com os indicadores '...' -->
      <ol class="carousel-indicators">
        <li class="active" data-target="#carouselhome" data-slide-to="0"></li>
        <li data-target="#carouselhome" data-slide-to="1"></li>
        <li data-target="#carouselhome" data-slide-to="2"></li>
      </ol>
    </div> <!-- <div class="carousel-inner"> -->
  </div> <!-- Carousel -->

  <!--divs das categorias para js--> <!-- Aqui irá aparecer os cards -->
  <div id="corpo1">
    <h2>festas</h2>
    <div id="festas"></div>
    <h2>palestras</h2>
    <div id="palestras"></div>
    <h2>halloween</h2>
    <div id="halloween"></div>
    <h2>standUP</h2>
    <div id="standUP"></div>
    <h2>workshops</h2>
    <div id="workshops"></div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-facebook-f"></i>
        </a>
        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-twitter"></i>
        </a>
        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-google"></i>
        </a>
        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-instagram"></i>
        </a>
        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
          <i class="fab fa-github"></i>
        </a>
      </section>
      <!-- Section: Social media -->
      <!-- Section: Form -->
      <section class="">
        <form action="">
          <!--Grid row-->
          <div class="row d-flex justify-content-center">
            <!--Grid column-->
            <div class="col-auto">
              <p class="pt-2">
                <strong>Entre em contato conosco</strong>
              </p>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-5 col-12">
              <!-- Email input -->
              <div class="form-outline form-white mb-4">
                <input class="form-control" type="email" id="form5Example21" placeholder="email@gmail.com"/>
                <br>
                <textarea name="" id="" cols="60" rows="5" placeholder="Digite aqui..."></textarea>
                <!--Grid column-->
                <div class="col-auto">
                  <!-- Submit button -->
                  <button class="btn btn-outline-light mb-4" type="submit">
                    Contatar
                  </button>
                </div>
              </div>
            </div>
            <!--Grid column-->
          </div>
        <!--Grid row-->
        </form>
      </section>
      <!-- Section: Form -->
      <!-- Section: Text -->
      <section class="mb-4">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
          repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
          eum harum corrupti dicta, aliquam sequi voluptate quas.
        </p>
      </section>
      <!-- Section: Text -->
    </div>
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center text-muted footer-bg-color p-3">
      © 2022 Copyright | Giovanna Siqueira and Vítor Moreira
    </div>
    <!-- Copyright -->
    

  <!--modal cadastrar-->
  <div class="modal" id="modal-editar" onclick="hideModalCadastrar('#modal-editar', event)" style="height:1500px;">
    <div class="modal-body">
        <h1>Cadastro</h1>
        <form onsubmit="editEvento(event)">
                    <h1>Editar Evento</h1>

                    <label for="POST-name">Titulo:</label>
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

            <label for="POST-name">Descrição:</label>
            <textarea name="descricao" id="POST-name" cols="50" rows="5"></textarea>

            <h2>Editar Participantes</h2><br>

            <label for="POST-name">CPF:</label>
            <input type="text" id="POST-name" name="cpf"><br>

            <label for="POST-name">Nome:</label>
            <input type="text" id="POST-name" name="nomeP"><br>

            <label for="POST-name">Sexo:</label>
            <select name="sexo" id="POST-name">
                <option value="selecione" selected disabled>Selecione</option>
                <option value="feminino">F</option>
                <option value="masculino">M</option>
            </select>

            <label for="POST-name">Descrição:</label>
            <textarea name="descricaoP" id="POST-name" cols="30" rows="10"></textarea><br>

            <input tyjpe="hidden" name="id"/>

            <input id="cadastrar" type="submit" value="Cadastrar">
                    </form>
                </div>
            </div>
<script src="../assets/script.js"></script>
<!-- <script src="assets/script/main.js"></script> -->
</body>
</html>