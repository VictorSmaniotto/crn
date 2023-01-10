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

function visualizar($id){
    $projeto = buscarProjeto($id);
    return $projeto;
}

function cadastrar(){
    $projeto = [];

    if(!empty($_POST)){
        $projeto = [
            'nome'=>$_POST['nome'],
            'descricao'=>$_POST['descricao'],
            'titulo'=>$_POST['titulo'],
            'subtitulo'=>$_POST['subtitulo'],
            'dtfinal'=>$_POST['dtfinal'],
            'status'=>$_POST['status'],
            'idgrupo'=>$_POST['idgrupo'],
            'idsubcategoria'=>$_POST['idsubcategoria']
        ];

        if(cadastrarProjeto($projeto)){
            header('Location:/admin/projeto');
            exit;
        }
    }

    return $projeto;
}