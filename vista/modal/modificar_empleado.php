<?php
// se importan los archivos de configuracion de la base de datos y modelo principal
include_once("../../modelo/modeloPrincipal.php");

$id_usuario = $_POST['id'];

$existe = mysqli_fetch_assoc(modeloPrincipal::consultar("SELECT U.id_usuario, U.cedula, U.nombre, U.apellido, U.telefono,
    U.estado, R.id_rol, R.nombre AS nombre_rol, suspender FROM usuario AS U
    INNER JOIN rol AS R ON R.id_rol = U.id_rol
    WHERE id_usuario = $id_usuario"));

?>

<input type="hidden" name="id_usuario" id="id_usuario" value="<?= $existe["id_usuario"]; ?>">

<div class="col-12 col-sm-12 col-md-4 mb-3">
    <label class="col-form-label">Cédula de identidad</label>
    <input type="text" required="" value="<?= $existe['cedula'] ?>" placeholder="ingrese la cédula del usuario" readonly class="bg-body-secondary form-control" id="cedula_user" name="cedula_user">
</div>

<div class="col-12 col-sm-12 col-md-4 mb-3">
    <label class="col-form-label">Nombres y Apellidos</label>
    <input type="text" required="" value="<?= $existe['nombre'], ' ',  $existe['apellido'] ?>" placeholder="ingrese el nombre y apellido" class="bg-body-secondary form-control" id="nombre_completo" name="nombre_completo">
</div>

<div class="col-12 col-sm-12 col-md-4 mb-3">
    <label class="col-form-label">Teléfono</label>
    <input type="text" required="" value="04154785965" placeholder="ingresa el teléfono del usuario" class="bg-body-secondary form-control" id="telefono_user" name="telefono_user">
</div>

<div class="col-12 col-sm-12 col-md-4 mb-3">
    <div class="form-group">
        <label class="col-form-label">Estado (<?= ($existe['estado'] == 1) ? '<span class="text-success">Activo</span>' : '<span class="text-danger">Inactivo</span>'; ?>)</label>

        <select class="form-select" name="cambiar_estado" id="cambiar_estado">

            <option value="1" <?= ($existe['estado'] == 1) ? 'selected' : ''; ?>>Activar</option>
            <option value="0" <?= ($existe['estado'] == 1) ? '' : 'selected'; ?>>Inactivar</option>
        </select>
    </div>
</div>

<div class="col-12 col-sm-12 col-md-4 mb-3">
    <div class="form-group">
        <label class="col-form-label">Permiso de inicio de sesión (<?= ($existe['suspender'] == 0) ? '<span class="text-success">Permitido</span>' : '<span class="text-danger">Denegado</span>'; ?>)</label>
        <select class="form-select" name="permitir_acceso" id="permitir_acceso">
            <option value="0" <?= ($existe['suspender'] == 0) ? 'selected' : ''; ?>>Permitir</option>
            <option value="1" <?= ($existe['suspender'] == 0) ? '' : 'selected'; ?>>Denegar</option>
        </select>
    </div>
</div>

<div class="col-12 col-sm-12 col-md-4 mb-3">
    <div class="form-group">
        <label class="col-form-label">Rol asignado (<strong> <?= $existe['nombre_rol'] ?> </strong>)</label>
        <select class="form-select" name="asignar_rol" id="asignar_rol">
            <?php
                $roles = modeloPrincipal::consultar("SELECT id_rol, nombre FROM rol WHERE estado = 1 AND id_rol != 1");

                while ($row = mysqli_fetch_array($roles)) { ?>

                    <option <?= $existe['id_rol'] == $row['id_rol'] ? 'selected' : '' ?> value="<?= $row['id_rol']; ?>" > <?= $row['nombre']; ?> </option>
            <?php } ?>
        </select>
    </div>
</div>