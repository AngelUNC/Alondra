<?php
$conexion = new mysqli("localhost", "root", "", "horas_estadia");
if ($conexion->connect_error) die("Error de conexión");
$accion = $_POST['accion'];
$nombre = $_POST['nombre'];
$matricula = $_POST['matricula'];
$departamento = $_POST['departamento'];
$horario = $_POST['horario'];
$fecha = date('Y-m-d');
$hora = date('H:i:s');
if ($accion === 'registrar') {
    $result = $conexion->query("SELECT id FROM estudiantes WHERE matricula = '$matricula'");
    if ($result->num_rows == 0) {
        $conexion->query("INSERT INTO estudiantes (nombre, matricula, departamento, horario, fecha_ingreso) 
                          VALUES ('$nombre', '$matricula', '$departamento', '$horario', '$fecha')");
        $estudiante_id = $conexion->insert_id;
    } else {
        $fila = $result->fetch_assoc();
        $estudiante_id = $fila['id'];
    }
    $existe = $conexion->query("SELECT * FROM asistencias WHERE estudiante_id = $estudiante_id AND fecha_registro = '$fecha'");
    if ($existe->num_rows == 0) {
        $conexion->query("INSERT INTO asistencias (estudiante_id, fecha_registro, hora_entrada) 
                          VALUES ($estudiante_id, '$fecha', '$hora')");
    }
}
header("Location: index.php?matricula=$matricula");
?>
