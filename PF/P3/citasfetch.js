function cargarContenido(url){
    var contenido=document.getElementById('contenido');
    fetch(url)
    .then(response=>response.text())
    .then(data=>{
        contenido.innerHTML=data;
    })
}

function cargarContenidoModal(url){
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



function registrarCita(){
    var datos=new FormData(document.querySelector('#form_insertar_cita'));
    contenedor=document.getElementById('contenido');
    console.log("entra a formulario");
   fetch("citasCrear.php",{method:"POST",body:datos})
         .then(response=>response.text())
         .then(data=>{contenedor.innerHTML=data
          
         });

         cerrarModal()
}


function cerrarModal() {
    var modal = document.getElementById('modal');
    modal.style.display = 'none';
}
function filtrarCitas() {

    var id = document.getElementById('filtro_medico').value;
    var id = document.getElementById('filtro_paciente').value;
    var estado = document.getElementById('filtro_estado').value;

    var url = `leerCitas.php?id_medico=${id}&id_paciente=${id}&estado=${estado}`;
    
    cargarContenido(url);
}