<?php
session_start();
if (isset($_SESSION["admin"])) {
    include("./../funciones.php");
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NUEVA LISTA</title>
        <!-- ++++++++++++++++++++++++++++++++++++++++++JQUERY++++++++++++++++++++++++++++++++++++++++ -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script type="text/javascript" src="./../js/nuevo.js"></script>
    </head>

    <body>

        <header>
            <div class="cont-cabecera">
                <div class="saludo"> Bienvenid@
                    <?php echo strtoupper($_SESSION["admin"]) ?>
                </div>
                <div class="cont-fecha">
                    <div class="dia">
                        <?php echo date("d-m-Y") ?>
                    </div>
                    <div class="dia">
                        <?php echo date("H:i") ?>
                    </div>
                </div>
            </div>
        </header>
        <hr>
        <main>
            <!-- Zona de Creacion y Seleccion de Clientes -->
            <section class="cont_clientes">
                <!-- Añadir usuario -->
                <div class="nuevo-cliente">
                    <div class="in_cli">
                        <input type="text" id="nuevo_cli" name="nuevo_cli" onclick="limpiar()" placeholder="Nuevo Cliente">
                        <input type="button" onclick=nuevo_cli() value="AÑADIR">
                    </div>
                    <div class="resul-cli">
                        <!-- <span>Aquí ira la vuelta de la grabación del usuario</span> -->
                    </div>
                </div>
                <!-- Selección de Usuario -->
                <div class="selec-cliente">
                    <select name="cli" id="sel_cli" onclick="carga_selec()" onchange="añadircli()">
                        <option value='' disabled selected>Seleccione cliente</option>
                    </select>
                </div>
            </section>
            <hr>
            <section>
                <!-- comprobamos si hay ticket activo, estado=1, si no... lo crea-->
                <?php
                $sql_fact = "SELECT * FROM facturas
                            WHERE estado='1'";
                $ejec = con()->query($sql_fact);
                if (!$ejec->fetch_array()) {
                    $hoy = date("Y-m-d");
                    $ahora = date("H:i:s");
                    $sql_nueva_fact = " INSERT INTO facturas(fecha,hora,estado) 
                                    VALUES('$hoy','$ahora','1')";
                    $ejec_nueva_fact = con()->query($sql_nueva_fact);
                }

                ?>
                <!-- Cargamos cada cliente -->
                <div class="contenedor_cliente">
                    <?php 
                    $sql_cli="SELECT * FROM cliente
                            WHERE cod_cli='1'";
                    $ejec_cli=con()->query($sql_cli);
                    foreach($ejec_cli as $reg_cli){
                    ?>
                    <div class="nombre">
                        <span><?php echo $reg_cli["nom_cli"]?><span>
                    </div>
                    <div class="productos">

                    </div>
                </div>
                    <?php
                        }
                    ?>
            </section>

        </main>
    </body>
    <script>
                    // $(function() {
                    //     alert("hola");
                    // })
    </script>

    </html>

    <?php
}
?>