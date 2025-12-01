function cargarContenido(abrir) {
    var contenedor = document.getElementById('contenido');
    fetch(abrir)
        .then(function(response){ return response.text(); })
        .then(function(data){ contenedor.innerHTML = data; });
}

function crear() {
    var contenedor = document.getElementById('contenido');
    var datos = new FormData(document.getElementById('form-insertar'));
    fetch('create.php', {
        method: 'POST',
        body: datos
    })
        .then(function(response){ return response.text(); })
        .then(function(data){
            contenedor.innerHTML = data;
            setTimeout(function(){ cargarContenido('read.php'); }, 2000);
        });
}

function formEditar(id) {
    var contenedor = document.getElementById('contenido');
    fetch('formeditar.php?id=' + encodeURIComponent(id))
        .then(function(response){ return response.text(); })
        .then(function(data){ contenedor.innerHTML = data; });
}

function editar() {
    var contenedor = document.getElementById('contenido');
    var datos = new FormData(document.getElementById('form-editar'));
    fetch('edit.php', {
        method: 'POST',
        body: datos
    })
        .then(function(response){ return response.text(); })
        .then(function(data){ contenedor.innerHTML = data; });
}
function eliminar(id) {
    if (confirm('Estas seguro que quieres eliminar')) {
        var contenedor = document.getElementById('contenido');
        fetch('delete.php?id=' + encodeURIComponent(id))
            .then(function(response){ return response.text(); })
            .then(function(data){ contenedor.innerHTML = data; });
    }
}


function crea_lista_parametros() {
    var tTitulo = document.getElementById("tTitulo");
    var tIdentidad = document.getElementById("tIdentidad");
    var tNombres = document.getElementById("tNombres");
    var tApellidos = document.getElementById("tApellidos");
    var RGSexo = document.getElementById("RGSexo");
    var tEdad = document.getElementById("tEdad");
    var tEmail = document.getElementById("tEmail");
    var SDepartamento = document.getElementById("SDepartamento");
    var tProfesion = document.getElementById("tProfesion");
    var sTipo = document.getElementById("sTipo");
    var tNumeroDeposito = document.getElementById("tNumeroDeposito");
    return "tTitulo=" + encodeURIComponent(tTitulo.value) +
        "&tIdentidad=" + encodeURIComponent(tIdentidad.value) +
        "&tNombres=" + encodeURIComponent(tNombres.value) +
        "&tApellidos=" + encodeURIComponent(tApellidos.value) +
        "&nocache=" + Math.random();
}

function Preinscribir() {
    var contenedor = document.getElementById('contenido');
    var cadena = crea_lista_parametros();
    fetch('preinscribir.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: cadena
    })
        .then(function(response){ return response.text(); })
        .then(function(data){ contenedor.innerHTML = data; });
}
