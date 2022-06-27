<?PHP
include("../menu.php");

?>

<!-- <?PHP ?> este apartado es el contenido del programa -->
<div class="col-9" ">
   <div class=" ContForm">
    <form action="PerUpd.php" method="POST" enctype="multipart/form-data">
        <center>
            <h1 class="h4">Actualizar personal</h1>
        </center>
        <div class="container">
        <label for="">Personal a buscar: </label>
            <div class="row justify-content-start">
                <div class="col-4">
                    <div class="form-group">
                        
                        <input type="text" name="nombre" id="txtNombre" class="form-control" placeholder="Ingrese DNI" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col">
                    <a name="" id="" class="btn btn-primary" href="#" role="button">buscar</a>
                </div>
            </div>
        </div><br>
        <script>
            //aqui se llama al api departtamentos para que se a lo primero al iniciar la pagina
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
                        <select class="form-control" name="slcDepartamento" id="slcDep" disabled>

                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Provincia</label>
                        <select class="form-control" name="slcProvincia" id="slcProv" disabled>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Distrito</label>
                        <select class="form-control" name="slcDistrito" disabled id="slcDist">
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
                            <option value="m"></option>
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
                <input name="btnActualizar" id="btnFormRegPer" class="btn btn-outline-primary" type="submit" value="Actualziar">
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