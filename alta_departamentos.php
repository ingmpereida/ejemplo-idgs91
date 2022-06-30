<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App web 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php
            include "menu.php";
        ?>
    </div>
    <div class="container ">
        <div class="alert alert-dark" role="alert">
            <h1>ALTA DEPARTAMENTOS</h1>
        </div>
    </div>
    <div class="container">
        <form method="POST" autocomplete="off">
            <label class="form-label">Código de Departamento:</label>
            <br>
            <input type="text" class="form-control" name="codigo" required minlength="3" maxlength="3" placeholder="123" onKeypress="if (event.keyCode < 47 || event.keyCode > 57) event.returnValue = false;">
            <br>
            <label class="form-label">Nombre del Departarmento:</label>
            <br>
            <input type="text" class="form-control" name="nombred" required minlength="3" maxlength="10" placeholder="Recursos Humanos">
            <br>
            <label class="form-label">Presupuesto</label>
            <br>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" name="presupuesto" required placeholder="120000" onKeypress="if (event.keyCode < 47 || event.keyCode > 57) event.returnValue = false;">
            </div>
            <br>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-success" type="button">Guardar</button>
            </div>
        </form>
    </div>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            include "conexion.php";

            //recibimos los datos
            $codigo = $_POST['codigo'];
            $nombred = $_POST['nombred'];
            $presupuesto = $_POST['presupuesto'];

            //hacemos el query(consulta)
            $sentencia = $mysqli->prepare("INSERT INTO departamentos (codigo, nombre, presupuesto) VALUES (?,?,?)");

            //obtenemos los datos
            $sentencia->bind_param("iss", $codigo, $nombred, $presupuesto);

            if($sentencia->execute())
            {
                echo '<script>
                        alert("Datos guardados correctamente");
                        window.location="mostrar_departamentos.php";
                </script>';
            }
            else
            {
                echo '<script>
                        alert("Error al guardar los datos");
                        window.location="alta_departamentos.php";
                </script>';
            }
        }
    ?>
</body>
</html>