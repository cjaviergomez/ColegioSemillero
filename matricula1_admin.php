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

<?PHP
// llamar la funciones 

     include("conec.php"); 
     $conn=conectarse(); 
   
  
  
    $sql1="select* from materia";
    $sql2="select* from year";
    $sql3="select* from grado";
    $result = pg_query($conn,$sql1);
    $result2 = pg_query($conn,$sql2);
    $result3 = pg_query($conn,$sql3);
 
?>

    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Registrar Alumno</h2>
                        <h4 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Colegio Semillero Dos Mil</h4>
                        <h5 class="small-title">Estudio Amor y Paz.</h5> <br>

 <form role="form" class="form-horizontal" action="matricula2_admin.php" method="post" >
                         
    <div class="form-group">

      <div class="col-sm-3"><label>Primer Apellido</label><input type="text" id="apellido" name="apellido" class="form-control" placeholder="" required/></div>
      <div class="col-sm-3"><label>Segundo Apellido</label><input type="text" id="apellido2" name="apellido2" class="form-control" placeholder="" required/></div>
      <div class="col-sm-3"><label>Primer Nombre</label><input type="text" id="nombre" name="nombre" class="form-control" placeholder="" required/></div>
        <div class="col-sm-3"><label>Segundo Nombre</label><input type="text" id="nombre2" name="nombre2" class="form-control" placeholder="" required/></div>

    </div>

    <div class="form-group">

    <div class="col-sm-3"><label>Fecha Nacimineto</label><input type="date" name="born" class="form-control" placeholder="" required/></div>
      <div class="col-sm-3"><label>Lugar de Nacimineto</label><input type="text" name="place" class="form-control" placeholder="" required="obliglatorio"></div>

      <div class="col-sm-2"><label>Edad</label><input type="number" name="edad" class="form-control" placeholder="" required/></div>
       <div class="col-sm-1"><label>Genero</label>

        <select class="form-control" name="genero" id="genero" required/> 

      <option value=""></option>
      <option value="masculino">M</option>
      <option value="femenino">F</option>

     </select> 

       </div>
        <div class="col-sm-3"><label>Grupo Sanguineo</label>

  <select class="form-control" name="sangre" id="sangre" required/> 

      <option value="">Grupo Sanguineo</option>
      <option value="A">A+</option>
      <option value="AN">A-</option>
      <option value="B">B+</option>
      <option value="BN">B-</option>
      <option value="AB">AB+</option>
      <option value="AB-">AB-</option>
      <option value="O">O+</option>
       <option value="ON">O-</option>

     </select> 



        </div>
    </div>



    <div class="form-group">
      <div class="col-sm-3"><label>Tipo de identificacion</label>

      <select class="form-control" name="tipoid" id="tipoid" required/> 

      <option value="">Tipo</option>
      <option value="TI">Tarjreta de indentidad</option>
      <option value="CC">Cedula de ciudadania</option>
      <option value="Registro Civil">Registro civil</option>
      <option value="pasaporte">Pasaporte extranjero</option>

     </select> 

      </div>
      <div class="col-sm-3"><label>Numero</label><input type="number" name="id" class="form-control" placeholder="" required/></div>
      <div class="col-sm-3"><label>Departamento</label><input type="text" name="departamento" class="form-control" placeholder="" required/></div>
      <div class="col-sm-3"><label>Municipio</label><input type="text" name="municipio" class="form-control" placeholder="" required/></div>
      
    </div>





    <div class="form-group">
      <div class="col-sm-4"><label>Dirección Residencia</label><input type="text" name="direccion" class="form-control" placeholder="" required/></div>
      <div class="col-sm-4"><label>Barrio</label><input type="text" name="barrio" class="form-control" placeholder="" required/></div>
      <div class="col-sm-4"><label>Estrato</label>

     <select class="form-control" name="estrato" id="estrato" required/> 

      <option value="">Estrato</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>

     </select> 




      </div>
    </div>

     <div class="form-group">
      <div class="col-sm-4"><label>Telefono Residencia</label><input type="text" name="telefono" class="form-control" placeholder="" required/></div>
      <div class="col-sm-4"><label>Telefono Celular</label><input type="text" name="celular" class="form-control" placeholder="" required/></div>
      <div class="col-sm-4"><label>Email</label><input type="text" name="correo" class="form-control" placeholder="" /></div>
    </div>



     <div class="form-group">
      <div class="col-sm-4"><label>Identificación del Padre</label><input type="text" name="padre" class="form-control" placeholder="" /></div>
      <div class="col-sm-4"><label>Identificación de la Madre</label><input type="text" name="madre" class="form-control" placeholder=""/></div>
      <div class="col-sm-4"><label>Identificación del Acudiente</label><input type="text" name="acudiente" class="form-control" placeholder="" required/></div>
    </div>

    <div class="form-group">
      <div class="col-sm-2"><label>SISBEN</label> <br> 

       <label class="radio-inline"><input type="radio" name="sisben" value="si">Si</label>
       <label class="radio-inline"><input type="radio" name="sisben" value="no">No</label>

      </div>
      <div class="col-sm-4"><label>Puntaje</label><input type="text" name="puntaje" class="form-control" placeholder="" /></div>
      <div class="col-sm-4"><label>Grado</label>

                        <select  class="form-control" name="grado" id="grado" required/> 
                        <option value="">Grado</option>
                        <!--Creamos el select con el atributo name "combo" que identificara el archivo registrar.php-->
                       <?PHP
                         while($row = pg_fetch_array($result3)) { 
                         //Iniciamos un ciclo para recorrer la variable $result  que tiene la consulta hecha para municipio

                         $id = $row["id_grado"]; 
                         $nombre = $row["nombre_grado"]; 

                         //Asignamos el id del campo que quieras mostrar
                         echo "<option value=".$id.">".$nombre."</option>"; 
                         //Llenamos el option con su value que sera lo que se lleve al archivo registrar.php y que sera el id de tu campo y luego concatenamos el nombre que se mostrara en el combo 
                         } //Cerramos el ciclo 
                          ?>
                        </select> 




      </div>

           <div class="col-sm-2"><label>Año</label>

                        <select  class="form-control" name="year" id="year" required/> 
                        <option value="">Año</option>
                        <!--Creamos el select con el atributo name "combo" que identificara el archivo registrar.php-->
                       <?PHP
                         while($row = pg_fetch_array($result2)) { 
                         //Iniciamos un ciclo para recorrer la variable $result  que tiene la consulta hecha para municipio

                         $id = $row["id_year"]; 
                         //$nombre = $row["nombre_grado"]; 

                         //Asignamos el id del campo que quieras mostrar
                         echo "<option value=".$id.">".$id."</option>"; 
                         //Llenamos el option con su value que sera lo que se lleve al archivo registrar.php y que sera el id de tu campo y luego concatenamos el nombre que se mostrara en el combo 
                         } //Cerramos el ciclo 
                          ?>
                        </select> 




      </div>




    </div>



    <div class="form-group">
      <label class="col-sm-12" for="TextArea">Enfermedades y/o alergias</label>
      <div class="col-sm-12"><textarea class="form-control"  id="TextArea" name="alergias"></textarea></div>
    </div>

      <div class="form-group">
      <div class="col-sm-12"><label>Situación Academica</label> <br> 

       <label class="radio-inline"><input type="radio" name="situacion" value="situacion de desplazamiento">Situación de desplazamiento</label>
       <label class="radio-inline"><input type="radio" name="situacion" value="Victima del conflicto">Victima del conflicto</label>
       <label class="radio-inline"><input type="radio" name="situacion" value="Hijo de adultos desmovilizados">Hijo de desmovilizados</label>
       <label class="radio-inline"><input type="radio" name="situacion" value="otros">Ninguna de las anteriores</label>

      </div>
    </div>



        <div class="form-group">
      <div class="col-sm-1">
        <!-- Button trigger modal -->
<button type="button" class="btn  btn-primary" data-toggle="modal" data-target="#myModal" >
  Realizar matricula
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
        Estas a punto de matricular al estudiante, revisa que todos los datos sean correctos, si estás seguro(a) dale clic en 
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

<script src="bootstrap-modal.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script>    
  new WOW().init();    
</script>
</html>