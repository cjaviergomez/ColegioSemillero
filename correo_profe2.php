     <?PHP

     //Inicio la sesión
    session_start();

     if ($_SESSION["nombre"]==""){

     header("Location: index4.html");

  //echo "no inicio sesion";
            

     }else{
          
  //no hago nada solo continuo en la pagina

        }


     include("conec.php"); 
     $conn=conectarse();

     $grado = $_POST["grado"];
  
     $sql1="select id_estudiante, nombre, apellido, id_grado, correo from estudiante where id_grado='$grado' and correo is not Null";
     $result = pg_query($conn,$sql1);

     
  
     ?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
     
    <title>CSD</title>
     

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


    <script> 
function marcar(obj) { 
    elem=obj.elements; 
    for (i=0;i<elem.length;i++) 
        if (elem[i].type=="checkbox") 
            elem[i].checked=true; 
} 
</script>

<script> 
function desmarcar(obj) { 
    elem=obj.elements; 
    for (i=0;i<elem.length;i++) 
        if (elem[i].type=="checkbox") 
            elem[i].checked=false; 
} 

</script>
    


    
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
                      <li><a href="up.php">Subir material </a></li>
                      
                             <li class="has-sub"> <a href="" title="">Notas</a>

                                         <ul >
         
                                 <li><a href="ingresa_parciales.php">Notas Parciales</a></li>
                                 <li><a href="inter_mejoras.php">Mejoras</a></li>
                                 <li><a href="asistenciaprofe.php">Asistencia y convivencia</a></li>
                            
          
     
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
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Enviar correo electrónico</h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5>

     
                            <form  method="post" action="correo_profe3.php" >

     <input type="button"  onclick="marcar(this.form)" value="Marcar Todos" /> &nbsp;&nbsp;<input type="button"  onclick="desmarcar(this.form)" value="Desmarcar" /> </br></br>
   



      <table class="margengrande"> 


<?PHP          
                    
                    echo " <thead> <tr>";
                    echo "<TH> <center> Enviar </center> </TH> ";
                    echo "<TH> <center> Estudiante  </center> </TH> ";
                    echo "<TH> <center> Grado </center> </TH> ";
                    echo "</tr> </thead>";

               
                    echo " <input type='hidden' name= 'grado' value='$grado' size='17' required />";
                                              

                    while ($row1=pg_fetch_array($result)) //este while es para crear las columnas de la tabla aqui estan las notas
                            { 
                                            $col1=$row1["0"];  //id
                                            $col2=$row1["1"];  //nombre
                                            $col3=$row1["2"];  //apellido
                                            $col4=$row1["3"];  //grado
                                            $col5=$row1["4"];  //correo


                                            
                                        echo " <tr>
                                        <td> <center><input type='checkbox' name= 'cod[".$col1."]' value='".$col5."'/> </center></td>
                                        <td> $col2 $col3 </td>
                                        <td> <center> $col4 </center></td>

                                        </tr>

                                        ";                                           
                                            

                            }   

                       
                                                                     
                            
    pg_free_result($result); 
    pg_close($conn); 
  
?> 


</table>
<p><font color="white" size="" >.</font></p>

<h4 >Asunto: </h4> <input class="form-control" type="text" name="asunto_txt" required/>

<H4> mensaje: </H4>
<textarea class="form-control" rows="5" id="mensaje_txa" name="mensaje_txa" required /></textarea>
  
<p ><font color="white" size="" >.</font></p>

<input type="submit"  name="actualizar" value="Enviar" class="btn">&nbsp;&nbsp;&nbsp;

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

<script src="bootstrap-modal.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script>    
  new WOW().init();    
</script>
</html>