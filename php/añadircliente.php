<?php
session_start();
if (isset($_SESSION["admin"])) {
    include("./../funciones.php");

    // Recogemos el nombre en mayusculas

    $nombre = strtoupper($_POST["nom"]);

    // Primero buscamos que no exista el usuario en la tabla

    $sql_exist = "SELECT * FROM cliente
            WHERE nom_cli='$nombre'";
    $ejec = con()->query($sql_exist);
    if($ejec->fetch_array()){
        echo"existe";
    }
    // Si no existe grabamos
    else{
        $sql_in = "INSERT INTO cliente(nom_cli,estado_cli)
                VALUES('$nombre','0')";
        $ejec = con()->query($sql_in);
        echo "grabado";
    }
}
else {
    echo "<script>
            alert('El nombre o contraseña no son los correctos');
            window.location.href='./../index.html';
            </script>";
}
?>