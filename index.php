<?php 
    include "header.php";
?>
<?php
    session_start();
    $operacion = "";
    if (isset($_SESSION['operacion'])) {
        $operacion = $_SESSION['operacion'];
        unset($_SESSION['operacion']);
    }
?>

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light" style="text-align: center;">Información Personal De Estudiantes De Sistemas</h1>
                <p class="lead">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="servidor/agregarAlumno.php" enctype="multipart/form-data"  method="POST">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="Nombre">Nombre:</label>
                                        <input type="text" class="form-control"  name="nombre" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="paterno">Apellido Paterno:</label>
                                        <input type="text" class="form-control" name="materno"  required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="materno">Apellido Materno:</label>
                                        <input type="text" class="form-control" name="paterno"  required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="matricula">Matricula:</label>
                                        <input type="text" class="form-control"  name="matricula" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="nacimiento">Fecha de nacimiento:</label>
                                        <input type="date" class="form-control"  id="nacimiento" required>
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="especialidad">Especialidad:</label>
                                        <input type="text" class="form-control" name="especialidad"  required>
                                        
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6" >
                                        <label for="sexo">Sexo:</label>
                                        <select name="sexo" id="sexo" class="form-control">
                                            <option value="masculino"id="masculino"  >Masculino</option>
                                            <option value="femenino" id="femenino"   >Femenino</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Imagen de perfil</label>
                                        <input type="file" name="perfil" class="form-control" required>      
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary btn-block">Agregar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <?php include "tablaAlumnos.php"?>
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </div>

<?php 
    include "footer.php";
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
<script>

   
    

    let operacion = "<?php echo $operacion; ?>";

    if (operacion == "insert") {
        Swal.fire(":D", "Agregado con exito!", "success");
    } else if(operacion == "error") {
        Swal.fire(":(", "Error al agregar!", "error");
    } else if (operacion == "delete") {
        Swal.fire(":D", "Eliminado con exito!", "info");
    } else if (operacion == "error2") {
        Swal.fire(":D", "Eliminado con exito!", "info");
    }

</script>