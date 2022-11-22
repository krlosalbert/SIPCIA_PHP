<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Usuarios</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="container">
                <form action="#" method="post" id="formCreate">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <input type="hidden" name="idUsuario" value="" >
                            <label><b>Cedula</b></label><input type="text" class="form-control" name="cedula" value="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Nombres y Apellidos</b></label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Email</b></label>
                            <input type="email" class="form-control" name="email" value="">
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Celular</b></label>
                            <input type="number" class="form-control" name="phone" value="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Direccion</b></label>
                            <input type="text" class="form-control" name="addres" value="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Rol</b></label>
                            <select name="role" class="form-control">
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label><b>Contraseña</b></label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Confirmar Contrasena</b></label>
                            <input type="password" class="form-control" name="repeatPassword" placeholder="confirmar contrasena">
                        </div> 
                    </div><br>
                    <button type="submit" value="Enviar" class="btn btn-warning m-2"><b>Actualizar Datos</b></button>
                </form>
                <script src="{{ url_for('static', filename='js/ScriptUsers/UpdateUsers.js') }}"></script>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>