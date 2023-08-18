<!DOCTYPE html>
<html lang="es">    
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />

      <title>&#128225; PT II </title>
      <link rel="icon" href="./img/logo_UPIITA.ico">  <!--convertir img a .icon ->https://www.online-convert.com/es/result#j=85d8c3bd-3d39-46bd-8aad-7e1f80bdd681 -->
      <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
      <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@700&display=swap" rel="stylesheet">
      <script src="https://cdn.plot.ly/plotly-2.24.1.min.js" charset="utf-8"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@700&display=swap" rel="stylesheet">
      <link href="css/styles.css" rel="stylesheet"/>
</head> 

    <body id="page-top">
        <nav class="navbar navbar-expand-sm navbar-light fixed-top" id="mainNav">
            <div class="container-fluid px-4 px-lg-5">
               <a class="navbar-brand" href="#page-top"> <h3> <img  src="./img/Logo_IPN.png" width="20"> UPIITA </h3> </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menú <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                 <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link" href="#sens"  > Sensores </a></li>
                  <li class="nav-item"><a class="nav-link" href="#dash"  > Datos </a></li>
                  <li class="nav-item"><a class="nav-link" href="#about" > Nosotros </a></li>
                 <li class="nav-item"><a class="nav-link" href="#contact"> Contacto </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <header class="masthead" >
            <div class="container-fluid px-4 px-lg-5 d-flex  justify-content-center" style=" position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="d-flex justify-content-center">
                       <a class="btn btn-primary" href="./dash_b/index.php">Ir a Dashboard</a>
                </div>
            </div>
        </header>
        
   
        <!-- Sensores -->
        <section class="contact-section bg-black text-center" id="sens">
          <div style="display: flex; justify-content: center;   align-items: center;" >
              <div class="card" style="width: 80%; padding:0;">
                <div class="card-header" style="color:green;"> <strong> Sensores </strong></div>
                  <div class="card-body">
                    <p class="card-text" style="color:green;">Los sensores son los responsables de llevar al mundo digital los valores medibles del mundo real y a su vez permiten que podamos prosesarlos para realizar múltiples funciones. Para los gráficos del dashboard podemos ver principalmente toda esa telemetría gracias a estos dos sesnores que se muestran a continuación.</p>
                  </div>
              </div>
         </div> 
                       
            <div class="tit" style="width:100%;"> <span style="cursor:crosshair;"> CS811 <span> </div>
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            
            <div class="container" style="margin-top: 24px;">
                <div class="row align-item-start">
                        <div class="col-sm-8" style="text-align: justify; display: flex; justify-content: center; align-items: center; color:white;">
                               Es un sensor de dióxido de carbono (CO2) y compuestos orgánicos volátiles (COV) fabricado por la empresa AMS, permite monitorear la calidad del aire en espacios cerrados, ej: escuelas y casas.
                               este sensor opera mediante una tecnología basada en la detección de impedancia electroquímica para medir los niveles de CO2 y COV. Este sensor cuenta con un elemento de detección interno que interactúa con el aire ambiente y produce una señal eléctrica proporcional a la concentración 
                               de CO2 y COV presente.Este dispositivo por sí solo no puede realizar todo, requiere de un microcontrolador o un sistema embebido, ya que requiere una comunicación digital y un procesamiento adicional de la señal para obtener los datos de concentración de CO2 y COV en unidades adecuadas.
                        </div>

                        <div class="col" style=" padding-left: 36px;   display: flex; justify-content: center; align-items: center; padding-top:1.2em;"> 
                           <img src="./img/CS811.jpg"  alt="Sensor CS811"  style="border-radius: 7%;  max-width: 90%; height: auto;"> 
                        </div>
                </div>

                <div class="tit" style="margin-bottom: 24px;">  <span style="cursor:crosshair;width:100% ">  DHT11 </span> </div>
                <div class="row " style="margin-bottom: 24px;">
                    

                    <div class="col-sm-6" style="text-align: justify; display: flex; justify-content: center; align-items: center; color:white; ">
                        Este es un sensor capaz de proporcionar mediciones precisas de temperatura y humedad relativa, cuenta con un termistor que es el encargadado de medir la temperatura y un sensor de humedad capacitivo. El rango de medición de temperatura oscila entre 0 °C y 50 °C, con una precisión de ±2 °C y para la humedad relativa, tiene un rango de 20% a 90% con una precisión de ±5%.<br>
                            El sensor DHT11 es muy utilizado en proyectos de monitoreo y control ambiental, como estaciones meteorológicas caseras, sistemas de control de clima en invernaderos, y sistemas de domótica para el hogar.
                    </div>
                    
                    <div class="col"  style="padding-left: 36px; display: flex; justify-content: center; align-items: center; width:70%; padding-top:1.2em; ">
                        <img class="img-fluid" src="./img/DHT11.jpg" style="border-radius: 7%;  max-width: 90%; height: auto;">
                    </div>
                </div>    
</section>
       <!-- Dashboard-->
        <section class="dash-section bg-light" id="dash" style="padding-top:16px;">
            <div class="container" style="background:black;">
                <!--sensor  personas-->
                <div class="row" >          
                    <div class="col-sm-6" >
                            <div id="graf_personas" style= "border-radius:12px;"></div>
                    </div>
                    
                    <div class="col" style="text-align: justify; display: flex; justify-content: center; align-items: center;">
                      <div class="bg-black text-center  dash" style="border-radius: 12px;">
                       <h4 class="text-white"  style="padding-top:24px; font-size:1.8em;" >Personas</h4>
                        <p class="text-white-50" style="font-size:1.4em; text-align:justify;"> En el gráfico del lado izquierdo se visualiza el número aproximado de personas presentes en el salón 'X'</p>
                      </div>
                    </div>
                </div>
                  
                <!-- sensor CO2-->
                <div class="row">
                    <div class="col"  style="text-align: justify; display: flex; justify-content: center; align-items: center;">
                        <div class="bg-black text-center dash" style="border-radius: 12px;">
                                    <h4 class="text-white"style="padding-top:24px; font-size:1.8em;">Dioxido de carbono</h4>
                                    <p class=" text-white-50" style="font-size:1.4em; text-align:justify; ">Visualizamos el comportamiento del CO<sub>2</sub> en el salon 'X'</p>
                        </div>
                    </div>
                            <div class="col-sm-6" id="Medidores"> 
                            <div id="graf_co2"></div>                      
                        </div>
                </div>
                
                <!-- sensor DHT11-->    
                <div class="row" style="padding-top:24px; ">
                    <div class="col-sm-6" id="Medidores">
                        <div id="graf_temp"></div>  
                    </div>
                    
                    <div class="col "  style="text-align: justify; display: flex; justify-content: center; align-items: center;">
                        <div class="bg-black text-center dash" style="border-radius: 12px;">
                                    <h4 class="text-white"style="padding-top:24px; font-size:1.8em;"> Temperatura </h4>
                                    <p class="text-white-50" style="font-size:1.4em;">Permite visualizar el valor de la temperatura dentro del salón 'X' a través del día</p>
                        </div>
                        
                    </div>
                               
                </div>

                <div class="row" style="padding-top:12px;" >   
      
                  <div class="col"  style="text-align: justify; display: flex; justify-content: center; align-items: center;">
                    <div class="bg-black text-center h-100 dash" style="border-radius: 12px;">
                           <h4 class="text-white" style="padding-top:24px; font-size:1.8em;"> Humedad </h4>
                          <p class="text-white-50" style="font-size:1.4em;">Permite visualizar el valor de humedad dentro del salón 'X' a través del día</p>
                      </div>
                  </div>
                       <div class="col-sm-6" id="Medidores">
                 <div id="graf_lineal"></div>
             </div>
        </div>
        </div>
        </div>
      </div>

    </section>      

        <section class="about-section text-center" id="about" style= "padding-top: 30px;">
        <div class="row" style="justify-content:center; align-items:center;">
            <div class="col" style="display: block; justify-content: center; align-items: center;">
                <h2 style= "color: white;font-size: 3em; font-family: 'Dosis', sans-serif; padding-bottom:20px; ">  Aguilar Razo Rodrigo Alejandro </h2>
                <div class="container d-flex justify-content-center align-items-center" style="padding-right:1.8em;">
                <p style="font-size:1.5em; color:white; font-family: 'Dosis', sans-serif;text-align:justify;">  Soy alumno de la carrera de Telemática, realizando el Proyecto
                    Terminal 2 para obtener el grado de ingeniero en Telemática, tengo un gusto especial por el área de las comunicaciones, en especial las redes de internet y recientemente con el boom de
                    la IA mi interes se a mezclado entre estas dos áreas y deseo en un futuro realizar un posgrado que mezcle estas dos áreas. Soy una persona pro activa que gusta de ver los avances tecnológicos
                    sin importar en que área sean ya que de todo esto se puede aprender algo nuevo. </p>
                    </div>
            </div>
            
            <div class="col">
                    <div class= "nombres">
                        <h2 style= "color: white; font-size: 3em; font-family: 'Dosis', sans-serif; padding-bottom:20px;">   Guel de la Luz Jose Eduardo <h2>
                            <p> </p>
                    </div>
            </div>
        </div>
    </section>

        <!-- Contact-->
        <section class="contact-section bg-black text-center" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Dirección</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"> Av Instituto Politécnico Nacional 2580, La Laguna Ticoman, Gustavo A. Madero, 07340 Ciudad de México, CDMX</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-envelope text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Correos</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50"><a href="#!">raguilarr1500@alumno.ipn.mx <br> jguell1800@alumno.ipn.mx</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0">Teléfono</h4>
                                <hr class="my-4 mx-auto" />
                                <div class="small text-black-50">5536618015 <br> 5515632510</div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </section>

        <footer class="footer bg-black small text-center text-white-50">
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="https://www.upiita.ipn.mx/" target="blank"><i class="fas fa-school"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook"></i></a>
                <a class="mx-2" href="https://covid19.who.int/"><i class="fas fa-hospital-symbol"></i></a>
            </div>
            <div class="container px-4 px-lg-5">Copyright &copy; </div>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                      $('#graf_personas').load('barras.php');
                      $('#graf_lineal').load('graf_humedad.php');
                      $('#graf_temp').load('graf_temp.php');
                      $('#graf_co2').load('co2_gauge.php');
            }); 
        </script>
        
   </body>


</html>



