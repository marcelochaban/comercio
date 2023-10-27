
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <META HTTP-EQUIV="EXPIRES" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="scripts/js/login.js"></script>
</head>
<body>
    <div class="main-container">
        <div class="login-container">
            <div class="wrapper-title">
            <h1>Iniciar sesión</h1>
            </div>
            <div class="wrapper-form">
                <form action="scripts/php/authenticator.php" method="post" id="login-form" onsubmit="return validarFormulario();" >
                    <div class="form">
                        <p class="label">Usuario</p>
                        <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="correo" />
                    </div>
                    <div class="form">
                        <p class="label">contraseña</p>
                        <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="clave" />
                    </div>
                    <div class="form">
                        
                    <p><input type="submit" /></p>
                    <a href="register.php">Crear Cuenta</a>
                    <a href="index.html">volver a la pagina de inicio</a>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>