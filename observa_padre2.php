<?php


session_start();

if ($_SESSION["nombre"]==""){

 header("Location: index4.html");

  //echo "no inicio sesion";
            

}else{
          
  //no hago nada solo continuo en la pagina

}


error_reporting(E_ALL);
ini_set('display_errors', '1');

   include("conec.php"); 
   $conn=conectarse(); 

   $id= $_POST["estudiante"];
   
   $consul2="SELECT EXTRACT(YEAR FROM current_date) FROM current_date";

 $res2 = pg_query($conn,$consul2);
 $row2 = pg_fetch_array($res2);
 $year=2017;//$row2["0"];
   
  
  
    $sql1="select texto, id_estudiante, id_profesor, fecha, id_year, id_comentario, (select nombre from profesor where profesor.id_profesor=recomendaciones.id_profesor ),(select apellido from profesor where profesor.id_profesor=recomendaciones.id_profesor ), (select id_imagen from profesor where profesor.id_profesor=recomendaciones.id_profesor ) from recomendaciones where id_estudiante='$id' and id_year='$year'";
    
    $sql2="select* from year";
    $sql3="select* from grado";
    $sql4="select* from periodo";
    $result = pg_query($conn,$sql1);
    $result2 = pg_query($conn,$sql2);
    $result3 = pg_query($conn,$sql3);
    $result4 = pg_query($conn,$sql4);



   $sql5="select* from estudiante where id_estudiante='$id'";
   $result5 = pg_query($conn,$sql5);
   $fila1 = pg_fetch_array($result5);
   $nombre = $fila1["1"];
   $apellido = $fila1["2"];





?>

<!DOCTYPE html>
<html>
<head>
     
    <title>CSD</title>
    <meta charset="utf-8"> 
     <link href="css/style.css" rel="stylesheet">
      <link rel="stylesheet" href="css/comen.css">

    

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
                    <a href="father1.php"><img width="100" height="60" src="img/logo3.png"></a>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="father1.php" title="Home">Inicio</a></li>
                               <li><a href="correo_padre1.php">Enviar Correo</a></li>
                               <li><a href="notas_padre1.php">Consultar notas</a></li>
                               <li><a href="observa_padre1.php">Observaciones</a></li>
                             
                               

          <li class="has-sub">    

        <button  style="border: #FFF 1px solid; background-color: #FFF">
         <figure  class="post2 wow fadeIn" data-wow-delay="0.2s">
         <img data-toggle="dropdown" class="img-circle" src= <?php echo $_SESSION["foto"];?> height="45" width="45" > 
          <h5 data-toggle="dropdown"><?php echo $_SESSION["nombre"];?></h5>
          </figure>

         </button>

         <ul >
         
           <li><a href="confi_padre.php">Configuracion</a></li>
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
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Observaciones</h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5>
                         <br>
    <?PHP 

     $fias=pg_num_rows($result);

      if($fias>0){

        echo "<div class='comment2s-container3'>
             <ul id='comment2s-list' class='comment2s-list'>";



      while ($row1=pg_fetch_array($result)) //este while es para crear las columnas de la tabla aqui estan las notas
              { 
                      $col1=$row1["0"]; //numero de nota 1, 2, 3, 4, ... n
                      $col2=$row1["1"];  //nombre
                      $col3=$row1["2"];  //id de la materia
                      $col4=$row1["3"];
                      $col5=$row1["4"];
                      $col6=$row1["5"];
                      $col7=$row1["6"];
                      $col8=$row1["7"];
                      $col9=$row1["8"];



       echo "

             <li>
             <div class='comment2-main-level'>
        
             <div class='comment2-avatar'><img src='$col9' alt=''></div>
             <!-- Contenedor del Comentario -->
              <div class='comment2-box'>
              <div class='comment2-head'>
              <h6 class='comment2-name by-author'>$col7 $col8</h6>
              <span>$col4</span>
              
              </div>
               <div class='comment2-content'>
                 $col1
               </div>
              </div>
              </div>
  
              </li>";

    }

    echo " </ul>
          </div>";

  }else{


                  echo "

                <hgroup class='titulos-wrap'>
                <h3 class='subtitulo wow bounceIn' data-wow-delay='0.3s'>No tienes Observaciones por el momento</h3>
                <h3 class='subtitulo wow bounceIn' data-wow-delay='0.3s'>revisa después.</h3>
                </hgroup>";

  }


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
<script src="bootstrap-modal.js"></script>


<script type="text/javascript" src="js/wow.min.js"></script>
<script>    
  new WOW().init();    
</script>
</html>