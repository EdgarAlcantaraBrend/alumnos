<?php

    include "conexion.php";

    function agregar($nombre, $paterno, $materno, $matricula, $nacimiento, $especialidad, $sexo, $perfil) {
        $conexion = conexion();
        $sql = "INSERT INTO t_alumno (nombre, 
                                    paterno, 
                                    materno,
                                    matricula,
                                    nacimiento,
                                    especialidad,
                                    sexo,
                                    perfil) 
                VALUES ('$nombre', 
                        '$paterno', 
                        '$materno',
                        '$matricula',
                        '$nacimiento',
                        '$especialidad',
                        '$sexo',
                        '$perfil')";
        $respuesta = mysqli_query($conexion, $sql);

        return $respuesta;
    }