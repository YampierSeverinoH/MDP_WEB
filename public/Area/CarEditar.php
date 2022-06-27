<?PHP
include("../menu.php");
if (isset($_GET['id'])) {
    require_once('../../Model/bd.php');
    $consql = new Conexion("mysqli");
    $sql = "select * from tbcargo where Car_Id='" . $_GET['id'] . "'";
    $CargoGet = $consql->antiq($sql);
    $consql->desconectar();
}
?>



<div class="col-9">
    <div class=" ContForm">

        <div class="ContForm">
            <h5>Editar Cargo</h5>
            <!-- REGISTRO de area -->
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idCargoUpd" value="<?PHP echo$_GET['id'];?>">
                          <label for="">Nombre: </label>
                            <input type="text" name="txtNomCargoUpd" id="txtNomCargoUpd" class="form-control" placeholder="Nombre de área" value="<?php echo $CargoGet['Car_nombre']; ?>" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Estado del Cargo</label>
                            <select class="form-control" name="slcEstCargoUpd" id="slcEstCargoUpd">
                                <option value="A" <?php if ($CargoGet['Car_Estado'] == 'A') {
                                                        echo ' selected';
                                                    } ?>>Activo</option>
                                <option value="I" <?php if ($CargoGet['Car_Estado'] == 'I') {
                                                        echo ' selected';
                                                    } ?>>Inactivo</option>
                                <option value="O" <?php if ($CargoGet['Car_Estado'] == 'O') {
                                                        echo ' selected';
                                                    } ?>>Observaciones</option>
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
                            <textarea class="form-control" name="txtDesCargoUpd" id="txtDesCargoUpd" rows="1" placeholder="Ingrese una descripcion"><?php echo $CargoGet['Car_Descripcion']; ?></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <center>

                            <a href="<?php echo AREA; ?>/CarListar.php" name="btnActualizarCargo" id="btnActualizarCargo" class="btn btn-success" onclick="UpdateCargo();MRealizado()">Guardar</a>
                            <a href="<?php echo AREA; ?>/CarListar.php" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Cancelar</a>
                        </center>
                    </div>
                </div>
            </div>
        </div></br>


    </div>
</div>
</div>
</div>
</body>

</html>
<?PHP ?>