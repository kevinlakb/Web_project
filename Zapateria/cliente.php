<!DOCTYPE html>
<?PHP
error_reporting(0);
include("libreria.php");
session_start();
if($_SESSION==null){
    header("Location: index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZAPATERIA TOSSI</title>
    <link rel="stylesheet" href="estilosInformes.css">
    <script language="javascript" type="text/javascript">  
        function vacio(q) {  
            for ( i = 0; i < q.length; i++ ) {  
                    if ( q.charAt(i) != " " ) {  
                            return true  
                    }  
            }  
            return false  
        }  
        function valida(F) {  
            if( vacio(F.codigo.value) == false ) {  
                    alert("EL CAMPO ID_CLIENTE ESTA VÁCIO, DEBE DIGITAR UN VALOR.")  
                    return false  
            } else {  
                    
                    form.submit()				
            }  
            
        }  
    </script> 
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
<div id="con_cli_eli" class="modal">
    <div class="content-modal" style="overflow-x: scroll;">
                    <header>
                    <?PHP
    $conn = connect_db();
    extract($_POST);
    $sql1 = "select * from cliente where cedula =$codigo";
    $result1 = pg_query($conn,$sql1);
?>
   <table> 
    <thead>
        <td colspan="8">Formulario de Clientes</td>
    </thead>
    <tr>
        <td>&nbsp;Cedula&nbsp;</td><td>&nbsp;Nombres&nbsp;</td><td>&nbsp;Apellidos&nbsp;</td><td>&nbsp;Fecha de Nacimiento&nbsp;</td><td>&nbsp;Ciudad&nbsp;</td>
        <td>&nbsp;Celular&nbsp;</td>
        <td>&nbsp;Telefono&nbsp;</td>
        <td>&nbsp;Correo&nbsp;</td>
    </tr>
<?PHP    
       while($row=pg_fetch_array($result1)){ 
            $cedula=$row["0"];
            $nombres=$row["1"];
            $apellidos=$row["2"];
            $fechanac=$row["3"];
            $ciudad=$row["4"];
            $celular=$row["5"];
            $telefono=$row["6"];
            $correo=$row["7"];
           
            echo "<tr>";
            echo "<td >";
            echo $cedula;
            echo "</td>";
            echo "<td >";
            echo $nombres;
            echo "</td>";
            echo "<td >";
            echo $apellidos;
            echo "</td>";
            echo "<td>";
            echo $fechanac;
            echo "</td>";
            echo "<td>";
            echo $ciudad;
            echo "</td>";
            echo "<td>";
            echo $celular;
            echo "</td>";
            echo "<td>";
            echo $telefono;
            echo "</td>";
            echo "<td>";
            echo $correo;
            echo "</td>";
            echo "</tr>";	 
            }
       
  pg_free_result($result); 
  pg_close($conn);  
            ?>
                </table>
                    <form action="cliente.php#con_cli" method="post">
                    <table style="margin-left: 50%; transform: translateX(-50%);">
                    <tr>
                    <td><input type="hidden" name="var" value="eliminar"></td>
                    </tr>
                    <tr>
                    <td><input type="hidden" name="codigo" value="<?PHP echo $codigo;?>" ></td>
                    </tr>
                    <tr>
                    <td><button type="submit" name="submit" class="boton" style="margin-left: 50px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);">ELIMINAR</button></td>
                    </tr>
                    </table>
                    </form>
                    <form action="cliente.php">
                    <table style="margin-left: 50%; transform: translateX(-50%);"><tr>
                    <td><button type="submit" name="submit" class="boton" style="margin-left: 50px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);">SALIR</button></td>
                    </tr>
                    </table>
                    </form>
                        
            </header>
          </div>
    </div>
<div id="con_cli_mod" class="modal">
    <div class="content-modal" style="overflow-x: scroll;">
                    <header>
                    <?PHP
    $conn = connect_db();
    extract($_POST);
    $sql1 = "select * from cliente where cedula =$codigo";
    $result1 = pg_query($conn,$sql1);
?>
   <table> 
    <thead>
        <td colspan="8">Formulario de Clientes</td>
    </thead>
    <tr>
        <td>&nbsp;Cedula&nbsp;</td><td>&nbsp;Nombres&nbsp;</td><td>&nbsp;Apellidos&nbsp;</td><td>&nbsp;Fecha de Nacimiento&nbsp;</td><td>&nbsp;Ciudad&nbsp;</td>
        <td>&nbsp;Celular&nbsp;</td>
        <td>&nbsp;Telefono&nbsp;</td>
        <td>&nbsp;Correo&nbsp;</td>
    </tr>
<?PHP    
        echo "<form action='cliente.php#con_cli' method='post'>";
        while($row=pg_fetch_array($result1)){ 
            $cedula=$row["0"];
            $nombres=$row["1"];
            $apellidos=$row["2"];
            $fechanac=$row["3"];
            $ciudad=$row["4"];
            $celular=$row["5"];
            $telefono=$row["6"];
            $correo=$row["7"];
            echo "<tr>";
            echo "<td><input type='hidden' name='var' value='modificar'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td >";
            echo "<input  type='text' name='cedula' value='".$cedula."' readonly>";
            echo "</td>";
            echo "<td >";
            echo "<input  type='text'  name='nombres' value='".$nombres."'>";
            echo "</td>";
            echo "<td >";
            echo "<input  type='text'  name='apellidos'  value='".$apellidos."'>";
            echo "</td>";
            echo "<td>";
            echo "<input  type='text'  name='fechanac' value='".$fechanac."'>";
            echo "</td>";
            echo "<td>";
            echo "<input  type='text'  name='ciudad' value='".$ciudad."'>";
            echo "</td>";
            echo "<td>";
            echo "<input  type='text'  name='celular' value='".$celular."'>";
            echo "</td>";
            echo "<td>";
            echo "<input  type='text'  name='telefono' value='".$telefono."'>";
            echo "</td>";
            echo "<td>";
            echo "<input  type='text'  name='correo' value='".$correo."'>";
            echo "</td>";
            echo "</tr>";
            echo "<table style='margin-left: 50%; transform: translateX(-50%);'>";
            echo "<tr>";
            echo "<td><button type='submit' name='submit' class='boton' style='margin-left: 50px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);'>MODIFICAR</button></td>";
            echo "</tr>";
            echo "</table>";
            echo "</table>";
            echo "</form>";
            }
         pg_free_result($result1); 
        pg_close($conn); 
            ?>
                </table>
                    <form action="cliente.php">
                    <table style="margin-left: 50%; transform: translateX(-50%);"><tr>
                    <td><button type="submit" name="submit" class="boton" style="margin-left: 50px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);">SALIR</button></td>
                    </tr>
                    </table>
                    </form>
                        
            </header>
          </div>
    </div>
    <div id="con_cli" class="modal">
    <div class="content-modal">
                    <header>
                    <?PHP
                    extract($_POST);
                    $conn = connect_db();
                    if($var=='eliminar'){
                    $sql2= "delete from cliente where cedula=$codigo"; 
                    $result2 = pg_query($conn,$sql2);
                    pg_free_result($result2); 
                    echo "<p style='font-size: 18px; color: #3d3d3d; padding: 20px; font-family: 'bellford';'>SE HA ELIMINADO EL EMPLEADO</p>";
                    }
                    if($var=='modificar'){
                    $sql3= "UPDATE cliente set nombres='".$nombres."', apellidos='".$apellidos."', fechanac='".$fechanac."', ciudad='".$ciudad."', celular='".$celular."', telefono='".$telefono."', correo='".$correo."' where cedula='".$cedula."'";
                    $result3 = pg_query($conn,$sql3);
                    pg_free_result($result3);
                    echo "<p style='font-size: 18px; color: #3d3d3d; padding: 20px; font-family: 'bellford';'>SE HA MODIFICADO CORRECTAMENTE</p>";
                    }
                    pg_close($conn); 
                    ?>
                </header>
          </div>
         <a href="#" class="btn-close-modal"></a>
</div>
<section>
<div class="content-all">
    <div class="content-1">
<?PHP
    $conn = connect_db();
    $sql="select * from cliente";
    $result = pg_query($conn,$sql);
?>
   <table> 
    <thead>
        <td colspan="8">Formulario de Clientes</td>
    </thead>
    <tr>
        <td>&nbsp;Cedula&nbsp;</td><td>&nbsp;Nombres&nbsp;</td><td>&nbsp;Apellidos&nbsp;</td><td>&nbsp;Fecha de Nacimiento&nbsp;</td><td>&nbsp;Ciudad&nbsp;</td>
        <td>&nbsp;Celular&nbsp;</td>
        <td>&nbsp;Telefono&nbsp;</td>
        <td>&nbsp;Correo&nbsp;</td>
    </tr>
<?PHP    
       while($row=pg_fetch_array($result)){ 
            $cedula=$row["0"];
            $nombres=$row["1"];
            $apellidos=$row["2"];
            $fechanac=$row["3"];
            $ciudad=$row["4"];
            $celular=$row["5"];
            $telefono=$row["6"];
            $correo=$row["7"];
           
            echo "<tr>";
            echo "<td >";
            echo $cedula;
            echo "</td>";
            echo "<td >";
            echo $nombres;
            echo "</td>";
            echo "<td >";
            echo $apellidos;
            echo "</td>";
            echo "<td>";
            echo $fechanac;
            echo "</td>";
            echo "<td>";
            echo $ciudad;
            echo "</td>";
            echo "<td>";
            echo $celular;
            echo "</td>";
            echo "<td>";
            echo $telefono;
            echo "</td>";
            echo "<td>";
            echo $correo;
            echo "</td>";
            echo "</tr>";	 
            }
       
  pg_free_result($result); 
  pg_close($conn); 
?>
    </table>
</div>
<?PHP
    if($_SESSION["tipousuario"]=="administrador"){
    echo "<div class='content-2'>";
    echo "<form style='float: left; margin-left: 140px;' method='POST' action='empleado.php#con_emp_eli' onSubmit='return valida(this);'>";
    echo "<table>";
	echo "<thead>";
	echo "<td>";
    echo "<div align='left'><strong>ELIMINAR EMPLEADO:</strong></div>";
    echo "</td>";
    echo "</thead>";
    echo "<tr>";
    echo "<td>";
    echo "Id Empleado: <input type='text' name='codigo'  maxlength='10' size='25' onKeyPress='if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;'>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><button type='submit' name='submit' class='boton' style='margin-left: 50px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6); margin-left: 50%; transform: translateX(-50%);'>CONSULTAR</button></td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
    echo "<form style='float: right; margin-right: 140px;' method='POST' action='empleado.php#con_emp_mod' onSubmit='return valida(this);'>";
    echo "<table>";
    echo "<thead>";
    echo "<td>";
    echo "<div align='left'><strong>MODIFICAR EMPLEADO:</strong></div>";
    echo "</td>";
    echo "</thead>";
    echo "<tr>";
    echo "<td>Id Empleado: <input type='text' name='codigo'  maxlength='10' size='25' onKeyPress='if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><button type='submit' name='submit' class='boton' style='margin-left: 50px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6); margin-left: 50%; transform: translateX(-50%);'>CONSULTAR</button></td>";
    echo "</tr>";
    echo "</table>";
    echo "</form>";
    echo "</div>";
    }
    ?>
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