function cargarModal(url){
    var contenido = document.getElementById('contenidoModal');
    var modal = document.getElementById('modal');

    var ajax = new XMLHttpRequest();
    ajax.open("GET", url, true);

    ajax.onreadystatechange = function(){
        if(ajax.readyState === 4 && ajax.status === 200){
            contenido.innerHTML = ajax.responseText;
            modal.style.display = 'block';
        }
    };

    ajax.send();
}


function cargarContenido(abrir){
    var ajax=new XMLHttpRequest();
    ajax.open("get",abrir,true);
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4 && ajax.status==200){
            document.querySelector('#contenido').innerHTML=ajax.responseText;
        }
    }
    ajax.setRequestHeader("Content-Type","text/html; charset=uft-8");

    ajax.send();
}

function crearPaciente(){
   var ajax=new XMLHttpRequest();
   var datos= new FormData(document.querySelector('#form_insertar_paciente'));
   ajax.open("post","crearPaciente.php",true);
   ajax.onreadystatechange=function(){
    if(ajax.readyState==4 && ajax.status==200){
        document.querySelector('#contenido').innerHTML=ajax.responseText;

    }
   }
   ajax.send(datos);

}

function TomarPaciente(id){
    var ajax=new XMLHttpRequest();
    ajax.open("GET",`form_editar_paciente.php?id=${id}`,true);
    
    ajax.onreadystatechange=function(){
        if(ajax.readyState==4 && ajax.status==200){
            document.querySelector('#contenido').innerHTML=ajax.responseText;

        }
    }
    ajax.send();
}

function actualizarPaciente(){
    var ajax = new XMLHttpRequest();
    var datos = new FormData(document.getElementById('actualizarP'));
    ajax.open("post", "editarPaciente.php", true);

    ajax.onreadystatechange = function () {
        if (ajax.readyState == 4 && ajax.status == 200) {
             document.querySelector('#contenido').innerHTML=ajax.responseText;
             setTimeout(function(){
                cargarContenido('leerPaciente.php');
            }, 500);
        }
    };

    ajax.send(datos);
    return false;
}


function eliminarPaciente(id){
    if(confirm("Estas seguro que quieres eliminar")){
        var ajax=new XMLHttpRequest();
        ajax.open("GET",`eliminarPaciente.php?id=${id}`,true);
        ajax.onreadystatechange= function(){
            if(ajax.readyState== 4 && ajax.status==200){
                document.querySelector('#contenido').innerHTML=ajax.responseText;
                setTimeout(function(){
                    cargarContenido('leerPaciente.php');
                },500);
            }
        }
        ajax.send();
    }

}
