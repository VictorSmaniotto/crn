<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Projeto.php';

/**
 * Função responsável por retornar os projetos na view index
 * @return string
 */
function index(){
    $projeto = listarProjetos();
    return $projeto;
}
/**
 * Summary of visualizar
 * @param mixed $id
 * @return bool
 */
function visualizar($id){
    $projeto = buscarProjeto($id);
    return $projeto;
}