<?php

//Api Rest
header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

include("../../public/php/const.php");
require_once('../bd.php');
$consql = new Conexion("mysqli");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {

    if (isset($_POST['LoginUser']) && isset($_POST['LoginUser'])) {
        $user = $_POST['LoginUser'];
        $pass = $_POST['LoginPass'];
        $sql = "SELECT Usu_Descripcion,
        Usu_ygsh,
        Usu_Estado,
        Usu_Id,
        Usu_idPersona,
        Per_Nombre,
        Per_ApePatMat,
        Per_Foto FROM tbusuario u inner join tbpersona p on p.Per_Id=u.Usu_idPersona
        where Usu_Descripcion='" . $user . "' and Usu_ygsh='" . $pass . "'";

        $usuarios = $consql->antiq($sql);
        $consql->desconectar();

        if (!empty($usuarios)){
			if($usuarios['Usu_Estado']=='A'){
				session_start();
				$_SESSION['nombre']=$usuarios['Per_Nombre'].", ".$usuarios['Per_ApePatMat'];
				$_SESSION['idPersona']=$usuarios['Usu_idPersona'];
                $_SESSION['idUsuario']=$usuarios['Usu_Id'];
                $_SESSION['foto']=$usuarios['Per_Foto'];
                header ("Location:".CABECERA."/menu.php");
			}else{
				header ("Location:".PHP."/Login.php?e=2");
			}
		}else{
			header ("Location:".PHP."/Login.php?e=1");
		}

       
    } else {
        session_start();
		if (!isset($_SESSION['nombre'])){
			session_destroy();
			header ("Location:".PHP."/Login.php?e=3");
		}
    }


}
