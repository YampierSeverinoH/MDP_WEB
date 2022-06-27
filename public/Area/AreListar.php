<?PHP
include("../menu.php");

?>

<!-- <?PHP ?> este apartado es el contenido del programa -->
<div class="col-9">
    <div class=" ContForm">
        <script>
            ListarAreas('<?php echo WS . '/ws_area.php' ?>');
        </script>
        <center>
            <h1 class="h4">listado de areas</h1><br>
            <div id="ConModAreas" class="row row-cols-3 gap-3">
                
            </div>
        </center>
    </div>
</div>
</div>
</div>
</body>
</html>