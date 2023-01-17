<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/Config.php';
require_once BANCO_DE_DADOS;


function listarUsuarios(){
    $db = conexao();
    $sql = "SELECT * FROM usuarios";

    try{
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
        die($e->getMessage());
        //return false;
    }   
}

function buscarUsuario($id){
    $db = conexao();
    $sql = "SELECT * FROM usuarios WHERE id=:id";
    
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        die($e->getMessage());
        //return false;
    }
}

function cadastrarUsuario($usuario){
    $db = conexao();
    $sql = "INSERT INTO usuarios (id, nome, email, senha, cpf, ra_aluno, data_nascimento, data_cadastro, tipo_usuario, situacao)
                        VALUES(null,:nome, :email, :senha, :cpf, :ra_aluno, :data_nascimento, curdate(), :tipo_usuario, :situacao)";

    // $current_date = date("Y-m-d"); 

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nome', $usuario['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(':senha', $usuario['senha'], PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $usuario['cpf'], PDO::PARAM_STR);
        $stmt->bindParam(':ra_aluno', $usuario['ra_aluno'], PDO::PARAM_STR);
        $stmt->bindParam(':data_nascimento', $usuario['data_nascimento'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo_usuario', $usuario['tipo_usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':situacao', $usuario['situacao'], PDO::PARAM_STR);
        $stmt->execute();

        return true;
    } catch (\PDOException $e) {
        die($e->getMessage());

    }                        
}

function editarUsuario($usuario, $id){
    $db = conexao();

    $sql = "UPDATE usuarios SET
                                nome=:nome,
                                email=:email,
                                senha=:senha,
                                cpf=:cpf,
                                ra_aluno=:ra_aluno,
                                data_nascimento=:data_nascimento,
                                tipo_usuario=:tipo_usuario,
                                situacao=:situacao
                            WHERE id=:id";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nome', $usuario['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(':senha', $usuario['senha'], PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $usuario['cpf'], PDO::PARAM_STR);
        $stmt->bindParam(':ra_aluno', $usuario['ra_aluno'], PDO::PARAM_STR);
        $stmt->bindParam(':data_nascimento', $usuario['data_nascimento'], PDO::PARAM_STR);
        $stmt->bindParam(':tipo_usuario', $usuario['tipo_usuario'], PDO::PARAM_STR);
        $stmt->bindParam(':situacao', $usuario['situacao'], PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}


function deletarUsuario($id){
    $db = conexao();

    $sql = "DELETE FROM usuarios WHERE id=:id";

    try{
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}