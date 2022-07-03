<?PHP
include("../menu.php");

?>

<!--  este apartado es el contenido del programa -->
<div class="col-9" ">
   <div class=" ContForm">
    <form action="PerInsForm.php" method="POST" enctype="multipart/form-data">
        <center>
            <h1 class="h4">Formulario de personal</h1>
        </center>
        <script>
            //aqui se llama al api departtamentos para que se a lo primero al iniciar la pagina
            ListarDepartamentos('<?php echo JS . '/api_departamentos.json' ?>');
            ListarAreasSelect('<?php echo WS . '/ws_area.php' ?>');
            ListarCargoSelect('<?php echo WS . '/ws_cargo.php' ?>');

        </script>
            <h5>Datos Personales</h5>
            <!-- REGISTRO DEL PERSONAL -->
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre: </label>
                            <input type="text" name="nombre" id="txtNombre" class="form-control" placeholder="Ingrese nombre" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Apellidos: </label>
                            <input type="text" name="apellido"  id="txtApellido" class="form-control" placeholder="Apellidos" aria-describedby="helpId">
                        </div>
                    </div>
                </div>
            </div></br>
            <!-- fecha nac - dni  -  -->
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col">
                        <div class="form-group">
                            <label for="">DNI: </label>
                            <input type="text" name="txtDocPer" id="txtDocPer" class="form-control" placeholder="12345678" maxlength="8" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Fecha de Nacimiento: </label>
                            <input type="date" name="dateFecNacPer" id="dateFecNacPer" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                </div>
            </div></br>
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="">Direccion: </label>
                            <input type="text" name="txtDirper" id="txtDirper" class="form-control" placeholder="Jr. Av. Calle. direccion #32 " aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Departamento</label>
                            <select class="form-control" name="slcDepartamento" id="slcDep" onclick="ListarProvincia('<?php echo JS . '/api_provincias.json' ?>')">

                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Provincia</label>
                            <select class="form-control" name="slcProvincia" id="slcProv" onclick="ListarDistritos('<?php echo JS . '/api_distritos.json' ?>')">
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Distrito</label>
                            <select class="form-control" name="slcDistrito" id="slcDist">
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
                            <input type="email" class="form-control" name="txtEmaPer" id="txtEmaPer" aria-describedby="emailHelpId" placeholder="email@email.xyz">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="tel" class="form-control" name="txtTelPer" id="txtTelPer" aria-describedby="emailHelpId" placeholder="+51 000 000 000">

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Sexo</label>
                            <select class="form-control" name="slcSexo" id="slcSexo">
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
                    <h5>Asignacion</h5>
                    <div class="row justify-content-start">
                        <!-- area -->
                        <div class="col">
                            <div class="form-group">
                                <label for="">Area:</label>
                                <select class="form-control" name="slcArea" id="slcArea">
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
            
            
            <!-- BOTON DE ENVIO -->
            <div class="container">
                <div class="row justify-content-center">
                    <input name="btnGuardar" id="btnFormRegPer" class="btn btn-outline-success" type="button" onclick="RegistroPersonal();CreateUsuarioFPer();corecto();" value="Guardar">
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