<?php
    //incluyo el archivo conexion
    include("conexion.php");

    //realizamos la consulta
    $consulta = $mysqli->query("SELECT apellidos FROM empleados ORDER BY apellidos");

    $datos = $consulta->fetch_all(MYSQLI_ASSOC);

    $total = mysqli_num_rows($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Web 7</title>
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
            <h1>Consulta 1</h1>
            <p>Obtener los apellidos de los empleados.</p>
            <p>Número de registros: <?php echo $total; ?></p>
        </div>
    </div>
    <div class="container" align="center">
        <img src="img/respuesta1.png" alt="" width="200" height="80">
    </div>
    <br>
    <div class="container">
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>Apellidos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($datos as $registro)
                    {
                ?>
                    <tr>
                        <td><?php echo $registro["apellidos"]; ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>