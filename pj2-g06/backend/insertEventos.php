<?php
    require ('database/database.php'); 
    //Require() : a função require() importa arquivos, porém, caso o mesmo não seja encontrado, será levantado uma exceção e a execução é finalizada. Essa é uma maneira de interrompermos a execução dos scripts caso alguma anomalia ocorra.

    $nome = $_POST["nome"]; //name do input
    $descricao = $_POST["descricao"];
    $dia = $_POST["dia"];
    $horario = $_POST["horario"];
    $capa = $_POST["capa"];

    try {
        $stmt = $connect->prepare("INSERT INTO eventos (nome, descricao, dia, horario, capa)
        VALUES (:nome, :descricao, :dia, :horario, :capa)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':dia', $dia);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':capa', $capa);

        $stmt->execute();
        // echo "Cadastro com sucesso!";
        $id = $connect->lastInsertId();

        $result["success"]["message"] = "Cadastrado com sucesso!"; //criamos o array para devolver o resultado do insert numa mensagem de sucesso.

        $result["data"]["id"] = $id; //criamos o array para devolver o resultado do insert com os dados inseridos.
        $result["data"]["nome"] = $nome;
        $result["data"]["capa"] = $capa;
        $result["data"]["descricao"] = $descricao;
        $result["data"]["dia"] = $dia;
        $result["data"]["horario"] = $horario;

        header('Content-Type: text/json'); //para ser enviado no formato json.
        echo json_encode($result); //exibir o resultado.

    } catch (PDOException $erro) {
        echo "connect failed: " . $erro->getMessage();
    }
?>
