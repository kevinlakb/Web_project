function valida_empleado(){
    
    var cedula = document.getElementById('cedula').value;
    var nombres = document.getElementById('nombres').value;
    var apellidos = document.getElementById('apellidos').value;
    var fechaNac = document.getElementById('fechaNac').value;
    var estadoCivil = document.getElementById('estadoCivil').value;
    var seguridadSocial = document.getElementById('seguridadSocial').value;
    var salario = document.getElementById('salario').value;
    var bonificacion = document.getElementById('bonificacion').value;
    var correo = document.getElementById('correo').value;
    var celular = document.getElementById('celular').value;
    var direccion = document.getElementById('direccion').value;
    var barrio = document.getElementById('barrio').value;
    var cargo = document.getElementById('cargo').value;
    var grupoTrabajo = document.getElementById('grupoTrabajo').value;
    var areaTrabajo = document.getElementById('areaTrabajo').value;
    var idjefe = document.getElementById('idjefe').value;
    
    var valitext = /^\D+$/;
    var valinumber = /^\d+$/;
    var valicorreo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.[a-z]{2,4})+$/;
    
    if(cedula == ""){
        alert('[ERROR]: El campo cedula no fue llenado.');
        return false;
    }
    else if(!valinumber.test(cedula)){
        alert('[ERROR]: El campo cedula no resive texto.');
        return false;
    }
    else if(nombres == ""){
        alert('[ERROR]: El campo nombres no fue llenado');
        return false;
    }
    else if(!valitext.test(nombres)){
        alert('[ERROR]: El campo nombres no resive numeros.');
        return false;
    }
    else if(apellidos == ""){
        alert('[ERROR]: El campo apellidos no fue llenado.');
        return false;
    }
    else if(!valitext.test(apellidos)){
        alert('[ERROR]: El campo apellidos no resive numeros.');
        return false;
    }
    else if(fechaNac == ""){
        alert('[ERROR]: El campo fecha esta vacio.');
        return false;
    }
    else if(estadoCivil == ""){
        alert('[ERROR]: El campo estado civil no fue llenado.');
        return false;
    }
    else if(!valitext.test(estadoCivil)){
        alert('[ERROR]: El campo estado civil no resive numeros.');
        return false;
    }
    else if(seguridadSocial == ""){
        alert('[ERROR]: El campo seguridad social no fue llenado.');
        return false;
    }
    else if(!valitext.test(seguridadSocial)){
        alert('[ERROR]: El campo seguridad social no resive numeros.');
        return false;
    }
    else if(salario == ""){
        alert('[ERROR]: El campo salario no fue llenado.');
        return false;
    }
    else if(!valinumber.test(salario)){
        alert('[ERROR]: El campo salario no resive texto.');
        return false;
    }
    else if(bonificacion == ""){
        alert('[ERROR]: El campo bonificación no fue llenado.');
        return false;
    }
    else if(!valinumber.test(bonificacion)){
        alert('[ERROR]: El campo bonificación no resive texto.');
        return false;
    }
    else if(correo == ""){
        alert('[ERROR]: El campo correo no fue llenado.');
        return false;
    }
    else if(!valicorreo.test(correo)){
        alert('[ERROR]: La correo no es valido.');
        return false;
    }
    else if(direccion == ""){
        alert('[ERROR]: El campo dirrecion no fue llenado.');
        return false;
    }
    else if(barrio == ""){
        alert('[ERROR]: El campo barrio no fue llenado.');
        return false;
    }
    else if(cargo == ""){
        alert('[ERROR]: El campo cargo no fue llenado.');
        return false;
    }
    else if(grupoTrabajo == ""){
        alert('[ERROR]: El campo grupoTrabajo no fue llenado.');
        return false;
    }
    else if(areaTrabajo == ""){
        alert('[ERROR]: El campo areaTrabajo no fue llenado.');
        return false;
    }
    else if(idjefe == ""){
        alert('[ERROR]: El campo id Jefe no fue llenado.');
        return false;
    }
}
function valida_diseno(){
    var idDiseno = document.getElementById('idDiseno').value;
    var tipoDiseno = document.getElementById('tipoDiseno').value;
    var tipoPiezas = document.getElementById('tipoPiezas').value;
    var tipoSuela = document.getElementById('tipoSuela').value;
    var descripcion = document.getElementById('descripcion').value;
    
    var valitext = /^\D+$/;
    var valinumber = /^\d+$/;
    
    if(idDiseno == ""){
        alert('[ERROR]: El campo id diseño no fue llenado.');
        return false;
    }
    else if(tipoDiseno == ""){
        alert('[ERROR]: El campo tipo de diseño no fue llenado.');
        return false;
    }
    else if(tipoPiezas == ""){
        alert('[ERROR]: El campo tipo de piezas no fue llenado.');
        return false;
    }
    else if(tipoSuela == ""){
        alert('[ERROR]: El campo tipo de suela no fue llenado.');
        return false;
    }
    else if(descripcion == ""){
        alert('[ERROR]: El campo descripción no fue llenado.');
        return false;
    }
    else if(!valinumber.test(idDiseno)){
        alert('[ERROR]: El campo id diseño no resive texto.');
        return false;
    }
}
function valida_cliente(){
    var cedula1 = document.getElementById('cedula1').value;
    var nombres1 = document.getElementById('nombres1').value;
    var apellidos1 = document.getElementById('apellidos1').value;
    var fechaNac1 = document.getElementById('fechaNac1').value;
    var ciudad1 = document.getElementById('ciudad1').value;
    var celular1 = document.getElementById('celular1').value;
    var telefono1 = document.getElementById('telefono1').value;
    var correo1 = document.getElementById('correo1').value;
    
    var valitext = /^\D+$/;
    var valinumber = /^\d+$/;
    var valicorreo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.[a-z]{2,4})+$/;
    
    if(cedula1 == ""){
        alert('[ERROR]: El campo cedula no fue llenado.');
        return false;
    }
    else if(nombres1 == ""){
        alert('[ERROR]: El campo nombre no fue llenado.');
        return false;
    }
    else if(apellidos1 == ""){
        alert('[ERROR]: El campo epellidos no fue llenado.');
        return false;
    }
    else if(fechaNac1 == ""){
        alert('[ERROR]: El campo fecha de nacimiento no fue llenado.');
        return false;
    }
    else if(celular1 == ""){
        alert('[ERROR]: El campo ciudad no fue llenado.');
        return false;
    }
    else if(telefono1 == ""){
        alert('[ERROR]: El campo ciudad no fue llenado.');
        return false;
    }
    else if(correo1 == ""){
        alert('[ERROR]: El campo ciudad no fue llenado.');
        return false;
    }
    else if(ciudad1 == ""){
        alert('[ERROR]: El campo ciudad no fue llenado.');
        return false;
    }
    else if(!valinumber.test(cedula)){
        alert('[ERROR]: El campo id diseño no resive texto.');
        return false;
    }
    else if(!valitext.test(nombres1)){
        alert('[ERROR]: El campo tipo de diseño no resive numeros.');
        return false;
    }
    else if(!valitext.test(apellidos1)){
        alert('[ERROR]: El campo tipo de piezas no resive numeros.');
        return false;
    }
    else if(!valitext.test(ciudad1)){
        alert('[ERROR]: El campo tipo de suela no resive numeros.');
        return false;
    }
    else if(!valinumber.test(celular1)){
        alert('[ERROR]: El campo celular no resive texto.');
        return false;
    }
    else if(!valinumber.test(telefono)){
        alert('[ERROR]: El campo telefono no resive texto.');
        return false;
    }
    else if(!valicorreo.test(correo)){
        alert('[ERROR]: El campo correo no es valido.');
        return false;
    }
}
function valida_material(){
    var idMateriales = document.getElementById('idMateriales').value;
    var nombre = document.getElementById('nombre').value;
    var descripcion = document.getElementById('descripcion').value;
    var costo = document.getElementById('costo').value;
    var calidad = document.getElementById('calidad').value;
    
    var valitext = /^\D+$/;
    var valinumber = /^\d+$/;
    
    if(idMateriales == ""){
        alert('[ERROR]: El campo id materiales no fue llenado.');
        return false;
    }
    else if(nombre == ""){
        alert('[ERROR]: El campo nombre no fue llenado.');
        return false;
    }
    else if(descripcion == ""){
        alert('[ERROR]: El campo descripcion no fue llenado.');
        return false;
    }
    else if(costo == ""){
        alert('[ERROR]: El campo costo no fue llenado.');
        return false;
    }
    else if(calidad == ""){
        alert('[ERROR]: El campo calidad no fue llenado.');
        return false;
    }
    else if(!valinumber.test(idMateriales)){
        alert('[ERROR]: El campo id materiales no resive texto.');
        return false;
    }
    else if(!valitext.test(nombre)){
        alert('[ERROR]: El campo tipo de diseño no resive numeros.');
        return false;
    }
    else if(!valitext.test(descripcion)){
        alert('[ERROR]: El campo tipo de piezas no resive numeros.');
        return false;
    }
    else if(!valinumber.test(costo)){
        alert('[ERROR]: El campo tipo de suela no resive texto.');
        return false;
    }
}
function valida_mensajeria(){
    var idMensajeria = document.getElementById('idMensajeria').value;
    var nombre = document.getElementById('nombre').value;
    var celular = document.getElementById('celular').value;
    var telefono = document.getElementById('telefono').value;
    var correo = document.getElementById('correo').value;
    
    var valitext = /^\D+$/;
    var valinumber = /^\d+$/;
    var valicorreo = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.[a-z]{2,4})+$/;
    
    if(idMensajeria == ""){
        alert('[ERROR]: El campo id mensajeria no fue llenado.');
        return false;
    }
    else if(nombre == ""){
        alert('[ERROR]: El campo nombre no fue llenado.');
        return false;
    }
    else if(celular == ""){
        alert('[ERROR]: El campo descripcion no fue llenado.');
        return false;
    }
    else if(telefono == ""){
        alert('[ERROR]: El campo costo no fue llenado.');
        return false;
    }
    else if(correo == ""){
        alert('[ERROR]: El campo calidad no fue llenado.');
        return false;
    }
    else if(!valinumber.test(idMensajeria)){
        alert('[ERROR]: El campo id mensajeria no resive texto.');
        return false;
    }
    else if(!valitext.test(nombre)){
        alert('[ERROR]: El campo nombre no resive numeros.');
        return false;
    }
    else if(!valinumber.test(celular)){
        alert('[ERROR]: El campo celular no resive numeros.');
        return false;
    }
    else if(!valinumber.test(telefono)){
        alert('[ERROR]: El campo telefono no resive texto.');
        return false;
    }
    else if(!valicorreo.test(correo)){
        alert('[ERROR]: El campo correo no es valido.')
    }
}

var timeout;
function sesion(){
    timeout = setTimeout(function(){window.location="cerrar-sesion.php"},10000)
}
function cancelar(){
    clearTimeout(timeout);
    if (timeout!=null){sesion();}
}