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

     //$grado = $_POST["grado"];
  
     $sql1="select* from materia";
     $result = pg_query($conn,$sql1);



    //$sql3="select* from year";
    //$result3 = pg_query($conn,$sql3);


   $sql2="select* from grado";
   $result2 = pg_query($conn,$sql2);

     
  
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

<link rel="stylesheet" href="css/tabla.css">


    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Registro Materias</h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5>

 <form  METHOD=POST action="editar_carga2.php" >

 <h4>Seleccionar el grado</h4>  

 <select  class="form-control" name="grado" id="grado" required > 
 <option value="">Grado</option>
<!--Creamos el select con el atributo name "combo" que identificara el archivo registrar.php-->
<?PHP
while($row2 = pg_fetch_array($result2)) { 
//Iniciamos un ciclo para recorrer la variable $result  que tiene la consulta hecha para municipio

$idg = $row2["id_grado"];
$nombreg = $row2["nombre_grado"];
//$apellido = $row["apellido"] ;  //Asignamos el id del campo que quieras mostrar
echo "<option value=".$idg.">".$nombreg." </option>"; 
//Llenamos el option con su value que sera lo que se lleve al archivo registrar.php y que sera el id de tu campo y luego concatenamos el nombre que se mostrara en el combo 
} //Cerramos el ciclo 
?>
</select>
<br>


 <input type="button"  onclick="marcar(this.form)" value="Marcar Todos" /> &nbsp;&nbsp;<input type="button"  onclick="desmarcar(this.form)" value="Desmarcar" /> </br></br>


      <table class="margenpeque"> 


<?PHP          
                    
                    echo " <thead> <tr>";
                    echo "<TH> <center> Marcar </center> </TH> ";
                    echo "<TH> <center> Materia  </center> </TH> ";
                    //echo "<TH> <center> Grado </center> </TH> ";
                    echo "</tr> </thead>";

               
                  //  echo " <input type='hidden' name= 'grado' value='$grado' size='17' required />";
                          

          while ($row1=pg_fetch_array($result)) //este while es para crear las columnas de la tabla aqui estan las notas
              { 
                      $col1=$row1["0"];  //nombre materia
                      $col2=$row1["1"];  //id

                      
                    echo " <tr>
                    <td> <center><input type='checkbox' name= 'cod[".$col2."]' value='".$col2."'/> </center></td>
                    <td> $col1  </td>
                    

                    </tr>

                    ";                         
                      

              }   

                       
                                       
              
    pg_free_result($result); 
    pg_close($conn); 
  
?> 



</table>

<p><font color="white" size="" >.</font></p>


      <div class="form-group">
      <div class="col-sm-6">
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >
        Registrar
        </button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <br><br><br><br><br><br>
        <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
      </div>
      <div class="modal-body">
       Vas a registrar la información, asegúrate de que todo este correcto, si estás seguro(a) dale clic en confirmar.
      </div>
      <div class="modal-footer">
       <button   type="button" class="btn btn-primary" data-dismiss="modal">Atras</button>
        <button type="submit" class="btn btn-primary">confirmar</button>
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

<script src="bootstrap-modal.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script>    
  new WOW().init();    
</script>
</html>