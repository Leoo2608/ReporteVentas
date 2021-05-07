<?php
    $conex=new mysqli("localhost:3305","root","root","bdventas");
    if($conex->connect_errno){
        die("Error");
    }else{
        echo "Conexión exitosa";
    }
?>