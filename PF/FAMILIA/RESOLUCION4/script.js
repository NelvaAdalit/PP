function cargarBotones() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("menu").innerHTML = ajax.responseText;
             attachMenuListeners();
            
        }
    };
    ajax.send();

}
cargarBotones();

function InformacionEstudiante(){
    const nombre="Mora Barrionuevo Nelva Adalit";
    const cu="35-5812";
    const principal=`
    <div>
    <p style="margin-left:20px"><strong>Nombre:</strong>${nombre}</p>
    <p style="margin-left:20px"><strong>Cu:</strong>${cu}</p>
    <p style="margin-left:20px"><strong>Numero visita:</strong><span id="visitas"></span></p>
    </div>
    `;
    document.getElementById("principal").innerHTML=principal;
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "contador.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("visitas").innerText = xhr.responseText;
        }
    };
    xhr.send();
}

InformacionEstudiante();

function attachMenuListeners() {
    const botones = document.querySelectorAll("#menu button");
    botones.forEach(boton => {
        boton.onclick = function () {
            agregarAlHistorial(boton.innerText);
        };
    });
}

function agregarAlHistorial(texto) {
    const historial = document.getElementById("historial");
    historial.innerHTML += `<p>Presionó ${texto}</p>`;
}

document.querySelector(".btnmenu").onclick = () => {
    const menu = document.getElementById("menu");
    menu.style.visibility =
        menu.style.visibility === "hidden" ? "visible" : "hidden";
};
