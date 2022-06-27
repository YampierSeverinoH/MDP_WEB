<?PHP
include("../menu.php");
if (isset($_GET['id'])) {
    require_once('../../Model/bd.php');
    $consql = new Conexion("mysqli");
    $sql = "select * from tbarea where Are_Id='" . $_GET['id'] . "'";
    $AreGet = $consql->antiq($sql);
    $consql->desconectar();
}
?>



<div class="col-9">
    <div class=" ContForm">

        <div class="ContForm">
            <h5>Editar Área</h5>
            <!-- REGISTRO de area -->
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col">
                        <div class="form-group">
                            <input type="hidden" id="idAreaUpd" value="<?PHP echo$_GET['id'];?>">
                          <label for="">Nombre: </label>
                            <input type="text" name="txtNomAreaUpd" id="txtNomAreaUpd" class="form-control" placeholder="Nombre de área" value="<?php echo $AreGet['Are_Nombre']; ?>" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Estado del área</label>
                            <select class="form-control" name="slcEstAreaUpd" id="slcEstAreaUpd">
                                <option value="A" <?php if ($AreGet['Are_Estado'] == 'A') {
                                                        echo ' selected';
                                                    } ?>>Activo</option>
                                <option value="I" <?php if ($AreGet['Are_Estado'] == 'I') {
                                                        echo ' selected';
                                                    } ?>>Inactivo</option>
                                <option value="O" <?php if ($AreGet['Are_Estado'] == 'O') {
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
                            <textarea class="form-control" name="txtDesAreaUpd" id="txtDesAreaUpd" rows="1" placeholder="Ingrese una descripcion"><?php echo $AreGet['Are_Descripcion']; ?></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <center>

                            <a href="<?php echo AREA; ?>/AreListar.php" name="btnActualizarArea" id="btnActualizarArea" class="btn btn-success" onclick="UpdateArea();MRealizado()">Guardar</a>
                            <a href="<?php echo AREA; ?>/AreListar.php" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Cancelar</a>
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