<?php
include("../cabecera.php");

?>
<br>
<div class="container">
    <div class=" ContForm">
        <hr>
        <div class="row justify-content-center">
            <div class="col-1">
                <img src="<?php echo IMAGENES; ?>/logo4.jpg" alt="Munici" class="" height="80px">
            </div>
            <div class="col-6"><br>
                <h3>MUNICIPALIDAD DISTRITAL DE PUCALÁ </h3>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col">
                <div class=" ContForm">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <center> <img src="<?php echo IMAGENES; ?>/Perfil.png" alt="Munici" class="" height="150px"></center>
                        </div>
                    </div>
                    <br>
                    <center>
                        <h5>Datos del trabajador</h5>
                    </center><br>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <p>Nombre:</p>
                        </div>
                        <div class="col-5">
                            <p>Yampier severino</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <p>Cargo:</p>
                        </div>
                        <div class="col-5">
                            <p>Practicante de sistemas</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <p>Hora de entrada:</p>
                        </div>
                        <div class="col-5">
                            <p>7:00 AM</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class=" ContForm">
                    <div class="row justify-content-center">
                        <div class="col-7">
                            <div class="row">
                                <center>
                                    <h1>FECHA</h1>
                                    <H1  class="border border-success p-2 mb-2 ">15/02/22  <img src="<?php echo IMAGENES; ?>/calendar.png" alt="" class="" height="45px"></H1>
                                    <p id="MarEsp"></p>
                                    <h1 >HORA</h1>
                                    <H1  class="border border-success p-2 mb-2 ">07:30:30 AM  <img src="<?php echo IMAGENES; ?>/time.png" alt="" class="" height="45px"></H1>
                                    <p id="MarEsp"></p>
                                </center>
                            </div>
                            <div class="row">
                                <div hidden>
                                    <center>
                                        <img src="<?php echo IMAGENES; ?>/delete.png" alt="" class="" height="100px">
                                        <p>HUELLA NO RECONOCIDA</p>
                                    </center>
                                </div>
                                <div>
                                    <center>
                                        <img src="<?php echo IMAGENES; ?>/check.png" alt="" class="" height="100px">
                                        <p>HUELLA RECONOCIDA, MARCACIÓN EXITOSA, PUNTUAL</p>
                                    </center>
                                </div>

                                <div hidden>
                                    <center>
                                        <img src="<?php echo IMAGENES; ?>/alert.png" alt="" class="" height="100px">
                                        <p>HUELLA RECONOCIDA, MARCACIÓN EXITOSA, TARDANZA</p>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<a name="" id="" class="btn btn-outline-light" href="../menu.php" role="button">Regresar</a>






</div>
</div>

</div>
</body>

</html>