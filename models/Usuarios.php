<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/Config.php';
require_once BANCO_DE_DADOS;


function listarUsuarios(){
    $db = conexao();
    $sql = "SELECT * FROM usuario";

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
    $sql = "SELECT * FROM usuario WHERE id=:id";
    
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
    $sql = "INSERT INTO usuario (id, nome, email, senha, cpf, ra, dtnascimento, dtcadastro, nivel, situacao)
                        VALUES(null,:nome, :email, :senha, :cpf, :ra, :dtnascimento, curdate(), :nivel, :situacao)";

    // $current_date = date("Y-m-d"); 

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nome', $usuario['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(':senha', $usuario['senha'], PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $usuario['cpf'], PDO::PARAM_STR);
        $stmt->bindParam(':ra', $usuario['ra'], PDO::PARAM_STR);
        $stmt->bindParam('dtnascimento', $usuario['dtnascimento'], PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $usuario['nivel'], PDO::PARAM_INT);
        $stmt->bindParam(':situacao', $usuario['situacao'], PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (\PDOException $e) {
        die($e->getMessage());

    }                        
}

function editarUsuario($usuario, $id){
    $db = conexao();

    $sql = "UPDATE usuario SET
                                nome=:nome,
                                email=:email,
                                senha=:senha,
                                cpf=:cpf,
                                ra=:ra,
                                dtnascimento=:dtnascimento,
                                nivel=:nivel,
                                situacao=:situacao
                            WHERE id=:id";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nome', $usuario['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $usuario['email'], PDO::PARAM_STR);
        $stmt->bindParam(':senha', $usuario['senha'], PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $usuario['cpf'], PDO::PARAM_STR);
        $stmt->bindParam(':ra', $usuario['ra'], PDO::PARAM_STR);
        $stmt->bindParam('dtnascimento', $usuario['dtnascimento'], PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $usuario['nivel'], PDO::PARAM_INT);
        $stmt->bindParam(':situacao', $usuario['situacao'], PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        die($e->getMessage());
    }

}


function deletarUsuario($id){
    $db = conexao();

    $sql = "DELETE FROM usuario WHERE id=:id";

    try{
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    }catch(PDOException $e){
        die($e->getMessage());
    }
}