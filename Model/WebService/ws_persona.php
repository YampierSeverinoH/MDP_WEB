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

        if (isset($_POST['txtNombre']) && !empty($_POST['txtNombre'])) {
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
            echo json_encode($res);
        } else {
            echo json_encode("Error");
        }
    }
    if ($accion == "Actualizar") {
        $sql = "UPDATE tbpersona
        SET
        Per_Nombre = '" . $_POST['txtNombre'] . "',
        Per_ApePatMat = '" . $_POST['txtApellido'] . "',
        Per_Direccion ='" . $_POST['direccion'] . "',
        Per_Provincia = '" . $_POST['prov'] . "',
        Per_Departamento = '" . $_POST['dep'] . "',
        Per_Distrito = '" . $_POST['dis'] . "',
        Per_Celular ='" . $_POST['telefono'] . "',
        Per_Correo ='" . $_POST['email'] . "'
        WHERE Per_Id ='" . $_POST['id'] . "';";
        $res = $con->exec($sql);
        $con->desconectar();
        echo json_encode($res);
    }
    if ($accion == "extrae") {
        $Q = $_POST['id'];
        $sql = "SELECT * FROM tbpersona WHERE Per_Id ='" . $Q . "'";
        $res = $con->findAll($sql);
        $con->desconectar();
        echo json_encode($res);
    }
    if ($accion == "Eliminar") {
        $sql = "DELETE FROM tbpersona
     WHERE  Per_Id = '" . $_POST['id'] . "';";
        $res = $con->exec($sql);
        $con->desconectar();
    }
    if ($accion == "CargaFoto") {
        if (is_uploaded_file($_FILES['FileFormPerfil']['tmp_name'])) {
            //tmp_name nombre temporal del archivo en el servidor
            $nombre_archivo = time() . $_FILES['FileFormPerfil']['name']; //nombre del archivo en la computadora del cliente
            move_uploaded_file($_FILES['FileFormPerfil']['tmp_name'], "fotos/" . $nombre_archivo); //muevo el archivo ubicacion final
            $sql = "UPDATE tbpersona
            SET
            Per_Foto = '" . $nombre_archivo . "'
            WHERE  Per_Id = '" . $_POST['prueba'] . "';";
            $res = $con->exec($sql);
            $con->desconectar();
            header("Location: /public/Personal/PerLisForm.php");
        } else {
            echo "no cargo la foto";
        }
    }
}
if ($method == "GET") {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        if ($action == "buscar") {
            if (isset($_GET['consulta'])) {
                $Q = $_GET['consulta'];
                $sql = "SELECT * FROM tbpersona WHERE Per_Documento LIKE '%" . $Q . "%'";
            } else {
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
