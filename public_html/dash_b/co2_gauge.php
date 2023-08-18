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
    $sql="SELECT CO2_ppm,Hora from sensores WHERE fecha='".$Fecha."' order by Hora";
    $result =  mysqli_query($conex,$sql);
   
    $Eje_Y=array(); //humedad
    $Eje_X=array(); //hora

    while($ver=mysqli_fetch_array($result)){
        //1 devuelve horas, van en eje X /  0 devuelve humedad 
            $Eje_Y[] = $ver[0]; 
          // var_dump( $Eje_Y);
            $Eje_X[] = $ver[1];
          //  var_dump( $Eje_X);

    }

    $sql2="SELECT MAX(CO2_ppm) from sensores";
    $res2= mysqli_query($conex, $sql2);
    $max_data=mysqli_fetch_assoc($res2) ;
   

    $mx_data=json_encode($max_data);
    $dataX=json_encode($Eje_X);
    $dataY=json_encode($Eje_Y);

   // echo "$mx_data";

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
    datosX=json2array('<?php echo $dataX ?>');
    datosY=json2array('<?php echo $dataY ?>');
    // console.log(datosX);
    mx=json2array('<?php echo $mx_data ?>');
       // console.log(mx);

var ultimoValor = datosY[datosY.length - 1];

var data = [{
    domain: { 
      x: [0, 1], 
      y: [0, 1] },
    value: ultimoValor,
    title: {
       text: "CO2" },
    type: "indicator",
    delta: { 
        reference: 900  //valor estimado de co2 en ppm antes de q vlv
       },
       mode: "gauge+number+delta",
    gauge: {
         axis: { 
            range: [null,  mx[0]] 
        } 
    }
  }
];


      var config = {
        responsive: true
    };

    Plotly.newPlot('graf_CO2_gauge', data,config);

</script>