<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/Config.php';
require_once BANCO_DE_DADOS;
/**
 * função responsavel por rodar um select que puxa todos os projetos do banco
 * @return array
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
    }
}
/**
 * Função responsável por buscar um projeto e trocar o valor recebido no argumento pela condição da where
 * @param int $id
 * @return int $id
 */
function buscarProjeto($id){
    $db = conexao();

    $sql = "SELECT * FROM projeto WHERE id=:id";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function CadastrarProjeto($projeto){
    $db = conexao();

    $sql = "INSERT INTO projeto (id, nome,descricao,titulo,subtitulo,dtinicio,dtfinal,dtultimaalteracao,status, idgrupo, idsubcategoria)
                    VALUES(null, :nome, :descricao, :titulo, :subtitulo, curdate(), :dtfinal, curdate(), :status, idgrupo, idsubcategoria)";

    try {
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nome', $projeto['nome'], PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $projeto['descricao'], PDO::PARAM_STR);
        $stmt->bindParam(':titulo', $projeto['titulo'], PDO::PARAM_STR);
        $stmt->bindParam(':subtitulo', $projeto['subtitulo'], PDO::PARAM_STR);
        $stmt->bindParam(':dtfinal', $projeto['dtfinal'], PDO::PARAM_STR);
        $stmt->bindParam(':status', $projeto['status'], PDO::PARAM_INT);
        $stmt->bindParam(':idgrupo', $projeto['idgrupo'], PDO::PARAM_INT);
        $stmt->bindParam(':idsubcategoria', $projeto['idsubcategoria'], PDO::PARAM_INT);

        return true;
    } catch (\PDOException $e) {
        die($e->getMessage());
    }

}