function cargarContenido(url){
    var contenedor;
    contenedor=document.getElementById('contenido');
    fetch(url)
    .then(response=>response.text())
    .then(data=>contenedor.innerHTML=data);
}

function modalImagen( fotografia,titulo,tipore){
    document.getElementById("modalImg").src=fotografia;
    document.getElementById("Titulo").textContent= titulo;
    document.getElementById("Tipo").textContent="Tipo: "+ tipore;
    document.getElementById("modal").style.display="block";
}
function cargarContenidoModal(url){
    var Cmodal;
    Cmodal=document.getElementById('contenidoModal');
    var modal=document.getElementById('modal1');
    fetch(url)
        .then(response=>response.text())
        .then(data=>{
            Cmodal.innerHTML=data;
            modal.style.display='block';
        }) 
}
 
function cerrarModal1(){
    document.getElementById("modal1").style.display="none";
}
function cerrarModal(){
    document.getElementById("modal").style.display="none";
}

function cargarContenid(url) {
	var contenedor;
	contenedor = document.getElementById('modalForm');
	fetch(url)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
    document.getElementById('modalForm').style.display="block";

}

function crear(){
    var ajax= new XMLHttpRequest();
    var datos= new FormData(document.querySelector('#form_recetass'));
    ajax.open("post","guardar_recetas.php",true);
    ajax.onreadystatechange=function(){
        if (ajax.readyState==4 && ajax.status==200){
           document.querySelector('#contenido').innerHTML=ajax.responseText;
            
        }
    }

    ajax.send(datos);
     setTimeout(function(){
                cargarContenido('galeria.php');
                cerrarMl();
            }, 1000);
}


function cargarContenid(url) {
	var contenedor;
	contenedor = document.getElementById('contenido');
	fetch(url)
		.then(response => response.text())
		.then(data => contenedor.innerHTML=data);
    
}

function AgregarColor(){
    color=document.getElementById('color').value;
    gridcontendor=document.getElementById('gridcontendor');
    var elemento=document.createElement('div');
    elemento.style.width="200px";
    elemento.style.height="20px";
    elemento.style.margin="5px";
    elemento.style.background=color;
    elemento.onclick=function(){
        cambiarColorMenu(color);
    };
    gridcontendor.appendChild(elemento);
}

function cambiarColorMenu(){
    var menu=document.getElementById('menu');
    menu.style.background=color;
}

function seleccionarColor(){
    select=document.getElementById('selectColor').value;
    var menu=document.getElementById('menu');
    var colores = {
        "Claro": "#f0f0f0",
        "Oscuro": "#333333",
        "Contraste": "#ff0000",
        "Pastel": "#a8dadc"
    };
   menu.style.background=colores[select];

}

function Agrandar(){
    let imagen=document.getElementById('imagen');
    let mas=10;
    ancho=parseInt(imagen.style.width);
    imagen.style.width=(ancho + mas)+"px";
}

function Achicar(){
    let imagen=document.getElementById('imagen');
    let menos=10;
    ancho=parseInt(imagen.style.width);
    imagen.style.width=(ancho-menos)+"px";
}

function filtrarRecetas() {
    var datos = new FormData(document.querySelector('#filtrosRecetas'));

    fetch("listar_recetas.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        document.querySelector('#contenido').innerHTML = data;
    });
}