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
     //$year=$row2["0"];
     $year='2017';
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
    <script type="text/javascript">
      //Función para que cuando se seleccione el checkbox "otra" se habilite o deshabilite el cuadro de texto asociado.
      //Esta función es para el primer grupo de observaciones de cada estudiante, es decir, para el grupo de obsevaciones académicas.
    function recibeCheck(elemento) {

            if(elemento.checked) {
                document.getElementById(elemento.id +elemento.id).style='display:block';

            }
            else{
                document.getElementById(elemento.id + elemento.id).style='display:none';

            } 
        };
    
</script>
<script type="text/javascript">
      //Función para que cuando se seleccione el checkbox "otra" se habilite o deshabilite el cuadro de texto asociado.
      //Esta función es para el segundo grupo de observaciones de cada estudiante, es decir, para el grupo de obsevaciones de convivencia.
    function recibeCheck2(elemento) {

            if(elemento.checked) {
                document.getElementById(elemento.id + elemento.id).style='display:block';

            }
            else{
                document.getElementById(elemento.id+elemento.id).style='display:none';

            } 
        };
    
</script>
    <script>

   //Función para validar los campos de fallas y retardos de cada estudiante, estos campos unicamente pueden contener numeros enteros positivos.
    function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>


<script>
  // Esta función valida los checkbox y los campos de textos de cada estudiante.
  // Cada estudiante debe tener al menos una opción chequeada en cada uno de los grupos de observaciones. 
  // Si el checkbox de la opción "otra" esta chequeado se debe verificar que el cuadro de texto asociado no este vacio.
function validate(e) {    

    //valida las observaciones academicas, que cada estudiante tenga checkeada al menos una opción.
    var al_menos_uno = false;   //Variable para verificar si al menos un checkbox a sido seleccionada para cada estudiante.
    var contador = 1;  //Este contador lo utilizo para ir posicionandome en los diferentes checkbox de cada estudiante.
    var x = document.getElementsByName(contador + "[]").length; 
    var contador2 = 0; //Contador para saber si para al menos un estudiante falta por selecionar al menos un checkbox
  

    while(x != 0){   
  
      for (var i = 0; i < document.getElementsByName(contador + "[]").length; i++) {
        if (document.getElementsByName(contador + "[]")[i].checked) {
          al_menos_uno = true;
      }
    
    }

    if (!al_menos_uno){
     contador2= contador2 + 1;
    }
    contador = contador + 1;
    x = document.getElementsByName(contador + "[]").length;
    al_menos_uno = false;
    

  }

  if(contador2 != 0){
     alert ('Verifica que cada una de las observaciones academicas tenga chequeada al menos una opcion');
      if (e.preventDefault) {
        e.preventDefault();
      } else {
      e.returnValue = false;
      }
  }
  //Valida las observaciones de convivencia, que al menos cada estudiante tenga checkeada una opcion.
  contador = 1;
  contador2 = 0;
  var y = document.getElementsByName(contador + "B[]").length;
  while(y != 0){
  
      for (var i = 0; i < document.getElementsByName(contador + "B[]").length; i++) {
        if (document.getElementsByName(contador + "B[]")[i].checked) {
          al_menos_uno = true;
      }
    
    }

    if (!al_menos_uno){
     contador2= contador2 + 1;
    }
    contador = contador + 1;
    y = document.getElementsByName(contador + "B[]").length;
    al_menos_uno = false;
    

  }

  if(contador2 != 0){
     alert ('Verifica que cada una de las observaciones de convivencia tenga chequeada al menos una opcion');
      if (e.preventDefault) {
        e.preventDefault();
      } else {
      e.returnValue = false;
      }
  }


//Aqui se validda que los campos de texot de la primera columna de observaciones de cada estudiante no esten vacios. 
  contador = 1;
  contador2 = 0;
  var z = document.getElementsByName('' + contador + contador).length;
  while(z != 0){
    if((document.getElementById(contador).checked) && (document.getElementById('' + contador + contador).value == '')){
      contador2 = contador2 + 1;
    }

    contador = contador + 1;
    z = document.getElementsByName('' + contador + contador).length;

  }

  if(contador2 != 0){
     alert ('Verifica que los cuadros de texto de las observaciones académicas no esten vacios');
      if (e.preventDefault) {
        e.preventDefault();
      } else {
      e.returnValue = false;
      }
  }

//Aqui se valida que los campos de textos del segundo grupo de observaciones no esten vacios.
  contador = 1;
  contador2 = 0;
  var w = document.getElementsByName(contador + 'B' +  contador + 'B').length;
  while(w != 0){
    if((document.getElementById(contador+ 'B').checked) && (document.getElementById(contador + 'B' +  contador + 'B').value == '')){
      contador2 = contador2 + 1;
    }

    contador = contador + 1;
    w = document.getElementsByName(contador + 'B' +  contador + 'B').length;

  }

  if(contador2 != 0){
     alert ('Verifica que los cuadros de texto de las observaciones de convivencia no esten vacios');
      if (e.preventDefault) {
        e.preventDefault();
      } else {
      e.returnValue = false;
      }
  }

  
  }//cierra función
 
</script>


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
                                 
                                <li><a href="profe1.php">Inicio</a></li>
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
  
$sql4="select id_estudiante, nombre, apellido from estudiante where id_year='$year' and id_grado='$grado' order by apellido"; 

$result4=pg_query($conn,$sql4);

 
?>


    <div  style=" background:#F2F2F2 url('img/bg3.png') " >


        <div class="container">


            <div class="row">

                <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                      <div class="section-title mb60 text-center">
                        <!-- section title start-->
                        <h2 class="titulo wow fadeInDown" data-wow-delay="0.1s" >Asistencia y convivencia</h2>
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



 
        echo " 
      <form action='dbasistenciaprofe.php' method='post' id='form' name='form' onsubmit='validate(event);'>
      <input type='hidden' name='periodo' value='$periodo'>
      <input type='hidden' name='grado' value='$grado'>
      <input type='hidden' name='year' value='$year'>
      <table  class ='margencentrada'> 
      <thead> 
      <TR>
      <TH><center> Estudiante </center></TH>
      <TH><center> Observaciones académicas</center></TH>
      <TH><center> Observaciones convivencia </center></TH>
      <TH><center> Observaciones comportamiento </center></TH>
      <TH><center> Nota de comportamiento</center></TH>
      <TH><center> Fallas </center></TH>
      <TH><center> Retardos </center></TH>
      </TR> 
      </thead>   ";

      $cont = 0;   //Variable con un valor unico para cada estudiante.
      $B = "B"; //Para validar el segundo grupo de observaciones de cada estudiante.
      $cor = "[]";   //Se le agrega los corchetes a la variable del nombre de los checkbox para que lo tome como un array que va a contener el valor de cada uno de los checkbox seleccionados. Despues con php se extraen del array cada uno de los valores de los checkbox y se agrega a la base  de datos.

             while ($row1=pg_fetch_array($result4)) 
              { 
                      $codigo1=$row1["0"];
                      $nombre1=$row1["1"];
                      $apelli = $row1["2"];
                      $cont = $cont + 1;


                       echo "<tr>

                          <td> ".$apelli." ".$nombre1."</td>
                          
                          <td>
                                <div id='Layer1' style='position:relative; z-index:1; border: 1px none #000000; height: 100px;'>
                                <div style='width:260px; height:100px; overflow:scroll; position:relative;'>

                                <input type='checkbox' name=$cont$cor value = 'Ha presentado algunas dificultades académicas, con un poco más de esfuerzo podría mejorar su desempeño.'/>Ha presentado algunas dificultades académicas, con un poco más de esfuerzo podría mejorar su desempeño. <br>

                            
                                <input type='checkbox' name=$cont$cor value = 'No presentó trabajo de mejora en las áreas con desempeño bajo. Se requiere mayor compromiso del estudiante y de sus acudientes.' />No presentó trabajo de mejora en las áreas con desempeño bajo. Se requiere mayor compromiso del estudiante y de sus acudientes.<br>

                                
                                <input type='checkbox' name=$cont$cor value = 'Se requiere mayor trabajo en clase para apoyar el proceso académico.' />Se requiere mayor trabajo en clase para apoyar el proceso académico.<br>

                                
                                <input type='checkbox' name=$cont$cor value = 'Se sugiere que realice ejercicios de lectoescritura para mejorar la comprensión de textos y la redacción de ideas sobre los mismos.' />Se sugiere que realice ejercicios de lectoescritura para mejorar la comprensión de textos y la redacción de ideas sobre los mismos.<br>

                                
                               <input type='checkbox' name=$cont$cor value = 'Ha faltado con tareas. Su cumplimiento es necesario para obtener mejores resultados académicos.' />Ha faltado con tareas. Su cumplimiento es necesario para obtener mejores resultados académicos.<br>

                                
                                <input type='checkbox' name=$cont$cor value = 'Se le recomienda entregar los trabajos y tareas con orden y pulcritud.' />Se le recomienda entregar los trabajos y tareas con orden y pulcritud.<br>

                                
                                <input type='checkbox' name=$cont$cor value = 'Debe realizar ejercicios de caligrafía para mejorar la letra.' />Debe realizar ejercicios de caligrafía para mejorar la letra.<br>

                                
                                <input type='checkbox' name=$cont$cor value = 'Se recomienda repasar en vacaciones los temas vistos en las áreas en que presentó desempeño básico.' />Se recomienda repasar en vacaciones los temas vistos en las áreas en que presentó desempeño básico.<br>

                                
                                <input type='checkbox' name=$cont$cor value = 'Felicitaciones por su rendimiento académico.  Aprobó todas las áreas sin presentar planes de mejora necesarios.' />Felicitaciones por su rendimiento académico.  Aprobó todas las áreas sin presentar planes de mejora necesarios.<br>

                                
                                <input type='checkbox' name=$cont$cor value = 'Felicitaciones por aprobar todas las áreas, aunque se requirió la presentación de planes de mejora para aprobar algunas. Con un poco más de esfuerzo en el siguiente periodo obtendrá mejores resultados académicos.' />Felicitaciones por aprobar todas las áreas, aunque se requirió la presentación de planes de mejora para aprobar algunas. Con un poco más de esfuerzo en el siguiente periodo obtendrá mejores resultados académicos.<br>

                                
                                <input type='checkbox' name=$cont$cor value = 'Para llevar un mejor proceso académico, se le recomienda que debe traer a clase los libros y útiles requeridos.' />Para llevar un mejor proceso académico, se le recomienda que debe traer a clase los libros y útiles requeridos.<br>

                              
                                <input type='checkbox' name=$cont$cor value = 'No asistió a presentar las evaluaciones de mejora.' />No asistió a presentar las evaluaciones de mejora.<br>
                                </div>
                                </div>

                              <input type='checkbox' value = '' name=$cont$cor id =$cont onclick = 'recibeCheck(this);'/>Otra <br>
                                <textarea style='display:none;' id =$cont$cont name = $cont$cont rows='2' cols='30'></textarea>

                              </td>


                          <td>
                                <div id='Layer1' style='position:relative; z-index:1; border: 1px none #000000; height: 100px;'>
                                <div style='width:260px; height:100px; overflow:scroll; position:relative;'> 

                                <input type='checkbox' name=$cont$B$cor value = ' Habla constantemente en clase, hay que esforzarse un poco más en mantener el silencio y la atención durante las clases.' />Habla constantemente en clase, hay que esforzarse un poco más en mantener el silencio y la atención durante las clases.<br>

                                <input type='checkbox' name=$cont$B$cor value = ' Ha presentado algunas dificultades de comportamiento en clase.  Siguiendo las instrucciones de los docentes y manteniendo una actitud de estudio en el aula, mejorará su desempeño académico y de convivencia.' />Ha presentado algunas dificultades de comportamiento en clase.  Siguiendo las instrucciones de los docentes y manteniendo una actitud de estudio en el aula, mejorará su desempeño académico y de convivencia.<br>

                                <input type='checkbox' name=$cont$B$cor value = ' No descuidar el correcto comportamiento en los momentos de descanso, compartiendo con los compañeros el tiempo libre de una armónica manera.' /> No descuidar el correcto comportamiento en los momentos de descanso, compartiendo con los compañeros el tiempo libre de una armónica manera.<br>

                                <input type='checkbox' name=$cont$B$cor value = ' Debe portar correctamente el uniforme del colegio.' />Debe portar correctamente el uniforme del colegio.<br>

                                <input type='checkbox' name=$cont$B$cor value = ' Debe traer la agenda escolar todos los días.' />Debe traer la agenda escolar todos los días.<br>

                                <input type='checkbox' name=$cont$B$cor value = ' Debe mejorar su vocabulario, evitando usar términos o palabras inaceptables en el trato social.' /> Debe mejorar su vocabulario, evitando usar términos o palabras inaceptables en el trato social.<br>

                                <input type='checkbox' name=$cont$B$cor value = 'Llega constantemente tarde al colegio. Hay que procurar organizar mejor el tiempo en casa.' />Llega constantemente tarde al colegio. Hay que procurar organizar mejor el tiempo en casa.<br>

                                <input type='checkbox' name=$cont$B$cor value = ' Ha faltado en varias oportunidades a clase. Es necesario asistir diariamente al colegio para que las ausencias no dificulten el proceso académico.' /> Ha faltado en varias oportunidades a clase. Es necesario asistir diariamente al colegio para que las ausencias no dificulten el proceso académico.<br>

                                <input type='checkbox' name=$cont$B$cor value = 'Felicitaciones por su armónico y ejemplar comportamiento dentro del colegio.' /> Felicitaciones por su armónico y ejemplar comportamiento dentro del colegio. <br>

                                <input type='checkbox' name=$cont$B$cor value = ' Debe mejorar el comportamiento a la salida, manteniéndose en el lugar asignado por los docentes.' /> Debe mejorar el comportamiento a la salida, manteniéndose en el lugar asignado por los docentes.<br>

                                <input type='checkbox' name=$cont$B$cor value = ' Es importante que el acudiente asista a las reuniones programadas.' /> Es importante que el acudiente asista a las reuniones programadas.<br>

                                <input type='checkbox' name=$cont$B$cor value = ' Debe mejorar el trato hacia sus compañeros.' /> Debe mejorar el trato hacia sus compañeros.<br>
                                </div>
                                </div>

                                <input type='checkbox' value = '' name=$cont$B$cor id =$cont$B onclick = 'recibeCheck2(this);'/>Otra <br>
                                <textarea style='display:none;' id =$cont$B$cont$B name =$cont$B$cont$B rows='2' cols='30'></textarea>


                                </td>

                          <td><center><select style='width:250px' name='observacioncomportamiento$cont' required>
                                <option value=''>Seleccione una opción</option>

                                <option value='Se ha destacado por su correcto comportamiento social permitiendo tener una sana y armónica convivencia con la comunidad educativa'>Se ha destacado por su correcto comportamiento social permitiendo tener una sana y armónica convivencia con la comunidad educativa</option>

                                <option value='La mayoría de las veces logra tener una sana y armónica convivencia. Hay que interiorizar y apropiar un poco más las normas de convivencia para así alcanzar todas las metas propuestas.'>La mayoría de las veces logra tener una sana y armónica convivencia. Hay que interiorizar y apropiar un poco más las normas de convivencia para así alcanzar todas las metas propuestas.</option>

                                <option value='Ha presentado algunas dificultades que impiden lograr una armónica convivencia y desarrollar las actividades propuestas. Se requiere que el estudiante y su familia asuman compromisos y así superar las dificultades presentadas. '>Ha presentado algunas dificultades que impiden lograr una armónica convivencia y desarrollar las actividades propuestas. Se requiere que el estudiante y su familia asuman compromisos y así superar las dificultades presentadas.</option>

                                <option value='Ha presentado dificultades inaceptables en el cumplimiento de las normas de convivencia. Se requiere mayor compromiso del estudiante y su familia en el cumplimiento de las normas.'>Ha presentado dificultades inaceptables en el cumplimiento de las normas de convivencia. Se requiere mayor compromiso del estudiante y su familia en el cumplimiento de las normas. </option>
                              </select></center></td>

                          <td><center><select name='notacomportamiento$cont' required>
                                <option value=''>Seleccione una nota</option>
                                <option value='S'>S</option>
                                <option value='A'>A</option>
                                <option value='BS'>BS</option>
                                <option value='B'>B</option>
                              </select></center>
                          </td>


                          
                          <td><center><input type='text' size='5' name='fallas$cont' onkeypress='return valida(event)' style='text-align:right;'required></center></td>
                          
                          <td><center><input type='text' size='5' name='retardos$cont' onkeypress='return valida(event)' style='text-align:right;' required></center></td>
                          </tr>";                        
                      

              } 
 echo "
  </table>

   <br>
   <div align='center'>
    <input type='reset' class='btn btn-primary' value='Borrar' />
    <input type='submit' class='btn btn-primary' value='Guardar' />

  </div>
  </form>
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
             <h3 class='subtitulo wow fadeIn' data-wow-delay='0.1s'>Todavía no hay estudiantes registados en el grado, puedes revisar más tarde.</h3>
          
              </hgroup>
              <br>
              <a href='asistenciaprofe.php' class='btn btn-primary'>Atras</a>
              </div>
              </div>
              </div>
              </div>
              </div>";


}

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