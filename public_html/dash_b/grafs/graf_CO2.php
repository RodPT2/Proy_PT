<?php
    error_reporting(E_ERROR | E_PARSE); //pa quitar el error q arroja simepre
    require_once "../conex.php";
    $conex=conex();

    /*date_default_timezone_set('America/Chihuahua');
    $Fecha=date ("l, d, F, Y");  */

    $sql_fecha="SELECT Fecha FROM sensores ORDER BY Id_Medicion ASC LIMIT 1";
    $cons_fecha=mysqli_query($conex,$sql_fecha);
    $dat= mysqli_fetch_assoc($cons_fecha);
    $Fecha=$dat['Fecha'];

   
   $sql = "SELECT CO2_ppm,Hora from sensores WHERE fecha='".$Fecha."' order by Hora"; 
   $result =  mysqli_query($conex,$sql);
   
   $Eje_Y=array();
   $Eje_X=array(); 

    while($ver=mysqli_fetch_array($result)){
        //1 devuelve horas, van en eje X /  0 devuelve co2 
            $Eje_Y[] = $ver[0]; 
          //  var_dump( $eje_Y);
            $Eje_X[] = $ver[1];
          //  var_dump( $Eje_X);

    }

    $dataX=json_encode($Eje_X);
    $dataY=json_encode($Eje_Y);
?>

    <div id="graf_CO2">  </div>
        <script type="text/javascript">
          function json2array(json){
             var parsed = JSON.parse(json);
             var arr=[];
            for (var x in parsed){
             arr.push(parsed[x]);
            }
            return arr;
           }
        </script>


<script type ="text/javascript">
    datosX=json2array('<?php echo $dataX ?>');
    datosY=json2array('<?php echo $dataY ?>');
    
    var data = [{
        type: "indicator",
        mode: "number",
        value: datosY[0],
        domain: {
            y: [0, 1],
            x: [0.25, 0.75] },
        title: { 
            text: "CO2 ppm" 
        }
    },
    {
        x: datosX,
        y: datosY
    }
    ];

    var layout = {
        xaxis: {
            range: [0, 100] 
        } 
    };
    var config = {
            responsive: true
    }

Plotly.newPlot('graf_CO2', data, layout,config);
</script>