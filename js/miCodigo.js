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
            if (datos === "") {
                alert("no existen datos en areas");
            } else {
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
function ListarAreasSelect(ur) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#slcArea');
            res.innerHTML = '';
            if (datos === "") {
                alert("no existen datos");
            } else {
                for (let item of datos) {
                    res.innerHTML += `<option value="${item.Are_Id}">${item.Are_Nombre}</option>`;

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
        "idArea": id,
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
function leerEsatdo(estado) {
    var rsp;
    if (estado === "A") {
        rsp = "Activo";
    } else if (estado === "I") {
        rsp = "Inactivo";
    } else {
        rsp = "Observaciones";
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
            if (datos === "") {
                alert("no existen datos");
            } else {
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
function ListarCargoSelect(ur) {

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#slcCargo');
            res.innerHTML = '';
            if (datos === "") {
                alert("no existen datos");
            } else {
                for (let item of datos) {
                    res.innerHTML += `<option value="${item.Car_Id}">${item.Car_nombre}</option>`;

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
        "idArea": id,
        "action": "actualizar"
    };
    $.ajax({
        data: data, //datos que se envian a traves de ajax
        url: '/Model/WebService/ws_cargo.php', //archivo que recibe la peticion
        type: 'post', //método de envio
    });
}
//REGISTRO DEL PERSONAL
function RegistroPersonal() {
    var nombre = document.getElementById("txtNombre").value;
    var apellidos = document.getElementById("txtApellido").value;
    var documento = document.getElementById("txtDocPer").value;
    var fechaNac = document.getElementById("dateFecNacPer").value;
    var direccion = document.getElementById("txtDirper").value;
    var dep = document.getElementById("slcDep").value;
    var prov = document.getElementById("slcProv").value;
    var dis = document.getElementById("slcDist").value;
    var email = document.getElementById("txtEmaPer").value;
    var telefono = document.getElementById("txtTelPer").value;
    var sexo = document.getElementById("slcSexo").value;

    var data = {
        "txtNombre": nombre,
        "txtApellido": apellidos,
        "documento": documento,
        "fechaNac": fechaNac,
        "direccion": direccion,
        "dep": dep,
        "prov": prov,
        "dis": dis,
        "email": email,
        "telefono": telefono,
        "sexo": sexo,
        "action": "Registro"
    };
    console.log(data);
    $.ajax({
        data: data, //datos que se envian a traves de ajax
        url: '/Model/WebService/ws_persona.php', //archivo que recibe la peticion
        type: 'post', //método de envio
    });
}
function muestraMdFoto() {
    const exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const recipient = button.getAttribute('data-bs-whatever')
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')
        modalTitle.textContent = `New message to ${recipient}`
        modalBodyInput.value = recipient
    })
}
function ListarPersonaTable(ur) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#tddataTablePersona');
            res.innerHTML = '';
            if (datos === "") {
                alert("no existen datos");
            } else {
                for (let item of datos) {
                    res.innerHTML += `
                    <tr >
                        <td scope="row">${item.Per_Id}</td>
                        <td scope="row">${item.Per_ApePatMat + ', ' + item.Per_Nombre}</td>
                        <td scope="row">${item.Per_Celular}</td>
                        <td scope="row">${item.Per_Documento}</td>
                        <td scope="row">
                            <a href="/public/Personal/PerUpdForm.php?id=${item.Per_Id}"><img class="img-fluid" src="/public/img/pencil.png" alt=""></a>
                            <a href="/public/Personal/PerLisForm.php?id=${item.Per_Id}"><img class="img-fluid" src="/public/img/trash.png" alt=""></a>
                            <a  type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"  data-bs-whatever="@mdo"><img class="img-fluid" src="/public/img/upload.png" style="height: 32px;" alt="Cargar imagen"></a>
                        </td>
                    </tr>
                    `;

                }
            }

        }
    }
}
function buscarPersona(ur) {
    var dni = document.getElementById('txtbuscarPersonaDNI').value;

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur + "?action=buscar&consulta=" + dni, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        let res = document.querySelector('#tddataTablePersona');
        res.innerHTML = '';
        if (this.readyState == 4 && this.status == 200) {
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#tddataTablePersona');
            res.innerHTML = '';
            if (datos === "") {
                alert("no encontrado");
            } else {
                for (let item of datos) {
                    res.innerHTML += `
                    <tr >
                        <td scope="row">${item.Per_Id}</td>
                        <td scope="row">${item.Per_ApePatMat + ', ' + item.Per_Nombre}</td>
                        <td scope="row">${item.Per_Celular}</td>
                        <td scope="row">${item.Per_Documento}</td>
                        <td scope="row">
                            <a href="/public/Personal/PerUpdForm.php?id=${item.Per_Id}"><img class="img-fluid" src="/public/img/pencil.png" alt=""></a>
                            <a href="/public/Personal/PerLisForm.php?id=${item.Per_Id}"><img class="img-fluid" src="/public/img/trash.png" alt=""></a>
                            <a  type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"  data-bs-whatever="@mdo"><img class="img-fluid" src="/public/img/upload.png" style="height: 32px;" alt="Cargar imagen"></a>
                        </td>
                    </tr>
                    `;

                }
            }

        }
    }
}
function MuestraPersonalEditar(id) {
    var data={
        "action": 'extrae',
        "id": id,
    };
    $.ajax({
        data: data, //datos que se envian a traves de ajax
        url: '/Model/WebService/ws_persona.php', //archivo que recibe la peticion
        type: 'post', //método de envio
        success: function (json) {
            //let datos = JSON.parse(json);
            console.log(json);
            document.getElementById("txtNombre").value=json[0]['Per_Nombre'];
            document.getElementById("txtApellido").value=json[0]['Per_ApePatMat'];
            document.getElementById("txtDir").value=json[0]['Per_Direccion'];
            document.getElementById("idtxtEmail").value=json[0]['Per_Correo'];
            document.getElementById("idTxtTel").value=json[0]['Per_Celular'];
            $("#slcSexo > option[value="+json[0]['Per_Sexo']).attr("selected",true);
            document.getElementById("slcDep").value=json[0]['Per_Departamento']
            $("#slcDep > option[value="+json[0]['Per_Departamento']+"]").attr("selected",true);
            $("#slcProv > option[value="+json[0]['Per_Provincia']+"]").attr("selected",true);
            $("#slcDistrito > option[value="+json[0]['Per_Distrito']+"]").attr("selected",true);
            // document.getSelection("slcSexo").setPosition=json[0]['Per_Sexo'];
            // document.getSelection("slcDep").se=json[0]['Per_Sexo']
        }
    });

}