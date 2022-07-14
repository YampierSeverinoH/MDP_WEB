<?PHP
include("../menu.php");

?>

<!-- <?PHP ?> este apartado es el contenido del programa -->
<div class="col-9">
    <div class=" ContForm">
        <script>
            ListarCargo('<?php echo WS . '/ws_cargo.php' ?>');
        </script>
        <center>
            <h1 class="h4">lISTADO DE CARGOS</h1><br>
        </center>
        <div id="ConModCargo" class="row row-cols-3 gap-3">

        </div>

    </div>
</div>
</div>
</div>
</body>

</html>