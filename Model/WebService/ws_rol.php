<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

//include("../../public/php/const.php");
require_once('../bd.php');
$con = new Conexion("pdo");

$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    $accion = $_POST['action'];
    if ($accion == "Cargar") {
        $sql = "SELECT a.Acc_nombre,a.Acc_Descripcion, ra.RolAcc_Padre 
        FROM tbrolusuario ru INNER JOIN tbrol r ON r.Rol_Id=ru.RolUsu_IdRol
        INNER JOIN tbrolacceso ra ON ra.RolAcc_IdRol=r.Rol_Id
        INNER JOIN tbacceso a ON a.Acc_Id=ra.RolAcc_IdAcceso
        WHERE ru.RolUsu_IdUsuario='" . $_POST['id'] . "'";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
    if ($accion == "Registro") {
        $sql = "INSERT INTO tbrolusuario
       (RolUsu_Estado,
       RolUsu_IdRol,
       RolUsu_FecIni,
       RolUsu_IdUsuario)
       VALUES
       ('A',
       '" . $_POST['rol'] . "',
       '" . $_POST['fecha'] . "',
        (SELECT u.Usu_Id FROM tbpersona p INNER JOIN tbusuario u ON p.Per_Id=u.Usu_idPersona
        WHERE Per_Documento='" . $_POST['documento'] . "'));";
        echo $sql;
        $res = $con->exec($sql);
        $con->desconectar();
    }
}
if ($method == "GET") {
    if (isset($_POST['action'])) {
        //
    } else {
        $sql = "SELECT * FROM tbrol";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
}
