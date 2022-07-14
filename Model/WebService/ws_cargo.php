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
    if ($accion == "Registro") {
        $nombre = $_POST['nomArea'];
        $estado = $_POST['estArea'];
        $descripcion = $_POST['desArea'];
        $sql = "INSERT INTO tbcargo
        (Car_Estado,
        Car_Descripcion,
        Car_nombre)
        VALUES
        ('" . $estado . "',
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
        $idCargo = $_POST['idArea'];
        
        $sql="UPDATE tbcargo
        SET
        Car_nombre = '".$nombre."',
        Car_Estado = '".$estado."',
        Car_Descripcion = '".$descripcion."'
        WHERE Car_Id ='".$idCargo."';";
        $res = $con->exec($sql);
        $con->desconectar();
        sleep(2);
    }
}
if ($method == "GET") {
    if (isset($_POST['action'])) {
    } else {
        $sql = "SELECT * FROM tbcargo";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
}
