<?php
include("conexion.php");

$sql_where = " WHERE 1=1 "; 
$params = []; 
$types = "";   

$filtro_medico = $_GET['id_medico'] ?? '';
$filtro_paciente = $_GET['id_paciente'] ?? '';
$filtro_estado = $_GET['estado'] ?? '';

if (!empty($filtro_medico)) {
    $sql_where .= " AND c.id_medico = ? ";
    $params[] = $filtro_medico;
    $types .= "i";
}
if (!empty($filtro_paciente)) {
    $sql_where .= " AND c.id_paciente = ? ";
    $params[] = $filtro_paciente;
    $types .= "i";
}
if (!empty($filtro_estado)) {
    $sql_where .= " AND c.estado = ? ";
    $params[] = $filtro_estado;
    $types .= "s";
}

$sql = "SELECT c.id, c.fecha_cita, c.hora_cita, c.motivo, c.estado,
               m.nombre as nombre_medico,
               p.nombre as nombre_paciente
        FROM citas c
        JOIN medicos m ON c.id_medico = m.id
        JOIN pacientes p ON c.id_paciente = p.id"
       . $sql_where .
       " ORDER BY c.fecha_cita, c.hora_cita";

$stmt = $con->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

$result_medicos = $con->query("SELECT id, nombre FROM medicos ORDER BY nombre");
$result_pacientes = $con->query("SELECT id, nombre FROM pacientes ORDER BY nombre");
$estados = ['Pendiente', 'Atendida', 'Cancelada'];
?>

<div>
    <h1>Listado de Citas</h1>
    <button type="button" onclick="cargarContenidoModal('form_registrar_cita.php')">
        Registrar Cita
    </button>

</div>

<div>
    <select id="filtro_medico" onchange="filtrarCitas()">
        <option value="">Filtrar por Médico</option>
        <?php while($row = $result_medicos->fetch_assoc()) {
            $selected = ($filtro_medico == $row['id']) ? 'selected' : '';
            echo "<option value='" . $row['id'] . "' $selected>" . $row['nombre']. "</option>";
        } ?>
    </select>
    
    <select id="filtro_paciente" onchange="filtrarCitas()">
        <option value="">Filtrar por Paciente</option>
        <?php while($row = $result_pacientes->fetch_assoc()) {
            $selected = ($filtro_paciente == $row['id']) ? 'selected' : '';
            echo "<option value='" . $row['id'] . "' $selected>" . $row['nombre'] . "</option>";
        } ?>
    </select>

    <select id="filtro_estado" onchange="filtrarCitas()">
        <option value="">Filtrar por Estado</option>
        <?php foreach($estados as $estado) {
            $selected = ($filtro_estado == $estado) ? 'selected' : '';
            echo "<option value='$estado' $selected>$estado</option>";
        } ?>
    </select>
</div>

<div>
    <table border="1" width="100%">
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Motivo</th>
            <th>Estado</th>
        </tr>
        
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['fecha_cita'] ?></td>
                <td><?= $row['hora_cita']?></td>
                <td><?= $row['nombre_paciente'] ?></td>
                <td><?= $row['nombre_medico']?></td>
                <td><?= $row['motivo'] ?></td>
                <td>
                    <select onchange="actualizarEstadoCita(<?= $row['id'] ?>, this.value)">
                        <option value="Pendiente" <?= $row['estado'] == 'Pendiente' ? 'selected' : '' ?>>Pendiente</option>
                        <option value="Atendida" <?= $row['estado'] == 'Atendida' ? 'selected' : '' ?>>Atendida</option>
                        <option value="Cancelada" <?= $row['estado'] == 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
                    </select>
                </td>
            </tr>
        <?php endwhile; ?>
        
        <?php if ($result->num_rows == 0) {
            echo "<tr><td colspan='6'>No se encontraron citas con los filtros seleccionados.</td></tr>";
        } ?>
        
        <?php
        $stmt->close();
        $con->close();
        ?>
    </table>
</div>