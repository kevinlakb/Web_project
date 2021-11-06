<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?PHP
session_start();
error_reporting(0);
include("libreria.php");
$conexion = connect_db(); 
extract($_POST);
$sql="Select * from usuario where correo='".$correo."' and contrasena='".$contraseña."'";
				$result = pg_query($conexion,$sql);
				$numrows = pg_numrows($result);
				if ($numrows==0)
				{
				header("Location: index.php?errorusuario=si");
				}
				else
				{
                $row = pg_fetch_array($result);
				$tipo_usuario = $row["tipousuario"];
				$usuario = $row["usuario"];
                $contrasena = $row["contraseña"];
				$_SESSION["usuario"]=$usuario;
				$_SESSION["correo"]=$correo;
				$_SESSION["contrasena"]=$contrasena;
                $_SESSION["tipousuario"]=$tipo_usuario;
				header("Location: index.php");

}
pg_close();
?>
<script src="validar.js"></script>
</body>
</html>
