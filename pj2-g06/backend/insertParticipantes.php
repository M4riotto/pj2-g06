<?php
    require ('database/database.php'); 
    //Require() : a função require() importa arquivos, porém, caso o mesmo não seja encontrado, será levantado uma exceção e a execução é finalizada. Essa é uma maneira de interrompermos a execução dos scripts caso alguma anomalia ocorra.

    $cpf = $_POST["cpf"]; //name do input
    $nome = $_POST["nome"];
    $sexo = $_POST["sexo"]; 
    $descricao = $_POST["descricao"];

    try {
        $stmt = $connect->prepare("INSERT INTO participantes (cpf, nome, sexo, descricao)
        VALUES (:cpf, :nome, :sexo, :descricao)");
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':descricao', $descricao);
        
        $stmt->execute();
        // echo "Cadastro com sucesso!";
        $id = $connect->lastInsertId();

        $result["success"]["message"] = "Cadastrado com sucesso!"; //criamos o array para devolver o resultado do insert numa mensagem de sucesso.

        $result["data"]["id"] = $id; //criamos o array para devolver o resultado do insert com os dados inseridos.
        $result["data"]["cpf"] = $cpf;
        $result["data"]["nome"] = $nome;
        $result["data"]["sexo"] = $sexo;
        $result["data"]["descricao"] = $descricao;
        
        header('Content-Type: text/json'); //para ser enviado no formato json.
        echo json_encode($result); //exibir o resultado.
    } catch (PDOException $erro) {
        echo "connect failed: " . $erro->getMessage();
    }
?>