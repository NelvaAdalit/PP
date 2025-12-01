function cargarBotones() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
            document.getElementById("menu").innerHTML = ajax.responseText;
            attachMenuListeners();
        }
    };
    ajax.send();
}

function InformacionEstudiante() {
    const nombre = "Mora Barrionuevo Nelva Adalit";
    const cu = "35-5812";
    const mensaje = `
        <div style="display:flex; flex-direction:row; gap:30px;">
            <p style="margin-left:20px"><strong>Nombre:</strong> ${nombre}</p>
            <p><strong>CU:</strong> ${cu}</p>
            <p><strong>Numero visita:</strong> <span id="visitas"></span></p>
        </div>
    `;
    document.getElementById("mensaje").innerHTML = mensaje;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "contador.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("visitas").innerText = xhr.responseText;
        }
    };
    xhr.send();
}

function cargarPregunta(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById("menu").innerHTML = data;
        });
}

function cargarPregunta3() {
    const formulario = `
        <form action="">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario"><br>
            <label for="password">Password</label>
            <input type="password" name="password"><br>
            <div style="display: flex; flex-direction: row;">
                <label for="catcha">Catcha</label>
                <input type="text" name="catcha">
                <label for="capcha">Capcha</label>
                <input type="text" name="capcha">
            </div><br>
            <button type="submit">Loguearse</button>
        </form>
    `;
    document.getElementById("mensaje").innerHTML = "";
    document.getElementById("principal").innerHTML = formulario;
}

function attachMenuListeners() {
    const botones = document.querySelectorAll("#menu button");
    botones.forEach((boton, index) => {
        boton.onclick = function () {
            agregarAlHistorial(`Botón ${index + 1}`);

            switch (index) {
                case 0:
                    InformacionEstudiante();
                    break;
                case 1:
                    cargarPregunta('galeria.php');
                    break;
                case 2:
                    cargarPregunta3();
                    break;
                case 3:
                    alert("Botón 4 presionado");
                    break;
                case 4:
                    alert("Botón 5 presionado");
                    break;
            }
        };
    });
}

function agregarAlHistorial(texto) {
    const historial = document.getElementById("mensaje");
    historial.innerHTML = `<p>${texto}</p>`;
}
function cargarimagen(imagen) {
   
    fetch(`cargarimg.php?imagen=${imagen}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById("principal").innerHTML = data;
        });

   
    fetch(`cargarnombre.php?imagen=${imagen}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById("mensaje").innerHTML = data;
        });
}
