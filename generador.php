<?php
    function generarReporte($entradaid, $fecha1, $fecha2){
        require "conexion.php";
        $resp = mysqli_query($conex, 
        "SELECT c.nombres, c.apellidos, v.fecha,v.tipodoc,v.numdoc, p.nomprod, d.cantidad, d.precio 
        FROM cliente c
        JOIN venta v on v.idcliente = c.idcliente
        JOIN detalle d on d.idventa = v.idventa
        JOIN producto p on p.idproducto = d.idproducto
        WHERE c.idcliente = $entradaid and v.fecha BETWEEN '$fecha1' and '$fecha2'");
        if($resp){
            $xml = new DOMDocument("1.0");
            $xml->formatOutput = true;
            $fitness = $xml->createElement("ventas");
            $xml -> appendChild($fitness);
            while($row = mysqli_fetch_array($resp)){

                $venta = $xml->createElement("venta");
                $fitness->appendChild($venta);

                $nombres = $xml->createElement("nombres", $row['nombres']);
                $venta->appendChild($nombres);

                $apellidos= $xml->createElement("apellidos", $row['apellidos']);
                $venta->appendChild($apellidos);

                $fecha= $xml->createElement("fecha", $row['fecha']);
                $venta->appendChild($fecha);

                $tipodoc = $xml->createElement("tipodoc", $row['tipodoc']);
                $venta->appendChild($tipodoc);

                $numdoc = $xml->createElement("numdoc", $row['numdoc']);
                $venta->appendChild($numdoc);

                $nomprod = $xml->createElement("nomprod", $row['nomprod']);
                $venta->appendChild($nomprod);

                $cantidad = $xml->createElement("cantidad", $row['cantidad']);
                $venta->appendChild($cantidad);

                $precio = $xml->createElement("precio", $row['precio']);
                $venta->appendChild($precio);

            }
            echo "<xmp>".$xml->saveXML()."</xmp>";
            $xml->save("report.xml");
        }else{
            echo "error...";
        }
    }
    generarReporte(1, '2021-05-07', '2021-05-09');

    //1 -- '2021-05-06'  -- -- '2021-05-09'
    ?>