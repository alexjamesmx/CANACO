<div class="row">
	<div class="col-12 mb-2 mb-4">
		<div class="card">
			<div class="card-body">
				<h5 class=" card-title mb-4">
					<i class="simple-icon-list"></i>
					Reasignaciones
					<div id="Lista_comercios">
						<span class="text-primary float-right">
							<small>Mostrando 0 de 0</small>
						</span>
					</div>
				</h5>

				<div class="col-md-12">
					<div class="no-more-tables"></div>
					<div id="tablaAfiliados">
						<table id="controls-data-tables-pagination" 
						class="data-table nowrap table table-bordered table-striped" 
						data-order="[[ 0, &quot;desc&quot; ]]">
							<thead class="thead-dark">
								<tr>
									<th scope="col">
										No.
									</th>
									<th scope="col">
										Empresa
									</th>
									<th scope="col">
										Asesor acutal
									</th>
									<th scope="col">
										Cambiar afiliador
									</th>

								</tr>
							</thead>
							
							 <?php $i=0; ?> 
							<input type='hidden' value='<?= json_encode(
                            $comercios ) ?>' id='info'>
							<?php foreach($comercios as $comercio){ $divmagic = 'magic' . $i; $i++;?>
							<tbody>
								<td><?= $comercio->negocio_id  ?></td>
								<td><div id='<?= $divmagice ?>'>  <?= $comercio->negocio_nombre?></div>
								<br>
								<hr>
								
								</td>
								<!-- <td> <?= $comercio->afiliador?></td> -->
								<td>  
								<?php if(is_null($comercio->afiliador)){ ?>
										No tiene un afiliador
								<?php }else{ foreach($afiliadores as $afil){    ?>
									<?php if( $afil->usuario_id == $comercio->afiliador  ){ ?>
									<?=($afil->nombre) ?>
									<br>
									<?=($afil->apellido1) ?>
									<br>
									<?=($afil->apellido2) ?>

								<?php } } } ?>
								</td> 
 
								<td>
								<select class="form-select form-control" 
								aria-label="Default select example"
								 name="afiliadores<?=$comercio->usuario_id ?>" 
								 id="afiliadores<?=$comercio->usuario_id ?>">
												<?php foreach($afiliadores as $afil1){ ?>
                                                <option value="<?= $afil1->usuario_id ?>"> <?= $afil1->nombre ?> </option>
                                                <?php }?>   
                                            </select>
											<br>
									<button type="button" onclick="actualizar(<?=$comercio->usuario_id?> )" 
									class="btn btn-primary default" name="actualizar" id="actualizar">
									<i class="fas fa-retweet"></i>
										Actualizar
									</button>
									<a  
									href="<?=base_url('app/jefeafilcomercios/historial_afiliadores/'.$comercio->usuario_id)?>"
									class="btn btn-warning default" >

									<i class="fas fa-history"></i>
										Historial
									</a>
								</td>
							</tbody>
							<?php }?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


