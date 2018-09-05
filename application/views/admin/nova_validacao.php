<h1 class="page-header">Avaliação de Mapas de Aprendizagem</h1>

<form action="<?= base_url('admin/questionario/dimensoes_mapas/'.$dimensao) ?>"  method="post" enctype="multipart/form-data">
    <!--<div class="row">
        <div class="col-sm-12">
            <label for="exampleInputEmail1">Dimensões</label>
            <select class="form-control" name="dimensoes">
                <option value="#">Selecione uma opcao</option>
                <?php //foreach ($dimensoes as $row): ?>
                    <option value="<?php //$row->id ?>"><?php //$row->nome_dimensao ?></option>
                <?php //endforeach; ?>
            </select>
        </div>
    </div>-->
    <div class="row">
        <div class="col-sm-12">
            <label for="exampleInputEmail1">Mapas</label>
            <select class="form-control" name="mapas">
                <option value="#">Selecione uma opção</option>
                <?php foreach ($mapas as $row): ?>
                    <option value="<?= $row->id ?>"><?= $row->nome ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
    <button type="reset" class="btn btn-danger" onclick="return confirm('Deseja realmente limpar o formulário?')">Limpar</button>
</form>