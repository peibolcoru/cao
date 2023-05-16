<?php
    include("./../funciones.php");
    
    $nombre=$_POST["nombre"];
    $contraseña=$_POST["password"];

    $sql="SELECT * FROM administradores
        WHERE nom_adm='$nombre' AND cont_adm='$contraseña'";

    $ejec=con()->query($sql);

    // comprobacion si existen los parámetros

    if($reg=$ejec->fetch_array()){
        session_start();
        $_SESSION["admin"]=$reg["nom_adm"];
        header("location:./../inicio.php");
    }
    else{
        echo "<script>
            alert('El nombre o contraseña no son los correctos');
            window.location.href='./../index.html';
            </script>";
        
    }


?>