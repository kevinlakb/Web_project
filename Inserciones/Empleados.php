<!DOCTYPE html>
<?PHP
error_reporting(0);
include("libreria.php");
$conexion = pg_connect("host=localhost user=postgres port=5432 dbname=Zapateria password=123456"); 
session_start();
if($_SESSION==null){
    header("Location: index.php");
}
if($_SESSION['tipousuario']=='usuario')
{
    header("Location: index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZAPATERIA</title>
    <link rel="stylesheet" href="estilosFormularios.css">
</head>
<body onLoad="<?PHP if(!empty($_SESSION)){echo 'sesion()';}?>" onclick="cancelar()">
<header>
</header>
<nav class="navegacion">
    <ul class="menu">
        <li><a href="index.php">INICIO</a></li>
        <li><a>FORMULARIOS</a>
            <ul class="submenu">
            <li>
            <a href="Empleados.php">Empleados</a>    
            </li>
            <li>
            <a href="Disenos.php">Diseños</a>
            </li>
            <li>
            <a href="Clientes.php">Clientes</a>
            </li>
            <li>
            <a href="Materiales.php">Materiales</a>
            </li>
            <li>
            <a href="Mensajerias.php">Mensajerias</a>
            </li>
            </ul>
        </li>    
        <li><a>INFORMES</a>
            <ul class="submenu">
                <li><a href="empleado.php">Empleados</a></li>
                <li><a href="diseno.php">Diseños</a></li>
                <li><a href="cliente.php">Clientes</a></li>
                <li><a href="material.php">Materiales</a></li>
                <li><a href="mensajeria.php">Mensajerias</a></li>
            </ul>
        </li>
        <li><p class="espacio">
            
        </p></li>
        <li><a href="#cerrar" id="show-modal">CERRAR SESIÓN</a>
        <?PHP if ($_SESSION["usuario"]!=NULL){
            echo "<ul class='submenu'>";
            echo "<li><a href='index.php'>";
            echo $_SESSION['usuario'];
            echo "</a></li>";
            echo "<li><a href='index.php'>";
            echo $_SESSION['tipousuario'];
            echo"</a></li>";
            echo "</ul>";
            }?>
        </li>
    </ul>
</nav>
<div id="cerrar" class="modal">
    <div class="content-modal">
                    <header>
                    <?PHP
                    session_start();
                        if($_SESSION["usuario"]!=null){
                            echo "<p style='font-size: 18px; color: #3d3d3d; padding: 20px; font-family: 'bellford';'><a class='boton_personalizado' href='cerrar-sesion.php'>";
                            echo "CERAR SESIÓN</a></p>";
                            
                        }else{
                            echo "<p style='font-size: 18px; color: #3d3d3d; padding: 20px; font-family: 'bellford';'>AUN NO SE HA INICIADO SESIÓN</p>";
                        }
                    ?>
                    </header>
                </div>
                <a href="#" class="btn-close-modal"></a>
</div>
<section>
<div class="content-all">
    <div id="empleados">
    <div class="content-1">  
       <?PHP
        formularioEmpleado();
        llenarEmpleado($conexion);
        ?>
    </div>
    </div>
</div>
<article>
    
</article>
</section>
<aside>
    <div>
        
    </div>
</aside>
<footer>
    <br>
Empresa Colombiana de Calzado Bucaramanda, Santander<br>
Carrera 7 #54-34 Barrio Joya<br>
<br><br>
<h4 color="wheat">CONTACTENOS A TRAVÉS DE:</h4><br>
Celular: 31235545 - 31545246<br>
<br>
Telefono: (+57)-60032456-3314
-5534
-5653<br><br>  
Correo: calzadotossy@mail.com   
<br><br>
Política de privacidad_
Cookies_
Ajustes cookies.
Aviso legal
</footer>
    <script src="validar.js"></script>
</body>
</html>