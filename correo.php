<?PHP

//Inicio la sesión
session_start();

if ($_SESSION["nombre"]==""){

 header("Location: index4.html");

  //echo "no inicio sesion";
            

}else{
          
  //no hago nada solo continuo en la pagina

}


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
                    <a href="alumno1.php"><img width="100" height="60" src="img/logo3.png"></a>
                </div>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="navigation">
                        <div id="navigation">
                            <ul>
                                 
                                 <li><a href="alumno1.php">Inicio</a></li>
  
                                  <li><a href="correo.php">Enviar Correo</a></li>
                                   <li><a href="ver1.php">Tareas y material </a></li>
                                    <li><a href="notase1.php">Tus notas</a></li>
                                 <li><a href="comen4.php">Observaciones</a></li>
                             
                               

          <li class="has-sub">    

        <button  style="border: #FFF 1px solid; background-color: #FFF">
         <figure  class="post2 wow fadeIn" data-wow-delay="0.2s">
         <img data-toggle="dropdown" class="img-circle" src= <?php echo $_SESSION["foto"];?> height="45" width="45" > 
          <h5 data-toggle="dropdown"><?php echo $_SESSION["nombre"];?></h5>
          </figure>

         </button>

         <ul >
         
           <li><a href="confi_alumno.php">Configuracion</a></li>
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


<?PHP
// llamar la funciones 

   include("conec.php"); 
   $conn=conectarse(); 
   $sql1="select* from profesor"; 
   $result = pg_query($conn,$sql1);
    
 
?>

    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


   
        <div class="container">
            <div class="row">
            <div class="section-title mb60 text-center">

                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Sistema Académico</h2>
                        <h4 class="subtitulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5>

                        </div>


                        


                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"><img class="post wow fadeInLeft" data-wow-delay="0.5s" src= <?php echo $_SESSION["foto"];?>  alt="" class="img-responsive"></div>

                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="well-block">
                        <h1>Enviar correo electrónico</h1>
                        <h5 class="small-title ">CSD</h5>


                       <form name="form-mail" action="mail.php" method="post" >
                       	
                       <h5> De: <?php echo $_SESSION["nombre"]; echo " "; echo $_SESSION["apellido"];?> </h5> <input type="hidden" name="de_txt" value=<?php echo $_SESSION["nombre"];?> required/>

                        <H5> Para: </H5>
                         <select  class="form-control" name="para_txt" id="para_txt" required /> 
                          <option value="">Profesor</option>
                          <!--Creamos el select con el atributo name "combo" que identificara el archivo registrar.php-->
                         <?PHP
                           while($row = pg_fetch_array($result)) { 
                            //Iniciamos un ciclo para recorrer la variable $result  que tiene la consulta hecha para municipio

                            $correo = $row["correo"] ;
                            $nombre = $row["nombre"] ;
                            $apellido = $row["apellido"] ;  //Asignamos el id del campo que quieras mostrar
                            echo "<option value=".$correo.">".$nombre." ".$apellido." </option>"; 
                             //Llenamos el option con su value que sera lo que se lleve al archivo registrar.php y que sera el id de tu campo y luego concatenamos el nombre que se mostrara en el combo 
                             } //Cerramos el ciclo 
                                ?>
                            </select>

                            <H5> mensaje: </H5>
                            <textarea class="form-control" rows="5" id="mensaje_txa" name="mensaje_txa" required /></textarea>

                        <input  class="btn" type="submit" name="enviar_btn" value="enviar">

                       </form>
                        




                </div>
            </div>
        </div>
         <br><br>

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