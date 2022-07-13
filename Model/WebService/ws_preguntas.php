<?php
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

//include("../../public/php/const.php");
require_once('../bd.php');
$con = new Conexion("pdo");


$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    //recupoeracion de ajax
    if (isset($_POST['action'])) {
        $accion = $_POST['action'];
    } else {
        $accion = $_GET['action'];
    }
    if ($accion == "Registro") {       
        $sql="INSERT INTO tb_preguntas
        (Pre_P01,Pre_P02,Pre_P03,Pre_P04,Pre_P05,Pre_P06,Pre_P07,Pre_P08,Pre_P09,Pre_P010,Pre_P011,Pre_idUser,Pre_Fecha,Pre_estado)VALUES
        ('".$_POST['pc1']."','".$_POST['pc2']."','".$_POST['pc3']."','".$_POST['pc4']."','".$_POST['pc5']."','".$_POST['pc6']."','".$_POST['pc7']."','".$_POST['pc8']."','".$_POST['pc9']."','".$_POST['pc10']."','".$_POST['pc11']."','".$_POST['id']."','".date('Y-m-d')."','".$_POST['estado']."');";
        
        $res = $con->exec($sql);
        $con->desconectar();
        echo json_encode($res);
    }
    if ($accion == "Actualizar") {
        $sql = "";
        $res = $con->exec($sql);
        $con->desconectar();
        echo json_encode($res);
    }
    if ($accion == "extrae") {
        $Q = $_POST['id'];
        $sql = "";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
    if ($accion == "Eliminar") {
        $sql = "";
        $res = $con->exec($sql);
        $con->desconectar();
    }
}
if ($method == "GET") {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == "buscar") {
            if (isset($_GET['consulta'])) {
                $Q = $_GET['consulta'];
                $sql = "";
            } else {
                $sql = "";
            }

            $res = $con->findAll($sql);
            $con->desconectar();
            echo json_encode($res);
        }
    } else {
        $sql = "";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
}
