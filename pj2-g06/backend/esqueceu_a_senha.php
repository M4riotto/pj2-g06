<?php
    require "database/database.php";
    
    $email = filter_input_array(INPUT_POST, FILTER_DEFAULT);;
    if (!empty($email['ok'])) { //empty = vazio || só acessa esse if qnd o usuario clicar no botao
        $query_senha = "SELECT id, senha_usuario 
                          FROM usuarios 
                          WHERE email = :email 
                          LIMIT 1"; //salvando esse texto na variavel

        $query_alter = $connect->prepare($query_senha);//fazendo o select no BDD
        $query_alter->bindParam(':email', $email['email'], PDO::PARAM_STR);//bind param = substituir o valor
        $query_alter->execute();//executando a query

            if(($query_alter) AND ($query_alter->rowCount() != 0)){//se a qtnd de linha que encontrou no BDD for ! 0,     então acessar o IF 
            
                $row_usuario = $query_alter->fetch(PDO::FETCH_ASSOC);//lendo o valor com o fetch
                //var_dump($row_usuario);
                if($row_usuario == 0)
                $erro[] = "o email informado nao existe";

                if (!isset($erro) && $row_usuario != 0) {
                    $novasenha = substr(md5(time()), 0, 6);
                    $senhacripto = md5(md5($novasenha));
//mail($email, "Sua nova senha", "Sua nova senha é: ".$senhacripto)
                    if (1==1) {
                        $stmt = "UPDATE usuarios set senha_usuario = '$senhacripto' WHERE email = '$email[email]'";
                        
                        $update = $connect->prepare($stmt);//fazendo o select no BDD
                        $update->bindParam(':senha_usuario', $email['senha'], PDO::PARAM_STR);//bind param = substituir o valor
                        $query_alter->execute();
                                }
                }
    }}

?>

<!DOCTYPE html>
<html lang="pt - BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de senha</title>
</head>
<body>
    <form action="" method="post">
        <label for="email"></label>
        <input type="email" name="email" placeholder="Digite seu e-mail">
        <label for="senha"></label>
        <input type="password" name="senha" placeholder="Digite sua nova senha">
        <button type="submit" name="ok" value="ok">ok</button>
    </form>
    
</body>
</html>