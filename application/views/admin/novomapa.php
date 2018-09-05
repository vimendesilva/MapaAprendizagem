<h1 class="page-header">Cadastro de Mapas de Aprendizagem</h1>
<form action="<?= base_url('admin/mapas/salvar_mapa/' . $this->session->userdata('id')) ?>"  method="post" enctype="multipart/form-data">
    <div class="row form-group">
        <div class="col-sm-5">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" placeholder="Nome do Mapa e/ou Curso relacionado" name="nome">
        </div>
        
    </div>
    
    <button type="submit" class="btn btn-success">Enviar</button>
    <button type="reset" class="btn btn-danger" onclick="return confirm('Deseja realmente limpar o formulário?')">Limpar</button>
</form>
