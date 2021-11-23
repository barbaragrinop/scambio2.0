
<!-- INCIO MODAL DE DELETE -->
<div class="modal fade" id="exampleModalLongD<?php echo $row->cda?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Excluir postagem do livro <?php echo $row->livro?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir essa postagem ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <form method="POST">
                    <input type="hidden" id="values" name="cda" id="<?php echo $row->cda?>" value="<?php echo $row->cda?>">
                    <input id="btn-del" type="submit" value="Excluir" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FIM MODAL DE DELETE -->  


<!-- UPDATE STATUS PUBLICAÇÃO -->

<?php
    if(isset($_POST["cda"])){
        $id = $_POST["cda"];

        $update = $pdo->prepare("UPDATE DB_SCAMBIO.TB_ANUNCIO SET STATUS_ANUNCIO = 0 WHERE CD_ANUNCIO = " . $id );
        $update->execute();
    }
?>
<!-- FIM UPDATE STATUS PUBLICAÇÃO -->