<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <title>Document</title>
</head>
<body>
    

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Iniciar sesion
                    </div>
                    <div class="card-body">
                        <form method="post" action = "sesion.php">
                            
                                <div class="form-group">
                                    <label class="form-label mt-4">Usuario</label>
                                    <input type="text" class="form-control" name="usuario_email" id="usuario_email" aria-describedby="cantidadvendida" placeholder="Introduzca su usuario...">
                                </div>
                                <div class="form-group">
                                    <label class="form-label mt-4">Password</label>
                                    <input type="password" class="form-control" name="contrasena_email" id="contrasena_email" aria-describedby="cantidadvendida" placeholder="Introduzca su contraseña...">
                                </div>
                                
                                <br>
                                <button type="submit" name="iniciar" class="btn btn-primary">Iniciar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
    
    
    
    





