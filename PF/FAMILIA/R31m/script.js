function cargarBotones() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "botones.html", true);
    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
           document.getElementById("menu").innerHTML = ajax.responseText;
           historialBotones();
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
    `;
    document.getElementById("principal").innerHTML=principal;

}
InformacionEstudiante();

function historialBotones() {
    const botones = document.querySelectorAll("#menu button");
    botones.forEach((boton, index) => {
        boton.onclick = function () {
            agregarAlHistorial(`Botón ${index + 1}`);

            switch (index) {
                case 0:
                    InformacionEstudiante();
                    break;
                case 1:
                    pregunta2();
                    break;
                case 2:
                    alert("Botón 3 presionado");
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
    const historial = document.getElementById("historial");
    historial.innerHTML += `<p>Presionó ${texto}</p>`;
}

function cargarPregunta(url){
    fetch(`${url}`)
    .then(response=>response.text())
    .then(data=>{
        document.getElementById("menu").innerHTML=data;
    })
    agregarAlHistorial("Pregunta 2");
}

function pregunta2() {
    fetch('tablas.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById("principal").innerHTML = data;
        });
}

function calcularOperacion() {
    let operacion = document.querySelector('input[name="operacion"]:checked').value;
    let tablaDel = parseInt(document.getElementById("tablaDel").value);
    let hastaEl = parseInt(document.getElementById("hastaElInput").value);
    let resultadoHTML = "<table border='1' style='margin-top: 15px;'>";
    let opSimbolo = '';
    for (let i = 1; i <= hastaEl; i++) {
        let resultadoParcial = 0;
        switch (operacion) {
            case 'suma':
                resultadoParcial = i + tablaDel;
                opSimbolo = '+';
                break;
            case 'resta':
                resultadoParcial = i - tablaDel;
                opSimbolo = '-';
                break;
            case 'multiplicar':
                resultadoParcial = i * tablaDel;
                opSimbolo = '*';
                break;
            case 'dividir':
                if (tablaDel !== 0) {
                    resultadoParcial = (i / tablaDel).toFixed(2);
                } else {
                    resultadoParcial = 'Error (Div / 0)';
                }
                opSimbolo = '/';
                break;
        }
        resultadoHTML += `<tr>
                            <td>${i}</td>
                            <td>${opSimbolo}</td>
                            <td>${tablaDel}</td>
                            <td>=</td>
                            <td>${resultadoParcial}</td>
                         </tr>`;
    }
    resultadoHTML += "</table>";
    document.getElementById("principal").innerHTML = resultadoHTML;
}