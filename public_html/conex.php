<?php

$CO2=$_POST['co2_PPM'];
$temp=$_POST['t'];
$hum= $_POST['h'];

echo "Co2: " .$CO2.  "PPM <br> humedad: " .$hum. "% <br> temperatura: ".$temp;

$user="id21003268_alumno_ing";
$pswd="Vallejo#1307";
$BD="id21003268_data_pt_ii";
$serv="localhost";


$conex = mysqli_connect ($serv,$user,$pswd,$BD) ;
if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}

$bd2  = mysqli_select_db ($conex,$BD) or die ("Error conexion BD");

date_default_timezone_set('America/Chihuahua');

$fecha=date ("l, d, F, Y");  
echo "<br> Fecha: ".$fecha;

$hora= date("H:i:s");
echo "<br> Hora: ".$hora;

$cons= "INSERT INTO sensores (CO2_ppm,Temperatura,Humedad,Hora,Fecha) VALUES ('$CO2','$temp','$hum','$hora','$fecha' )";

$res=mysqli_query($conex,$cons);

if ($res) {
      mysqli_free_result($res);
    echo "\n Inserccion exitosa"; // Mensaje de conexión exitosa
}
     else {
    echo " \n Error en la Inserccion: " . mysqli_error($conex);
}

mysqli_close($conexion);

?>