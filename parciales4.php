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

     $numero = $_POST["numero"];  //variables sencillas no son vectores !!!!!!!!!!!
     $materia = $_POST["materia"]; 
     $periodo = $_POST["periodo"];  
     $year = $_POST["year"];
     $grado = $_POST["grado"];

     //echo "numero-->", $numero,"</br>";


        $y=0;
        
         //variable auxiliar que me servira para ingresaar las notas !!!!!1

          foreach ($_POST["cod3"]  as $codes) { //esto se ejecuta el numero de estudientes veces



            $id = pg_escape_string($conn, $_POST["cod3"][$codes]); //estudiante
  

            $name = pg_escape_string($conn, $_POST["cod4"][$codes]); //materia
            //echo "name-->",$name,"  ";
            $gr = pg_escape_string($conn, $_POST["cod5"][$codes]); //grado

            $peri = pg_escape_string($conn, $_POST["cod8"][$codes]); //porcentaje
           // echo "periodo-->",$peri,"  ";
            $ye = pg_escape_string($conn, $_POST["cod9"][$codes]); // año
            //echo "año-->",$ye,"  ";
          
         
              $z=0;


            for ($x=0; $x < $numero  ; $x++) { 
              # code...
             //esto 15 veces (3 estudiantes * 5 notas cada uno) las cinco notas que hay: tareas, trabajos, proyectos, evaluacion.. ect
              $z++;
              $valor = pg_escape_string($conn, $_POST["valores"][$y]);
              $por =  pg_escape_string($conn, $_POST["porcentaje"][$z]);
              $y++;
              //este es el numero de las nota
              //echo "valor-->",$valor,"  ";
              //echo "valor-->",$por,"  ";
              //echo "</br>";



              $sql5=" insert into resulparciales ( id_estudiante, id_materia, id_grado, nombre_nota, valor, porcentaje, id_periodo, id_year) values ('$id', '$name', '$gr', '$z', '$valor', '$por', '$peri', '$ye')"; 

              $actualizar= pg_query($conn,$sql5);



          if($actualizar==true){

            //echo "Funciono!!!!!!!";
          }

          else{


            echo "no funciona :(";

          }

            }


          }     


    $sql1="select nombre_mate from materia where id_materia='$materia'";
    $result = pg_query($conn,$sql1);

    $row = pg_fetch_array($result);
    $materia2 = $row["nombre_mate"];

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

<?PHP
  
    $sql4="select id_estudiante, (select nombre from estudiante where estudiante.id_estudiante=resulparciales.id_estudiante ) as nombre ,(select nombre_mate from materia where id_materia='$materia') as materia,(select id_periodo from periodo where id_periodo='$periodo') as periodo, (select apellido from estudiante where estudiante.id_estudiante=resulparciales.id_estudiante ), round(sum(valor*(porcentaje/100)),2) from resulparciales where id_materia='$materia' and id_periodo='$periodo' and id_year='$year' group by id_estudiante order by id_estudiante";

    $result4 = pg_query($conn,$sql4);
 
?>


    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Notas de <?php echo $materia2;?></h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Grado: <?php echo $grado, "<br>";?> Periodo: <?php echo $periodo;?></h4>
                          <h5 class="small-title">Estudio Amor y Paz.</h5>

     
      <form  method="post" action="parciales5.php">

    <table class="margengrande" > 
    <thead> 
    <TR>
     <TH><center> Estudiante</center>  </TH> 
     <TH><center>Materia</center> </TH> 
     <TH><center>Periodo</center></TH> 
     <TH><center>Calificación</center> </TH> 
    


    </TR> 
    </thead>
    
<?PHP    

                    echo " <input type='hidden' name= 'materia' value='$materia'/> ";
                    echo " <input type='hidden' name= 'periodo' value='$periodo'/> ";
                    echo " <input type='hidden' name= 'year'    value='$year'/>    ";
                    echo " <input type='hidden' name= 'grado'   value='$grado'/>   ";

          while ($row1=pg_fetch_array($result4)) 
              { 
                      $codigo1=$row1["0"];
                      $nombre1=$row1["1"];
                      $mate=$row1["2"];
                      $per=$row1["3"];
                      $apelli = $row1["4"];
                      $califica=$row1["5"];

                      
                    echo "<tr>

                         
                           <input type='hidden' name= 'cod2[".$codigo1."]' value='$codigo1' size='5' /> 
                           <input type='hidden' name='nombre[".$codigo1."]' value='".$nombre1."' size='10'/>
                           <input type='hidden' name='mate[".$codigo1."]' value='".$mate."' size='10'/>   
                           <input type='hidden' name='per[".$codigo1."]' value='".$per."' size='5'/>  
                           <input type='hidden' name='cali[".$codigo1."]' value='".$califica."' size='7'/> 

                          <td> ".$nombre1." ".$apelli."</td>
                          <td> ".$mate."  </td>
                          <td><center> ".$per."  </center>  </td>
                          <td> <center> ".$califica." </center>  </td>
 
                          </tr>";                        
                      

              }   
  pg_free_result($result4); 
  pg_free_result($result); 
  pg_free_result($actualizar); 
  pg_close($conn); 
  
?> 


</table>


<p>.</p>
</br>
<!-- <input type="submit"  name="actualiza" value="Registrar Notas" class="btn">&nbsp;&nbsp;&nbsp; -->

<!-- Button trigger modal -->


<button type="submit" class="btn btn-primary">¡Registar Notas!</button>


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