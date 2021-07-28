
<?php
    
    include "servidor/conexion.php";
    $conexion = conexion();
    $sql = "SELECT * FROM t_alumno";
    $respuesta =  mysqli_query($conexion, $sql);
?>
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
<table class="table table-bordered table-hover">

    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Matricula</th>
        <th>Edad</th>
        <th>Especialidad</th>
        <th>Sexo</th>
        <th>Imagen de perfil</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
        <?php while ( $mostrar = mysqli_fetch_array($respuesta)) {
        
        ?>
            <tr>
                <td><?php echo $idArchivo = $mostrar['id_alumno']; ?></td>
                <td><?php echo $mostrar['nombre']; ?></td>
                <td><?php echo $mostrar['paterno']; ?></td>
                <td><?php echo $mostrar['materno']; ?></td>
                <td><?php echo $mostrar['matricula']; ?></td>
                <td><?php echo $mostrar['nacimiento']; ?></td>
                <td><?php echo $mostrar['especialidad']; ?></td>
                <td><?php echo $mostrar['sexo']; ?></td>
                <td><a href="archivos/" id="archivos"><?php echo $mostrar['perfil']; ?></a></td>
                <td>
                    <form action="servidor/eliminar.php" method="POST">
                        <input type="text" hidden name="idArchivo" value="<?php echo $idArchivo; ?>">
                        <button  class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php }?>
    </tbody>

</table>
