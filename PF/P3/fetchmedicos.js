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


function crearMedicos(){
    var datos=new FormData(document.querySelector('#form_insertar_medico'));
    contenedor=document.getElementById('contenido');
    fetch("crearmedico.php",{method:"POST",body:datos})
         .then(response=>response.text())
         .then(data=>{contenedor.innerHTML=data
          setTimeout(function(){
            
                cargarContenido('leer.php');
            }, 5000);
         });

         cerrarModal()
}

function cerrarModal() {
    var modal = document.getElementById('modal');
    modal.style.display = 'none';
}


function TomarMedico(id){
    cargarContenidoModal(`form_editar.php?id=${id}`);

}

function actualizarMedico() {
    let form = document.querySelector('#formEditMedico');
    let datos = new FormData(form);
    let contenedor = document.getElementById('contenido');
    fetch("edit_medicos.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        contenedor.innerHTML = data; 
       setTimeout(function(){
         cerrarModal()
                cargarContenido('leer.php');
            }, 5000);
    });
   
    

}
