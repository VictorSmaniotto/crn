<div class="col-12">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control" value="" placeholder="Digite o nome">
    
    <div class="col-12">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" class="form-control" rows="5"></textarea>
    </div>

<div class="col-12">
    <label for="titulo">Titulo</label>
    <input type="text" name="titulo" id="titulo" class="form-control" value="" placeholder="Digite o titulo">

<div class="col-12">
    <label for="subtitulo">Subtitulo</label>
    <input type="text" name="subtitulo" id="subtitulo" class="form-control" value="" placeholder="Digite o subtitulo">
</div>

<div class="col-4">
    <label for="dtfinal">Data Final</label>
    <input type="date" name='dtfinal' id="dtfinal" class="form-control col-sm-4" value="" placeholder="Insira a Data Final do Projeto">
</div>

<div class="col-12">
    <label for="status">Status</label>
    <select class="form-select" aria-label="Selecione o Status" name="status" id="status">
        <option value="1" selected>Iniciado</option>
        <option value="2">Em Andamento</option>
        <option value="3">Finalizado</option>
    </select>
</div>


<div class="col-12">
    <label for="idgrupo">Grupo</label>
    <input type="number" name="idgrupo" id="igrupo" class="form-control" value="" placeholder="Digite o Grupo" >
</div>


<div class="col-12">
    <label for="idsubcategoria">Subcategoria</label>
    <input type="number" name="idsubcategoria" id="idsubcategoria" class="form-control" value="" placeholder="Digite a Subcategoria">
</div>

<div class="col-12">
    <button class="btn btn-primary" type="submit">Salvar</button>
    <a class="btn btn-light" href="/admin/projeto/index.php">Cancelar</a>
</div>