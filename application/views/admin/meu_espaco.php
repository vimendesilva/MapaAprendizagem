<h1 class="page-header">Meu Espaço</h1>
<?php if (isset($alert)) { ?>
    <div class="alert alert-<?php
    $a = explode('-', isset($alert) ? $alert : '');
    echo $a[0];
    ?>">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php
        $a = explode('-', isset($alert) ? $alert : '');
        echo $a[1];
        ?>
    </div>
<?php } ?>
<div class="bs-example" data-example-id="striped-table"> 
    <div class="row">
        <div class="col-sm-12">
            <a href="<?= base_url('admin/mapas/meus_mapas/' . $this->session->userdata('id')) ?>" class="btn btn-info">Meus Mapas</a>
            <a href="<?= base_url('admin/questionario/mapa') ?>" class="btn btn-info">Nova Validação</a>
            <!--<a href="<?= base_url('admin/questionario') ?>" class="btn btn-info">Ver Validações</a>-->
        </div>
    </div>
</div>


