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
            <h1 class="h4">LISTADO DE AREAS</h1><br> </center>

            <div id="ConModAreas" class="row row-cols-3 gap-3">
                
            </div>
       
    </div>
</div>
</div>
</div>
</body>
</html>