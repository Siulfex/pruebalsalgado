//Funcion encargada de mostrar los datos de los contactos mediante ajax
function obtenerDatos(){
    //Se muestra el spinner de carga y se oculta la tabla por si se habia cargado antes
    $("#divSpinner").show();
    $("#divResult").hide();
    setTimeout(function(){
        $.ajax({
            type: 'POST',
            url: 'classes/service.php',
            data: "Accion=Obtener",
            dataType: 'text',
            async: false,
            //Si el proceso se ejecuta correctamente, seteamos los datos y los cargamos a la tabla
            success: function(data){
                var resultado = JSON.parse(data);
                cont = 0;
                $("#resultado").html("");
                $.each(resultado, function(index, value) {
                    var tr = `<tr>
                    <td>`+resultado.result[cont].id+`</td>
                    <td>`+resultado.result[cont].contact_no+`</td>
                    <td>`+resultado.result[cont].lastname+`</td>
                    <td>`+resultado.result[cont].createdtime+`</td>
                    </tr>`;
                $("#resultado").append(tr);
                cont += 1;
                })
                //Mostramos la tabla y se oculta el spinner
                $("#divSpinner").hide();
                $("#divResult").show();
            },
            error : function(xhr, status) {
                alert('Se encontro un problema.');
            }
        })
    }, 200);
}