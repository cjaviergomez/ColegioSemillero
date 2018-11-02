<?PHP

 session_start();

if ($_SESSION["nombre"]==""){

 header("Location: index4.html");

  //echo "no inicio sesion";
            

}else{
          
  //no hago nada solo continuo en la pagina

}

   //  error_reporting(E_ALL);
    // ini_set('display_errors', '1');

     include("conec.php"); 
     $conn=conectarse();

     
     //$materia = $_POST["materia"]; 
     $periodo = $_POST["periodo"];  

     $consul2="SELECT EXTRACT(YEAR FROM current_date) FROM current_date";

     $res2 = pg_query($conn,$consul2);
     $row2 = pg_fetch_array($res2);
     $year=$row2["0"];
     //$year='2017';
     $grado = $_POST["grado"];

    
    

      //pg_close($conn); 
     
  
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
                    <a href="secretaria1.php"><img width="100" height="60" src="img/logo3.png"></a>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                 
                                <li><a href="secretaria1.php" title="Home">Inicio</a></li>



                             <li class="has-sub"> <a href="" title="">Padre</a>

                                         <ul >
         
                                 <li><a href="familia1_secre.php">Registrar Padre</a></li>
                                 <li><a href="editar_secre_padre1.php">Actualiza Padre</a></li>
     
                                    </ul>



                               </li>



                             <li class="has-sub"> <a href="" title="">Madre</a>

                                         <ul >
         
                                <li><a href="madre1_secre.php">Registrar Madre</a></li>
                                 <li><a href="editar_secre_Madre1.php">Actualiza Madre</a></li>
     
                                    </ul>



                               </li>


                              <li class="has-sub"> <a href="" title="">Acudiente</a>

                                         <ul >
         
                                <li><a href="acudiente1_secre.php">Registra Acudiente</a></li>
                                  <li><a href="editar_secre_acu1.php">Actualiza Acudiente</a></li>
     
                                    </ul>



                               </li>



                               <li class="has-sub"> <a href="" title="">Alumno</a>

                                         <ul >
                                 <li><a href="consulta_notas_secre1.php">Notas periodo</a></li>
                                 <li><a href="matricula1_secre.php">Registrar Alumno</a></li>
                                 <li><a href="editar_secre_alumno1.php">Actualiza Alumno</a></li>
                                 <li><a href="asistenciasecre.php">Asistencia y convivencia</a></li>

          
     
                                    </ul>


                               </li>




                             <li class="has-sub"> <a href="" title="">Profesor</a>

                                         <ul >
         
                                 <li><a href="ingresaprofe1_secre.php">Ingresar</a></li>
                                 <li><a href="editar_secre_profe1.php">Actualizar</a></li>
          
     
                                    </ul>



                               </li>
                             
                               

          <li class="has-sub">    

        <button  style="border: #FFF 1px solid; background-color: #FFF">
         <figure  class="post2 wow fadeIn" data-wow-delay="0.2s">
         <img data-toggle="dropdown" class="img-circle" src= <?php echo $_SESSION["foto"];?> height="45" width="45" > 
          <h5 data-toggle="dropdown"><?php echo $_SESSION["nombre"];?></h5>
          </figure>

         </button>

         <ul >
         
           <li><a href="confi_admin.php">Configuración</a></li>
           <li><a href="index.php">Cerrar sesión</a></li>
          
     
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

<?PHP
  
$sql4="select id_estudiante, (select nombre from estudiante where estudiante.id_estudiante=notasperiodo.id_estudiante ) as nombre, (select apellido from estudiante where estudiante.id_estudiante=notasperiodo.id_estudiante ), valor from notasperiodo where id_periodo='$periodo' and id_year='$year' and id_grado='$grado' order by apellido"; 

$result4=pg_query($conn,$sql4);

 
?>


    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Notas Periodo</h2>
                        <h3 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Grado: <?php echo $grado;?>  Periodo: <?php echo $periodo;?> </h3>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5>

                    </div>
                    <!-- /.section title start-->


                </div>
                
            </div>

        </div>
       
    </div>





<?PHP  

     $test1=pg_num_rows($result4);


    if( $test1 > 0){   

    $sql1="select id_materia from gradomateria where id_grado='$grado'";
     $result = pg_query($conn,$sql1);

   // $numeroM = pg_num_rows($result);  //Cantidad de materias que tiene el grado.


 
        echo " 
      
      <table  class ='margencentrada'> 
      <thead> 
      <TR>
      <TH><center> Estudiante </center></TH>";

      
      while($row = pg_fetch_array($result)){

    $materia2 = $row["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
    $consultnombres = "select nombre_mate from materia where id_materia='$materia2'";
    $resultname = pg_query($conn,$consultnombres);

    while($row3 = pg_fetch_array($resultname)){

      $matnombre = $row3["nombre_mate"];   //Arreglo con unicamente los nombres de las materias que tiene el grado. 
     echo "
      <TH><center> ".strtoupper($matnombre)." </center></TH>"; //Imprime los nombres de las materias del grado en el encabezado de la tabla. 
     }
    }

      "</TR> 
      </thead>   ";


             while ($row1=pg_fetch_array($result4)) 
              { 
                      $codigo1=$row1["0"];
                      $nombre1=$row1["1"];
                      $apelli = $row1["2"];
                      $califica=$row1["3"];

                       echo "<tr>

                       

                          <td> ".$apelli." ".$nombre1."</td>";

                          $sql8="select id_materia from gradomateria where id_grado='$grado'";
                          $resulta = pg_query($conn,$sql8);
                         while($row7 = pg_fetch_array($resulta)){

                           $materia4 = $row7["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                           $notaM = "select valor from notasperiodo where id_materia='$materia4' and id_periodo='$periodo' and id_year='$year' and id_grado='$grado' and id_estudiante ='$codigo1'";
                           $resultnota = pg_query($conn,$notaM);

                           $numeroN = pg_num_rows($resultnota);

                           if ($numeroN == 0){

                            echo "<td><center> -- </center></td>";   //Si no existe ninguna nota entonces rellena el campo con guiones. 
                           }else{
                           

                             while($row8 = pg_fetch_array($resultnota)){

                                $matnota = $row8["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                echo "
                                <td><center> ".$matnota." </center></td>"; //Imprime las notas de cada una de las materias del estudiante. 
                             }
                         }
                          }
                          




 
                          "</tr>";                        
                      

              } 

       




 echo "
  </table>

   <br>
   <div align='center'>
   <a href='consulta_notas_secre1.php' class='btn btn-primary'>Atras</a>
  <a href='generadorExcel.php?periodo=$periodo&grado=$grado&año=$year' class='btn btn-primary'>Generar Boletines</a> 
  </div>
  <br>
  <br>
  <br>
  ";

} else{  


              echo "
              <div  style='background:#F2F2F2 url('img/bg3.png') '' >


        <div class='container'>


            <div class='row'>

                <div class='col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12'>
                      <div class='section-title mb60 text-center'>
             <hgroup class='titulos-wrap'>
             <h3 class='subtitulo wow fadeIn' data-wow-delay='0.1s'>Todavía no hay notas de ese periodo, puedes revisar más tarde.</h3>
          
              </hgroup>
              <br>
              <a href='consulta_notas_admin1.php' class='btn btn-primary'>Atras</a>
              </div>
              </div>
              </div>
              </div>
              </div>";


}

  pg_free_result($result4); 
  pg_free_result($result); 
  pg_close($conn); 


  
?>
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

<script src="bootstrap-modal.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script>    
  new WOW().init();    
</script>
</html>