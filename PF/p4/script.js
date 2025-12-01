function cargarModal(url){
    var Cmodal;
    Cmodal=document.getElementById('contenidoModal');
    var modal=document.getElementById('modal');
    fetch(url)
        .then(response=>response.text())
        .then(data=>{
            Cmodal.innerHTML=data;
            modal.style.display='block';
        }) 
}

function autenticarUsuario() {
    let datos = new FormData(document.querySelector('#form_login'));
    let email=document.getElementById('email').value
    fetch("autenticar.php", { method: "POST", body: datos })
        .then(res => res.text())
        .then(data => {
            if (data.includes('success')) { 
                document.getElementById('log').innerHTML = `<span>Usuario: ${email}</span>`;
                cerrarModal();
            } else {
                alert("Usuario o contraseña incorrectos");
            }
        });
    return false; 
}


function cerrarModal(){
    var modal=document.getElementById('modal');
    modal.style.display='none';
}

function cargarContenido(url){
    var contenido=document.getElementById('principal');
    fetch(url)
    .then(response=>response.text())
    .then(data=>{
        contenido.innerHTML=data;
    })
}


function crearReceta(){
    var ajax= new XMLHttpRequest();
    var datos= new FormData(document.querySelector('#form_insertar'));
    ajax.open("post","insertar.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4 && ajax.status==200){
           document.querySelector('#principal').innerHTML=ajax.responseText;
            
        }
    }
    ajax.send(datos);
        setTimeout(function(){
                cargarContenido('listar.php');
                cerrarModal();
            }, 100);
}


function tomarReceta(id){
    cargarModal(`form_edit_recetas.php?id=${id}`);
    console.log("ingreo a form");
}


function actualizarReceta() {
    let form = document.querySelector('#form_editar');
    let datos = new FormData(form);
    let contenedor = document.getElementById('principal');

    fetch("edit_recetas.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        contenedor.innerHTML = data;
        setTimeout(function(){
            cargarContenido('listar.php');
            cerrarModal();
        }, 500);
    });

    return false; 
}

function eliminarReceta(id){
    if(confirm("Estas seguro que quieres eliminar")){
        contenedor = document.getElementById('principal');
    fetch(`eliminarR.php?id=${id}`)
		.then(response => response.text())
		.then(data => {contenedor.innerHTML=data
            setTimeout(function(){
                cargarContenido('listar.php');
            }, 500);
        });
    }
}


