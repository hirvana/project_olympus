<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Olympus </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
  
</head>
<body>

	<div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="buton">  <!--Sección para el botón para el menú desplegable-->
                    <i class="lni lni-menu"></i>  <!--Icono del menú-->
                </button>
                <div class="sidebar-logo">      <!--Sección para el logo-->
                    <a href="#">Olympus</a>       <!--Nombre de la empresa o imagen de la empresa-->  
                </div>     
            </div>
            <ul class="sidebar-nav">  <!--Lista desordenada para el menu-->
                <li class="sidebar-item">   <!---Comienza el elemento de Inicio--->
                    <a href="index.php" class="sidebar-link">    
                        <i class="lni lni-dashboard"></i>  <!--Icono de Inicio-->
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#rute" aria-expanded="false" aria-controls="rute">
                        <i class="lni lni-map-marker"></i>
                        <span>Ruta</span>
                    </a>
                    <ul id="rute" class="sidebar-dropdown list-unstyled collapsed" data-bs-parent="#sidebar">
                        <li class="sidebar-item">   <!---Comienza el elemento de--->
                            <a href="nueva_ruta.php" class="sidebar-link">Nueva Ruta</a>
                         </li>
                         <li class="sidebar-item">   <!---Comienza el elemento de--->
                            <a href="#" class="sidebar-link">Lista de Rutas</a>
                         </li>
                    </ul>
                </li>
                <li class="sidebar-item">  <!--Comienza el elemento de Cobradores-->
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#collector" aria-expanded="false" aria-controls="collector">
                        <i class="lni lni-money-location"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul id="collector" class="sidebar-dropdown list-unstyled collapsed" data-bs-parent="#sidebar">
                        <li class="sidebar-item">   <!---Comienza el elemento de--->
                            <a href="nuevo_cobrador.php" class="sidebar-link">Nuevo Usuario</a>
                         </li>
                         <li class="sidebar-item">   <!---Comienza el elemento de--->
                            <a href="lista_cobrador.php" class="sidebar-link">Lista de Usuario</a>
                           
                         </li>
                    </ul>
                </li>
                <li class="sidebar-item">  <!--Comienza el elemento de Cobradores-->
                    <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#user" aria-expanded="false" aria-controls="user">
                        <i class="lni lni-cog"></i>
                        <span>Configuración</span>
                    </a>
                    <ul id="user" class="sidebar-dropdown list-unstyled collapsed" data-bs-parent="#sidebar">
                        <li class="sidebar-item">   <!---Comienza el elemento de--->
                            <a href="#" class="sidebar-link">Usuario</a>
                         </li>
                    </ul>
                </li>
                <li class="sidebar-item">   <!--Comienza el elemento Salir-->
                    <a href="#" class="sidebar-link">    
                        <i class="lni lni-exit"></i>  <!--Icono de Salir-->
                        <span>Salir</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main p-4">  <!---->
            <form class="formulario" method="post" action=nuevo_cobrador.php>
			<h1>Nuevo Cobrador</h1>
				<?php 
					include 'conexionO.php';  #se llama el archivo php para conectar la base de datos 
					if (!empty($_POST)) 
					{
						if (empty($_POST['nombre']) or empty($_POST['usuario']) or empty($_POST['correo']) or empty($_POST['contrasenia'])) 
						{
							echo "<div>Complete todos los datos</div>";
						}
						else
						{
							$nombre = $_POST['nombre'];
							$usuario = $_POST['usuario'];
							$correo = $_POST['correo']; 
							$con = $_POST['contrasenia'];

							$insertar = mysqli_query($conexion, "insert into tabla_cobrador(nombre_cobrador, usuario, correo, contrasenia) 
								values ('$nombre', '$usuario', '$correo', '$con')");

						if ($insertar == 1) 
							{
								echo "Se registro correctamente";
							} else {
								echo "No se registro";
						}

						}
						
					}
				?>
	
		<div class="form-group col-md-6">
			<label id="nombre">Nombre Completo</label>
			<input type="text" class="form-control" placeholder="Apellido Paterno, Apellido Materno, Nombre" name="nombre">
		</div>
		<div class="form-group col-md-6">
			<label>Usuario</label>
			<input type="text" class="form-control" placeholder="Ingresa el usuario" name="usuario">	
		</div>
		<div class="form-group col-md-6">
			<label>Correo</label>
			<input type="text" class="form-control" placeholder="Ingresa el correo" name="correo">	
		</div>
		<div class="form-group col-md-6">
			<label>Tipo de usuario</label>
			<select class="form-control form-control-sm">
 			<option></option>
			</select>	
		</div>	
		<div class="form-group col-md-6">
			<label>Contraseña</label>
			<input type="password" class="form-control" placeholder="Ingresa la contraseña" name="contrasenia">	
		</div>

		<button class="btn btn-primary" type="submit">Registrar</button>
		
		</form>
        </div>

    </div>

	
	
	
</body>
</html>