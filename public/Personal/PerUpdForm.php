<?PHP
include("../menu.php");
if (isset($_GET['id'])) {
    $idpersona = $_GET['id'];
?>
    <script>
        ListarDepartamentos('/js/api_departamentos.json');
        MuestraPersonalEditar('<?php echo $idpersona ?>');
        ListarAreasSelect('<?php echo WS . '/ws_area.php' ?>');
        ListarCargoSelect('<?php echo WS . '/ws_cargo.php' ?>');
    </script>
<?PHP
} else {
?>
    <script>
        swal("Error", "No se seleciono ningun identificador", "error");
    </script>
<?PHP
}
?>
<script>
   
</script>
<div class="col-9">
    <div class=" ContForm">
        <form action="PerUpd.php" method="POST" enctype="multipart/form-data">
            <center>
                <h1 class="h4">Actualizar personal</h1>
            </center>


            <h5>Datos Personales</h5>
            <!-- REGISTRO DEL PERSONAL -->
            <div class="container">
                
                <div class="row justify-content-start">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre: </label>
                            <input type="text" name="nombre" id="txtNombre" class="form-control" placeholder="Ingrese nombre" aria-describedby="helpId">
                            <input type="hidden" name="idOculto" id="idOculto" value="'<?php echo $idpersona ?>'">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Apellidos: </label>
                            <input type="text" name="apellido" id="txtApellido" class="form-control" placeholder="Apellidos" aria-describedby="helpId">
                        </div>
                    </div>
                </div>
            </div></br>
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="">Direccion: </label>
                            <input type="text" name="direccion" id="txtDir" class="form-control" placeholder="Jr. Av. Calle. direccion #32 " aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Departamento</label>
                            <select class="form-control" name="" id="slcDep" onclick="ListarProvincia('<?php echo JS . '/api_provincias.json' ?>')">

                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Provincia</label>
                            <select class="form-control" name="slcProv" id="slcProv" onclick="ListarDistritos('<?php echo JS . '/api_distritos.json' ?>')">
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Distrito</label>
                            <select class="form-control" name="slcDist" id="slcDist">
                            </select>
                        </div>
                    </div>
                </div>
            </div></br>

            <div class="container">
                <div class="row justify-content-start">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="txtEmail" id="idtxtEmail" aria-describedby="emailHelpId" placeholder="email@email.xyz">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="tel" class="form-control" name="txtTel" id="idTxtTel" aria-describedby="emailHelpId" placeholder="+51 000 000 000">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Sexo</label>
                            <select disabled class="form-control" name="" id="slcSexo">
                                <option value="m">Masculino</option>
                                <option value="f">Femenino</option>
                                <option value="x">otros</option>
                            </select>
                        </div>
                        <br>
                    </div>

                </div>
            </div>

            <!-- REGISTRO DE CARGOS -->
            <div class="container">
                <div class="ContForm">
                    <h5>Asignacion de cargo</h5>
                    <span class="span"> Se modifica si el personal cambio de cargo o areá</span>
                    <div class="row justify-content-start">
                        <!-- area -->
                        <div class="col">
                            <div class="form-group">
                                <label for="">Area:</label>
                                <select class="form-control" name="" id="slcArea">
                                    <option value=""></option>
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Cargo:</label>
                                <select class="form-control" name="" id="slcCargo">
                                    <option value=""></option>
                                </select>
                            </div>
                            <br>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Fecha de inicio:</label>
                                <input class="form-control" type="date" name="fechaInicio" id="">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div><br>
            <!-- REGISTRO DE FOTO DE PERFIL Y DE HUELLAS -->
            <div class="container">
                <!-- imagenes a cargar -->
                <div class="ContForm">
                    <h5>Cargar imagenes</h5>
                    <br>
                    <div class="row justify-content-start">
                        <!-- subir imagen de foto -->
                        <div class="col">
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Foto de perfil</label><br>
                                    <input type="file" class="form-control-file" onclick="PreVisualizarPerfil()" name="" id="FileFormPerfil" placeholder="" aria-describedby="fileHelpId">
                                </div>
                            </div><br>
                            <div class="row justify-content-center">
                                <img src="" alt="" style="height: 50%; width:50% ;" id="imagenFormPerfil">
                            </div>
                        </div>
                        <!-- subir imagen de huella -->

                        <div class="col">
                            <div class="row">
                                <div class="form-group">
                                    <label for="">Huella digital</label><br>

                                </div>
                            </div><br>
                            <div class="row justify-content-center">
                                <img src="" alt="" style="height: 50%; width:50% ;" id="imagenFormHuella">
                            </div>
                        </div>
                    </div>

                </div>
            </div><br>
            <!-- BOTON DE ENVIO -->
            <div class="container">
                <div class="row justify-content-center">
                    <input name="btnActualizar" id="btnFormRegPer" class="btn btn-outline-primary" type="button" value="Actualziar" onclick="SavePersonalEditar()">
                </div>
            </div>

        </form>
    </div>
</div>
</div>
</div>

</div>
</body>

</html>