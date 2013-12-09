//Registro de Usuario
var ip = '/e1bfd7PHP/TecnicoYa/';

function registroUsuario(usuario, contrasenia, mail, nombre, apellido, sexo, nacimiento, cel, ci, direccion) {
    $.ajax({
        url: ip + '/?rt=services',
        type: 'POST',
        data: JSON.stringify({
            usuario: usuario,
            contrasenia: contrasenia,
            nombres: nombre,
            apellidos: apellido,
            sexo: sexo,
            fechaNacimiento: nacimiento,
            telefonoMovil: cel,
            correoElectronico: mail,
            ci: ci,
            direccion: direccion,
            operation: 'registrarUsuario'
        }),
        datatype: "json",
        contentType: "application/json",
    })
    .done(function(msg) {
        var msg = JSON.parse(msg);
        if (msg.resultado === "OK"){ 
            alertify.success("Usuario registrado con éxito");
            cerrarPanelRegistro();
        } else{
            alertify.error("Error al registrar usuario.");
        }
        console.log(msg);        
    })
    .fail(function(msg) {
        console.log(msg);
    })
}

function loginUsuario(usuario,contrasenia) {
    $.ajax({
        url: ip + '/?rt=services',
        type: 'POST',
        data: JSON.stringify({
            usuario: usuario,
            contrasenia: contrasenia,           
            operation: 'loginUsuario'
        }),
        datatype: "json",
        contentType: "application/json",
    })
    .done(function(msg) {
        var msg = JSON.parse(msg);
        if (msg.resultado === "OK"){ 
            alertify.success("Usuario registrado con éxito");
            cerrarPanelRegistro();
        } else{
            alertify.error("Error al registrar usuario.");
        }
        console.log(msg);        
    })
    .fail(function(msg) {
        console.log(msg);
    })
}

function altaServicio(nombre, descripcion) {
    $.ajax({
        url: ip + '/?rt=services',
        type: 'POST',
        data: JSON.stringify({
            nombres: nombre,
            descripcion: descripcion,
            operation: 'altaServicio'
        }),
        datatype: "json",
        contentType: "application/json",
    })
    .done(function(msg) {
        var msg = JSON.parse(msg);
        if (msg.resultado == "OK"){
            alertify.success("Servicio registrado correctamente");
            gestionServicios();
        }
        else
            alertify.error("Error al registrar servicio");
        console.log('EXITO, SERVIDOR RESPONDE:  ' + msg);
        cerrarPanelAltaServicio();
    })
    .fail(function(msg) {
        console.log('FALLO, SERVIDOR RESPONDE:  ' + msg);
        alert("Houston, tenemos un problema!!!");
    })
}

function confirmarcontratarServicio(mail,idServicio,tecnico){

    //el mail es el del tecnico OJO
    $.ajax({
        url: ip + '/?rt=services',
        type: 'POST',
        data: JSON.stringify({
            mail: mail,
            idServicio: idServicio,
            tecnico: tecnico,
            operation: 'contratarServicio'
        }),
        datatype: "json",
        contentType: "application/json",
    })
    .done(function(msg) {
        console.log(msg);
        if (msg.contains('OK')){
            alertify.success("Servicio contradado correctamente, el tecnico se pondra en contacto con ud a la brevedad!!");
        }
        else{
            alertify.error("Error al registrar servicio");
        }
    })
    .fail(function(msg) {
        console.log('FALLO, SERVIDOR RESPONDE:  ' + msg);
        alert("Houston, tenemos un problema!!!");
    })
}

function obtenerTodosLosPaises(){
    /*
    metodo: GET
    url: http://localhost/e1bfd7PHP/TecnicoYa/?rt=services&operation=getAllPaises
    retorno: json;
    */
}

function obtenerDeptosPorPais(idPaisInp){
    /*
    metodo: GET
    url: http://localhost/e1bfd7PHP/TecnicoYa/?rt=services&operation=getDeptosPosPais&idPais=1
    retorno: json;
    */
    $.ajax({
        url: '/e1bfd7PHP/TecnicoYa/?rt=services&operation=getDeptosPosPais&idPais=' + idPaisInp,
        type: 'GET',
        datatype: "application/json",
    })
    .done(function(msg) {
        var msg = JSON.parse(msg);        
        //console.log(msg);
        updateComboDeptos(msg);
    })
    .fail(function(msg) {
        console.log(msg);
    })
}

function logOff(){
    /*
    metodo: GET
    url: http://localhost/e1bfd7PHP/TecnicoYa/?rt=services&operation=getDeptosPosPais&idPais=1
    retorno: json;
    */
    $.ajax({
        url: '/e1bfd7PHP/TecnicoYa/?rt=usuario/logout',
        type: 'GET',
    })
    .done(function(msg) {
        window.location.href = "/e1bfd7PHP/TecnicoYa/?rt=index/index";
    })
    .fail(function(msg) {
        alert("Error al desloguear");
    })
}

function obtenerLocalidadesPorDepto(){
    /*
    metodo: GET
    url: http://localhost/e1bfd7PHP/TecnicoYa/?rt=services&operation=getLocalidadesPosDepto&idDepto=2
    retorno: json;
    */
}

function esServicioYaOfrecido(idServicio){
    $.ajax({
        url: '/e1bfd7PHP/TecnicoYa/?rt=services&operation=esServicioYaOfrecido&idServicio=' + idServicio,
        type: 'GET',
        datatype: "application/json",
    })
    .done(function(msg) {
        var msg = JSON.parse(msg);
        $("#mjeServYaOfrec").empty();
        if (msg.ofrecido == "TRUE")
            $("#mjeServYaOfrec").append("<p style='color:red;'>Servicio ya ofrecido</p>");
        else 
            $("#mjeServYaOfrec").append("<p>Nuevo servicio</p>");
    })
    .fail(function(msg) {
        console.log(msg);
    })
}

function loadComboFiltroTipoServicio(){
    $.ajax({
        url: '/e1bfd7PHP/TecnicoYa/?rt=services&operation=getTodosServicios',
        type: 'GET',
        datatype: "application/json",
    })
    .done(function(msg) {
        var msg = JSON.parse(msg);
        updateComboFiltroTipoServicio(msg);
    })
    .fail(function(msg) {
        console.log(msg);
    })
}


/* ACCIONES DEL MENÚ DE ADMINSITRACIÓN */


function gestionServicios(){
    $("#wrapperDivAdministracion").load("/e1bfd7PHP/TecnicoYa/?rt=listados/obtenerTodosServicios");    
}

function gestionPaises(){
    $("#wrapperDivAdministracion").load("/e1bfd7PHP/TecnicoYa/?rt=listados/obtenerTodosPaises");    
}

function gestionDepartamentos(){
    $("#wrapperDivAdministracion").load("/e1bfd7PHP/TecnicoYa/?rt=listados/obtenerTodosDepartamentos");    
}

function gestionLocalidades(){
    $("#wrapperDivAdministracion").load("/e1bfd7PHP/TecnicoYa/?rt=listados/obtenerTodosLocalidades");    
}

function altaUsuario(){
    $("#wrapperFrontEnd").load("/e1bfd7PHP/TecnicoYa/?rt=usuario/registroUsuario");    
}

function listadoServiciosPublicados(){

    var tipoServicio = $("#cmbFiltroTipoServicio").val();
    if (tipoServicio == undefined)
        tipoServicio = "todos";

    var likeServicio = $("#input-busqueda").val();
    var url = "/e1bfd7PHP/TecnicoYa/?rt=listados/otenerTodosServiciosPublicados&tipoServicio=" + tipoServicio + "&likeServicio=" + likeServicio;
    console.log(url);
    $("#wrapperFrontEnd").load(url);    
}

function misServicios(){
    $("#wrapperFrontEnd").load("/e1bfd7PHP/TecnicoYa/?rt=usuario/verMisServicios");       
}

function ofrecerNuevoServicio(){
    $("#wrapperFrontEnd").load("/e1bfd7PHP/TecnicoYa/?rt=usuario/ofrecerNuevoServicio");       
}

function contratarServicio(tecnico,idServicio){
    console.log("tecnico: " + tecnico);
    console.log("idServicio: " + idServicio);
}

function verMasDeServicioOfrecido(tecnico,idServicio){
    console.log("tecnico: " + tecnico);
    console.log("idServicio: " + idServicio);
}

