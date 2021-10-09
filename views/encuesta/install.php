
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Encuesta</title>
    <link rel="stylesheet" href="assets/css/materialize.css">
    <link rel="stylesheet" href="assets/css/estilo.css">

</head>

<body>

<div class="row seccion container">
    <div class="card">
        <form method="POST" id="dbinstall" name="dbinstall"   >

            <?php echo isset($data["error"])? "si":"no"; ?>
            <div class="col m12">
                <div class="col m8 offset-m4">
                    <h5>Datos para la conexion</h5>
                </div>
                <div class="input-field col s12 m12 marcado">
                    <label for="host" class=" blue-text ">host</label>
                    <input maxlength="100" id="host" name="host" type="text" placeholder="host" required="required" />
                </div>
                <div class="input-field col s12 m12 marcado">
                    <label for="dbname" class=" blue-text ">Base de taos</label>
                    <input maxlength="100" id="dbname" name="dbname" type="text" placeholder="database" required="required" />
                </div>
                <div class="input-field col s12 m12 marcado">
                    <label for="dbuser" class=" blue-text ">Usuario de base de datos</label>
                    <input maxlength="100" id="dbuser" name="dbuser" type="text" placeholder="Usuario de base de datos"required="required" />
                </div>
                <div class="input-field col s12 m12 marcado">
                    <label for="pass" class=" blue-text ">Password</label>
                    <input maxlength="100" id="pass" name="pass" type="text" placeholder="password" />
                </div>
                <button id="dbinstall" class="btn btn-primary" type="submit" > instalar </button>
            </div>
        </form>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/js/materialize.js" ></script>
<script src="assets/js/script.js" ></script>
</body>
</html>