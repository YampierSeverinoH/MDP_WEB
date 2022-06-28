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
        $sql = "INSERT INTO tbpersona
        (Per_Nombre,
        Per_ApePatMat,
        Per_Direccion,
        Per_Provincia,
        Per_Departamento,
        Per_Distrito,
        Per_Celular,
        Per_Correo,
        Per_Sexo,
        Per_FecNac,
        Per_Documento)
        VALUES
        ('" . $_POST['txtNombre'] . "',
        '" . $_POST['txtApellido'] . "',
        '" . $_POST['direccion'] . "',
        '" . $_POST['prov'] . "',
        '" . $_POST['dep'] . "',
        '" . $_POST['dis'] . "',
        '" . $_POST['telefono'] . "',
        '" . $_POST['email'] . "',
        '" . $_POST['sexo'] . "',
        '" . $_POST['fechaNac'] . "',
        '" . $_POST['documento'] . "');";
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

        $sql = "UPDATE tbcargo
        SET
        Car_nombre = '" . $nombre . "',
        Car_Estado = '" . $estado . "',
        Car_Descripcion = '" . $descripcion . "'
        WHERE Car_Id ='" . $idCargo . "';";
        $res = $con->exec($sql);
        $con->desconectar();
        sleep(2);
    }
    if($accion=="extrae"){
        $Q=$_POST['id'];
        $sql = "SELECT * FROM tbpersona WHERE Per_Id ='".$Q ."'";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
}
if ($method == "GET") {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == "buscar") {
           if(isset($_GET['consulta'])){
            $Q = $_GET['consulta'];
            $sql = "SELECT * FROM tbpersona WHERE Per_Documento LIKE '%" . $Q . "%'";
           }else{
            $sql = "SELECT * FROM tbpersona";
           }
           
            $res = $con->findAll($sql);
            $con->desconectar();
            echo json_encode($res);
        }
    } else {
        $sql = "SELECT * FROM tbpersona";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
}
