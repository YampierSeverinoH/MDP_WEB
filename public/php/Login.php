<?php
include("../cabecera.php");

?>

<body>
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <div class="row g-2" id="contLogin">
                    <div class="col">
                        <img class="img-fluid" src="<?php echo IMAGENES; ?>/logo6.jpg" id="contImgLogin">
                    </div>
                    <div class="col">
                        <div id="ContenFrom">
                            <p id="LoginTitulo">Bienvenido al sistema</p>
                            <p id="LoginMensaje">Sitema de control de asistencia de la Municipalidad Distrital de Pucalá</p>
                            <div id="LoginForm">
                                <form action="<?php echo WS; ?>/ws_usuario.php" method="post">
                                    <p>
                                        <?php
                                        if (isset($_GET['e'])) {
                                            $error[1] = "Usuario o contraseña no existe.";
                                            $error[2] = "El usuario no se encuentra activo. Comuníquese con el administrador.";
                                            $error[3] = "Acceso restringido.";
                                            $error[4] = "Su sesión se ha cerrado correctamente.";
                                            $error[5] = "No cuenta con permisos activos. Comuníquese con el administrador.";
                                            //"warning", "error", "success" and "info".
                                            //swal(tituñlo, mensaje,accion)
                                        ?>
                                            <script>
                                                swal("Error", "<?php echo $error[$_GET['e']];  ?>", "error");
                                            </script>

                                        <?php
                                        }
                                        ?>
                                    </p>
                                    <div class="form-group">
                                        <label for="">Usuario:</label>
                                        <input type="text" name="LoginUser" id="LoginUser" class="form-control" placeholder="Ingrese usuario" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="password" class="form-control" name="LoginPass" id="LoginPass" placeholder="*********">
                                    </div>
                                    <button type="submit" class="btn" id="LoginBtnIngresar"><b>Ingresar</b></button>
                                </form>

                            </div>
                            <a href="#">
                                <p id="LoginRecPass">No se acuerda la contraseña?</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>