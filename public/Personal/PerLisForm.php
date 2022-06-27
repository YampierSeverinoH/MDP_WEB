<?PHP
include("../menu.php");

?>
<div class="col-9" ">
   <div class=" ContForm">
    <center>
        <h1 class="h4">LISTA DE PERSONAL</h1>
    </center>

    <div class="container">
        <label for="">BUSCAR: </label>
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
        </div>
</div>
</div>
</div>
</div>

</div>
</body>

</html>