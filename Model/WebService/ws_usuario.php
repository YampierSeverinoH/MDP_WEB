<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

//include("../../public/php/const.php");
require_once('../bd.php');
$con = new Conexion("pdo");


$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    //recupoeracion de ajax
    if(isset($_POST['action'])){
        $accion = $_POST['action']; 
    }else{
        $accion =$_GET['action'];
    }
    if ($accion == "Registro") {

        $sqlUser = "INSERT INTO tbusuario
        (Usu_Descripcion,
        Usu_ygsh,
        Usu_Estado,
        Usu_FecCrea,
        Usu_idPersona)
        VALUES
        ('" . $_POST['email'] . "',
        '" . $_POST['documento'] . "',
        'A',
        '" .date('Y-m-d')."',
        (SELECT Per_Id FROM tbpersona WHERE Per_Documento='" . $_POST['documento'] . "'));";
        $re = $con->exec($sqlUser);
        $con->desconectar();
    }
    if ($accion == "Inhabilitar") {
        $sql="UPDATE tbusuario
        SET
        Usu_Estado = 'I'
        WHERE Usu_idPersona = '" . $_POST['id'] . "'; ";
        $res = $con->exec($sql);
        $con->desconectar();
        sleep(2);
    }
}
if ($method == "GET") {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == "buscar") {
           if(isset($_GET['consulta'])){
            $Q = $_GET['consulta'];
            $sql = "SELECT * FROM tbusuario WHERE Per_Documento LIKE '%" . $Q . "%'";
           }else{
            $sql = "SELECT * FROM tbusuario";
           }
           
            $res = $con->findAll($sql);
            $con->desconectar();
            echo json_encode($res);
        }
    } else {
        $sql = "SELECT * FROM tbusuario";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
}
