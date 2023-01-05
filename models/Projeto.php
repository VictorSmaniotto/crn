<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/Config.php';
require_once BANCO_DE_DADOS;
/**
 * função responsavel por rodar um select que puxa todos os projetos do banco
 * @return array
 * @return bool
 */
function listarProjetos(){
    $db = conexao();

    $sql = "SELECT * FROM projeto";

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}
/**
 * Função responsável por buscar um projeto e trocar o valor recebido no argumento pela condição da where
 * @param int $id
 * @return int $id
 * @return bool
 */
function buscarProjeto($id){
    $db = conexao();

    $sql = "SELECT * FROM projeto WHERE id:=id";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fecth(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
        return false;
    }
}