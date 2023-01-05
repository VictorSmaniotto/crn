<?php


require_once 'helpers/Config.php';

include_once CABECALHO;
?>

<main class="container">
    <h1 class="text-primary text-center mt-5">Projeto Chronos</h1>
    <p>Página em Desenvolvimento...</p>

<div class="row">

<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

    <h3 class="text-center mt-5 mb-3">Acessar</h3>
    <div class="text-center mb-5">
        <img src="assets/img/logoChronos.png" alt="" width="180">
    </div>
    

    <div class="alert alert-danger text-center">
        Usuário ou senha inválido!
    </div>

    <form action="#" method="post" class="row g-3">
        <div class="col-12">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="" class="form-control" placeholder="Digite seu E-mail" autofocus>

        </div>

        <div class="col-12">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" value="" class="form-control" placeholder="Digite sua senha">
        </div>


        <div class="col-12 mt-3 mb-3 form-check">
            <input type="checkbox" name="manterLogado" class="custom-control-input" id="lembrame">
            <label class="custom-control-label" for="lembrame">Lembra-me</label>
        </div>


        <div class="col-12">
            <button class="btn btn-lg btn-primary w-100" type="submit">Entrar</button>
        </div>

    </form>

</div>

</div>
</main>



<?php include_once RODAPE;?>