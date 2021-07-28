<script>
    $('#nacimiento').on('change',function(){
        $('#edad').val(Calcular_Edad());

    });
    function Calcular_Edad(){

        let fecha_seleccionada = $('#nacimiento').val();
        let fecha_nacimiento = new Date(fecha_seleccionada);
        let fecha_actual = new Date();
        let edad = (parseInt((fecha_actual-fecha_nacimiento) /(1000*60*60*24*365)));
        return edad;
    }
</script>
<?php
    session_start();
    include "agregar.php";

    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $matricula = $_POST['matricula'];
    $nacimiento = $_POST['nacimiento'];
  
    $especialidad = $_POST['especialidad'];
    $sexo = $_POST['sexo'];
    $perfil = $_FILES['perfil']['name'];
    $extension = explode(".", $perfil);
    $extension = $extension[1];
    $rutaTemporal = $_FILES['perfil']['tmp_name'];
    $rutaDeServidor = "../archivos/";

    //subir un archivo
    //move_uploaded_file nos retorna un 1 si se subio y un 0 si no se subio

    if (move_uploaded_file($rutaTemporal, $rutaDeServidor . $perfil)) {
        $insertarEnBD = agregar($nombre, $paterno, $materno, $matricula, $nacimiento, $especialidad, $sexo, $perfil);
        if ($insertarEnBD) {
            $_SESSION['operacion'] = "insert";
        } else {
            $_SESSION['operacion'] = "error";
        }
    } else {
        $_SESSION['operacion'] = "error";
    }

    header("location:../index.php");