<?php 
session_start();

include_once ("../../../modelo/modeloPrincipal.php"); // se incluye el modelo principal
include_once ("../../../modelo/modelo_usuario.php");  // se incluye el modelo de usuario

?>
<input type="hidden" name="modulo" value="modificar_contraseña_usuario">

<div class="row p-2 mb-3">
    <div class="col-12 col-md-12 mb-2">
        <label>
            Contraseña actual
            <span style="color: red; font-size: 20px;"> * </span>
        </label>
        <div class="input-group mb-3">
            <input type="password" required maxlength="16" class="p-2 input__field passw form-control" id="current_password" name="current_password" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-]{8,16}" placeholder="ingrese la contraseña actual">
            
            <span class="input-group-text btn btn-secondary">
                <i class="bi bi-eye input__icon" id="eyeIcon"></i>
            </span>
        </div>
    </div>

    <div class="col-12 col-md-6 mb-2">
        <label>
            Contraseña Nueva
            <span style="color: red; font-size: 20px;"> * </span>
        </label>
        <div class="input-group mb-3">
            <input type="password" required maxlength="16" class="p-2 input__field passw form-control" id="password" name="password" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-]{8,16}" placeholder="ingrese la contraseña nueva">
            
            <span class="input-group-text btn btn-secondary">
                <i class="bi bi-eye input__icon" id="eyeIcon"></i>
            </span>
        </div>
    </div>

    <div class="col-12 col-md-6 mb-2">
        <label>
            Repetir Contraseña 
            <span style="color: red; font-size: 20px;"> * </span>
        </label>

        <div class="input-group mb-3">
            <input type="password" required maxlength="16" class="p-2 input__field passw form-control" id="password2" name="password2" pattern="[A-Za-zÁÉÍÚÓáéíóúñÑ0-9\-]{8,16}" placeholder="repita la contraseña">
            
            <span class="input-group-text btn btn-secondary">
                <i class="bi bi-eye input__icon" id="eyeIcon"></i>
            </span>
        </div>
    </div>

    <div class="form-group label-floating">
        <p class="form-p alert-danger mb-2" style="color:#f00;">Para actualizar el 'usuario' o la 'contraseña' debes ingresar la contraseña actual.</p>
        <p class="form-p">Los Campos Con <span style="color:#f00;">*</span> Son Obligatorios</p>
    </div>
</div>