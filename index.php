<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
    <section class="container mt-5 cont">
            <form method="post" class="row">
                <div class="form-group col-md-3"> <!-- Date input -->
                    <label class="control-label" for="date">Date</label>
                    <input class="form-control" id="date1" name="date" placeholder="YYY/MM/DD" type="text"/>
                </div>
                <div class="form-group col-md-3"> <!-- Date input -->
                    <label class="control-label" for="date">Date</label>
                    <input class="form-control" id="date2" name="date" placeholder="YYY/MM/DD" type="text"/>
                </div>
               
                <div class="form-group col-md-3 mt-4">
                    <select id="selector" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <?php
                        require "conexion.php";
                        $getClientes = mysqli_query($conex,"SELECT idcliente, nombres, apellidos FROM bdventas.cliente;");
                        while($row = mysqli_fetch_array($getClientes)){
                            $idcliente = $row['idcliente'];
                            $nombres = $row['nombres'];
                            $apellidos = $row['apellidos'];
                    ?>
                    <option value="<?php echo $idcliente?>"><?php echo $nombres, " ", $apellidos?> </option>
                    <?php
                        }             
                    ?>
                    </select>
                </div>
                <div class="form-group col-md-3 mt-4">
                    <button type="button" id="botoncito" class="btn btn-danger" onclick="">Generar Reporte</button>
                </div>        
            </form>      
    </section>

    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script type="text/javascript" src="/functions.js"></script> 
    
    <script>
        $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
        })
    </script>
    
    
</body>
</html>