<?php
    error_reporting(E_ERROR | E_PARSE); //pa quitar el error q arroja simepre
    require_once "../conex_dB.php";
    $conex=conex();

    if (isset($_POST['selectedOption'])) {
      $selectedOption = $_POST['selectedOption'];
      $Fecha = $selectedOption; //recupero la variable enviada x AJAX
      
    // echo "opción: " . $selectedOption;
    } else {
      //echo "No se recibieron datos del select.";
    }
       // echo $Fecha;
    $sql="SELECT Humedad,Hora from sensores WHERE fecha='".$Fecha."' order by Hora";
    //$sql="SELECT Humedad,Hora from sensores WHERE fecha='Wednesday, 07-Jun-20' order by Hora";
    $result =  mysqli_query($conex,$sql);
   
    $Eje_Y=array(); //humedad
    $Eje_X=array(); //hora

    while($ver=mysqli_fetch_array($result)){
        //1 devuelve horas, van en eje X /  0 devuelve humedad 
            $Eje_Y[] = $ver[0]; 
          //  var_dump( $eje_Y);
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