<?php
session_start();
if (isset($_SESSION["admin"])) {
    include("./../funciones.php");
    $sql_cli = "SELECT * FROM cliente
                WHERE estado_cli='0'
                ORDER BY nom_cli ASC";
    $ejec_cli = con()->query($sql_cli);
    $vuelta = "<option value='' disabled selected>Seleccione cliente</option>";
    foreach ($ejec_cli as $reg_cli) {
        $codigocli = $reg_cli["cod_cli"];
        $nombrecli = $reg_cli["nom_cli"];
        // cargamos todos los option en la variable
        $vuelta.="<option id='$codigocli' value='$codigocli'>$nombrecli</option>";
    }
    echo $vuelta;
}
else{
    echo "<script>
            alert('Area restringida');
            window.location.href='./../index.html';
            </script>";
}
?>