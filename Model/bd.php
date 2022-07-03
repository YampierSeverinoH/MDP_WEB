<?php

if (basename($_SERVER['PHP_SELF']) == "bd.php")
    exit();

class Conexion {

    private $con;
    private $consql;
    private $stm;
    private $rs;

    public function __construct($op) {
        if ($op=="pdo") {
            try {
                $this->con = new PDO('mysql:host=localhost:3306;dbname=bd_mdp;charset=utf8', "root", "",
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo json_encode($e->getMessage());
                die();
            }
        }elseif($op=="mysqli"){
            try {
                $this->consql = new mysqli("localhost","root","","bd_mdp");
	
            } catch (\Throwable $th) {
                if (  $this->consql->connect_error) die ("Error en la conexión: ".  $this->consql->connect_error);
            }
        }

    }

    public function desconectar() {
        $this->rs = null;
        $this->stm = null;
        $this->con = null;
    }

    public function findAll($query, $opc="") {
        $this->stm = $this->con->prepare($query);
        $this->stm->execute();
        if ($opc) {
            $this->rs = $this->stm->fetchAll(PDO::FETCH_OBJ);
        } else {
            $this->rs = $this->stm->fetchAll(PDO::FETCH_ASSOC);
           
        }
        return $this->rs;
    }
    public function antiq($query){
        $this->stm = $this->consql->query($query);
        $this->rs= $this->stm->fetch_assoc();
        return $this->rs;
    }
    
    public function exec($query){
         $this->stm = $this->con->prepare($query);
         $this->stm->execute();
         return $this->stm->rowCount();        
    }
    public function ejecutar($query){
        $this->stm = $this->consql->query($query);
        $this->rs= $this->stm->fetch_assoc();
        return $this->rs;    
   }

}