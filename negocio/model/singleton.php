<?php

class DataBaseConnector {
                 
    private static $obj;
    private static $conn;
                 
    private final function __construct() {
        self::$conn = mysqli_connect('localhost','root','','svsoft') or die('No se pudo realizar la conexion con la base de datos');
        echo "Base de datos conectada";
    }
     
    public static function getConnect() {
        if (!isset(self::$obj)) {
            self::$obj = new DataBaseConnector();
        }else{
        	echo "La base de datos ya ha sido conectada";
        }
         
        return self::$conn;
        }

    public static function getDBConn()
    {
        try{
            $db = self::$conn;
            $db->dbconn = new mysqli('localhost','root','','svsoft');
            return $db->dbconn ;
        }catch(Exception $e){
            echo "error:-".$e->getMessage();
        }       

    }

    }

 
$conn = DataBaseConnector::getConnect();
$obj = DataBaseConnector::getDBConn();

$sql = "select * from invernadero";
$result = $obj->query($sql);

$response = $result->fetch_all();
echo "<pre>"; print_r($response);