<?php
$conexion = new mysqli("localhost", "root", "root", "horas_estadia");
if ($conexion->connect_error) {
    echo "<p class='info-line' style='color:#c0392b;'>Error de conexión: " . $conexion->connect_error . "</p>";
    return;
}
$matricula = $_GET['matricula'] ?? null;
if (!$matricula) {
    echo "<p class='info-line'>Esperando matrícula...</p>";
    return;
}
$matriculaSeguro = $conexion->real_escape_string($matricula);
$estudiante = $conexion->query("SELECT id FROM estudiantes WHERE matricula = '$matriculaSeguro'")->fetch_assoc();
if (!$estudiante) {
    echo "<p class='info-line'>Estudiante no encontrado.</p>";
    return;
}
$id = (int)$estudiante['id'];
$asistencias = $conexion->query("SELECT COUNT(*) AS dias FROM asistencias WHERE estudiante_id = $id")->fetch_assoc();
$dias = (int)$asistencias['dias'];
$horas_por_dia = 4;
$total_horas = $dias * $horas_por_dia;
$meta = 480;
$porcentaje = min(100, ($total_horas / $meta) * 100);
$horas_restantes = max(0, $meta - $total_horas);
?>
<div class="info-line"><strong>🗓 Días asistidos:</strong> <?= $dias ?></div>
<div class="info-line"><strong>⏱ Total de horas:</strong> <?= $total_horas ?> / <?= $meta ?></div>
<div class="info-line"><strong>⌛ Horas restantes:</strong> <?= $horas_restantes ?></div>
<div class="progress-bar" aria-label="Progreso de horas completadas">
    <span style="width: <?= $porcentaje ?>%"></span>
</div>
