<h1 class="page-header">Relatórios</h1>
<form action="<?= base_url('admin/relatorios/mostra_relatorio') ?>"  method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <label for="exampleInputEmail1">Mapas</label>
            <select class="form-control" name="mapas">
                <option value="#">Selecione uma opcao</option>
                <?php foreach ($mapas as $row): ?>
                    <option value="<?= $row->id ?>"><?= $row->nome ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <label for="exampleInputEmail1">Dimensões</label>
            <select class="form-control" name="dimensoes">
                <option value="#">Selecione uma opcao</option>
                <?php foreach ($dimensoes as $r): ?>
                    <option value="<?= $r->id ?>"><?= $r->nome_dimensao ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <?php //var_dump($data)?>
    <input type="hidden" name="usuario" value="<?= $this->session->userdata('id') ?>">
    <button type="submit" class="btn btn-success">Enviar</button>
</form>