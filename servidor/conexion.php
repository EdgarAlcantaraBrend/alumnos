<?php 

    function conexion(){

        $servidor = "localhost";
        $usuario= "root";
        $password="";
        $db="sistemaalumnos";

        $conexion = mysqli_connect($servidor,$usuario,$password,$db);

        return $conexion;

    }

?>