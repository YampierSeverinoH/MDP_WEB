
var url = "";
var php = "";


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
                <option value='${item.id_ubigeo}'>${item.nombre_ubigeo}</option>`;
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
        data: data,
        url: '/Model/WebService/ws_area.php',
        type: 'post',
    });
}

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
        data: data,
        url: '/Model/WebService/ws_cargo.php',
        type: 'post',
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
        data: data,
        url: '/Model/WebService/ws_cargo.php',
        type: 'post',
    });
}
//REGISTRO DEL PERSONAL
function RegistroPersonal() {
    var data = {
        "txtNombre": document.getElementById("txtNombre").value,
        "txtApellido": document.getElementById("txtApellido").value,
        "documento": document.getElementById("txtDocPer").value,
        "fechaNac": document.getElementById("dateFecNacPer").value,
        "direccion": document.getElementById("txtDirper").value,
        "dep": document.getElementById("slcDep").value,
        "prov": document.getElementById("slcProv").value,
        "dis": document.getElementById("slcDist").value,
        "email": document.getElementById("txtEmaPer").value,
        "telefono": document.getElementById("txtTelPer").value,
        "sexo": document.getElementById("slcSexo").value,
        "action": "Registro"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_persona.php',
        type: 'post',
        success: function (json) {
            if (json == "Error") {
                swal(json, "No se registro correctamente", 'error');
                console.error("no se llenaron los campos correctamente");
            } else {
                CreateUsuarioFPer();
                AsignaiconAC();
                AsignaiconRoles();
            }

        }
    });
}

//---------------------------------
//CREACION DE SUSUARIOS AL REGISTRAR UNA PERSONA 
//---------------------------------
function CreateUsuarioFPer() {

    var data = {

        "documento": document.getElementById("txtDocPer").value,
        "email": document.getElementById("txtEmaPer").value,
        "action": "Registro"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_usuario.php',
        type: 'post',
        success: function (json) {
        }
    });
}
//---------------------------------
//      ASIGNACION DE FUCNIONES 
//---------------------------------
function AsignaiconAC() {
    var data = {

        "Area": document.getElementById("slcArea").value,
        "Cargo": document.getElementById("slcCargo").value,
        "fecha": document.getElementById("FechaInicio").value,
        "documento": document.getElementById("txtDocPer").value,
        "action": "RegistroAsignacion"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_usuario.php',
        type: 'post',
        success: function (json) {
        }
    });
}
//---------------------------------
//      ASIGNACION DE Roles 
//---------------------------------
function AsignaiconRoles() {
    var data = {

        "rol": document.getElementById("slcRoles").value,
        "fecha": document.getElementById("FechaInicio").value,
        "documento": document.getElementById("txtDocPer").value,
        "action": "Registro"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_rol.php',
        type: 'post',
        success: function (json) {
            console.log("acabo");
        }
    });
}
function muestraMdFoto() {
    const exampleModal = document.getElementById('exampleModal')
    const button = event.relatedTarget
    const recipient = button.getAttribute('data-bs-whatever')
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')
    modalTitle.textContent = `New message to ${recipient}`
    modalBodyInput.value = recipient;
}
function ListarPersonaTable(ur) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
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
                            <a href="/public/Personal/PerUpdForm.php?id=${item.Per_Id}" ><img class="img-fluid" src="/public/img/pencil.png" alt=""></a>
                            <a href="?id=${item.Per_Id}" onclick="DeletePersonaListar(${item.Per_Id});InhabilitarUser(${item.Per_Id})"><img class="img-fluid" src="/public/img/trash.png" alt=""></a>
                            <a href="?id=${item.Per_Id}" onclick="ExtreaeDatosBtn(${item.Per_Id})" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"  data-bs-whatever="@mdo"><img class="img-fluid" src="/public/img/upload.png" style="height: 32px;" alt="Cargar imagen"></button>
                        </td>
                    </tr>
                    `;

                }
            }

        }
    }
}
function ExtreaeDatosBtn(bar) {
    document.getElementById("prueba").value = bar;
    console.log(document.getElementById("prueba").value);
}
function InhabilitarUser(id) {
    var data = {
        "id": id,
        "action": "Inhabilitar"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_usuario.php',
        type: 'post',
        success: function (json) {
            alert("Eliminar");
        }
    });
}
function DeletePersonaListar(bar) {
    var data = {
        "id": bar,
        "action": "Eliminar"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_persona.php',
        type: 'post',
        success: function (json) {
            //no hay respues de ws
        }
    });
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
                            <a href="/public/Personal/PerUpdForm.php?id=${item.Per_Id}" ><img class="img-fluid" src="/public/img/pencil.png" alt=""></a>
                            <a href="?id=${item.Per_Id}" onclick="DeletePersonaListar(${item.Per_Id});"><img class="img-fluid" src="/public/img/trash.png" alt=""></a>
                            <a href="?id=${item.Per_Id}" onclick="ExtreaeDatosBtn(${item.Per_Id})" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal"  data-bs-whatever="@mdo"><img class="img-fluid" src="/public/img/upload.png" style="height: 32px;" alt="Cargar imagen"></button>
                        </td>
                    </tr>
                    `;

                }
            }

        }
    }
}
//NUEVA FUNCION PARA EDITAR PERSONA.,

function ListarDepartamentos(id) {

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', '/js/api_departamentos.json', true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#slcDep');
            res.innerHTML = '';
            for (let item of datos) {
                if (item.id_ubigeo == id) {
                    res.innerHTML += `
                    <option selected value='${item.id_ubigeo}'>${item.nombre_ubigeo}</option>`;
                } else {
                    res.innerHTML += `
                    <option value='${item.id_ubigeo}'>${item.nombre_ubigeo}</option>`;
                }
            }
        }
    }
}
function ListarProvinciaUpd(id, id2) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', '/js/api_provincias.json', true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#slcProv');
            res.innerHTML = '';
            for (let item of datos[id]) {
                if (item.id_ubigeo == id2) {
                    res.innerHTML += `
                    <option selected value="${item.id_ubigeo}">${item.nombre_ubigeo}</option>`;
                } else {
                    res.innerHTML += `
                    <option value="${item.id_ubigeo}">${item.nombre_ubigeo}</option>`;
                }
            }
        }
    }
}
function ListarDistritosUpd(id, id2) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', '/js/api_distritos.json', true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#slcDist');
            res.innerHTML = '';
            for (let item of datos[id]) {
                if (item.id_ubigeo == id2) {
                    res.innerHTML += `
                    <option selected value="${item.id_ubigeo}">${item.nombre_ubigeo}</option>`;
                } else {
                    res.innerHTML += `
                    <option value="${item.id_ubigeo}">${item.nombre_ubigeo}</option>`;
                }
            }
        }
    }
}
function MuestraPersonalEditar(id) {
    var data = {
        "action": 'extrae',
        "id": id,
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_persona.php',
        type: 'post',
        success: function (json) {
            document.getElementById("txtNombre").value = json[0]['Per_Nombre'];
            document.getElementById("txtApellido").value = json[0]['Per_ApePatMat'];
            document.getElementById("txtDir").value = json[0]['Per_Direccion'];
            document.getElementById("idtxtEmail").value = json[0]['Per_Correo'];
            document.getElementById("idTxtTel").value = json[0]['Per_Celular'];
            $("#idOculto").attr("value", json[0]['Per_Id']);
            $("#slcSexo > option[value='" + json[0]['Per_Sexo'] + "']").attr("selected", true);
            ListarDepartamentos(json[0]['Per_Departamento']);
            ListarProvinciaUpd(json[0]['Per_Departamento'], json[0]['Per_Provincia']);
            ListarDistritosUpd(json[0]['Per_Provincia'], json[0]['Per_Distrito']);
        }
    });
}
function SavePersonalEditar(id) {
    var data = {
        "txtNombre": document.getElementById("txtNombre").value,
        "txtApellido": document.getElementById("txtApellido").value,
        "direccion": document.getElementById("txtDir").value,
        "dep": document.getElementById("slcDep").value,
        "prov": document.getElementById("slcProv").value,
        "dis": document.getElementById("slcDist").value,
        "email": document.getElementById("idtxtEmail").value,
        "telefono": document.getElementById("idTxtTel").value,
        "id": id,
        "action": "Actualizar"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_persona.php',
        type: 'post',
        success: function (json) {
            alert("Registrado");
        }
    });
}
function DeletePersonalListar() {
    var data = {
        "id": document.getElementById("idOculto").value,
        "action": "Actualizar"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_persona.php',
        type: 'post', //método de envio
        success: function (json) {
            alert("Eliminado");
        }
    });
}

//---------------------------------
//      ACESOS
//---------------------------------

function ObtenerPermisosMenu(id) {
    var data = {

        "id": id,
        "action": "Cargar"
    };
    $.ajax({
        data: data,
        url: '/Model/WebService/ws_rol.php',
        type: 'post', //método de envio
        success: function (json) {

            //let datos =;
            var asistencia = document.querySelector('#PadreA');
            var Gpersonal = document.querySelector('#PadreGP');
            var AyC = document.querySelector('#PadreAC');
            var Rep = document.querySelector('#PadreR');

            asistencia.innerHTML = '';
            Gpersonal.innerHTML = '';
            AyC.innerHTML = '';
            Rep.innerHTML = '';
            for (let item of json) {
                if (item.RolAcc_Padre == "A") {
                    asistencia.innerHTML += `
                    <li>
                        <a href="${url + '/php' + item.Acc_Descripcion}" class="espacioado link-dark d-inline-flex text-decoration-none rounded">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">${item.Acc_nombre} </font>
                            </font>
                        </a>
                    </li>
                    `;
                }
                if (item.RolAcc_Padre == "GP") {
                    Gpersonal.innerHTML += `
                    <li>
                        <a href="${url + '/Personal' + item.Acc_Descripcion}" class="espacioado link-dark d-inline-flex text-decoration-none rounded">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">${item.Acc_nombre}  </font>
                            </font>
                        </a>
                    </li>
                    `;
                }
                if (item.RolAcc_Padre == "AC") {
                    AyC.innerHTML += `
                    <li>
                        <a href="${url + '/Area' + item.Acc_Descripcion}" class="espacioado link-dark d-inline-flex text-decoration-none rounded">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">${item.Acc_nombre}  </font>
                            </font>
                        </a>
                    </li>
                    `;
                }
                if (item.RolAcc_Padre == "R") {
                    Rep.innerHTML += ``;
                }
                if (item.RolAcc_Padre == "C") {
                    Rep.innerHTML += ``;
                }
            }
        }
    });
}
//---------------------------------
//      LISTAR ACCESOS
//---------------------------------
function listarAccesosFromPer(ur) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#slcRoles');
            res.innerHTML = '';
            if (datos === "") {
                alert("no existen datos");
            } else {
                for (let item of datos) {
                    res.innerHTML += `<option value="${item.Rol_Id}">${item.Rol_Descripcion}</option>`;
                }
            }

        }
    }
}

function RespuestaCovid(id) {
    var p1, p2, p3, p4, p5, p6, p7, p8, p8, p10, p11;
    let estado;
    if (document.getElementsByName("p01")[1].checked) { p1 = "0"; } else { p1 = "1"; }
    if (document.getElementsByName("p02")[1].checked) { p2 = "0"; } else { p2 = "1"; }
    if (document.getElementsByName("p03")[1].checked) { p3 = "0"; } else { p3 = "1"; }
    if (document.getElementsByName("p04")[1].checked) { p4 = "0"; } else { p4 = "1"; }
    if (document.getElementsByName("p05")[1].checked) { p5 = "0"; } else { p5 = "1"; }
    if (document.getElementsByName("p06")[1].checked) { p6 = "0"; } else { p6 = "1"; }
    if (document.getElementsByName("p07")[1].checked) { p7 = "0"; } else { p7 = "1"; }
    if (document.getElementsByName("p08")[1].checked) { p8 = "0"; } else { p8 = "1"; }
    if (document.getElementsByName("p09")[1].checked) { p9 = "0"; } else { p9 = "1"; }
    if (document.getElementsByName("p010")[1].checked) { p10 = "0"; } else { p10 = "1"; }
    if (document.getElementsByName("p011")[1].checked) { p11 = "0"; } else { p11 = "1"; }
    if( p1 == "0" && p2 == "0" && p3 == "0" && p4 == "0" && p5 == "0" && p6 == "0" && p7 == "0" && p8 == "0" && p9 == "0" && p10 == "0" && p11 == "1"){
        estado='N';
    }else{
        estado='R';
    }
    var data = {
        "pc1": p1, "pc2": p2,
        "pc3": p3, "pc4": p4,
        "pc5": p5, "pc6": p6,
        "pc7": p7, "pc8": p8,
        "pc9": p9, "pc10": p10,
        "pc11": p11,
        //n:normal - r:riesgo
        "estado":estado,
        "id": id,
        "action": "Registro"
    };

    $.ajax({
        data: data,
        url: '/Model/WebService/ws_preguntas.php',
        type: 'post',
        success: function (json) {
            alert("Registrado");
        }
    });

}
function ListarEstadoPersonal(ur) {

    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', ur, true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
            let res = document.querySelector('#ConModPersonal');
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
                        
                        </div>
                  </div>`;
                }
            }

        }
    }
}