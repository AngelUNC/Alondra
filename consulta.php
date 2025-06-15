<?php
$conexion = new mysqli("localhost", "root", "root", "horas_estadia");
if ($conexion->connect_error) {
    echo "<p class='info-line' style='color:#c0392b;'>Error de conexión: " . $conexion->connect_error . "</p>";
    return;
}
$matricula = isset($_GET['matricula']) ? trim($_GET['matricula']) : null;
if (!$matricula) {
    echo "<p class='info-line'>Esperando matrícula para consulta...</p>";
    return;
}
$matriculaSeguro = $conexion->real_escape_string($matricula);
$resultado = $conexion->query("SELECT * FROM estudiantes WHERE matricula = '$matriculaSeguro'");
if (!$resultado) {
    echo "<p class='info-line' style='color:#c0392b;'>Error en la consulta.</p>";
    return;
}
if ($resultado->num_rows === 0) {
    echo "<p class='info-line'>Estudiante no encontrado.</p>";
    return;
}
$estudiante = $resultado->fetch_assoc();
?>
<div class="info-line"><strong>📛 Nombre:</strong> <?= htmlspecialchars($estudiante['nombre']) ?></div>
<div class="info-line"><strong>🎓 Matrícula:</strong> <?= htmlspecialchars($estudiante['matricula']) ?></div>
<div class="info-line"><strong>🏢 Departamento:</strong> <?= htmlspecialchars($estudiante['departamento']) ?></div>
<div class="info-line"><strong>⏰ Horario:</strong> <?= htmlspecialchars($estudiante['horario']) ?></div>
<div class="info-line"><strong>📅 Fecha de Ingreso:</strong> <?= htmlspecialchars($estudiante['fecha_ingreso']) ?></div>
<div class="info-line"><strong>⏱ Fecha y Hora Actual:</strong> <?= date('Y-m-d H:i:s') ?></div>
