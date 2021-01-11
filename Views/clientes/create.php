<div class="row">
    <h1>Crear Cliente</h1>

    <form action="/clientes/save" method="post">
        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-12">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="col-sm-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="col-sm-12">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                </div>

                <div class="col-sm-12">
                    <label for="telefono" class="form-label">Telefonos</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>

                <div class="col-sm-12">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
            </div>

        </div>

        <div class="col-sm-6" style="margin-top: 20px">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Crear Usuario</button>
        </div>


    </form>
</div>