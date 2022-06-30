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
            <h1>ALTA EMPLEADOS</h1>
        </div>
    </div>
    <div class="container">
        <form method="POST" autocomplete="off">
            <label class="form-label">DNI:</label>
            <br>
            <input type="text" class="form-control" name="dni" placeholder="00523821F" required minlength="8" maxlength="8">
            <small>El DNI es de 8 carácteres (letras y números)</small>
            <br>
            <label class="form-label">Nombres:</label>
            <br>
            <input type="text" class="form-control" name="nombres" required placeholder="Cesar Geovanni">
            <br>
            <label class="form-label">Apellidos</label>
            <br>
            <input type="text" class="form-control" name="apellidos" required placeholder="Machuca Pereida">
            <br>
            <label class="form-label">Departamentos:</label>
            <br>
            <select name="departamentos" class="form-control" required>
                <option value="">Seleccione...</option>
                <?php
                    //conexion a la base de datos
                    include "conexion.php"; 
                    //realizamos la consulta
                    $consulta = $mysqli->query("SELECT codigo, nombre FROM departamentos ORDER BY nombre");

                    $datos = $consulta->fetch_all(MYSQLI_ASSOC);

                    foreach($datos AS $valores):
                        echo '<option value="'.$valores["codigo"].'">'.$valores["nombre"].'</option>';
                    endforeach;
                ?>
            </select>
            <br>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-success" type="button">Guardar</button>
            </div>
        </form>
    </div>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //recibimos los datos
            $dni = $_POST['dni'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $departamentos = $_POST['departamentos'];

            //hacemos el query(consulta)
            $sentencia = $mysqli->prepare("INSERT INTO empleados (dni, nombre, apellidos, departamento) VALUES (?,?,?,?)");

            //obtenemos los datos
            $sentencia->bind_param("sssi", $dni, $nombres, $apellidos, $departamentos);

            if($sentencia->execute())
            {
                echo '<script>
                        alert("Datos guardados correctamente");
                        window.location="mostrar_empleados.php";
                </script>';
            }
            else
            {
                echo '<script>
                        alert("Error al guardar los datos");
                        window.location="alta_empleados.php";
                </script>';
            }
        }
    ?>
</body>
</html>