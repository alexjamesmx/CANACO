<form id="form-subir-img" action="/app/Prueba_d/subirImagen" class="validate-ptp" method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="col-12 mt-3">
            <div class="alert alert-warning">
                <h9>
                    <i class="fas fa-exclamation-triangle"></i>
                    El logo de la empresa debe ser un archivo en formato
                    <h9 class="text-success"> .gif .jpeg .png o .jpg</h9>.
                    <br>
                    Con un peso máximo de <h9 class="text-success"> 512 kb.< /h9>
                    </h9>
            </div>
        </div>
    </div>
    <input type="file" name="fileImagen" id="fileImagen" class="form-control btn btn-primary required btn-block mt-3">
    <button class="btn btn-link btn-block mb-4 mt-2" style="font-size: 18px">
        <i name="btnon" id="btnon" class="fas fa-camera"></i>
        <u>
            Subir logo
            </input>
        </u>
    </button>
</form>