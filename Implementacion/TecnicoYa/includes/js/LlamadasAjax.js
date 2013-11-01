//Registro de Usuario
var ip = 'TecnicoYa';

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
        if (msg == "OK")
            alertify.success("Usuario registrado con éxito");
        else
            alertify.error("Error al registrar usuario");
        console.log(msg);
        cerrarPanelRegistro();
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
        alert(msg);
        if (msg == "OK")
            alertify.success("Servicio registrado correctamente");
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