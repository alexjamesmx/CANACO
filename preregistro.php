
<?php
		 session_start(); 
		 include("conexion.php");

		 $nom_usu_req = "";
   		 $nom_usu_dis = "";
   		 $tipo_usu_req = "";
		$nom_usu = "";
		$tipo_usu = "";
		$texto = "Alta de usuario";
		$target = "datosPreRegistro.php";
		if(isset($_REQUEST["nom_usu"])){
			$nom_usu_req = $_REQUEST["nom_usu"];
			$target = "registro.php";
			$texto = "Actualizar ";
		}
		
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Zapatería Online">
  		<meta name="author" content="Equipo 7">

		<title>Zapatería Online</title>

		<!-- Lo estilos de bootstrap-->
		<link rel="stylesheet" type="text/css" href="./bootstrap-4.6/css/bootstrap.min.css">
		<!-- Para los iconos de bootstrap -->
		<link rel="stylesheet" type="text/css" href="./bootstrap-4.6/font/bootstrap-icons.css">
		<!-- Para los iconos de fontawesome -->
		<link rel="stylesheet" type="text/css" href="./fontawesome/css/all.css"> 
		<!-- Lo estilos propios o estilos del tema-->
		<link rel="stylesheet" type="text/css" href="css/tienda.css">
        <link rel="stylesheet" type="text/css" href="css/registro.css">
		<link rel="stylesheet" type="text/css" href="css/sucursal.css">

		<!-- Se incluye el jquery -->
		<script src="./bootstrap-4.6/jquery/jquery-3.6.0.js"></script>
		<!-- Para que funcionen los javascript de bootstrap-->
		<script src="./bootstrap-4.6/js/bootstrap.bundle.min.js"></script>
	</head>
	<body>

	  <!-- Navigation -->
	  <nav class="navbar navbar-expand-lg navbar-dark color-rojo fixed-top">
	    <div class="container">
	      <a class="navbar-brand" href="#">Zapatería</a><!--
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>
	      <div class="collapse navbar-collapse" id="navbarResponsive">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item">
	            <a class="nav-link" href="./index.php"><i class="bi bi-house-door"></i>Inicio</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="./productos.php"><i class="bi bi-gift"></i>Productos</a>
	          </li>
	          <li class="nav-item">
				
	            <a class="nav-link" href="./sucursales.php"><i class="bi bi-building"></i>Sucursales</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="./login.php"><i class="bi bi-cart4"></i>Iniciar Sesión</a>
	          </li>
			  <li class="nav-item active">
	            <a class="nav-link" href="./registro.php"><i class="bi bi-file-person"></i></i>Crear cuenta</a>
				</li>
	        </ul>
	      </div>-->
	    </div>
	  </nav>

	  <!-- Page Content -->
	  <h2><?= $texto ?></h2>
	  <?php echo '<form action="' . $target . '" method="POST" class="formulario" >'; ?>
         <h1 class="bi bi-person-fill">RegistroUsuario </h1>
            
            <div class="contenedor">
               <div class="input-contenedor">
                    <i class="fas fa-user icon"></i>
                    <input type="text" placeholder="Usuario" value="<?= $nom_usu_req ?>" name="usrnom_usu" id="usrnom_usu" />
                </div>
           
                <div class="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" placeholder="Contraseña" required id="passuno" name="passuno" />
                </div>
                <div class="input-contenedor">
                    <i class="fas fa-key icon"></i>
                    <input type="password" placeholder="Contraseña" required id="passdos" name="passdos" />
                </div>
				<div class="input-contenedor">
                    <i class="fas fa-user icon"></i>
                    <input type="text" placeholder="C"  value="cliente" name="tipo_usu" id="tipo_usu" readonly disabled>
                </div>
                <input type="submit"  class="button" value="<?= $texto ?>"/>

				
                <p>¿Ya tienes cuenta? <a class="link" href="./login.php">Iniciar sesion</a></p>

            </div>
     </form>
    
	  <!-- /.container -->

	  <!-- Footer -->
	  <!-- <footer class="py-5 bg-dark">
	    <div class="container">
	      <p class="m-0 text-center text-white">Copyright &copy; Zapatería Online 2021</p>
	    </div>
	     /.container -->
	  </footer> 
		  
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script>
        // Disable form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>
	</body>
</html>