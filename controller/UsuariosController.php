<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/Config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Usuarios.php';


function index(){
    $usuario = listarUsuarios();
    return $usuario;
}

function visualizar($id){
    $usuario = buscarUsuario($id);
    return $usuario;
}

function cadastrar(){
    $usuario = [];

    if(!empty($_POST)){
        $usuario = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'cpf' => $_POST['cpf'],
            'ra_aluno' => $_POST['ra_aluno'],
            'data_nascimento' => $_POST['data_nascimento'],
            'tipo_usuario' => $_POST['tipo_usuario'],
            'situacao' => $_POST['situacao']
        ];

        if(cadastrarUsuario($usuario)){
            header('Location:/admin/usuarios');
            exit;
        }
    }
    return $usuario;    
}

function editar($id){
    $usuario = buscarUsuario($id);

    if(!empty($_POST)){
        $usuario = [
            'nome'=>$_POST['nome'],
            'email'=>$_POST['email'],
            'senha'=>$_POST['senha'],
            'cpf'=>$_POST['cpf'],
            'ra_aluno'=>$_POST['ra_aluno'],
            'data_nascimento'=>$_POST['data_nascimento'],
            'tipo_usuario'=>$_POST['tipo_usuario'],
            'situacao'=>$_POST['situacao']
        ];

        if(editarUsuario($usuario, $id)){
            header('Location:/admin/usuarios');
            exit;
        }
    }
    return $usuario;
}

function deletar($id){
    if(deletarUsuario($id)){
        header('Location:/admin/usuarios');
        exit;
    }
}