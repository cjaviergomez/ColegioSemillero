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


        <script>
    $(document).ready(function(){
        $("#grado").change(function () {

          //$('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
          $("#grado option:selected").each(function () {
            id_grado = $(this).val();
            $.post("getmate.php", { id_grado: id_grado }, function(data){
              $("#materia").html(data);
            });            
          });
        })
      });
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


<?PHP

// llamar la funciones 
   include("conec.php"); 
   $conn=conectarse(); 
   
  
  
    //$sql1="select* from materia";
    $sql2="select* from year";
    $sql3="select* from grado";
    $sql4="select* from periodo";
    //$result = pg_query($conn,$sql1);
    $result2 = pg_query($conn,$sql2);
    $result3 = pg_query($conn,$sql3);
    $result4 = pg_query($conn,$sql4);
 
?>


    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Notas Periodo</h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5>

<form action="consulta_notas_secre2.php" method="post" > 

<div><font color="" size="4">Selecciona el Periodo:</font>&nbsp;&nbsp;&nbsp;
 <select  class="form-control" name="periodo" id="periodo"  required> 
 <option value="" >Periodo</option>
<!--Creamos el select con el atributo name "combo" que identificara el archivo registrar.php-->
<?PHP
while($row = pg_fetch_array($result4)) { 
//Iniciamos un ciclo para recorrer la variable $result  que tiene la consulta hecha para municipio

$codigo3 = $row["id_periodo"] ;
$name = $row["nombre"] ; //Asignamos el id del campo que quieras mostrar
echo "<option value=".$codigo3.">".$name."</option>"; 
//Llenamos el option con su value que sera lo que se lleve al archivo registrar.php y que sera el id de tu campo y luego concatenamos el nombre que se mostrara en el combo 
} //Cerramos el ciclo 
?>
</select>


</div>  

</br>

<div><font color="" size="4">Selecciona el Grado:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <select  class="form-control" name="grado" id="grado"  required> 
 <option value="">Grado</option>
<!--Creamos el select con el atributo name "combo" que identificara el archivo registrar.php-->
<?PHP
while($row = pg_fetch_array($result3)) { 
//Iniciamos un ciclo para recorrer la variable $result  que tiene la consulta hecha para municipio

$codigo = $row["id_grado"] ; //Asignamos el id del campo que quieras mostrar
echo "<option value=".$codigo.">".$codigo."</option>"; 
//Llenamos el option con su value que sera lo que se lleve al archivo registrar.php y que sera el id de tu campo y luego concatenamos el nombre que se mostrara en el combo 
} //Cerramos el ciclo 
?>
</select>
  



</div> 
  </br>

 
</br>


<br>

<button class="btn btn-primary" type="submit">Consultar</button>

</form>



                    </div>
                    <!-- /.section title start-->


                </div>
            </div>

        </div>

        <br><br><br>
       
    </div>

 <?php

   //pg_free_result($result); 
   pg_free_result($result2); 
   pg_free_result($result3); 
   pg_free_result($result4); 
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