<style>
    .modal-open .select2-container {
        z-index: 9999 !important;
    }

    .select2-container--bootstrap .select2-results__group {
        z-index: 9999 !important;
        color: #000 !important;
        display: block;
        padding: 6px 12px;
        font-size: 13px;
        line-height: 1.42857143;
        white-space: nowrap;
    }

    .modal {
        padding: 0 !important;
    }

    .modal .modal-dialog {
        width: 100%;
        max-width: none;
        height: 100%;
        margin: 0;
    }

    .modal .modal-content {
        height: 100%;
        border: 0;
        border-radius: 0;
    }

    .modal .modal-body {
        overflow-y: auto;
    }
</style>
<div id="modal-newrequirement" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header m-0 mt-3" style="padding: 1rem !important;border: none !important;">
                <div class="d-flex w-100 pb-3" style="border-bottom: 2px solid #f4f4f4;">
                    <h5 class="modal-title w-20 align-self-center px-3">
                        <i class="fas fa-eye"></i>
                        Resultados
                    </h5>
                    <div class="w-70 px-3">
                        <div class="d-flex">
                            <nav class="navbar navbar-expand-lg navbar-light bg-ligh" style='height:fit-content;height: 100%;width:100%;align-self: center;'>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                    <ul class="navbar-nav w-100" justify-content: space-evenly;">
                                        <li class="nav-item active m-0 p-0">
                                            <a class="navbar-brand align-items-center" href="#" style="cursor:default">
                                                <span id='canaco-logo' class="logo d-none d-xs-block" style="background: url(https://enlacecanaco.org/static/admin/img/logo-panel-desk.png) no-repeat; width: 64px; height: 35px; background-size: cover;"></span>
                                            </a>
                                        </li>
                                        <li class='nav-item m-0 p-0'>
                                            <a id="nav_productos" class="nav-link" href="#"><span style="font-size:1.5em">Productos</span></a>
                                        </li>
                                        <li class="nav-item m-0 p-0">
                                            <a id="nav_servicios" class="nav-link" href="#"><span style="font-size:1.5em">Servicios</span></a>
                                        </li>
                                        <li class="nav-item m-0 p-0">
                                            <a id="nav_todos" class="nav-link active" href="#"><span style="font-size:1.5em">Todos</span></a>
                                        </li>
                                        <li id='li-buscador' class='pr-5' style="margin-left:auto;" hidden>
                                            <form id='buscador' class=" form-inline" style="justify-content: end;">
                                                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">

                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <button id='modal-close' type="button" class="close w-10 px-3" style="height: fit-content;align-self: center;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <i class="fas fa-times"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div>
                    <div id="modal-list-result" name="modal-list-result">
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-primary default btn-notificacion w-30" id="btn-seleccionados-req">
                    <i class="fas fa-bell"></i>
                    Notificar solo a
                    <br>
                    seleccionados
                </button>
                <button class="btn btn-primary default btn-notificacion w-30" id="btn-afiliados-req">
                    <i class="fas fa-user-check"></i>
                    Notificar solo a
                    <br>
                    afiliados CANACO
                </button>

                <button class="btn btn-primary default btn-notificacion w-30" id="btn-public-req">
                    <i class="fas fa-globe"></i>
                    Hacer requerimiento
                    <br>
                    público
                </button>
            </div>
        </div>
    </div>
</div>