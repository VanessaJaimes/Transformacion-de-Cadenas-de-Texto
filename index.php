<!DOCTYPE html>
<html>

<head>
    <title>Verificar Transformación</title>
    <!-- Estilos -->
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-color: #c3c3c3;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 20px auto;
            padding: 40px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Verificar Transformación</h2>
        <!-- Ingreso de las cadenas -->
        <form method="post">
            <label for="cadena1">Ingrese la primera cadena:</label>
            <input type="text" name="cadena1" id="cadena1" required>
            <label for="cadena2">Ingrese la segunda cadena:</label>
            <input type="text" name="cadena2" id="cadena2" required>
            <button type="submit">Verificar</button>
        </form>

        <?php
        //Verificacion de la transformacion de las cadenas
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cadena1 = $_POST["cadena1"];
            $cadena2 = $_POST["cadena2"];

            function esTransformable($cadena1, $cadena2)
            {
                $arreglo1 = str_split($cadena1);
                $arreglo2 = str_split($cadena2);
                $indice1 = 0;

                foreach ($arreglo2 as $caracter2) {
                    $encontrado = false;
                    while ($indice1 < count($arreglo1)) {
                        if ($arreglo1[$indice1] == $caracter2) {
                            $encontrado = true;
                            break;
                        }
                        $indice1++;
                    }

                    if (!$encontrado) {
                        return false;
                    }
                    $indice1++;
                }
                return true;
            }

            if (esTransformable($cadena1, $cadena2)) {
                echo "<p>$cadena1 se puede transformar en $cadena2 mediante eliminación de caracteres.</p>";
            } else {
                echo "<p>$cadena1 no se puede transformar en $cadena2 mediante eliminación de caracteres.</p>";
            }
        }
        ?>
    </div>
</body>

</html>