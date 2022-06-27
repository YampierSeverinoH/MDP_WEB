<?PHP
include("../menu.php");

?>

<!-- <?PHP ?> este apartado es el contenido del programa -->
<div class="col-9">
   <div class=" ContForm">
    <form action="" method="POST" enctype="multipart/form-data">
        <center>
            <h1 class="h4">CONTROL DE AREAS Y CARGOS</h1>
        </center>

        <script>
            //aqui se llama al api departtamentos para que se a lo primero al iniciar la pagina
        </script>
        <!-- control de areas -->
        <div class="ContForm">
            <h5>Registro Área</h5>
            <!-- REGISTRO de area -->
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre: </label>
                            <input type="text" name="txtNomArea" id="txtNomArea" class="form-control" placeholder="Nombre de área" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Estado del área</label>
                            <select class="form-control" name="slcEstArea" id="slcEstArea">
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                                <option value="O">Observaciones</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            </br>
            <div class="container">
                <label for="">Descripcion</label>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="form-group">
                            <textarea class="form-control" name="txtDesArea" id="txtDesArea" rows="1" placeholder="Ingrese una descripcion"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <center>

                            <button name="btnSaveArea" id="btnSaveArea" class="btn btn-success" onclick="RegArea();Mensaje()">Guardar</button>
                            <button name="btnCleanArea" id="btnCleanArea" class="btn btn-primary">Cancelar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div></br>
        <!-- control de cargos -->
        <div class="ContForm">
            <h5>Registrar un Cargo</h5>
            <!-- REGISTRO DEL cargos -->
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Nombre: </label>
                            <input type="text" name="txtNomCargo" id="txtNomCargo" class="form-control" placeholder="Nombre de cargo" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Estado del Cargo</label>
                            <select class="form-control" name="slcEstCargo" id="slcEstCargo">
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
                                <option value="O">Observaciones</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            </br>
            <div class="container">
                <label for="">Descripcion</label>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="form-group">

                            <textarea class="form-control" name="txtDesCargo" id="txtDesCargo" rows="1" placeholder="Ingrese una descripcion"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <center>
                            <button name="btnSaveCargo" id="btnSaveCargo" class="btn btn-success">Guardar</button>
                            <button name="btncleanCargo" id="btncleanCargo" class="btn btn-primary" type="">Cancelar</button>
                        </center>
                    </div>
                </div>
            </div>
        </div></br>
        <!-- tabla de cargos  y areas  
        <div class="container">

            <center>
                <h5></h5><br>
            </center>
            <div class="row justify-content-start">
                <div class="col">
                    <a name="" id="" class="btn btn-outline-info" href="#" role="button">Areas</a>
                    <a name="" id="" class="btn btn-outline-dark" href="#" role="button">Cargos</a>

                </div>
                <table class="table">
                    <thead>

                        <tr>
                            <th>N</th>
                            <th>NOMBRE</th>
                            <th>ESTADO</th>
                            <th>DESCRIPCION</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td scope="row">Gerencia</td>
                            <td scope="row">Activo</td>
                            <td scope="row">La gerencia </td>
                            <td scope="row">
                                <a href="#"><img class="img-fluid" src="<?php echo IMAGENES; ?>/pencil.png" alt=""></a>
                                <a href="#"><img class="img-fluid" src="<?php echo IMAGENES; ?>/trash.png" alt=""></a>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">1</td>
                            <td scope="row">Secretaria</td>
                            <td scope="row">Activo</td>
                            <td scope="row">Secretaria</td>
                            <td scope="row">
                                <a href="#"><img class="img-fluid" src="<?php echo IMAGENES; ?>/pencil.png" alt=""></a>
                                <a href="#"><img class="img-fluid" src="<?php echo IMAGENES; ?>/trash.png" alt=""></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div> -->
    </form>

</div>
</div>
</div>

</div>
</body>

</html>