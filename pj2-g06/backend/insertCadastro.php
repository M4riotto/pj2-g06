<?php
    require ('database/database.php'); 
    //Require() : a função require() importa arquivos, porém, caso o mesmo não seja encontrado, será levantado uma exceção e a execução é finalizada. Essa é uma maneira de interrompermos a execução dos scripts caso alguma anomalia ocorra.

    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"]; //name do input
    $senha = $_POST["senha"];
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $stmt = $connect->prepare("INSERT INTO usuarios (nome, usuario, senha_usuario) VALUES (:nome, :usuario, :senha_usuario)");

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha_usuario', $senhaHash);

        $stmt->execute();
        // echo "Cadastro com sucesso!";
        $id = $connect->lastInsertId();

        $result["success"]["message"] = "Cadastrado com sucesso!"; //criamos o array para devolver o resultado do insert numa mensagem de sucesso.

        $result["data"]["id"] = $id; //criamos o array para devolver o resultado do insert com os dados inseridos.
        $result["data"]["nome"] = $nome;
        $result["data"]["usuario"] = $usuario;
        $result["data"]["senha"] = $senhaHash;

        header('Content-Type: text/json'); //para ser enviado no formato json.
        echo json_encode($result); //exibir o resultado.

    } catch (PDOException $erro) {
        echo "connect failed: " . $erro->getMessage();
    }
?>
