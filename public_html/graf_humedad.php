<?php
    error_reporting(E_ERROR | E_PARSE); //pa quitar el error q arroja simepre
    require_once "./conex_dB.php";
    $conex=conex();

      date_default_timezone_set('America/Chihuahua');
    $Fecha=date ("l, d, F, Y");  

   // echo $Fecha;
    
    $sql="SELECT Humedad,Hora from sensores WHERE fecha='".$Fecha."' order by Hora";
    $result =  mysqli_query($conex,$sql);

    //$fila = $res->fetch_assoc();
    
   
    $Eje_Y=array(); //humedad
    $Eje_X=array(); //hora

    while($ver=mysqli_fetch_array($result)){
        //1 devuelve horas, van en eje X /  0 devuelve humedad 
            $Eje_Y[] = $ver[0]; 
           // var_dump( $Eje_Y);
            $Eje_X[] = $ver[1];
          //  var_dump( $Eje_X);

    }

    $dataX=json_encode($Eje_X);
    $dataY=json_encode($Eje_Y);

   // echo "$mx_data";

?>

    <div id="Graf_Humedad">  </div>
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
    // console.log(datosX);
    var trace1 = {
      x: datosX,
      y: datosY,
      type: 'scatter',
      line:{
          color:'red',
          width:0.5
      }
};

var data = [{
    type: "indicator",
    mode: "number",
    value: datosY[0],
    domain: {
         y: [0, 1],
         x: [0.25, 0.75] },
    title: { 
        text: "Humedad % " 
    }
  },
  {
    x: datosX,
    y: datosY
  }
];

var layout = {
   // width: 460,
     // height: 450,
      xaxis: {
         range: [0, 100] 
      } 
     };

      var config = {
        responsive: true
    };

    Plotly.newPlot('Graf_Humedad', data,layout,config);

</script>