<div class="col-12">
    <label for="titulo">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control" value="<?=$usuarios['nome'] ?? '' ?>" placeholder="Digite o nome completo" autofocus>

</div>

<div class="col-12">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="<?=$usuarios['email'] ?? '' ?>" placeholder="Digite o email">
</div>
<div class="col-12">
    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" class="form-control" value="<?=$usuarios['senha'] ?? '' ?>" placeholder="Digite uma senha">
</div>
<div class="col-12">
    <label for="cpf">CPF</label>
    <input type="text" name="cpf" id="cpf" class="form-control" value="<?=$usuarios['cpf'] ?? '' ?>" placeholder="Digite o CPF">
</div>
<div class="col-12">
    <label for="ra">RA</label>
    <input type="text" name="ra" id="ra" class="form-control" value="<?=$usuarios['ra'] ?? '' ?>" placeholder="Digite o RA">
</div>
<div class="col-12">
    <label for="dtnascimento">Data da Nascimento</label>
    <input type="date" name='dtnascimento' id="dtnascimento" class="form-control col-sm-4" value="<?=$usuarios['dtnascimento'] ?? '' ?>" placeholder="Insira a Data de Nascimento">
</div>

<div class="col-12">
    <label for="nivel">Nível</label>
    <select class="form-select" aria-label="Selecione o Nível" name="nivel" id="nivel">
        <option value="<?=$usuarios['nivel'] ?? '' ?>" selected>Aluno</option>
        <option value="2">Professor</option>
        <option value="3">Gestor</option>
    </select>
</div>

<div class="col-12">
    <label for="situacao">Situação</label>
    <select class="form-select" aria-label="Selecione a Situação" name="situacao" id="situacao">
        <option value="<?=$usuarios['situacao'] ?? '' ?>" selected>Ativo</option>
        <option value="2">Inativo</option>
        <option value="3">Inadimplente</option>
    </select>
</div>

<div class="col-12">
    <button class="btn btn-primary" type="submit">Salvar</button>
    <a class="btn btn-light" href="/admin/usuarios/index.php">Cancelar</a>
</div>