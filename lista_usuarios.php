<?php
    session_start();  //funcion para iniciar sesión 

    if (!isset($_SESSION['usuario'])) {  //si no existe la variable sesion llamada usuario imprimira en la pantalla lo siguiente:
        echo '
            <script>
                alert("Debes iniciar sesión, intentalo de nuevo");
                window.location =  "login.php";
            </script>
        ';
        
        session_destroy();//sesión finalizada para no entrar a la página deseada
        die(); //muere el proceso

    }  
    //sentencia que indica para entrar a la página en caso de que el usuario exista y si no lo regresa a la página de login.php; para revisar si existe el dato y no le da acceso de ver la página.

?>

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
                            <a href="lista_rutas.php" class="sidebar-link">Lista de Rutas</a>
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
                            <a href="nuevo_usuario.php" class="sidebar-link">Nuevo Usuario</a>
                         </li>
                         <li class="sidebar-item">   <!---Comienza el elemento de--->
                            <a href="nuevo_cobrador.php" class="sidebar-link">Nuevo Cobrador</a>
                         </li>
                         <li class="sidebar-item">   <!---Comienza el elemento de--->
                            <a href="lista_usuarios.php" class="sidebar-link">Lista de Usuario</a>
                         </li>
                         <li class="sidebar-item">   <!---Comienza el elemento de--->
                            <a href="lista_cobradores.php" class="sidebar-link">Lista de Cobradores</a>
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
                            <a href="mostrar_usuario.php" class="sidebar-link">Usuario</a>
                         </li>
                    </ul>
                </li>
                <li class="sidebar-item">   <!--Comienza el elemento Salir-->
                    <a href="controlador/cerrar_sesion.php" class="sidebar-link">    
                        <i class="lni lni-exit"></i>  <!--Icono de Salir-->
                        <span>Salir</span>
                    </a>
                </li>
            </ul>
        </aside>
        <div class="main p-3">  <!---->
            <div class="tabla">     <!--Seccion tabla-->
                <h3>Lista de Usuarios</h3>
                <table border-2 id="example" class="table table-striped" method="post" action="">   <!---->
                    <thead>
                    <th>ID</th> 
                    <th>Nombre del Usuario</th>
                    <th>Usuario </th>
                    <th>Rol</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Copia Contraseña</th>
                    <th>Opciones</th>
                </thead>

                <tbody>
		<?php
			include("modelo/conexionO.php");
			$getUser = mysqli_query($conexion,"select u.id_usuario, u.nombre_usuario, u.usuario, r.rol, u.correo, u.contrasenia from tabla_usuario u inner join tabla_rol r on u.id_rol = r.id_rol;");//la variable para realizar la consulta  
			while ($dato = mysqli_fetch_array($getUser)) 
				{
					$cod = $dato['id_usuario'];
					$nombre = utf8_decode($dato['nombre_usuario']);
					$usuario = utf8_decode($dato['usuario']);
					$rol = utf8_decode($dato['rol']);
					$correo = utf8_decode($dato['correo']);
					$con = $dato['contrasenia'];
			
				?>
				<tr>
					<td><?php echo $cod ?></td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $usuario ?></td>
	                    		<td><?php echo $rol ?></td>
					<td><?php echo $correo ?></td>
					<td><?php echo $con ?></td>
	                    		<td></td>
					<td>
	                        		<a href="editar_usuarios.php?id=<?php echo $cod ?>"><button class="btn btn-primary me-md-2" type="submit">Editar</button></a>
	                    		</td>
					<td>
	                        		<a href="controlador/eliminar_usuario.php?id=<?php echo $cod ?>" class=""><button class="btn btn-primary" type="submit">Eliminar</button></a>
	                    		</td>
				</tr>	
				<?php
					}
				mysqli_close($conexion);
				?>
			</tbody>
                    
                </table>
	</div>
            
    </div>

 </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>	
</html>
		    
                           
