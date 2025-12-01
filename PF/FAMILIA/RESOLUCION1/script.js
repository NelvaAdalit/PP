function cargarBotones() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("menu").innerHTML = ajax.responseText;
        }
    };
    ajax.send();

}

function InformacionEstudiante(){
    const nombre="Mora Barrionuevo Nelva Adalit";
    const cu="35-5812";
    const mensaje=`
    <div style="display:flex; flex-direction:row;gap:30px;">
    <p style="margin-left:20px"><strong>Nombre:</strong>${nombre}</p>
    <p><strong>CU:</strong> ${cu} </p>
    </div>
    `;
    document.getElementById("mensaje").innerHTML=mensaje;
    
}

function cargarPregunta(url){
    fetch(`${url}`)
    .then(response=>response.text())
    .then(data=>{
        document.getElementById("menu").innerHTML=data;
    })
}

 function cargarimagen(imagen){
    fetch(`cargarimg.php?imagen=${imagen}`)
    .then(response=>response.text())
    .then(data=>{
        document.getElementById("principal").innerHTML=data;
    })
    fetch(`cargarnombre.php?imagen=${imagen}`)
    .then(response=>response.text())
    .then(data=>{
        document.getElementById("mensaje").innerHTML=data;
    })

}

function cargarPregunta3(){
    const formulario = `
<form action="">
    <label for="usaurio">usuario</label>
    <input type="text" name="usuario">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password">
    <br>
    <div style="display: flex; flex-direction: row;">
             <label for="catcha">Catcha</label>
             <input type="" name="catcha">
             <label for="capcha">Capcha</label>
             <input type="" name="capcha">
    </div>
    <br>
    <button  type="submit" onclick="">Loguearse </button>
 
    
</form>`
;
    document.getElementById("menu").innerHTML="";
    document.getElementById("mensaje").innerHTML="";
    document.getElementById("principal").innerHTML=formulario;
}