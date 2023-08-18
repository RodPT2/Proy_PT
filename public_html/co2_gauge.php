<?php
    error_reporting(E_ERROR | E_PARSE); //pa quitar el error q arroja simepre
    require_once "./conex_dB.php";
    $conex=conex();

    date_default_timezone_set('America/Chihuahua');
    $Fecha=date ("l, d, F, Y");  

    $sql= "SELECT CO2_ppm,Hora FROM sensores WHERE fecha='".$Fecha."' ORDER BY Id_Medicion DESC LIMIT 1";
    $result =  mysqli_query($conex,$sql);
    $data = mysqli_fetch_assoc($result) ;
    $dat = json_encode($data);
    $Hora=$data['Hora'] ;
    $sql2="SELECT MAX(CO2_ppm) from sensores";
    $res2= mysqli_query($conex, $sql2);
    $max_data=mysqli_fetch_assoc($res2) ;
    $mx_data = json_encode($max_data);
    //echo "$dat";
     echo  "Hora del senso: ".$Hora;

?>

  <div id="graf_CO2_gauge">  </div>
  <?php echo $hora; ?>
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
       text: "CO2"},
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