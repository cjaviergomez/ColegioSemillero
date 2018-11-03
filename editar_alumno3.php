<?PHP

//Inicio la sesión
session_start();

if ($_SESSION["nombre"]==""){

 header("Location: index4.html");

  //echo "no inicio sesion";
            

}else{
          
  //no hago nada solo continuo en la pagina

}

   // error_reporting(E_ALL);
    //ini_set('display_errors', '1');

    include("conec.php"); 
    $conn=conectarse(); 

    $nombre = $_POST["nombre"];
    $nombre2 = $_POST["nombre2"];
    $apellido = $_POST["apellido"];
    $apellido2 = $_POST["apellido2"];
    $born =  $_POST["born"];
    $place = $_POST["place"];
    $edad = $_POST["edad"];
    $genero = $_POST["genero"];
    $sangre = $_POST["sangre"];
    $tipo = $_POST["tipoid"];
    $id = $_POST["id"];
    $departamento = $_POST["departamento"];
    $municipio = $_POST["municipio"];    
    $dire = $_POST["direccion"]; 
    $barrio = $_POST["barrio"]; 
    $estrato = $_POST["estrato"]; 
    $tel = $_POST["telefono"]; 
    $cel = $_POST["celular"]; 
    $correo = $_POST["correo"]; 
    $foto = $_POST["foto"]; 
    $clave = $_POST["clave"]; 


    if ($_POST["padre"] == ""){
    
      $padre = 'nulo';

    }else{

      $padre = $_POST["padre"];

    }


    if ($_POST["madre"] == ""){
    
      $madre = 'nulo';
      
    }else{

      $madre = $_POST["madre"]; 

    }


  
    $acudiente = $_POST["acudiente"]; 
    $sisben = $_POST["sisben"];
    $puntaje = $_POST["puntaje"];
    $grado =  $_POST["grado"];
    $year = $_POST["year"];
    $alergias = $_POST["alergias"];
    $situacion = $_POST["situacion"];
    $born = $_POST["born"];





 $sql = "update estudiante set id_estudiante = '$id', nombre = '$nombre', apellido = '$apellido', telefono1 = '$tel', celular1 = '$cel', direccion = '$dire',  id_acudiente = '$acudiente', id_grado = '$grado', correo = '$correo', apellido2 = '$apellido2', id_imagen = '$foto', id_year = '$year', clave = '$clave', id_usuario= '1', id_padre = '$padre', id_madre = '$madre', alergias = '$alergias', sisben = '$sisben', situacion = '$situacion', nombre2 = '$nombre2', genero = '$genero', sangre = '$sangre', place = '$place', edad = '$edad', tipo = '$tipo', departamento = '$departamento', municipio = '$municipio', barrio = '$barrio', estrato = '$estrato', puntaje= '$puntaje', born = '$born' where id_estudiante= '$id'";

  $result1 = pg_query($conn,$sql);


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
                                 
                                <li><a href="admin1.php" title="Home">Inicio</a></li>
                               <li class="has-sub"> <a href="" title="">Alumno</a>

                                         <ul >
         
                                 <li><a href="matricula1_admin.php">Registrar Alumno</a></li>
                                 <li><a href="familia1_admin.php">Registrar Padre</a></li>
                                 <li><a href="madre1_admin.php">Registrar Madre</a></li>
                                 <li><a href="acudiente1_admin.php">Registra Acudiente</a></li>
                                 <li><a href="editar_alumno1.php">Actualiza Alumno</a></li>
                                 <li><a href="editar_padre1.php">Actualiza Padre</a></li>
                                 <li><a href="editar_Madre1.php">Actualiza Madre</a></li>
                                 <li><a href="editar_acu1.php">Actualizar Acudiente</a></li>

          
     
                                    </ul>



                               </li>


                            

                              <li class="has-sub"> <a href="" title="">Académico</a>

                                         <ul >
         
                                 <li><a href="registro_materia.php"  title="" >Materias</a></li>
                                 <li><a href="registro_materia_grado.php">Materia-Grado</a></li>
                                 <li><a href="registro_profesor_materia.php">Materia-Profesor</a></li>
                                 <li><a href="registrardirector.php">Grado-Director</a></li>
                                
          
     
                                    </ul>



                               </li>


                            <li class="has-sub"> <a href="" title="">Registro Académico</a>

                                         <ul >
         
                                 <li><a href="consulta_notas_admin1.php">Notas periodo</a></li>
                                 <li><a href="consulta_finales_admin1.php">Notas finales</a></li>
                                 <li><a href="actualiza_periodo1.php">Modificar notas </a></li>
                                 <li><a href="historico1.php">Historico de notas</a></li>
                                 <li><a href="asistencia.php">Asistencia y convivencia</a></li>
          
     
                                    </ul>



                               </li>


                        



                             <li class="has-sub"> <a href="" title="">Empleado</a>

                                         <ul >
         
                                 <li><a href="ingresaprofe1_admin.php">Ingresar</a></li>
                                 <li><a href="editar_profe1.php">Actualizar</a></li>
          
     
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



    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Actualizar información del estudiante</h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5><br>

                <?php 


                    if($result1==true){


                        echo "
                      <hgroup class='titulos-wrap'>
                      <h4 class='titulo wow fadeIn' data-wow-delay='0.2s'>Estudiante actualizado exitosamente</h4> 
                      <h4 class='subtitulo wow fadeIn' data-wow-delay='0.2s'>la información del Estudiante ya a sido actualizado.</h4>  
                  
                      </hgroup>

                ";  


                   }else{


                              echo "

                      <hgroup class='titulos-wrap'>
                      <h4 class='titulo wow fadeIn' data-wow-delay='0.2s'>No se pudo actualizadar la información</h4>   
                      <h4 class='subtitulo wow fadeIn' data-wow-delay='0.2s'>intentalo nuevamente o comunicate con el ingeniero</h4>   
                      </hgroup> ";


                   }


                     pg_free_result($result1); 
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

<?php

if($result1==true){

echo "<script>
  
history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});

</script>
       

";


}else{

//no haga nada

}



?>

<script src="bootstrap-modal.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script>    
  new WOW().init();    
</script>
</html>