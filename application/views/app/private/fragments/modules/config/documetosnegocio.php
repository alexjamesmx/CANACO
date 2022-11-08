 <form id="form-edit-docs-negocio" action="<?=base_url('app/files/subirArchivo')?>" class="validate-ptp" method="post" enctype="multipart/form-data">
<?php foreach($account_data_n as $account){?>  
    <?php $cv =       $account->cv_doc; ?> 
    <div class="form-row mt-4 mb-3">
        <div class="col-md-12">
            <h6 class="counter-head text-muted">En un documento PDF coloca tu Curriculum valor para tu perfil 10%</h6>                
            <hr>
        </div>
    </div>
    <tr class="form-group col-sm-4">
        <?php if($cv==null || $cv =="(NULL)"){ ?>
            <i class="fas fa-times text-danger fa-2x fa-fw"></i>
        <?php } else{ ?>
            <i class="fas fa-check-circle text-success  fa-2x fa-fw"></i>
        <?php }?>
        <h6>Curriculum</h6>                
        <hr>
    </tr>
  
    <div class="form-group col-sm-12">
        <label for="change_docs"> <strong> Subir documentos </strong> </label>
        <div class="custom-switch custom-switch-primary mb-2">
            <input class="custom-switch-input" id="change_docs" name="change_docs" type="checkbox">
            <label class="custom-switch-btn" for="change_docs"> </label>
        </div>
    </div>

    <div class="form-row group-subir" style="display: none;">
          <?php if($cv==null || $cv=="(NULL)"){ ?>
            <h6 class="counter-head text-muted">En un documento PDF coloca tu Curriculum valor para tu perfil 10%</h6>                
            <hr>
                <div class="form-group col-sm-6">
                    <label for="Cv">
                        <sup><i class="fas fa-asterisk text-danger" 
                        style="font-size: 0.7em;"></i></sup> 
                            Curriculum:
                    <input type="file" name="docs6" id="6"
                    class="form-control required btn btn-primary"   >
                </div>
        <?php }?>
                <div class="form-row group-subir " style="display: none;">
                    <div class="form-group col-sm-12 group-subir"  style="display: none;">
                        <button id="btn-sbmt-create-docs" type="submit" 
                                class="btn btn-primary">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>
                </div>
    </div>
    <?php }?>
    </form>        



