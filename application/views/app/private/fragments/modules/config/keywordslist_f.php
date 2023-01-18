<?php 
$arr_tipo_actividad = array(
    '1' => 'Productos',
    '2' => 'Servicios',
    '3' => 'Productos y servicios'
);
if(isset($actividades)){
    foreach($actividades as $row) : ?>
        <tr style="cursor: default;">
            <td>
                <em>
                    <h4>
                        <u> Actividad:</u>
                    </h4>
                </em>

                <h3>
                    <br>
                    <?=$row->actividad?>
                </h3>

                <strong class="text-muted mt-1">
                    <br>
                    <i class="fas fa-info-circle"></i> 
                    <?=$arr_tipo_actividad[$row->tipo_transaccion]?> en <?=$row->tipo_actividad?>
                </strong>
            </td>
            <td>

                <span style="font-size: 1.3em">Palabras clave:</span>
                <br>
                <div class="row">
                    <div class="col-8">
                        <?php if(isset($row->keywords) && $row->keywords != NULL){ ?>

                            <?php foreach($row->keywords as $rk) : ?>
                                <span class="badge badge-info m-1" style="font-size: 1.1em !important; display: inline-block;">
                                    <i class="fas fa-hashtag fa-xs"></i>
                                    <?=$rk->keyword?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#" class="btn btn-link text-light btn-editkeyword p-0 m-0" data-id="<?=$rk->kwus_id?>" data-kw="<?=$rk->keyword?>">
                                        <i class="fas fa-edit fa-xs text-light"></i>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="#" class="btn btn-link text-light btn-delkeyword p-0 m-0" data-id="<?=$rk->kwus_id?>">
                                        <i class="fas fa-times fa-xs text-light"></i>
                                    </a>
                                </span>
                            <?php endforeach; ?>

                        <?php }?>
                    </div>
                    <!-- Productos y servicios -->
                    <div class="col-8 mt-5">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-primary btn-editservice"
                            data-toggle="tooltip" data-placement="top" title="Agregar nueva palabra clave"
                            data-act="<?=$row->tipoactividad_id?>" data-trans="<?=$row->tipo_transaccion?>">
                            <i class="fas fa-plus"></i>
                            Agregar
                        </button>
                        <button class="btn btn-sm btn-danger btn-delservice"
                        data-toggle="tooltip" data-placement="top" title="Eliminar palabra clave"
                        data-act="<?=$row->tipoactividad_id?>" data-trans="<?=$row->tipo_transaccion?>">
                        <i class="fas fa-trash"></i> 
                        Eliminar
                    </button>
                </div>
            </div>
        </div>


    </td>

</tr>

<?php endforeach; ?>
<?php } ?>
