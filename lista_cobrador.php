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
	<div class="main p-3">  <!---->
            <div class="tabla">     <!--Seccion tabla-->
                <h3>Lista de Usuarios</h3>
                <table border-2 id="example" class="table table-striped">   <!---->
                    <thead>
                    <th>ID</th> 
                    <th>Nombre del Cobrador</th>
                    <th>Usuario </th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                </thead>

                <tbody>
				<?php
					include("conexionO.php");
					$consulta_cobrador=mysqli_query($conexion,"select * from tabla_cobrador;");//la variable de la conexión  
					while ($dato=mysqli_fetch_array($consulta_cobrador)) 
						{
							$cod=$dato['id_cobrador'];
							$nombre=utf8_encode($dato['nombre_cobrador']);
							$usuario=utf8_encode($dato['usuario']);
							$correo=utf8_encode($dato['correo']);
							$con=$dato['contrasenia'];
			
				?>
				<tr>
					<td><?php echo $cod ?></td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $usuario ?></td>
					<td><?php echo $correo ?></td>
					<td><?php echo $con ?></td>

				</tr>	
				<?php
						}
				mysqli_close($conexion);
				?>
				</tbody>
                    
                </table>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary me-md-2" type="button">Visulizar</button>
                <button class="btn btn-primary" type="button">Editar</button>
            </div>
        </div>
	
</body>
</html>