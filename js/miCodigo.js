// console.log("sss");
function selecio() {

    console.log(operation);
}

function ListarDepartamentos(ur) {

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#slcDep');
            res.innerHTML = '';

            for (let item of datos) {
                res.innerHTML += `
                <option value="${item.id_ubigeo}">${item.nombre_ubigeo}</option>`;
            }
        }
    }
}
function ListarProvincia(ur) {
    var operation = document.getElementById("slcDep").value;
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);

            let res = document.querySelector('#slcProv');
            res.innerHTML = '';
            for (let item of datos[operation]) {
                res.innerHTML += `
                <option value="${item.id_ubigeo}">${item.nombre_ubigeo}</option>`;
            }
        }
    }
}
function ListarDistritos(ur) {
    var operation = document.getElementById("slcProv").value;
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);

            let res = document.querySelector('#slcDist');
            res.innerHTML = '';
            for (let item of datos[operation]) {
                res.innerHTML += `
                <option value="${item.id_ubigeo}">${item.nombre_ubigeo}</option>`;
            }
        }
    }
}
function PreVisualizarPerfil() {
    const $seleccionArchivos = document.querySelector("#FileFormPerfil"),
        $imagenPrevisualizacion = document.querySelector("#imagenFormPerfil");

    $seleccionArchivos.addEventListener("change", () => {
        const archivos = $seleccionArchivos.files;
        if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }
        const primerArchivo = archivos[0];
        const objectURL = URL.createObjectURL(primerArchivo);
        $imagenPrevisualizacion.src = objectURL;
    });
}

function PreVisualizarHuella() {
    const $seleccionArchivos = document.querySelector("#FileFormHuella"),
        $imagenPrevisualizacion = document.querySelector("#imagenFormHuella");

    $seleccionArchivos.addEventListener("change", () => {
        const archivos = $seleccionArchivos.files;
        if (!archivos || !archivos.length) {
            $imagenPrevisualizacion.src = "";
            return;
        }
        const primerArchivo = archivos[0];
        const objectURL = URL.createObjectURL(primerArchivo);
        $imagenPrevisualizacion.src = objectURL;
    });


}
function RegArea() {
    console.log("acceso");
    var nom = document.getElementById("txtNomArea").value;
    var des = document.getElementById("txtDesArea").value;
    var est = document.getElementById("slcEstArea").value;
    var men = document.getElementById("MenAlert");
    var data = {
        "nomArea": nom,
        "estArea": est,
        "desArea": des,
        "action": "RegistrarArea"
    };
    $.ajax({
        data: data, //datos que se envian a traves de ajax
        url: '/Model/WebService/ws_area.php', //archivo que recibe la peticion
        type: 'post', //método de envio
    });
}
// //"warning", "error", "success" and "info".
function Mensaje() {
    swal("REALIZADO", "Se Registro correctamente", "info");
}

function MRealizado() {
    swal("Actualizado", "Se actualizo correctamente", "success");
}
//LISTAR AREAS
function ListarAreas(ur) {

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#ConModAreas');
            res.innerHTML = '';
            if(datos===""){
                alert("no existen datos");
            }else{
                for (let item of datos) {
                    res.innerHTML += `
                    <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-center">${item.Are_Nombre}</h5>
                      <p class="card-text text-start">${item.Are_Descripcion}</p>
                      <p class="card-text">Estado: ${leerEsatdo(item.Are_Estado)}</p><br>
                      <a href="AreEditar.php?id=${item.Are_Id}" class="btn btn-primary position-absolute bottom-0 start-50 translate-middle-x">Editar</a>
                    </div>
                  </div>`;
                }
            }
            
        }
    }
}
function UpdateArea() {
    var nom = document.getElementById("txtNomAreaUpd").value;
    var des = document.getElementById("txtDesAreaUpd").value;
    var est = document.getElementById("slcEstAreaUpd").value;
    var id = document.getElementById("idAreaUpd").value;
    var data = {
        "nomArea": nom,
        "estArea": est,
        "desArea": des,
        "idArea":id,
        "action": "actualizar"
    };
    $.ajax({
        data: data, //datos que se envian a traves de ajax
        url: '/Model/WebService/ws_area.php', //archivo que recibe la peticion
        type: 'post', //método de envio
    });
}
//<a href="/Model/WebService/ws_area.php?id=${item.Are_Id}&action=Editar" class="btn btn-primary">Editar</a>

//CRUD DE CARGOS
function RegCargo() {
    var nom = document.getElementById("txtNomCargo").value;
    var des = document.getElementById("txtDesCargo").value;
    var est = document.getElementById("slcEstCargo").value;
    var data = {
        "nomArea": nom,
        "estArea": est,
        "desArea": des,
        "action": "Registro"
    };

    $.ajax({
        data: data, //datos que se envian a traves de ajax
        url: '/Model/WebService/ws_cargo.php', //archivo que recibe la peticion
        type: 'post', //método de envio
    });
}
function leerEsatdo(estado){
    var rsp;
    if(estado==="A"){
        rsp= "Activo";
    }else if(estado==="I"){
        rsp=  "Inactivo";
    }else{
        rsp=  "Observaciones";
    }
    return rsp;
}
function ListarCargo(ur) {

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#ConModCargo');
            res.innerHTML = '';
            if(datos===""){
                alert("no existen datos");
            }else{
                for (let item of datos) {
                    res.innerHTML += `
                    <div class="card">
                    <div class="card-body">
                      <h5 class="card-title text-center">${item.Car_nombre}</h5>
                      <p class="card-text text-start">${item.Car_Descripcion}</p>
                      <p class="card-text">Estado: ${leerEsatdo(item.Car_Estado)}</p><br>
                      <a href="CarEditar.php?id=${item.Car_Id}" class="btn btn-primary position-absolute bottom-0 start-50 translate-middle-x">Editar</a>
                    </div>
                  </div>`;
                }
            }
            
        }
    }
}
function UpdateCargo() {
    var nom = document.getElementById("txtNomCargoUpd").value;
    var des = document.getElementById("txtDesCargoUpd").value;
    var est = document.getElementById("slcEstCargoUpd").value;
    var id = document.getElementById("idCargoUpd").value;
    var data = {
        "nomArea": nom,
        "estArea": est,
        "desArea": des,
        "idArea":id,
        "action": "actualizar"
    };
    $.ajax({
        data: data, //datos que se envian a traves de ajax
        url: '/Model/WebService/ws_cargo.php', //archivo que recibe la peticion
        type: 'post', //método de envio
    });
}
