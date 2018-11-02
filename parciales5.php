     <?PHP


session_start();

if ($_SESSION["nombre"]==""){

 header("Location: index4.html");

  //echo "no inicio sesion";
            

}else{
          
  //no hago nada solo continuo en la pagina

}


     include("conec.php"); 
     $conn=conectarse();

     $materia = $_POST["materia"]; 
     $periodo = $_POST["periodo"];  
     $year = $_POST["year"];
     $grado = $_POST["grado"];


      // error_reporting(E_ALL);
      // ini_set('display_errors', '1');

    
        

        //esto lo hago para comprobar si es la cuarta nota

                   $sqltest="select* from notasperiodo where id_materia='$materia' and id_grado='$grado' and id_year='$year'"; 
                   $resultest1 = pg_query($conn,$sqltest); 
                   $test1=pg_num_rows($resultest1);

                   //echo "test1--->", $test1;


                   $numberalu="select* from estudiante where id_grado='$grado' and id_year='$year'";
                   $resultest2 = pg_query($conn,$numberalu);
                   $test2=pg_num_rows($resultest2);


                   //echo "test2--->", $test2;

                   $aux=0; //lo inicializo en cero

                   if($test2 > 0){


                     if(($test1/$test2)==3){
                         //ya se han asignado 3 notas del periodo la que viene seria la cuarta

                         foreach ($_POST["cod2"]  as $codes) { //esto se ejecuta el numero de estudientes veces


                         $id = pg_escape_string($conn, $_POST["cod2"][$codes]); //estudiante
                         $cali = pg_escape_string($conn, $_POST["cali"][$codes]); //materia

                         if($cali < 3.0){

                          $aux= $aux + 1; //cuenta todos los que perdieron

                         }
     
          
                         $sql5=" insert into notasperiodo ( id_estudiante, id_materia, id_grado, valor, id_periodo, id_year) values ('$id', '$materia', '$grado','$cali', '$periodo', '$year')"; 

                        $actualizar= pg_query($conn,$sql5);

                                                            }

                      // echo "aux-->",$aux;

                         if($aux > 0){

                           //si se cumple esta condicion hay alumnos que perdieron

                         header("Location: ingresar_mejoras.php");


                        }else{



                        $sqlnew="select id_estudiante,  round(avg(valor),2) from notasperiodo where id_materia='$materia' and id_grado='$grado' and id_year='$year' group by id_estudiante order by id_estudiante";    

                          $resultnew = pg_query($conn,$sqlnew);        

                  while ($row1=pg_fetch_array($resultnew)) 
             
                      { 
                          $code=$row1["0"];
                          $notaf=$row1["1"];



                      $sqlnew2=" insert into notasfinales ( id_estudiante, id_materia, valor, id_year, id_grado) values ('$code', '$materia', '$notaf','$year', '$grado')"; 

                      $resultnew2= pg_query($conn,$sqlnew2);



                      }      


                      if($resultnew2==true){


                         header("Location: notas_finales_ingresadas.php");



                      }



                     }



                     }
                     else{                    
                               //ingresando notas del periodo

                      $aux=0;

                         foreach ($_POST["cod2"]  as $codes) { //esto se ejecuta el numero de estudientes veces


                         $id = pg_escape_string($conn, $_POST["cod2"][$codes]); //estudiante
                         $cali = pg_escape_string($conn, $_POST["cali"][$codes]); //materia


                           if($cali < 3.0){

                          $aux= $aux + 1; //cuenta todos los que perdieron

                         }
     
          
                         $sql5=" insert into notasperiodo ( id_estudiante, id_materia, id_grado, valor, id_periodo, id_year) values ('$id', '$materia', '$grado','$cali', '$periodo', '$year')"; 

                        $actualizar= pg_query($conn,$sql5);

                                                            }







                     }



                   }


        //comprobar que el numero de alumnos es mayor que cero y hacer la division del

                  $sql1="select nombre_mate from materia where id_materia='$materia'";
                  $result = pg_query($conn,$sql1);

                  $row = pg_fetch_array($result);
                  $materia2 = $row["nombre_mate"];
     
  
    ?>


<!DOCTYPE html>
<html>
<head>
     
    <title>CSD</title>
    <meta charset="utf-8"> 

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Hair salon templates for mens hair cut service provider.">
    <meta name="keywords" content="hair salon website templates free download, html5 template, free responsive website templates, website layout,html5 website templates, template for website design, beauty HTML5 templates, cosmetics website templates free download">
    


    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Style -->
    <link href="css/style.css" rel="stylesheet">



    <link rel="stylesheet" href="css/login.css">
    <link rel="shorcut icon" href="img/logo1.png">
    <link rel="stylesheet" href="css/normalize.css">

    <link href="css/StyleSheet.css" type="text/css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/responsiveslides.css">
    <script src="js/responsiveslides.js"></script>  


    <link rel="stylesheet" href="css/default.css">


    


    
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->  

</head>
<body>

<header class="cabecera">

    <div class="header">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="index.html"><img width="100" height="60" src="img/logo3.png"></a>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                 
                      <li class="active"><a href="profe1.php">Inicio</a></li>
                      <li><a href="correo_profe1.php">Enviar Correo</a></li>
                      


                        <li class="has-sub"> <a href="" title="">Material de estudio</a>

                                         <ul >
         
                                 <li><a href="up.php">subir material</a></li>
                                 <li><a href="ver1p.php">Ver material</a></li>
                            
          
     
                                    </ul>



                               </li>
                      

                             <li class="has-sub"> <a href="" title="">Notas</a>

                                         <ul >
         
                                 <li><a href="ingresa_parciales.php">Notas Parciales</a></li>
                                 <li><a href="inter_mejoras.php">Mejoras</a></li>
                                 <li><a href="consulta_notas_profe1.php">Ver Notas</a></li>
                            
          
     
                                    </ul>



                               </li>

                      <li><a href="profe_recomendacion1.php">Observaciones</a></li>
                             
                               

          <li class="has-sub">    

        <button  style="border: #FFF 1px solid; background-color: #FFF">
         <figure  class="post2 wow fadeIn" data-wow-delay="0.2s">
         <img data-toggle="dropdown" class="img-circle" src= <?php echo $_SESSION["foto"];?> height="45" width="45" > 
          <h5 data-toggle="dropdown"><?php echo $_SESSION["nombre"];?></h5>
          </figure>

         </button>

         <ul >

          <li><a href="confi_profe.php">Configuracion</a></li>
          <li><a href="index.php">Cerrar sesion</a></li>
           
         </ul>

        
         </li>   

                        

                        </div>


                    </div>



                </div>



            </div>



        </div>


                              

    </div>



</header>


    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Sistema académico</h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5>

   

                  <?PHP



          if($actualizar==true and $aux==0){

            echo "
             <hgroup class='titulos-wrap'>
             <h3 class='titulo wow fadeIn' data-wow-delay='0.1s'>Las notas de $materia2 fueron ingresadas correctamente</h3><br>
             <h3 class='subtitulo wow bounceIn' data-wow-delay='0.2s'>Del grado: $grado Periodo: $periodo  </h3>
              </hgroup>";
          }

          elseif($actualizar==true and $aux > 0){


                echo "
             <hgroup class='titulos-wrap'>
             <h3 class='titulo wow fadeIn' data-wow-delay='0.1s'>Las notas de $materia2 fueron ingresadas correctamente</h3><br>
             <h3 class='subtitulo wow bounceIn' data-wow-delay='0.2s'>Del grado: $grado Periodo: $periodo  </h3>
             <h3 class='subtitulo wow bounceIn' data-wow-delay='0.2s'>Parece que algunos alumnos no aprobaron, recuerda después ingresar las mejoras.</h3>
              </hgroup>";


          }

          else{


            echo "<hgroup class='titulos-wrap'>
             <h3 class='titulo wow fadeIn' data-wow-delay='0.1s'>las notas no fueron ingresadas correctamente</h3><br>
             <h3 class='subtitulo wow bounceIn' data-wow-delay='0.2s'  align='justify' >Ocurrió un error y no se pudieron ingresar correctamente las notas, es posible que hayan sido ingresadas previamente, u ocurrió un fallo durante el proceso, vuelve a intentarlo.</h3>
              </hgroup>";

          }

            


          

      pg_free_result($actualizar); 
      pg_free_result($result); 
      pg_close($conn); 



 
?>
                 


                    </div>
                    <!-- /.section title start-->


                </div>
            </div>

        </div>

        <br><br><br>
       
    </div>

 





 <div class="footer">
        <!-- footer-->
        <div class="container">
            <div class="footer-block">
                <!-- footer block -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Dirección</h2>
                            <ul class="listnone contact">
                                <li>Cr 6e # 27a-09 La Cumbre, Floridablanca. </li>
                             
                            </ul>
                        </div>
                    </div>

                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Telefono</h2>
                            <ul class="listnone contact">
                                <li> Telefono fijo: (+57) 7 6581001</li>
                              
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                            <!-- social block -->
                            <h2 class="widget-title">Redes Sociales</h2>
                            <ul class="listnone">
                                <li><a href="https://www.facebook.com/col.sem" target="_blank"> <i class="fa fa-facebook"  ></i> Facebook </a>
                                <br>
                                 <a href="https://www.instagram.com/colsemillero/" target="_blank" ><i class="fa fa-instagram" ></i> Instagram</a>

                                </li>
                                
                                
                               
                       
                            </ul>
                        </div>
                        <!-- /.social block -->
                    </div>
               
                </div>
                <div class="tiny-footer">
                    <!-- tiny footer block -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright-content">
                                <p>© Colegio Semillero Dos Mil 2017 | desarrollado por <a href="https://www.facebook.com/IngenieroJonathanCaballero"> Jonathan Caballero </a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tiny footer block -->
            </div>
            <!-- /.footer block -->
        </div>
    </div>






<script type="text/javascript" src="js/login.js" ></script>



   <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) 

    <script src="js/jquery.min.js"></script> -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <!-- sticky header -->
    <script src="js/jquery.sticky.js"></script>
    <script src="js/sticky-header.js"></script>

</body>


<script>
  
history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});

</script>

<script src="bootstrap-modal.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script>    
  new WOW().init();    
</script>
</html>