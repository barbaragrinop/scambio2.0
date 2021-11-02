
  
  <!-- INCIO MODAL DE EDIT -->
  <div class="modal fade" id="exampleModalLongE<?php echo $row->cda?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Publicação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Livro:</label>
                            <input type="text" class="form-control" name="livro" value="<?php echo $row->livro?>">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Descrição:</label>
                            <textarea class="form-control" name="describe" ><?php echo $row->ds?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Gênero:</label>
                            <input type="text" class="form-control" name="genero"  value="<?php echo $row->NMGE?>">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Cidade:</label>
                            <input type="text" class="form-control" name="city" value="<?php echo $row->cid?>">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Estado:</label>
                            <input type="text" class="form-control" name="uf"  value="<?php echo $row->u?>">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Autor:</label>
                            <input type="text" class="form-control" name="autor" value="<?php echo $row->AUTOR?>">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Data de lançamento:</label>
                            <input type="text" class="form-control" name="data" value="<?php echo $row->lanc?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <input type="hidden" id="values" name="cda" id="<?php echo $row->cda?>" value="<?php echo $row->cda?>">
                    <input type="submit" class="editf btn btn-primary" value="Salvar Alterações">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FIM MODAL DE EDIT -->

<!-- UPDATE NAS INFORMAÇÕES DO ANUNCIO    OBS: AINDA PRECISA DE REAJUSTES -->
<?php
    if(isset($_POST['livro']) && !empty([$_POST['livro']]) && isset($_POST['describe']) && !empty([$_POST['describe']])
    && isset($_POST['genero']) && !empty([$_POST['genero']]) /* && isset($_POST['city']) && !empty([$_POST['city']])
    && isset($_POST['uf']) && !empty([$_POST['uf']]) && isset($_POST['autor']) && !empty([$_POST['autor']]) */
    && isset($_POST['data']) && !empty([$_POST['data']])&& isset($_POST['cda']) && !empty([$_POST['cda']]))
    {
        $livro = $_POST['livro'];
        $genero = $_POST['genero'];
        $data = $_POST['data'];
        $describe = $_POST['describe'];
        $codigo = $_POST['cda'];

        $edit = "UPDATE DB_SCAMBIO.TB_ANUNCIO AS ANUN ";
        $edit .= "INNER JOIN DB_SCAMBIO.TB_LIVRO AS LIV ON ";
        $edit .= "LIV.CD_LIVRO = ANUN.CD_LIVRO ";
        $edit .= "INNER JOIN DB_SCAMBIO.LIVRO_GENERO ON ";
        $edit .= "LIV.CD_LIVRO = DB_SCAMBIO.LIVRO_GENERO.CD_LIVRO ";
        $edit .= "INNER JOIN DB_SCAMBIO.TB_GENERO AS GE ON ";
        $edit .= "GE.CD_GENERO = DB_SCAMBIO.LIVRO_GENERO.CD_GENERO ";
        $edit .= 'SET ANUN.DS_ANUNCIO = "' . $describe . '", LIV.NM_LIVRO = "' .  $livro . '",LIV.DT_LANCAMENTO = ' . $data;
        $edit .= ',GE.NM_GENERO = "' . $genero;
        $edit .= '" WHERE ANUN.CD_ANUNCIO = ' . $codigo;
        $updateedit = $pdo->prepare($edit);
        $updateedit->execute();
    }
?>
<!-- FIM UPDATE -->