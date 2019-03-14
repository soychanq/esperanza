<!DOCTYPE html>
<html lang>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clínica Esperanza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../estilos.css"/>
    <script>
        window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()  ; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
            dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
            mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fechaActual').value=ano+"-"+mes+"-"+dia;
    }
    </script>
</head>
<body>
    <?php
    include 'parts/header.php';
    include 'Conexion.php';
    if (isset($_POST['codigo'])){
        $codigo = $_POST['codigo'];
    }
    $consulta = "SELECT * FROM persona WHERE codigo=$codigo";
    $mysqli->set_charset("utf8");
    $query = mysqli_query($mysqli, $consulta);
    $resultado = mysqli_fetch_array($query);
    ?>
        <div class="cabecera">
            <div class="titulo">
                <h1>
                    Nuevo Historial
                </h1>
            </div>
        </div>
        <div class="contenedor">
            <form action="http://localhost/esperanza/nuevo-historial/" method="POST" autocomplete="off">
                <div class="campo">
                    <input type="hidden" value="<?php print($resultado["codigo"])?>" name="id" placeholder="Nombre del paciente">
                </div>
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" value="<?php print($resultado["nombre"])?>" disabled>
                </div>
                <div class="Historia">
                    <label for="nombre">Datos objetivos:</label>
                    <textarea name="objetivos" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar" required></textarea>
                </div>
                <div class="Historia">
                    <label for="nombre">Datos subjetivos:</label>
                    <textarea name="subjetivos" id="" cols="30" rows="10" placeholder="Datos que el paciente indica" required></textarea>
                </div>
                <div class="Historia">
                    <label for="nombre">Nuevos datos:</label>
                    <textarea name="nuevo" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar" required></textarea>
                </div>
                <div class="Historia">
                    <label for="nombre">Diagnostico:</label>
                    <textarea name="diagnostico" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar" required></textarea>
                </div>
                <div class="Historia">
                    <label for="nombre">Tratamiento:</label>
                    <textarea name="tratamiento" id="" cols="30" rows="10" placeholder="Datos que el medico puede comprobar" required></textarea>
                </div>
                <div class="campo">
                    <label for="fecha">Fecha: (MES/ DÍA/ AÑO)</label>
                    <input type="date" id="fechaActual" value="" placeholder="Fecha" name="fecha" required>
                </div>
                <!-- PROXIMA CITA -->
                <div class="campo">
                    <button type="submit" class="form-button">Continuar</button>
                </div>
            </form>
        </div>
  </body>
</html>
<?php
                        require 'Conexion.php';
                if (isset($_POST['motivo'])) {
                        $id_persona = $_POST['id'];
                        $motivo = $_POST['motivo'];
                        $historia = $_POST['historia'];
                        $peso = $_POST['peso'];
                        $estatura = $_POST['estatura'];
                        $temperatura = $_POST['temperatura'];
                        $fecha = $_POST['fecha'];
                        $cardiaca = $_POST['cardiaca'];
                        $respiratoria = $_POST['respiratoria'];
                        $oxigeno = $_POST['oxigeno'];
                        $arterial = $_POST['arterial'];




                        $sql = "INSERT INTO `historial` (`id`, `id_persona`, `fecha`, `motivo`, `historia`, `peso`,
                        `estatura`, `frecuencia_cardiaca`, `frecuencia_respiratoria`, `temperatura`, `presion_arterial`, `saturacion_oxigeno`)
                        VALUES (NULL, '$id_persona', '$fecha', '$motivo', '$historia', '$peso',
                        '$estatura', '$cardiaca', '$respiratoria', '$temperatura', '$arterial', '$oxigeno');";


                        $mysqli->set_charset("utf8");
                        if (mysqli_query($mysqli, $sql)) {
                            print('<script type="text/javascript">
                            document.location = "http://127.0.0.1/esperanza/examen-fisico/";
                        </script> ');
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                        mysqli_close($mysqli);

                }

            ?>
