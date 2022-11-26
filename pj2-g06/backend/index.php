<?php
session_start();//iniciar uma seção
ob_start();//previnir erro de redirecionamento, limpando buffer de redirecionamento
require 'database/database.php'; // include_once = incluir apena 1 vez 
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-ico">
    <title>lOGIN</title>
</head>

<body>
            <h1>Login</h1>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);//filter_input_array = receber todos os dados do form em um array (método que esta usando, receber os dados como string)

    if (!empty($dados['SendLogin'])) { //empty = vazio || só acessa esse if qnd o usuario clicar no botao
        $query_usuario = "SELECT id, nome, usuario, senha_usuario 
                        FROM usuarios 
                        WHERE usuario = :usuario  
                        LIMIT 1"; //salvando esse texto na variavel

        $result_usuario = $connect->prepare($query_usuario);//fazendo o select no BDD
        $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);//bind param = substituir o valor
        $result_usuario->execute();//executando a query

        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){//se a qtnd de linha que encontrou no BDD for ! 0, então acessar o IF 

            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);//lendo o valor com o fetch
            //var_dump($row_usuario);

            if(password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])){//verificar a senha passando para a variavel $dados o nome do botão || $row_usuario = a senha que esta no banco de dados criptografada. Ou seja fazendo a comparação

                $_SESSION['id'] = $row_usuario['id'];//SESSION palavra reservada
                $_SESSION['nome'] = $row_usuario['nome'];//passando o id e o nome para a variavel global com a informação que vem do BDD 
                header("Location: painel.php");//se tudo der certo, redirecionar para essa pagina
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
            }
        }else{
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
        }

        
    }

    if(isset($_SESSION['msg'])){//isset = existir
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);//destrua apenas essa 
    }
    ?>
        <form method="POST" action="">     

            <label>Usuário</label>
            <input type="text" name="usuario" placeholder="Digite o usuário" value="<?php if(isset($dados['usuario'])){ echo $dados['usuario']; } ?>"><br><br><!--mantendo o que o cara digitou caso ele erre algo-->

            <label>Senha</label>
            <input type="password" name="senha_usuario" placeholder="Digite a senha" value="<?php if(isset($dados['senha_usuario'])){ echo $dados['senha_usuario']; } ?>"><br><br>

            <input type="submit" value="Acessar" name="SendLogin"><!--sendLogin nome do botão-->
        </form>
    <br><br>
    Usuário: giovanna<br>
    Senha: 21
</body>

</html>