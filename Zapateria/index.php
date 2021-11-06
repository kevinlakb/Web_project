<!DOCTYPE html>
<?PHP
error_reporting(0);
include("libreria.php");
$conexion = pg_connect("host=localhost user=postgres port=5432 dbname=Zapateria password=123456"); 
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZAPATERIA</title>
    <link rel="stylesheet" href="estilos.css">
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
        <li><a href="<?PHP if ($_SESSION['usuario']==NULL){echo '#ingreso';}?>" id="show-modal">INGRESAR</a>
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
        <li><a href="<?PHP if ($_SESSION['usuario']==NULL){echo '#registro';}?>" id="show-modal">REGISTRARSE</a></li>
        <li><a href="#cerrar" id="show-modal" onclick="actualizar();">CERRAR SESIÓN</a></li>
    </ul>
</nav>
<div id="ingreso" class="modal">
    <div class="content-modal">
                    <header>
                        <form action="valida-usuarios.php" method="post">
                            <table class="my-table" align="center">
                                <tbody>
                                    <tr>
                                        <td colspan="3"><p style="font-size: 25px; color: #3d3d3d; padding: 5px; font-family: 'bellford';">INICIO DE SECCIÓN</p></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="6"><img src="img/iniciosesion.png" width="150" height="150"></td>
                                    </tr>
                                    <tr>
                                        <td><p style="font-size: 18px; color: #3d3d3d; padding: 0px; font-family: 'bellford';">CORREO:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="email" name="correo" style="margin:6px; border-radius: 4px; background: white; box-shadow: 0 2px 2px rgba( 0, 0, 0, 0.1); text-size: 20px"></td>
                                    </tr>
                                    <tr>
                                        <td><p style="font-size: 18px; color: #3d3d3d; padding: 0px; font-family: 'bellford';">CONTRASEÑA:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="password" name="contraseña" style="margin:6px; border-radius: 4px; background: white; box-shadow: 0 2px 2px rgba( 0, 0, 0, 0.1); text-size: 20px"></td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" name="submit" class="boton" style="margin-left: 50px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);">ACEPTAR</button></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><p style="font-size: 18px; color: #3d3d3d; padding: 0px; font-family: 'bellford'; text-align: center;">
                                        <?PHP
                                            if (isset($_GET["errorusuario"])=="si")
                                            {echo "<b>DATOS INCORRECTOS</b>"; 
                                        ?>
                                        <?php
                                            }else{ 
                                            echo "<b>INTRODUZCA SUS CLAVES DE ACCESO.<b>";}
                                        ?>
                                        </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </header>
                </div>
                <a href="#" class="btn-close-modal"></a>
</div>
<div id="registro" class="modal">
    <div class="content-modal">
                    <header>
                        <form action="index.php#registro" method="post">
                            <table class="my-table" align="center">
                                <tbody>
                                    <tr>
                                        <td colspan="3"><p style="font-size: 25px; color: #3d3d3d; padding: 5px; font-family: 'bellford';">REGISTRO:</p></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="8"><img src="img/iniciosesion.png" width="150" height="150"></td>
                                    </tr>
                                    <tr>
                                        <td><p style="font-size: 18px; color: #3d3d3d; padding: 0px; font-family: 'bellford';">USUARIO:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="usuario" style="margin:6px;border-radius: 4px;background: white; box-shadow: 0 2px 2px rgba( 0, 0, 0, 0.1)"></td>
                                    </tr>
                                    <tr>
                                        <td><p style="font-size: 18px; color: #3d3d3d; padding: 0px; font-family: 'bellford';">CONTRASEÑA:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="password" name="contrasena" style="margin:6px;border-radius: 4px;background: white; box-shadow: 0 2px 2px rgba( 0, 0, 0, 0.1)"></td>
                                    </tr>
                                    <tr>
                                        <td><p style="font-size: 18px; color: #3d3d3d; padding: 0px; font-family: 'bellford';">CORREO:</p></td>
                                    </tr>
                                    <tr>
                                        <td><input type="email" name="correo" style="margin:6px;border-radius: 4px;background: white; box-shadow: 0 2px 2px rgba( 0, 0, 0, 0.1)"></td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" name="submit" class="boton" style="margin-left: 50px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);">Aceptar</button></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <?PHP
                                        llenarUsuario($conexion);  
                                        ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </header>
                </div>
                <a href="#" class="btn-close-modal"></a>
</div>
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
    <div class="content-1">
       <img src="img/imagen1.jpg"> 
        <p>EMPRESA<br>Una zapatería, cuyo fin es hacer zapatos de calidad y modernos adaptándose a los gustos o modas que predominan en el medio, un personal capacitado para el desarrollo de zapatos casuales, deportivos y formales.
        </p>                
    </div>
    <div class="content-2">
       <img src="img/imagen2.jpg">
        <p>MISIÓN<br>Satisfacer a nuestros clientes con productos de buena calidad esperándolos para una nueva compra, reconocimiento nacional por su calidad y buen precio, esto con el buen manejo de información de nuestros clientes, aportando una mejor experiencia en su búsqueda de zapatos.
        </p>                
    </div>
    <div class="content-3">
       <img src="img/imagen3.jpg">
        <p>RAZÓN SOCIAL<br>Incentivar la compra de zapatos de calidad producido únicamente por mano de obra nacional. Zapatos a precios asequible para todo tipo de persona, comprando productos nacionales ayudamos a nuestras empresas a progresar y crear economía en bien de nuestro futuro, busca llegar a las personas de manera sencilla permitiéndole al comprador elegir de un catálogo.
        </p>                
    </div>
    <div class="content-4">
       <img src="img/imagen4.jpg">
        <p>REQUERIMIENTOS<br>Se venderán productos al por mayor por lo que la empresa contara con un sistema de armados de zapatos por pares de entre 9 a 12, esto ayudara a sistematizar mejor el proceso, los zapatos se armaran en base a un modelo entonces la empresa contara con un catálogo de diseños, que será expuestos a los clientes.<br>
        Aquellos clientes que quieran comprar zapatos por minorías nuestra empresa tendrá zapatos ya armados a disposición de dichos clientes, la empresa cuenta con convenios con mensajerías, por lo que el cliente podrá escoger que mensajería le beneficia mas en función del costo o tiempo.
        Empleados se requiere saber cedula, nombres, apellidos, fecha de nacimiento, estado civil seguridad social, salario, bonificación, correo, celular, dirección, profesión, barrio, grupo, área de trabajo, los empleados tendrán administradores que también serán empleados, algunos empleados tendrán que usar maquinas, de las cuales nos gustaría saber su nombre, en qué fecha comenzó a funcionar para la empresa, costo, estado si funciona o no, y descripción de su funcionamiento.<br>
        Las maquinas se le harán varios mantenimientos a lo largo de su vida útil, pero un mantenimiento se hará uno a la vez.
        Nos gustaría saber los hijos de nuestros empleados para el seguro social y sus vinculaciones, épocas de festejos u otros posibles tramites, por lo que necesitamos saber tipo de documento de identidad, numero de documento de identidad, fecha de nacimiento, seguridad social, nombres, apellidos. <br>
        Un empleado hará tareas que es un grupo de pares de zapatos los cuales hay que armar en diferentes procesos por lo que una tarea pasara en mano de diferentes labores tales como el corte de las piezas se desventaran las piezas necesarias para su posterior armado con costura, luego solara el zapato, y por último se emplantilla el zapato.<br>
        Las tareas usarán muchos materiales y los materiales se usarán en diferentes tareas, cada tarea se hace en base a un diseño, una tarea solo puede tener un diseño, pero un diseño puede usarse en varias tareas, de los materiales se requerirá saber tipo de material, descripción, costo, calidad, área, los materiales serán cueros, sintéticos y cintas por lo que se podrá representar la cantidad con la cantidad de área del material, de un diseño necesitamos saber qué tipo de diseño es, tipo de piezas que se usaran en el posterior armado de los zapatos, las suelas que se usaran, los cordones, las cintas y una breve descripción de cómo será su armado.
        Los materiales serán suministrados por diferentes proveedores y un proveedor puede suministrar diferentes tipos de materiales, de los proveedores es necesario saber el nombre, la dirección de donde se encuentra, la ciudad, el barrio, el correo, el celular, tipo de proveedor si es por mayor o no y el teléfono.<br>
        Al completarse una tarea los zapatos armados pasarán a ser partes de la codificación de unos zapatos por unidad, de los cuales nos gustaría saber precio, talla, en que bodega queda almacenado y la fecha de compra, los zapatos serán empaquetados en paquetes de los cuales los paquetes podrán transportar muchos zapatos, de los paquetes se querrá saber cuántos pares de zapatos lleva, el costo total, peso en kilogramos, el volumen en cm cúbicos, ciudad de envió y dirección. <br>
        Los paquetes serán enviados por lo que se le pedirán los datos a la mensajería responsable del envió que nos acceda un teléfono en caso de contratiempo directamente con el responsable del paquete, un correo y un precio por el envió, de eso se guardara la fecha en la que empezó el envió y la fecha en la culmino, de eso derivará un atributo estado. <br>
        De la mensajería sabremos cosas básicas pero importantes como nombre de la mensajería, celular, teléfonos, correos.
        Un cliente puede comprar varios pares de zapatos, pero un zapato solo podrá ser comprado a nombre de un cliente, para facilitar la búsqueda los clientes podrán acceder a los diseños a través de los zapatos que vayan a comprar, del cliente es necesario guardarle cedula, nombres, apellidos, fecha de nacimiento, ciudad de residencia, celular, teléfono y un correo.
        </p>
    </div>

</div>
<article>
    
</article>
</section>
<div class="aside"><aside>
    <h2>SIDEBAR</h2>
</aside></div>
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