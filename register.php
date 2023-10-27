<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="css/register.css" rel="stylesheet" />
</head>

<body class="bg-primary">
    <div id="main-container">
        <div id="register-container">
            <main>
                <div class="container">
                    <div class="card-header">
                        <h1>
                            Registrate!
                        </h1>
                    </div>
                    <div class="card-body">
                        <form action="scripts/php/create_user.php" method="post" onsubmit="return validarFormulario();">
                            <div class="personal-data">
                                <div>
                                    <label for="inputFirstName">Nombre</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Ingresa tu primer nombre" name="name" />
                                </div>
                                <div>
                                    <div>
                                        <label for="inputLastName">Apellido</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Ingresa tu apellido" name="lastName" />
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label for="inputLastName">Número de celular</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Ingresa tu numero" name="phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="Account-data">
                                <div>
                                    <div class="form-floating mb-3">
                                        <label for="inputEmail">Correo electronico</label>
                                        <input class="form-control" id="inputEmail" type="mail" placeholder="nombre@ejemplo.com" name="mail" />
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label for="inputPassword">Contraseña</label>
                                        <input class="form-control" id="inputPassword" type="password" placeholder="Crea una contraseña" name="password" />
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <label for="inputPasswordConfirm">Confirmar Contraseña</label>
                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirma la contraseña" />
                                    </div>
                                </div>
                            </div>
                            <p><input type="submit" /></p>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">
                            <a href="login.php">Tienes una cuenta?</a>
                            <a href="index.html">volver a la pagina de inicio</a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="scripts/js/register.js"></script>

</body>

</html>