<?PHP
include("../menu.php");

?>
<script>
    ListarPersonaTable('<?php echo WS . '/ws_persona.php' ?>');
</script>
<div class="col-9" ">
   <div class=" ContForm">
    <center>
        <h1 class="h4">LISTA DE PERSONAL</h1>
    </center>
    <input type="hidden" id="prueba" name="prueba" value="">
    <script>


    </script>
    <div class="container">
        <label for="">BUSCAR: </label>
        <div class="row justify-content-start">
            <div class="col-4">
                <div class="form-group">

                    <input type="text" name="txtbuscarPersonaDNI" id="txtbuscarPersonaDNI" class="form-control" placeholder="Ingrese DNI" aria-describedby="helpId">
                </div>
            </div>
            <div class="col">
                <a name="" id="" class="btn btn-primary" href="#" onclick="buscarPersona('<?php echo WS . '/ws_persona.php' ?>')" role="button" data-bs-whatever="@mdo" onclick="">buscar</a>
                <!-- <button onclick='' type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  data-bs-whatever="@mdo"></button> -->
            </div>
        </div>
    </div><br>

    <div class="container">

        <center>
            <h5></h5><br>
        </center>
        <div class="row justify-content-start">
            <table class="table">
                <thead>

                    <tr>
                        <th>N</th>
                        <th>NOMBRE</th>
                        <th>TELEFONO</th>
                        <th>DOCUMENTO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="tddataTablePersona">



                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cargar imagenes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="container">
                            <!-- imagenes a cargar -->

                            <br>
                            <div class="row justify-content-start">
                                <!-- subir imagen de foto -->
                                <div class="col">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="">Foto de perfil</label><br>
                                            <input type="file" class="form-control-file" onclick="PreVisualizarPerfil()" name="FileFormPerfil" id="FileFormPerfil" placeholder="" aria-describedby="fileHelpId">
                                        </div>
                                    </div><br>
                                    <div class="row justify-content-center">
                                        <img src="" alt="" style="height: 50%; width:50% ;" id="imagenFormPerfil">
                                    </div>
                                </div>
                            </div>

                        </div><br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

</div>
</body>

</html>