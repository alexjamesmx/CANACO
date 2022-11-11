<form id="form-edit-docs-negocio" action="<?= base_url('app/files/subirArchivo') ?>" class="validate-ptp" method="post" enctype="multipart/form-data">

    <?php foreach ($account_data_n as $account) { ?>
        <?php $acta =       $account->cv_act_constitutiva; ?>
        <?php $domicilio =       $account->cv_compro_domicio; ?>
        <?php $fiscal =       $account->cv_costancia_fiscal; ?>
        <?php $catalog =       $account->cv_catalgo; ?>
        <div class="form-row mt-4 mb-3">
            <div class="col-md-12">
                <h6 class="counter-head text-muted">En documentos PDF agrega los diferentes documentos de tu comercio </h6>

                <hr>
            </div>
        </div>
        <td>
            <?php if ($acta == null || $acta  == "(NULL)") { ?>
                <i class="fas fa-times text-danger fa-2x fa-fw"></i>
            <?php } else { ?>
                <i class="fas fa-check-circle text-success  fa-2x fa-fw"></i>
            <?php } ?>
            <h6>Acta constitutiva</h6>
            <hr>
        </td>
        <td>
            <?php if ($domicilio == null || $domicilio  == "(NULL)") { ?>
                <i class="fas fa-times text-danger fa-2x fa-fw"></i>
            <?php } else { ?>
                <i class="fas fa-check-circle text-success  fa-2x fa-fw"></i>
            <?php } ?>
            <h6>Comprobante de domicilio</h6>
            <hr>
        </td>

        <tr class="form-group col-sm-4">
            <?php if ($fiscal == null || $fiscal == "(NULL)") { ?>
                <i class="fas fa-times text-danger fa-2x fa-fw"></i>
            <?php } else { ?>
                <i class="fas fa-check-circle text-success  fa-2x fa-fw"></i>
            <?php } ?>
            <h6>Constancia de situación fiscal</h6>
            <hr>
        </tr>
        <td class="form-group col-sm-4">
            <?php if ($catalog == null || $catalog == "(NULL)") { ?>
                <i class="fas fa-times text-danger fa-2x fa-fw"></i>
            <?php } else { ?>
                <i class="fas fa-check-circle text-success  fa-2x fa-fw"></i>
            <?php } ?>
            <h6>Catalogo</h6>
            <strong>
                Opcional, este documento no tiene un valor en su porcentaje del perfil
            </strong>
            <hr>

        </td>
        <div class="form-group col-sm-12">
            <label for="change_documentos"> <strong> Subir documentos </strong> </label>
            <div class="custom-switch custom-switch-primary mb-2">
                <input class="custom-switch-input" id="change_documentos" name="change_documentos" type="checkbox">
                <label class="custom-switch-btn" for="change_documentos"> </label>
            </div>
        </div>
        <div class="form-row group-subir-doc " style="display: none;">
            <?php if ($acta == null || $acta == "(NULL)") { ?>
                <div class="form-group col-sm-6">
                    <label for="Acta">
                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                        Acta constitutiva:
                        <input type="file" name="docs1" id="1" class="form-control required btn btn-primary">
                </div>
            <?php } ?>

            <?php if ($domicilio == null ||  $domicilio == "(NULL)") { ?>
                <div class="form-group col-sm-6">
                    <label for="Comprobante">
                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                        Comprobante de domicilio:
                        <input type="file" name="docs2" id="2" class="form-control required btn btn-primary">
                </div>
            <?php } ?>
            <?php if ($fiscal == null || $fiscal == "(NULL)") { ?>
                <div class="form-group col-sm-6">
                    <label for="Constancia">
                        <sup><i class="fas fa-asterisk text-danger" style="font-size: 0.7em;"></i></sup>
                        Constancia de situación fiscal:
                        <input type="file" name="docs4" id="4" class="form-control required btn btn-primary">
                </div>
            <?php } ?>
            <?php if ($catalog == null || $catalog == "(NULL)") { ?>
                <div class="form-group col-sm-6">
                    <label for="Cv">
                        <sup></sup>
                        Opcional, este documento no tiene un valor en su porcentaje del perfil
                        <input type="file" name="docs5" id="5" class="form-control btn btn-primary required">
                </div>
            <?php } ?>

            <div class="form-group col-sm-12 group-subir-doc" style="display: none;">
                <button id="btn-sbmt-create-docs" type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </div>
        </div>
    <?php } ?>

</form>