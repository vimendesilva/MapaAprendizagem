<h1 class="page-header">Meus Mapas de Aprendizagem</h1>

<div class="bs-example" data-example-id="striped-table"> 
    <table class="table table-striped" id="dataTable"> 
        <thead> 
            <tr> 

                <th>Título</th> 

                <th>
                    <div class="pull-right">
                        <a href="<?= base_url('admin/mapas/cadastro_mapas') ?>" class="btn btn-info">Novo Mapa</a>   
                    </div>
                </th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($mapas as $row): ?>
                <tr> 
 
                    <td><?= $row->nome; ?></td> 
                    <td>
                        <div class="pull-right">
                            <a href="<?= base_url('admin/mapas/deletar/' . $row->id) ?>" class="btn btn-danger btn-block"  onclick="return confirm('Deseja realmente apagar o mapa?')">Deletar</a>
                        </div>
                    </td>                       
                </tr> 
            <?php endforeach; ?>

        </tbody> 
    </table> 
</div>
