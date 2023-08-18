<?php
    error_reporting(E_ERROR | E_PARSE); //pa quitar el error q arroja simepre
    require_once "../conex_dB.php";
    $conex=conex();
    $sql = "SELECT DISTINCT Fecha FROM sensores order by Fecha";
    $result = $conex->query($sql);

    $sql2="SELECT CO2_ppm FROM sensores ORDER BY Id_Medicion DESC LIMIT 1"; //valor en el instante que se abre la página
    $res = $conex->query($sql2);
    $CO2=mysqli_fetch_assoc($res);

    $CO2_actual = $CO2['CO2_ppm'];
    mysqli_close($conex);
    
    function semaforo ($CO2_actual) {
    if ($CO2_actual > 0 && $CO2_actual < 600) {
        return 'green';
      } 
      if($CO2_actual>=600 && $CO2_actual<900) {
        return 'yellow';
      }
      else{
        return 'red';
      }
  }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <script src="https://cdn.plot.ly/plotly-2.24.1.min.js" charset="utf-8"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@1,300&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    </head>

    <body class="sb-nav-fixed">
      <nav class="sb-topnav navbar navbar-expand  navbar-dark bg-primary"> </nav>
       <div id="layoutSidenav">
        <div id="layoutSidenav_content">
          <main style="width:90%;">
            <div class="container-fluid px-4">
               <h1 class="mt-4">Dashboard </h1>
               <ol class="breadcrumb mb-4"> <li class="breadcrumb-item active">CO2 |Temperatura | Humedad| Número de Personas</li> </ol>
            </div>

            <div class="container">
              <div class="row justify-content-md-center">
                    <div class="col-sm-6">
                        <div class="card bg-primary text-white mb-4"> 
                            <div class="card-body" style="font-size:24px; font-style: oblique 10deg; padding-top:9px;"> <img  src="../img/Logo_IPN.png" width="40" style="padding-right:12px;"><strong> UPIITA </strong> </div>
                            <div class="card-footer d-flex align-items-center justify-content-between" style="color: black;"><a href="../index.php" style="color:white;  text-decoration:none"> Regresar a home</a> </div>
                        </div>
                    </div>
    
                    <div class="col-sm-6">
                        <div class="card text-white  mb-3" style="background-color:<?php echo semaforo($CO2_actual);?>">
                            <div class="card-body" style="font-size:24px; font-style: oblique 10deg; text-align: center; color:black;"><strong>Semáforo </strong></div> 
                            <div class="card-footer text-muted" style="text-align:center; font-size: 1.2em;"><b> <div>  CO<sub>2</sub> : <?php echo " $CO2_actual";  //   var_dump($CO2);?> ppm</b><br></div>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-6">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="background:#ADD8E6; text-align:center;" id="mySelect">
                            <option  value="" disabled selected hidden> Seleccione una fecha</option>
                            <?php
                              while($row = mysqli_fetch_array($result)) {
                              echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                            }?>
                        </select>
                        <div style="display:flex; justify-content:center; align-items: center"> <button id="submitBtn"  class="btn btn-info"> Consultar </button> </div>
                    </div>  
             </div>

            <div class="d-flex justify-content-center" style="margin:24px;">
                <div class="card align-items-center bg-primary " style=" margin-bottom: 9px; margin-top:0; width:90%; ">  <div class="card-header"> <p style="color:white; font-size:30px; font-family: 'IBM Plex Serif', serif; font-weight:bold; margin-bottom:0; background:none;"> Sensor CO<sub>2</sub>  </p></div> </div>
            </div>
        
            <div class="row align-items-center">
                    <div class="card mb-4"> <div class="card-header"> <i class="fas fa-chart-area me-1"></i> <b> CO<sub>2 </sub></b>  </div>
                    <div class="card-body"> <div id="graf_CO2"> </div>  </div>
                    <div class="card-footer text-center"> En esta gráfica se aprecia el comportamiento del CO<sub>2</sub> a lo largo del día seleccionado. </div>
                    </div>
                </div>


            <div class="row align-items-center">
                    <div class="card mb-4"> <div class="card-header"> <i class="fas fa-chart-area me-1"></i> <b> CO<sub>2</sub> Gauge </b> </div>
                    <div class="card-body"> <div id="graf_CO2_gauge"> </div> </div>
                    <div class="card-footer text-center"> En esta gráfica se muestra la última medición de CO<sub>2</sub> en el día seleccionado. </div>
                    </div>
            </div>

              
            <div class="d-flex justify-content-center"  style="margin:24px;">
              <div class="card align-items-center bg-primary" style=" margin-bottom: 9px; margin-top:0; width:90%;">  <div class="card-header"> <p style="color:white; font-size:30px; font-family: 'IBM Plex Serif', serif; font-weight:bold; margin-bottom:0; background:none;"> Sensor DHT11  </p></div> </div>
            </div>

            <div class="row align-items-center">
                    <div class="card mb-4"> <div class="card-header"> <i class="fas fa-chart-area me-1"></i> <b>Temperatura</b> </div>
                        <div class="card-body"> <div id="graf_temp"> </div> </div>
                        <div class="card-footer text-center"> En esta gráfica se aprecia el comportamiento de la temperatura a lo largo del día seleccionado. </div>
                    </div>
            </div>

            <div class="row align-items-center">
                    <div class="card mb-4"> <div class="card-header"> <i class="fas fa-chart-area me-1"></i><b> Humedad </b> <i class="fa-thin fa-droplet"></i></div>
                        <div class="card-body"><div id="graf_humedad"></div> </div>
                        <div class="card-footer text-center"> En esta gráfica se aprecia el comportamiento de la humedad a lo largo del día seleccionado. </div>
                    </div>
           </div>

            <div class="d-flex justify-content-center"  style="margin:24px;">
                <div class="card align-items-center bg-primary" style=" margin-bottom: 9px; margin-top:0; width:90%;">  <div class="card-header"> <p style="color:white;font-size:30px; font-family: 'IBM Plex Serif', serif; font-weight:bold; margin-bottom:0; background:none;"> Sensor personas  </p></div> </div>
            </div>

            <div class="row" style="justify-content:center;">
              <div class="col-xl-9 ">
                  <div class="card mb-4"> <div class="card-header">  <i class="fas fa-chart-bar me-1"></i> Número de personas </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                  </div>
              </div>
            </div>


              <div class="card mb-4">
                <div class="card-header">
                  <i class="fas fa-table me-1"></i>
                                  DataTable Example
                  </div>
              </div>
            </div>
          </main>

                            
       <footer class="footer"> 
          <div class="container">  Quiobo loboo</div>
        </footer>
     </div>          
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>
</html>


<script type="text/javascript">
let cont=0;

$(document).ready(function() {
    if (cont==0){
        $('#graf_temp').load('./grafs/graf_temp.php');
        $('#graf_humedad').load('./grafs/graf_humedad.php');
        $('#graf_CO2').load('./grafs/graf_CO2.php');
        $('#graf_CO2_gauge').load('./grafs/co2_gauge.php');
    }

  $('#submitBtn').click(function(event) {
    cont=1;
    event.preventDefault();

    var selectedOption = $('#mySelect').val();
    $.ajax({
      url: './graf_temp.php',
      type: 'POST',
      data: { selectedOption: selectedOption },
      success: function(response) {
        console.log(response);
        $('#graf_temp').html(response); // Cargar contenido en el div
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });

    $.ajax({
      url: './co2_gauge.php',
      type: 'POST',
      data: { selectedOption: selectedOption },
      success: function(response) {
        console.log(response);
        $('#graf_CO2_gauge').html(response); // Cargar contenido en el div
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });

    $.ajax({
      url: './graf_CO2.php',
      type: 'POST',
      data: { selectedOption: selectedOption },
      success: function(response) {
        console.log(response);
        $('#graf_CO2').html(response); // Cargar contenido en el div
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });

    $.ajax({
      url: './graf_humedad.php',
      type: 'POST',
      data: { selectedOption: selectedOption },
      success: function(response) {
        console.log(response);
        $('#graf_humedad').html(response); // Cargar contenido en el div
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });

  });
});
</script>

    