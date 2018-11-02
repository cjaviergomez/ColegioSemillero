     <?PHP

     //Inicio la sesión
session_start();

if ($_SESSION["nombre"]==""){

 header("Location: index4.html");

  //echo "no inicio sesion";
            

}else{
          
  //no hago nada solo continuo en la pagina

}


   //error_reporting(E_ALL);

   //ini_set('display_errors', '1');

    include("conec.php"); 
    $conn=conectarse();

    $periodo = $_POST["periodo"];  
    $grado = $_POST["grado"];
    $materia = $_POST["materia"];
    $year = $_POST["year"];
    $numero = $_POST["numero"];


          foreach ($_POST["num"]  as $codes) { 


            $numer = pg_escape_string($conn, $_POST["num"][$codes]);

            $name = pg_escape_string($conn, $_POST["nombres"][$codes]);
  
            $por = pg_escape_string($conn, $_POST["porcentaje"][$codes]);


              $sql25=" insert into parciales ( numero_nota, id_grado, id_materia, nombre, id_periodo, porcentaje, id_year) values ('$numer', '$grado', '$materia', '$name', '$periodo', '$por', '$year')"; 

              $actualizar2= pg_query($conn,$sql25);



          if($actualizar2==true){

            //echo "Funciono!!!!!!!";
          }

          else{


            echo "no funciona :(";
          }
            

          }


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

<link rel="stylesheet" href="css/tabla.css">


    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Notas de <?php echo $materia2;?></h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5>

   

                     



<?PHP  


    $sql4="select numero_nota, nombre, id_materia, porcentaje from parciales where id_materia='$materia' and id_periodo='$periodo' and id_year= '$year'";
    $result4 = pg_query($conn,$sql4); //esto son las columnas todas las notas de ese periodo

    $sql7="select id_estudiante, nombre from estudiante where id_grado='$grado' and id_year= '$year'";
    $nestu = pg_query($conn,$sql7);


    $sql1="select nombre from parciales where id_materia='$materia' and id_periodo='$periodo' and id_year='$year'"; 
    $result1 = pg_query($conn,$sql1); //similar a las columnas


 $sqlnew="select id_estudiante, id_materia, (select id_grado from grado where id_grado='$grado') as Grado,(select id_periodo from periodo where id_periodo='$periodo'), id_year, (select nombre from estudiante where estudiante.id_estudiante=materiaestudiante.id_estudiante ),(select apellido from estudiante where estudiante.id_estudiante=materiaestudiante.id_estudiante ) from materiaestudiante where id_materia='$materia' and id_year='$year' and id_grado='$grado' order by id_estudiante";

    $resultnew = pg_query($conn,$sqlnew);
 
?>

      <form  METHOD=POST action="parciales4.php" >
      <table class="margengrande"> 


<?PHP          
                  $test1=pg_num_rows($resultnew);

                  if( $test1 > 0){ 

                    
                    echo " <thead> <tr>";
                    echo "<TH> <center> Estudiante </center> </TH> ";

                    echo " <input type='hidden' name= 'numero' value='$numero' size='17' required />";
                    echo " <input type='hidden' name= 'materia' value='$materia' size='17' required />";
                    echo " <input type='hidden' name= 'periodo' value='$periodo' size='17' required />";
                    echo " <input type='hidden' name= 'year' value='$year' size='17' required />";
                    echo " <input type='hidden' name= 'grado' value='$grado' size='17' required />";
                          

          while ($row1=pg_fetch_array($result4)) //este while es para crear las columnas de la tabla aqui estan las notas
              { 
                      $col1=$row1["0"];   //numero de nota 1, 2, 3, 4, ... n
                      $col2=$row1["1"];   //nombre
                      $col3=$row1["2"];   //id de la materia
                      $porce=$row1["3"];  //porcentaje


                      
                    echo " <TH> <center> $col2 $porce % </center>  </TH> 

                    <input type='hidden' name= 'numeronota[".$col1."]' value='$col1' size='22'/>
                    <input type='hidden' name= 'porcentaje[".$col1."]' value='$porce' size='22'/>";                        
                      

              }   

              echo "</tr> </thead>";

              $cont=0;
              $ciclo2=pg_num_rows($result1); //me dice la cantidad de filas
              $ciclo=pg_num_rows($nestu); 
              $indice=0;
              $indice2=1;

            while ($row2=pg_fetch_array($resultnew)) //este while se ejecuta hasta la cantidad de estudiantes que existan
              { 
                      $es=$row2["0"];
                      $nom=$row2["1"];
                      $gra=$row2["2"];
                      $per=$row2["3"]; //5
                      $yea=$row2["4"];
                      $estuname=$row2["5"];
                      $apelli=$row2["6"];
                                                 
                    echo " <tr>   
                                 <td> $estuname $apelli </td> 
                                  <input type='hidden' name= 'cod3[".$es."]' value='$es' size='22'/>
                                  <input type='hidden' name= 'cod4[".$es."]' value='$nom' size='5' />
                                  <input type='hidden' name= 'cod5[".$es."]' value='$gra' size='5' />
                                  <input type='hidden' name= 'cod8[".$es."]' value='$per' size='5' />
                                  <input type='hidden' name= 'cod9[".$es."]' value='$yea' size='5' />  "; 
                    //echo "  ";

                                          

                    for($n=1; $n<=$ciclo2; $n++){

                                              
                                           echo "<td><input type='hidden' name= 'valores2[".$indice."]' value='$indice' size='5'/>

                                                    <center> <input type='number' min='0' step='0.1' max='5' title='nota parcial' name= 'valores[".$indice."]' value='0.0' size='5' required /> </center>
                                                     </td>";
                                             $indice++;
                                             $indice2++;

                    }
                    
                                        echo "</tr> ";
                               //solo hago un ciclo externo para llenar los estudiantes

                      

              }  

            }else{

                    echo "
             <hgroup class='titulos-wrap'>
             <h3 class='titulo wow fadeIn' data-wow-delay='0.1s'>No hay alumnos matriculados en esta materia</h3>
             <h3 class='subtitulo wow bounceIn' data-wow-delay='0.2s'>consultar con el administrador</h3>
              </hgroup>";



            }
                                           
              
    pg_free_result($result4); 
    pg_free_result($actualizar2); 
    pg_free_result($result); 
    pg_close($conn); 
  
?> 


</table>
<p >.</p>

</br>



        <div class="form-group">
      <div class="col-sm-1">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >
  Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <br><br><br><br><br><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
      </div>
      <div class="modal-body">
        Estas a punto de ingresar las notas revisa que todos los datos sean correctos, si estás seguro(a) dale clic en 
        confirmar.
      </div>
      <div class="modal-footer">
       <button   type="button" class="btn btn-primary" data-dismiss="modal">Atras</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>

</form>




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