<h1 class="page-header">Avaliação de Mapas de Aprendizagem</h1>

<form action="<?= base_url('admin/questionario/salvar/'.$dimensao) ?>"  method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-12">
            <label for="exampleInputEmail1">Dimensão <?php echo $nome_dimensao[0]->nome_dimensao; ?></label>
            <!--<select class="form-control" name="dimensoes" id="dimensoes" >
                <option value="#">Selecione uma opcao</option>
                <?php //foreach ($dimensoes as $row): 
                    //if($row->id != $dimensao){ ?>
                        <option value="<?php //$row->id ?>"><?php //echo $row->nome_dimensao ?></option>
                    <?php
                    
                    //}
                    ?>
                    
                <?php //endforeach; ?>
            </select>-->
        </div>

        <div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-1">
                <label for="exampleInputEmail1">Não</label>
            </div>
            <div class="col-sm-1">
                <label for="exampleInputEmail2">Pouco</label>
            </div>
            <div class="col-sm-2">
                <label for="exampleInputEmail3">Parcialmente</label>
            </div>
            <div class="col-sm-2">
                <label for="exampleInputEmail4">Bastante</label>
            </div>
            <div class="col-sm-2">
                <label for="exampleInputEmail5">Totalmente</label>
            </div>
        </div> 

        <?php 
        $cont = 0;
        foreach ($perguntas as $r):
            $id = $r->id;
            $cont++;
            if($cont % 2 == 0){
                echo '<div class="col-sm-12" style="background-color:#F5F5F5">';
            }else{
                echo '<div class="col-sm-12">';
            }
            ?>
            
                <div class="col-sm-4">
                    <p><?= $r->nome_pergunta ?></p>
                </div>
                <div class="col-sm-1">
                    <label class="radio-inline">
                        <input type="radio" name="<?php echo "check".$cont ?>" id="inlineRadio1" value="1">
                    </label>
                </div>
                <div class="col-sm-1">
                    <label class="radio-inline">
                        <input type="radio" name="<?php echo "check".$cont ?>" id="inlineRadio2" value="2">
                    </label>
                </div>
                <div class="col-sm-2">
                    <label class="radio-inline">
                        <input type="radio" name="<?php echo "check".$cont ?>" id="inlineRadio3" value="3">                     
                    </label>
                </div>
                <div class="col-sm-2">
                    <label class="radio-inline">
                        <input type="radio" name="<?php echo "check".$cont ?>" id="inlineRadio4" value="4">
                    </label>
                </div>
                <div class="col-sm-2">
                    <label class="radio-inline">
                        <input type="radio" name="<?php echo "check".$cont ?>" id="inlineRadio5" value="5">
                    </label>
                </div>
            </div>
        <input type="hidden" name="<?php echo "pergunta".$cont ?>" value="<?php echo $r->id_pergunta;  ?>">
        <?php endforeach; 
        ?>
        <!--<input type="hidden" name="dimensao" value="<?php //echo $dimensao ?>">-->
        <input type="hidden" name="cont" value="<?php echo $cont ?>">
        <input type="hidden" name="mapa" value="<?php echo $mapa ?>">
        <input type="hidden" name="usuario" value="<?php echo $this->session->userdata('id') ?>">
    </div>

    <button type="submit" class="btn btn-success">Enviar</button>
    <button type="reset" class="btn btn-danger" onclick="return confirm('Deseja realmente limpar o formulário?')">Limpar</button>
</form>

