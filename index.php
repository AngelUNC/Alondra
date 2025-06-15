<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Horas</title>
    <style>
        * {
            box-sizing: border-box;
        }
        .header {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
            text-align: center;
        }
        .logo-nombre {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .logo-nombre img {
            height: 60px;
            width: auto;
        }
        .nombre-empresa {
            font-size: 1.6rem;
            font-weight: bold;
            color: #2c3e50;
        }
        .titulo-principal {
            font-size: 1.2rem;
            color: #555;
            margin-top: 10px;
        }
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
        }
        h1 {
            margin-bottom: 30px;
            color: #333;
        }
        .container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
        }
        .card {
            background: white;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 12px;
            padding: 25px;
            flex: 1 1 300px;
            min-width: 300px;
        }
        .card h3 {
            margin-top: 0;
            color: #2c3e50;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        select {
            background-color: #fff;
        }
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2980b9;
        }
        .progress-bar {
            background: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            height: 15px;
            margin-top: 10px;
        }
        .progress-bar span {
            display: block;
            height: 100%;
            background-color: #2ecc71;
        }
        .info-line {
            margin: 8px 0;
            font-size: 15px;
            color: #555;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo-nombre">
            <img src="logo.png" alt="Logo Empresa">
            <span class="nombre-empresa">H. Ayuntamiento</span>
        </div>
        <h2 class="titulo-principal">🕒 Administrador de Horas de Estadía</h2>
    </header>
    <div class="container">
        <div class="card">
            <h3>Registrar o Consultar Estudiante</h3>
            <form action="registro.php" method="POST">
                <label>Nombre Completo</label>
                <input type="text" name="nombre" required>
                <label>Matrícula</label>
                <input type="text" name="matricula" required>
                <label>Departamento</label>
                <select name="departamento" required>
                    <option value="Junta Municipal">Junta Municipal</option>
                    <option value="Tesorería">Tesorería</option>
                    <option value="Obras Públicas">Obras Públicas</option>
                    <option value="Gobierno">Gobierno</option>
                    <option value="Movilidad">Movilidad</option>
                    <option value="Presidencia">Presidencia</option>
                    <option value="Recursos Humanos">Recursos Humanos</option>
                    <option value="Ecología">Ecología</option>
                    <option value="Agua Potable">Agua Potable</option>
                    <option value="Sistemas">Sistemas</option>
                    <option value="Registro Civil">Registro Civil</option>
                </select>
                <label>Horario</label>
                <select name="horario" required>
                    <option value="9-13">9:00 am - 1:00 pm</option>
                    <option value="14-18">2:00 pm - 6:00 pm</option>
                </select>
                <div class="button-group">
                    <button type="submit" name="accion" value="registrar">Registrar Entrada</button>
                    <button type="submit" name="accion" value="consultar">Consultar Datos</button>
                </div>
            </form>
        </div>
        <div class="card">
            <h3>📋 Estadísticas del Estudiante</h3>
            <?php include 'consulta.php'; ?>
        </div>
        <div class="card">
            <h3>⏱ Resumen de Horas</h3>
            <?php include 'resumen.php'; ?>
        </div>
    </div>
</body>
