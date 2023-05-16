function nuevo_cli()
{
    var nombre = $("#nuevo_cli").val();
    // alert(nombre);
    if (!nombre == "") {
        $.post(
            "./añadircliente.php",
            { nom: nombre },
            function (regreso) {
                if (regreso == "grabado") {
                    // vuelta grabado
                    $('.resul-cli').show(300);
                    $('.resul-cli').html('<span>Cliente grabado correctamente</span>');
                }
                else {
                    // vuelta ya existe
                    $('.resul-cli').show(300);
                    $('.resul-cli').html('<span>El cliente ya existe</span>')
                }
            },
        );
    }
    else {
        $(".resul-cli").show(300);
        $(".resul-cli").html("<span>No puede dejar el campo vacio.</span>");
    }
}
function carga_selec() {
    limpiar();
    $.post(
        "./carga_selec.php",
        function(selec)
        {
            // todos los options que vienen de vuelta
            $("#sel_cli").html(selec)
        },
    );
}
function añadircli(){
    // Funcion que cambia el estado del cliente a 1
    var codcli=$("select").val();
    alert(codcli);
    $.post(
        "./cambioestadocli.php",
        {codigo:codcli},
        function (regreso){
            alert (regreso);
        }
    );
}
function limpiar()
    {    
        $(".resul-cli").hide(300);
    }

