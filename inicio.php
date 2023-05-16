<?php
session_start();
if (isset($_SESSION["admin"])) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagina de inicio</title>
        <link rel="stylesheet" href="./css/inicio.css">
    </head>

    <body>
        <header>
            <div class="cont-cabecera">
                <div class="saludo"> Bienvenid@ <?php echo strtoupper($_SESSION["admin"])?></div>
                <div class="cont-fecha">
                    <div class="dia"><?php echo date("d-m-Y")?></div>
                    <div class="dia"><?php echo date("H:i")?></div>
                </div>
            </div>
        </header>
        <main>
            <div class="cont-bot">
                <div class="but"><button id="but1" onclick="window.location.href='./php/nuevo.php'">IR A TICKET</button></div>
                <div class="but"><button id="but2" onclick="window.location.href='./php/Cargar.php'">CARGAR</button></div>
            </div>
        </main>
    </body>

    </html>


<?php
} else {
    echo "<script>
            alert('El nombre o contraseña no son los correctos');
            window.location.href='./index.html';
            </script>";
}
?>