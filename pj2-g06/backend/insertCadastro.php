<?php
    require ('database/database.php'); 
    //Require() : a função require() importa arquivos, porém, caso o mesmo não seja encontrado, será levantado uma exceção e a execução é finalizada. Essa é uma maneira de interrompermos a execução dos scripts caso alguma anomalia ocorra.

    $usuario = $_POST["usuario"]; //name do input
    $senha = $_POST["senha"];

    try {
        $stmt = $connect->prepare("INSERT INTO usuario (usuario, senha) VALUES (':usuario', md5(':senha'));");

        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senha);

        $stmt->execute();
        // echo "Cadastro com sucesso!";
        $id = $connect->lastInsertId();

        $result["success"]["message"] = "Cadastrado com sucesso!"; //criamos o array para devolver o resultado do insert numa mensagem de sucesso.

        $result["data"]["id"] = $id; //criamos o array para devolver o resultado do insert com os dados inseridos.
        $result["data"]["usuario"] = $usuario;
        $result["data"]["senha"] = $csenhaapa;

        header('Content-Type: text/json'); //para ser enviado no formato json.
        echo json_encode($result); //exibir o resultado.

    } catch (PDOException $erro) {
        echo "connect failed: " . $erro->getMessage();
    }
?>
