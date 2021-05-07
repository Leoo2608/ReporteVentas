function cargarData(f1, f2, id){
    var _url = 'generador.php';
    $.ajax({
        type: "POST",
        url: _url,
        data: {
            f1,
            f2,
            id
        },
        dataType: "dataType",
        success: function (response) {
            alert("Parámetros (Fechas, Cliente) enviados a generador.php")
        }
    });
}