$(document).ready(function(){

    $('#botoncito').on("click",function(){

        var id = $("#selector").val();
        var f1 = $("#date1").val();
        var f2 = $("#date2").val();

        $.ajax({
            url: "generador.php",
            type: 'POST',
            data: {
                id:id,
                f1:f1,
                f2:f2
            },
            dataType: "dataType",
            success: function (response) {
                console.log(response)
            }
        });
        
    })
    
});