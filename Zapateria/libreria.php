<?PHP
function connect_db(){ 
   if (!($conn=pg_connect("host=localhost user=postgres port=5432 dbname=Zapateria password=123456"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   
  if (!pg_dbname()) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   }else{
      return $conn; 
   }    
}

function pkEmpleado(){
echo "<td><select id='idjefe' name='idjefe'>";
echo "<option value=''></option>";
$conn=pg_connect("host=localhost user=postgres port=5432 dbname=Zapateria password=123456");
$sql = 'select * from empleado';
$result = pg_query($conn,$sql);
while($row = pg_fetch_array($result)){ 
$codigo = $row['cedula'];
$nombre = $row['nombres'];
echo '<option value='.$codigo.'>'.$codigo.'. '.$nombre.'</option>'; 
}
echo "</select></td>";
}

function formularioEmpleado(){
echo "<form action='Empleados.php' method='POST' onsubmit='return valida_empleado()'>";
echo "<table>";
echo "<thead>";
echo "<td colspan='6'>Formulario de Empleados</td>";
echo "</thead>";
echo "<tr>";
echo "<td>Cedula(*)</td>";
echo "<td>Nombres(*)</td>";  
echo "<td>Apellidos(*)</td>";
echo "<td>Fecha de Nacimiento(*)</td>";
echo "<td>EstadoCivil(*)</td>";
echo "<td>Seguridad Social(*)</td>";
echo "</tr>";
echo "<tr>";
echo "<td><input id='cedula' name='cedula' type='text' /></td>";
echo "<td><input id='nombres' name=' nombres' type='text' /></td>";
echo "<td><input id='apellidos' name='apellidos' type='text' maxlength='20'/></td>";
echo "<td><input id='fechaNac' name='fechaNac' type='text' maxlength='20'/></td>";
echo "<td><input id='estadoCivil' name='estadoCivil' type='text' maxlength='10'/></td>";
echo "<td><input id='seguridadSocial' name='seguridadSocial' type='text' maxlength='10'/></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Salario(*)</td>";
echo "<td>Bonificación(*)</td>";
echo "<td>Correo(*)</td>";
echo "<td>Celular(*)</td>";
echo "<td>Dirección(*)</td>";
echo "<td>Barrio</td>";
echo "</tr>";
echo "<tr>";
echo "<td><input id='salario' name='salario' type='text' /></td>";
echo "<td><input id='bonificacion' name='bonificacion' type='text'/></td>";
echo "<td><input id='correo' name='correo' type='text' maxlength='40'/></td>";
echo "<td><input id='celular' name='celular' type='text' /></td>";
echo "<td><input id='direccion' name='direccion' type='text' maxlength='30'/></td>";
echo "<td><input id='barrio' name='barrio' type='text' maxlength='20'/></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Cargo(*)</td>";
echo "<td>Grupo de Trabajo(*)</td>";
echo "<td>Area de Trabajo(*)</td>";
echo "<td>Jefe</td>";
echo "<td colspan='3' rowspan='2' >";
echo "<input type='submit' value='Enviar' style='margin-left:250px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);'/>";
echo "</td>";
echo "<tr>";
echo "<td><input id='cargo' name='cargo' type='text' maxlength='20'/></td>";
echo "<td><input id='grupoTrabajo' name='grupoTrabajo' type='text' maxlength='10'/></td>";
echo "<td><input id='areaTrabajo' name='areaTrabajo' type='text' maxlength='10'/></td>";
pkEmpleado();
echo "</tr>";
echo "<tr>";
echo "<td colspan='6' rowspan='3'>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
}
function formularioDiseno(){
echo "<form action='Disenos.php' method='POST' onsubmit='return valida_diseno()'>";
echo "<table>";
echo "<thead>";
echo "<td colspan='6'>Formulario de Diseños</td>";
echo "</thead>";
echo "<tr>";
echo "<td>idDiseño(*)</td>";
echo "<td>tipoDiseño(*)</td>";
echo "<td>tipoPiezas(*)</td>";
echo "<td>tipoSuela(*)</td>";
echo "<td>descripción</td>";
echo "</tr>";
echo "<tr>";
echo "<td><input id='idDiseno' name='idDiseno' type='text'/></td>";
echo "<td><input id='tipoDiseno' name='tipoDiseno' type='text' maxlength='30'/></td>";
echo "<td><input id='tipoPiezas' name='tipoPiezas' type='text' maxlength='4'/></td>";
echo "<td><input id='tipoSuela' name='tipoSuela' type='text' maxlength='4'/></td>";
echo "<td><input id='descripcion' name='descripcion' type='text' maxlength='200'/></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5'>";
echo "<input type='submit' value='Enviar' style='margin-left:480px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);'/>";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5' rowspan='2'>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
}

function formularioCliente(){
echo "<form action='Clientes.php' method='POST' onsubmit='return valida_cliente()'>";
echo "<table>";
echo "<thead>";
echo "<td colspan='6'>Formulario de Clientes</td>";
echo "</thead>";
echo "<tr>";
echo "<td>Cedula(*)</td>";
echo "<td>Nombres(*)</td>";    
echo "<td>Apellidos(*)</td>";
echo "<td>Fecha de Nacimiento(*)</td>";
echo "</tr>";
echo "<tr>";
echo "<td><input id='cedula1' name='cedula1' type='text'/></td>";
echo "<td><input id='nombres1' name='nombres1' type='text'' maxlength='30'/></td>";
echo "<td><input id='apellidos1' name='apellidos1' type='text' maxlength='4'/></td>";
echo "<td><input id='fechaNac1' name='fechaNac1' type='text' maxlength='4'/></td>";
echo "</tr>";
echo "<tr>";
echo "<td>Ciudad(*)</td>";
echo "<td>Celular(*)</td>";    
echo "<td>Telefono</td>";
echo "<td>Correo(*)</td>";
echo "</tr>";
echo "<tr>";
echo "<td><input id='ciudad1' name='ciudad1' type='text'/></td>";
echo "<td><input id='celular1' name='celular1' type='text' maxlength='30'/></td>";
echo "<td><input id='telefono1' name='telefono1' type='text' maxlength='4'/></td>";
echo "<td><input id='correo1' name='correo1' type='text' maxlength='4'/></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5'>";
echo "<input type='submit' value='Enviar' style='margin-left:380px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);'/>"; 
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='4' rowspan='2'>";	
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
}

function formularioMaterial(){
echo "<form action='Materiales.php' method='POST' onsubmit='return valida_material()'>";
echo "<table>";
echo "<thead>";
echo "<td colspan='6'>Formulario de Materiales</td>";
echo "</thead>";
echo "<tr>";
echo "<td>IdMateriales(*)</td>";
echo "<td>Nombre(*)</td>";    
echo "<td>Descripción(*)</td>";
echo "<td>Costo(*)</td>";
echo "<td>Calidad(*)</td>";
echo "</tr>";
echo "<tr>";
echo "<td><input id='idMateriales' name='idMateriales' type='text'/></td>";
echo "<td><input id='nombre' name='nombre' type='text'  maxlength='30'/></td>";
echo "<td><input id='descripcion' name='descripcion' type='text' maxlength='30'/></td>";
echo "<td><input id='costo' name='costo' type='text'/></td>";
echo "<td><input id='calidad' name='calidad' type='text' maxlength='10'/></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5'>";
echo "<input type='submit' value='Enviar' style='margin-left:460px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);'/>"; 
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5' rowspan='2'>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
}

function formularioMensajeria(){
echo "<form action='Mensajerias.php' method='POST' onsubmit='return valida_mensajeria()'>";
echo "<table>";
echo "<thead>";
echo "<td colspan='6'>Formulario de Mensajerias</td>";
echo "</thead>";
echo "<tr>";
echo "<td>IdMensajeria(*)</td>";
echo "<td>Nombre(*)</td>";    
echo "<td>Celular(*)</td>";
echo "<td>Telefono(*)</td>";
echo "<td>Correo(*)</td>";
echo "</tr>";
echo "<tr>";
echo "<td><input id='idMensajeria' name='idMensajeria' type='text'/></td>";
echo "<td><input id='nombre' name='nombre' type='text' maxlength='30'/></td>";
echo "<td><input id='celular' name='celular' type='text' maxlength='4'/></td>";
echo "<td><input id='telefono' name='telefono' type='text' maxlength='4'/></td>";
echo "<td><input id='correo' name='correo' type='text' maxlength='200'/'></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5'>";
echo "<input type='submit' value='Enviar' style='margin-left:480px; padding: 15px; border-radius: 8px; box-shadow: 0 4px 4px rgba(0, 0, 0, 0.6);''/>"; 
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5' rowspan='2'>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
}

function llenarEmpleado($conn){
$cedula = (int)($_POST["cedula"]);
$nombres = ($_POST["nombres"]);
$apellidos = ($_POST["apellidos"]);
$fechaNac= ($_POST["fechaNac"]);
$estadoCivil= ($_POST["estadoCivil"]);
$seguridadSocial= ($_POST["seguridadSocial"]);
$salario= (int)($_POST["salario"]);
$bonificacion= (int)($_POST["bonificacion"]);
$correo = ($_POST["correo"]);
$celular = (int)($_POST["celular"]);
$direccion = ($_POST["direccion"]);
$barrio = ($_POST["barrio"]);
$cargo = ($_POST["cargo"]);
$grupoTrabajo = ($_POST["grupoTrabajo"]);
$areaTrabajo = ($_POST["areaTrabajo"]);
$idjefe = (int)($_POST["idjefe"]);

$sql="insert into empleado (cedula, nombres, apellidos, fechaNac, estadoCivil, seguridadSocial, salario, bonificacion, correo, celular, direccion, barrio, cargo, grupoTrabajo, areaTrabajo, idjefe) values ('$cedula','$nombres', '$apellidos','$fechaNac','$estadoCivil', '$seguridadSocial', '$salario','$bonificacion','$correo','$celular','$direccion', '$barrio', '$cargo', '$grupoTrabajo', '$areaTrabajo', '$idjefe')";

$result = pg_query($conn, $sql);
}

function llenarDiseno($conn){
$idDiseno = (int)($_POST['idDiseno']);
$tipoDiseno = ($_POST['tipoDiseno']);
$tipoPiezas = ($_POST['tipoPiezas']);
$tipoSuela = ($_POST['tipoSuela']);
$descripcion = ($_POST['descripcion']);                      

$sql="insert into diseno(iddiseno, tipodiseno, tipopiezas, tiposuela, descripcion) values ('$idDiseno','$tipoDiseno', '$tipoPiezas', '$tipoSuela', '$descripcion')";

$result = pg_query($conn, $sql);
}

function llenarCliente($conn){
$idMateriales = (int)($_POST["idMateriales"]);
$nombre = ($_POST["nombre"]);
$descripcion = ($_POST["descripcion"]);
$costo = (int)($_POST["costo"]);
$calidad = ($_POST["calidad"]);

$sql="insert into materiales (idmateriales, nombre, descripcion, costo, calidad) values ('$idMateriales', '$nombre', '$descripcion', '$costo', '$calidad')";
$result = pg_query($conn, $sql);	
}

function llenarMaterial($conn){
$idMateriales = (int)($_POST["idMateriales"]);
$nombre = ($_POST["nombre"]);
$descripcion = ($_POST["descripcion"]);
$costo = (int)($_POST["costo"]);
$calidad = ($_POST["calidad"]); 

$sql="insert into materiales (idmateriales, nombre, descripcion, costo, calidad) values ('$idMateriales', '$nombre', '$descripcion', '$costo', '$calidad')";

$result = pg_query($conn, $sql);	
}

function llenarMensajeria($conn){

$idmensajeria = (int)($_POST["idmensajeria"]);
$nombre = ($_POST["nombre"]);
$celular = (int)($_POST["celular"]);
$telefono = (int)($_POST["telefono"]);
$correo = ($_POST["correo"]);

$sql="insert into mensajeria (idmensajeria, nombre, celular, telefono, correo) values ('$idMensajeria', '$nombre', '$celular', '$telefono', '$correo')";

$result = pg_query($conn, $sql);
}

function llenarUsuario($conn){
extract($_POST);
$sql = "Select * from usuario  where usuario='".$usuario."'";
$result = pg_query($conn, $sql);
$numrows = pg_numrows($result);
    if ($numrows==0 and $usuario != "" and $contrasena != "" and $correo != "") {
    $tipousuario = "usuario";
    $sql1="insert into usuario (usuario, contrasena, correo, tipousuario) values ('$usuario', '$contrasena', '$correo', '$tipousuario')";
    $result1 = pg_query($conn, $sql1);
    }else if($numrows!=0){
    echo "EL USUARIO YA EXISTE";
    }
}
function imprimirEmpleado($conn){
    $sql = "select * from empleado";
    $result = pg_query($conn,$sql);

    echo "<table>"; 
    echo "<thead>";
    echo "<td colspan='16'>Formulario de Empleado</td>";
    echo "</thead>";
    echo "<tr>";
    echo "<td>&nbsp;Cedula&nbsp;</td><td>&nbsp;Nombres&nbsp;</td><td>&nbsp;Apellidos&nbsp;</td><td>&nbsp;Fecha de Nacimiento&nbsp;</td><td>&nbsp;Estado Civil&nbsp;</td>";
    echo "<td>&nbsp;Seguridad Social&nbsp;</td>";
    echo "<td>&nbsp;Salario&nbsp;</td>";
    echo "<td>&nbsp;Bonificación&nbsp;</td>";
    echo "<td>&nbsp;Correo&nbsp;</td>";
    echo "<td>&nbsp;Celular&nbsp;</td>";
    echo "<td>&nbsp;Dirección&nbsp;</td>";
    echo "<td>&nbsp;Cargo&nbsp;</td>";
    echo "<td>&nbsp;Barrio&nbsp;</td>";
    echo "<td>&nbsp;Grupo de Trabajo&nbsp;</td>";
    echo "<td>&nbsp;Area de Trabajo&nbsp;</td><td>&nbsp;Jefe&nbsp;</td>";
    echo "</tr>";    
       while($row=pg_fetch_array($result)){ 
            $cedula=$row["0"];
            $nombres=$row["1"];
            $apellidos=$row["2"];
            $fechanac=$row["3"];
            $estadocivil=$row["4"];
            $seguridadsocial=$row["5"];
            $salario=$row["6"];
            $bonificaion=$row["7"];
            $correo=$row["8"];
            $celular=$row["9"];
            $dirrecion=$row["10"];
            $cargo=$row["11"];
            $barrio=$row["12"];
            $grupotrabajol=$row["13"];
            $areatrabajo=$row["14"];
            $jefe=$row["15"];
           
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
            echo $estadocivil;
            echo "</td>";
            echo "<td>";
            echo $seguridadsocial;
            echo "</td>";
            echo "<td>";
            echo $salario;
            echo "</td>";
            echo "<td>";
            echo $bonificaion;
            echo "</td>";
            echo "<td>";
            echo $correo;
            echo "</td>";
            echo "<td>";
            echo $celular;
            echo "</td>";
            echo "<td>";
            echo $dirrecion;
            echo "</td>";
            echo "<td>";
            echo $cargo;
            echo "</td>";
            echo "<td>";
            echo $barrio;
            echo "</td>";
            echo "<td>";
            echo $grupotrabajol;
            echo "</td>";
            echo "<td>";
            echo $areatrabajo;
            echo "</td>";
            echo "<td>";
            echo $jefe;
            echo "</td>";
            echo "</tr>";	 
            }
       echo "</table>";
  pg_free_result($result); 
  pg_close($conn); 
}
?>
