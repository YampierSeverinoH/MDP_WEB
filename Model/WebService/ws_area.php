<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

//include("../../public/php/const.php");
require_once('../bd.php');
$con = new Conexion("pdo");


$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    //recupoeracion de ajax
    $accion = $_POST['action'];
    if ($accion == "RegistrarArea") {
        $nombre = $_POST['nomArea'];
        $estado = $_POST['estArea'];
        $descripcion = $_POST['desArea'];
        $sql = "INSERT INTO tbarea
        (Are_Id,
        Are_Estado,
        Are_Descripcion,
        Are_Nombre)
        VALUES
        ('',
        '" . $estado . "',
        '" . $descripcion . "',
        '" . $nombre . "');";
        $res = $con->exec($sql);
        $con->desconectar();
        sleep(2);
    }
    if ($accion == "actualizar") {
        echo "Ingreso a acrtualizaer";
        $nombre = $_POST['nomArea'];
        $estado = $_POST['estArea'];
        $descripcion = $_POST['desArea'];
        $idArea = $_POST['idArea'];
        
        $sql="UPDATE tbarea
        SET
        Are_Nombre = '".$nombre."',
        Are_Estado = '".$estado."',
        Are_Descripcion = '".$descripcion."'
        WHERE Are_Id ='".$idArea."';";
        $res = $con->exec($sql);
        $con->desconectar();
        sleep(1);
    }
}
if ($method == "GET") {
    if (isset($_POST['action'])) {
    } else {
        $sql = "SELECT * FROM tbarea";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
}
