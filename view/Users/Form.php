<?php
    require_once "view/header.php";
?> 
<div class="container">
    <div class="card d-flex justify-content-around flex-wrap" id="base">
        <div class="card-header" id="head_users">
            <h3>Registrar Usuarios<h3>
        </div>
        <div class="alert alert-danger mt-2 d-none" id="alertDanger">
            <li>Minimo 8 caracteres</li>
            <li>Maximo 15</li>
            <li>Al menos una letra mayúscula</li>
            <li>Al menos una letra minucula</li>
            <li>Al menos un dígito</li>
            <li>No espacios en blanco</li>
            <li>Al menos 1 caracter especial</li>
        </div>
        <form action="index.php?action=/CreateUsers" method='post' id="form">
            <div class="d-flex w-auto">
                <div class="d-inline w-100 p-3">
                    <label>Cedula</label>
                    <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Escribe su documento"/>
                    <p class="text-danger mb-2 d-none" id="alertCedula"></p>
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Nombres</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Escribe su nombre completo" />
                    <p class="text-danger mb-2 d-none" id="alertName"></p>
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Escribe su Apellido" />
                    <p class="text-danger mb-2 d-none" id="alertLastName"></p>
                </div>
            </div>
            <div class="d-flex w-auto">
                <div class="d-inline w-100 p-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Escribe su Email" />
                    <p class="text-danger mb-2 d-none" id="alertEmail"></p>
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Celular</label>
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Escribe su telefono" />
                    <p class="text-danger mb-2 d-none" id="alertPhone"></p>
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Direccion</label>
                    <input type="text" class="form-control" name="addres" id="addres" placeholder="Escribe su Direccion" />
                    <p class="text-danger mb-2 d-none" id="alertAddres"></p>
                </div>
            </div>
            <div class="d-flex w-auto">
                <div class="d-inline w-100 p-3">
                    <label>Rol</label>
                    <select name="role" id="role" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php       
                            while( $search = mysqli_fetch_array($resultRole) ){

                                echo '<option value="'.$search['RoleId'].'">'.$search['RoleDescription'].'</option>';
                            }
                        ?>
                    </select>
                    <p class="text-danger mb-2 d-none" id="alertRole"></p>
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Escribe su contraseña" />
                    <p class="text-danger mb-2 d-none" id="alertPassword"></p>
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="repeatPassword"  id="repeatPassword" placeholder="confirmar contraseña" />
                    <p class="text-danger mb-2 d-none" id="alertRepeatPassword"></p>
                </div>
            </div>
            <div class="d-flex w-auto">
                <input type="checkbox" class="form-check-input d-inline m-2" id="exampleCheck1">
                <label class="form-check-label d-inline w-100" for="exampleCheck1">he leido y acepto Terminos y condiciones</label>
                <br/><br/>
            </div>
            <button type="submit" value="Enviar" class="btn btn-primary m-2">Guardar</button>
        </form>
        <script src="static/js/ScriptUsers/formUsers.js"></script>
    </div>
</div>    
