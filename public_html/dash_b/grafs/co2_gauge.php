<?php
    error_reporting(E_ERROR | E_PARSE); //pa quitar el error q arroja simepre
    require_once "../conex.php";
    $conex=conex();
/*
    date_default_timezone_set('America/Chihuahua');
    $Fecha=date ("l, d, F, Y");  
*/
    $sql_fecha="SELECT Fecha FROM sensores ORDER BY Id_Medicion ASC LIMIT 1";
    $cons_fecha=mysqli_query($conex,$sql_fecha);
    $dat= mysqli_fetch_assoc($cons_fecha);
    $Fecha=$dat['Fecha'];

    $sql= "SELECT CO2_ppm FROM sensores WHERE fecha='".$Fecha."' ORDER BY Id_Medicion asc LIMIT 1";
    $result =  mysqli_query($conex,$sql);
    $data = mysqli_fetch_assoc($result) ;
    $dat = json_encode($data);
 
    $sql2="SELECT MAX(CO2_ppm) from sensores";
    $res2= mysqli_query($conex, $sql2);
    $max_data=mysqli_fetch_assoc($res2) ;
    $mx_data = json_encode($max_data);
    //echo "$dat";
?>

  <div id="graf_CO2_gauge">  </div>
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
    CO2_actual=json2array('<?php echo $dat ?>');
    CO2_max=json2array('<?php echo $mx_data ?>');

var data = [{
    domain: { 
      x: [0, 1], 
      y: [0, 1] },
    value: CO2_actual[0],
    title: {
       text: "CO2" },
    type: "indicator",
    delta: { 
        reference: 900  //valor estimado de co2 en ppm antes de q vlv
       },
       mode: "gauge+number+delta",
    gauge: {
         axis: { 
            range: [null,  CO2_max[0]] 
        } 
    }
  }
];

    var config = {
        responsive: true
    };

Plotly.newPlot('graf_CO2_gauge', data,config);
</script>