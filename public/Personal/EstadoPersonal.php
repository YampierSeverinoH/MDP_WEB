<?PHP
include("../menu.php");

?>
<script>
    ListarEstadoPersonal('<?php echo WS . '/ws_cargo.php' ?>');
</script>
<div class="col-9">
    <div class=" ContForm">
        <center>
            <h1 class="h4">Estado de personal</h1>
        </center>
        <div class="container">
            <div class="row">
                    <div id="ConModPersonal" class="row row-cols-3 gap-3">
                        
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