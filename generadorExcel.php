<?PHP
    
include("conec.php"); 
$conn=conectarse();
$periodo=$_GET['periodo'];
$año=$_GET['año'];
$grado=$_GET['grado'];

//Agregamos la libreria para leer
require_once 'Classes/PHPExcel/IOFactory.php';
$zipname = 'Boletines Grado '.$grado.' Periodo ' .$periodo.'.zip';
$zip = new ZipArchive();
$zip->open($zipname,ZipArchive::CREATE);
$dir = 'Boletines';
$zip->addEmptyDir($dir);
                   
$consult="select id_estudiante, (select nombre from estudiante where estudiante.id_estudiante=notasperiodo.id_estudiante ) as nombre, (select apellido from estudiante where estudiante.id_estudiante=notasperiodo.id_estudiante ), valor from notasperiodo where id_periodo='$periodo' and id_year='$año' and id_grado='$grado' order by apellido";  
$result=pg_query($conn,$consult);
$cant = pg_num_rows($result); //Cantidad de estudiantes a generarles el boletin.
$suma = 0;
$suma2 = 0;
$sumapromedios = 0;
$puesto = array();

while($row1=pg_fetch_array($result)) //Para cada estudiante se genera un boletin. 
              { 
                      $codigo1=$row1["0"];
                      $nombre1=$row1["1"];
                      $apelli = $row1["2"];

                      $varperiodo = $periodo;

                      // Creamos un objeto PHPExcel
                      $objPHPExcel = new PHPExcel();
                      $objReader = PHPExcel_IOFactory::createReader('Excel2007');
                      $objPHPExcel = $objReader->load('BOLETIN.xlsx');

                      // Indicamos que se pare en la hoja uno del libro
                      $objPHPExcel->setActiveSheetIndex(0);

                      $num_rows = 11; //Para las materias: Aqui es donde empiezan a colocarse los nombres de las materias en el boletin.
                      $notascelda = 11;
                      $notascelda1 = 11;
                      $notascelda2 = 11;
                      $notascelda3 = 11;
                      $sql1="select id_materia from gradomateria where id_grado='$grado'";
                      $result6 = pg_query($conn,$sql1);
                      $cantidadM = pg_num_rows($result6);
                      $celdapuesto = $cantidadM + 19; //Esto es para agregar al Excel en la celda correspondiente(39) la cantidad de estudiantes en el curso.
                      while($row = pg_fetch_array($result6)){

                        $materia2 = $row["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $consultnombres = "select nombre_mate from materia where id_materia='$materia2'";//Consulta para agregar los nombres de materias al boletin
                        $resultname = pg_query($conn,$consultnombres);

                        while($row3 = pg_fetch_array($resultname)){

                            $matnombre = $row3["nombre_mate"];   //Arreglo con unicamente los nombres de las materias que tiene el grado. 
                            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$num_rows, strtoupper($matnombre));
                            $objPHPExcel->getActiveSheet()->insertNewRowBefore($num_rows + 1, 1);
                            $num_rows = $num_rows + 1;
                
                        }
                        
                     
                     }
                     $objPHPExcel->getActiveSheet()->removeRow($num_rows); //Eliminar la fila que se crea de más.
                     $objPHPExcel->getActiveSheet()->SetCellValue('C'.$celdapuesto, 'ALUMNOS DEL CURSO: '.$cant); //Se agrega la cantidad de estudiantes. 

                    //Colocar las notas en los espacios dependiendo del periodo.
                     if($varperiodo==4){
                     $sql8="select id_materia from gradomateria where id_grado='$grado'";
                     $resulta = pg_query($conn,$sql8);
                     while($row7 = pg_fetch_array($resulta)){
                        $materia4 = $row7["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $notaM = "select valor from notasperiodo where id_materia='$materia4' and id_periodo='$varperiodo' and id_year='$año' and id_grado='$grado' and id_estudiante ='$codigo1'";
                        $resultnota = pg_query($conn,$notaM);

                        $numeroN = pg_num_rows($resultnota);

                        if ($numeroN == 0){
                            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$notascelda, '--');//Si no existe ninguna nota entonces rellena el campo con guiones. 
                            $notascelda = $notascelda + 1;
                           }else{
                           

                             while($row8 = pg_fetch_array($resultnota)){

                                $matnota = $row8["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                $objPHPExcel->getActiveSheet()->SetCellValue('H'.$notascelda, $matnota);//Imprime las notas de cada una de las materias del estudiante. 
                                $notascelda = $notascelda + 1;
                             }
                         }
                    }
                    $varperiodo = $varperiodo - 1;
                }
                if($varperiodo==3){
                     $sql81="select id_materia from gradomateria where id_grado='$grado'";
                     $resulta1 = pg_query($conn,$sql81);
                     while($row71 = pg_fetch_array($resulta1)){
                        $materia41 = $row71["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $notaM1 = "select valor from notasperiodo where id_materia='$materia41' and id_periodo='$varperiodo' and id_year='$año' and id_grado='$grado' and id_estudiante ='$codigo1'";
                        $resultnota1 = pg_query($conn,$notaM1);

                        $numeroN1 = pg_num_rows($resultnota1);

                        if ($numeroN1 == 0){
                            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$notascelda1, '--');//Si no existe ninguna nota entonces rellena el campo con guiones. 
                            $notascelda1 = $notascelda1 + 1;
                           }else{
                           

                             while($row81 = pg_fetch_array($resultnota1)){

                                $matnota1 = $row81["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                $objPHPExcel->getActiveSheet()->SetCellValue('G'.$notascelda1, $matnota1);//Imprime las notas de cada una de las materias del estudiante. 
                                $notascelda1 = $notascelda1 + 1;
                             }
                         }
                    }
                    $varperiodo = $varperiodo - 1;
                }
                if($varperiodo==2){
                     $sql82="select id_materia from gradomateria where id_grado='$grado'";
                     $resulta2 = pg_query($conn,$sql82);
                     while($row72 = pg_fetch_array($resulta2)){
                        $materia42 = $row72["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $notaM2 = "select valor from notasperiodo where id_materia='$materia42' and id_periodo='$varperiodo' and id_year='$año' and id_grado='$grado' and id_estudiante ='$codigo1'";
                        $resultnota2 = pg_query($conn,$notaM2);

                        $numeroN2 = pg_num_rows($resultnota2);

                        if ($numeroN2 == 0){
                            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$notascelda2, '--');//Si no existe ninguna nota entonces rellena el campo con guiones. 
                            $notascelda2 = $notascelda2 + 1;
                           }else{
                           

                             while($row82 = pg_fetch_array($resultnota2)){

                                $matnota2 = $row82["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$notascelda2, $matnota2);//Imprime las notas de cada una de las materias del estudiante. 
                                $notascelda2 = $notascelda2 + 1;
                             }
                         }
                    }
                    $varperiodo = $varperiodo - 1;
                }
                if($varperiodo==1){
                     $sql83="select id_materia from gradomateria where id_grado='$grado'";
                     $resulta3 = pg_query($conn,$sql83);
                     while($row73 = pg_fetch_array($resulta3)){
                        $materia43 = $row73["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $notaM3 = "select valor from notasperiodo where id_materia='$materia43' and id_periodo='$varperiodo' and id_year='$año' and id_grado='$grado' and id_estudiante ='$codigo1'";
                        $resultnota3 = pg_query($conn,$notaM3);

                        $numeroN3 = pg_num_rows($resultnota3);

                        if ($numeroN3 == 0){
                            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$notascelda3, '--');//Si no existe ninguna nota entonces rellena el campo con guiones. 
                            $notascelda3 = $notascelda3 + 1;
                           }else{
                           

                             while($row83 = pg_fetch_array($resultnota3)){

                                $matnota3 = $row83["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                $objPHPExcel->getActiveSheet()->SetCellValue('E'.$notascelda3, $matnota3);//Imprime las notas de cada una de las materias del estudiante. 
                                $notascelda3 = $notascelda3 + 1;
                             }
                         }
                    }
                }     
                      $celdaini = 11;
                      $limite = $celdaini + $cantidadM - 1;
                      if($periodo==1){
                        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'BOLETIN PRIMER PERIODO ACADEMICO');
                        for($i=11; $i<=$limite; $i++){
                            $valornota = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $valornota);
                        }
                      }elseif($periodo==2){
                        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'BOLETIN SEGUNDO PERIODO ACADEMICO');
                        for($i=11; $i<=$limite; $i++){
                            $valornota1 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $valornota2 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                            $definitiva = ($valornota1+$valornota2)/$periodo;
                            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $definitiva);
                        }
                      }elseif($periodo==3){
                        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'BOLETIN TERCER PERIODO ACADEMICO');
                        for($i=11; $i<=$limite; $i++){
                            $valornota1 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $valornota2 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                            $valornota3 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
                            $definitiva = ($valornota1+$valornota2+$valornota3)/$periodo;
                            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $definitiva);
                        }
                      }else{
                        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'BOLETIN CUARTO PERIODO ACADEMICO');
                        for($i=11; $i<=$limite; $i++){
                            $valornota1 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $valornota2 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                            $valornota3 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
                            $valornota4 = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
                            $definitiva = ($valornota1+$valornota2+$valornota3+$valornota4)/$periodo;
                            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $definitiva);
                        }
                      }
                      
                      for($i=11; $i<=$limite; $i++){
                        $notamateria = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
                        $suma = $suma + $notamateria;
                      }
                     $promedioEst = $suma/$cantidadM;
                     array_push($puesto, $promedioEst);
                     $celdapromedio = $cantidadM + 20;
                     $objPHPExcel->getActiveSheet()->SetCellValue('F'.$celdapromedio, $promedioEst);
                     $sumapromedios = $sumapromedios + $promedioEst;
                     $suma = 0;
                  
                     //Guardamos los cambios
                     //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                     //$objWriter->save("Boletines/Grado $grado/Periodo $periodo/$apelli $nombre1.xlsx"); 
                     //$objWriter->save(str_replace(__FILE__,'C:/Users/HP 1000/Downloads/'.$nombre1.'.xlsx',__FILE__)); //Queda guardado en descargas.
                     //$zip->addFile("Boletines/Grado $grado/Periodo $periodo/$apelli $nombre1.xlsx",$dir."/$apelli $nombre1.xlsx");
                     

        }
        
$hoy = getdate();
$dia = $hoy["mday"];  
$mes = $hoy["mon"];
$año2 = $hoy["year"];
if($mes==1){
  $mes2 = "ENERO";
}elseif ($mes == 2) {
  $mes2 = "FEBRERO";
}elseif ($mes == 3) {
  $mes2 = "MARZO";
}elseif ($mes == 4) {
  $mes2 = "ABRIL";
}elseif ($mes == 5) {
  $mes2 = "MAYO";
}elseif ($mes == 6) {
  $mes2 = "JUNIO";
}elseif ($mes == 7) {
  $mes2 = "JULIO";
}elseif ($mes == 8) {
  $mes2 = "AGOSTO";
}elseif ($mes == 9) {
  $mes2 = "SEPTIEMBRE";
}elseif ($mes == 10) {
  $mes2 = "OCTUBRE";
}elseif ($mes == 11) {
  $mes2 = "NOVIEMBRE";
}elseif ($mes == 12) {
  $mes2 = "DICIEMBRE";
}



$celdafecha = $cantidadM + 28;                 
$consulta2="select id_estudiante, (select nombre from estudiante where estudiante.id_estudiante=notasperiodo.id_estudiante ) as nombre, (select apellido from estudiante where estudiante.id_estudiante=notasperiodo.id_estudiante ), valor from notasperiodo where id_periodo='$periodo' and id_year='$año' and id_grado='$grado' order by apellido";  
$result2=pg_query($conn,$consulta2);
$cant2 = pg_num_rows($result2);
$celdapromedioCurso = $cantidadM + 19;
$promedioCurso = $sumapromedios/$cant2;

//Codigo para saber el ID del profesor para posteriormente saber su nombre y apellido e incluir esa información en el boletin.
$sql4="select id_profesor from directorgrado where id_grado='$grado' and id_year='$año'";
$result4=pg_query($conn,$sql4);
$rowprofesor = pg_fetch_array($result4);
$cantidadprofesor = pg_num_rows($result4);

if($cantidadprofesor>0){

$idp = $rowprofesor["id_profesor"];
//Para saber nombre y apellido del profesor
$datosprofesor = "select nombre, apellido from profesor where id_profesor='$idp'";
$resultdatosprofesor =pg_query($conn,$datosprofesor);
$rowdatosprofesor = pg_fetch_array($resultdatosprofesor);
$nombreprofesor = $rowdatosprofesor["0"];
//$nombreprofesor = "Carlos";
$apellidoprofesor = $rowdatosprofesor["1"];
}else{
  $nombreprofesor = "No se ha registrado un";
  $apellidoprofesor = "director para este grado.";
}
$celdadirector = $cantidadM + 29;  //Celda en la cual se va a escribir el nombre del director de grupo.

// Creamos un objeto PHPExcel
$objPHPExcel = new PHPExcel();
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = $objReader->load('BOLETIN.xlsx');
$hoja = 1;
while($row2=pg_fetch_array($result2))  
              { 
                      $codigo2=$row2["0"];
                      $nombre2=$row2["1"];
                      $apelli2 = $row2["2"];

                      // Creamos un objeto PHPExcel
                      $varperiodo2 = $periodo;

                      // Indicamos que se pare en la hoja uno del libro
                      $objPHPExcel->setActiveSheetIndex(0);

                      //clonamos la primera hoja del libro.
                      $objClonedWorksheet = clone $objPHPExcel->getActiveSheet();
                      $objClonedWorksheet->setTitle($nombre2." ".$apelli2);
                      $objPHPExcel->addSheet($objClonedWorksheet);

                      //No paramos en la hoja de cada estudiante.
                      $objPHPExcel->setActiveSheetIndex($hoja);

                       //Modificamos los valoresde las celdas B8, E8 Y I8
                      $objPHPExcel->getActiveSheet()->SetCellValue('B8', strtoupper($apelli2).' '.strtoupper($nombre2));
                      $objPHPExcel->getActiveSheet()->SetCellValue('E8', 'Grado: '.$grado);
                      $objPHPExcel->getActiveSheet()->SetCellValue('I8', $codigo2);

                      $num_rows = 11; //Para las materias: Aqui es donde empiezan a colocarse los nombres de las materias en el boletin.
                      $celda = 11;
                      $celda1 = 11;
                      $celda2 = 11;
                      $celda3 = 11;
                      $sql1="select id_materia from gradomateria where id_grado='$grado'";
                      $result6 = pg_query($conn,$sql1);
                      $cantidadM = pg_num_rows($result6);
                      $celdapuesto = $cantidadM + 19; //Esto es para agregar al Excel en la celda correspondiente(39) la cantidad de estudiantes en el curso.
                      while($row = pg_fetch_array($result6)){

                        $materia2 = $row["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $consultnombres = "select nombre_mate from materia where id_materia='$materia2'";//Consulta para agregar los nombres de materias al boletin
                        $resultname = pg_query($conn,$consultnombres);

                        while($row3 = pg_fetch_array($resultname)){

                            $matnombre = $row3["nombre_mate"];   //Arreglo con unicamente los nombres de las materias que tiene el grado. 
                            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$num_rows, strtoupper($matnombre));
                            $objPHPExcel->getActiveSheet()->insertNewRowBefore($num_rows + 1, 1);
                            $num_rows = $num_rows + 1;
                
                        }
                        
                     
                     }
                     $objPHPExcel->getActiveSheet()->removeRow($num_rows); //Eliminar la fila que se crea de más.
                     $objPHPExcel->getActiveSheet()->SetCellValue('C'.$celdapuesto, 'ALUMNOS DEL CURSO: '.$cant); //Se agrega la cantidad de estudiantes. 

                    //Colocar las notas en los espacios dependiendo del periodo.
                     if($varperiodo2==4){
                     $sql80="select id_materia from gradomateria where id_grado='$grado'";
                     $resulta0 = pg_query($conn,$sql80);
                     while($row70 = pg_fetch_array($resulta0)){
                        $materia40 = $row70["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $notaM0 = "select valor from notasperiodo where id_materia='$materia40' and id_periodo='$varperiodo2' and id_year='$año' and id_grado='$grado' and id_estudiante ='$codigo2'";
                        $resultnota0 = pg_query($conn,$notaM0);

                        $numeroN0 = pg_num_rows($resultnota0);

                        if ($numeroN0 == 0){
                            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$celda, '--');//Si no existe ninguna nota entonces rellena el campo con guiones. 
                            $celda = $celda + 1;
                           }else{
                           

                             while($row80 = pg_fetch_array($resultnota0)){

                                $materianota0 = $row80["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                $objPHPExcel->getActiveSheet()->SetCellValue('H'.$celda, $materianota0);//Imprime las notas de cada una de las materias del estudiante. 
                                $celda = $celda + 1;
                             }
                         }
                    }
                    $varperiodo2 = $varperiodo2 - 1;
                }
                if($varperiodo2==3){
                     $sql812="select id_materia from gradomateria where id_grado='$grado'";
                     $resulta12 = pg_query($conn,$sql812);
                     while($row712 = pg_fetch_array($resulta12)){
                        $materia412 = $row712["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $notaM12 = "select valor from notasperiodo where id_materia='$materia412' and id_periodo='$varperiodo2' and id_year='$año' and id_grado='$grado' and id_estudiante ='$codigo2'";
                        $resultnota12 = pg_query($conn,$notaM12);

                        $numeroN12 = pg_num_rows($resultnota12);

                        if ($numeroN12 == 0){
                            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$celda1, '--');//Si no existe ninguna nota entonces rellena el campo con guiones. 
                            $celda1 = $celda1 + 1;
                           }else{
                           

                             while($row812 = pg_fetch_array($resultnota12)){

                                $materianota12 = $row812["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                $objPHPExcel->getActiveSheet()->SetCellValue('G'.$celda1, $materianota12);//Imprime las notas de cada una de las materias del estudiante. 
                                $celda1 = $celda1 + 1;
                             }
                         }
                    }
                    $varperiodo2 = $varperiodo2 - 1;
                }
                if($varperiodo2==2){
                     $sql822="select id_materia from gradomateria where id_grado='$grado'";
                     $resulta22 = pg_query($conn,$sql822);
                     while($row722 = pg_fetch_array($resulta22)){
                        $materia422 = $row722["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $notaM22 = "select valor from notasperiodo where id_materia='$materia422' and id_periodo='$varperiodo2' and id_year='$año' and id_grado='$grado' and id_estudiante ='$codigo2'";
                        $resultnota22 = pg_query($conn,$notaM22);

                        $numeroN22 = pg_num_rows($resultnota22);

                        if ($numeroN22 == 0){
                            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$celda2, '--');//Si no existe ninguna nota entonces rellena el campo con guiones. 
                            $celda2 = $celda2 + 1;
                           }else{
                           

                             while($row822 = pg_fetch_array($resultnota22)){

                                $materianota22 = $row822["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                $objPHPExcel->getActiveSheet()->SetCellValue('F'.$celda2, $materianota22);//Imprime las notas de cada una de las materias del estudiante. 
                                $celda2 = $celda2 + 1;
                             }
                         }
                    }
                    $varperiodo2 = $varperiodo2 - 1;
                }
                if($varperiodo2==1){
                     $sql832="select id_materia from gradomateria where id_grado='$grado'";
                     $resulta32 = pg_query($conn,$sql832);
                     while($row732 = pg_fetch_array($resulta32)){
                        $materia432 = $row732["id_materia"];  //Arreglo con unicamente los ids de las materias del grado. 
                        $notaM32 = "select valor from notasperiodo where id_materia='$materia432' and id_periodo='$varperiodo' and id_year='$año' and id_grado='$grado' and id_estudiante ='$codigo2'";
                        $resultnota32 = pg_query($conn,$notaM32);

                        $numeroN32 = pg_num_rows($resultnota32);

                        if ($numeroN32 == 0){
                            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$celda3, '--');//Si no existe ninguna nota entonces rellena el campo con guiones. 
                            $celda3 = $celda3 + 1;
                           }else{
                           

                             while($row832 = pg_fetch_array($resultnota32)){

                                $materianota32 = $row832["valor"];   //Arreglo con unicamente las notas de cada una de las materias del estudiante. 
                                $objPHPExcel->getActiveSheet()->SetCellValue('E'.$celda3, $materianota32);//Imprime las notas de cada una de las materias del estudiante. 
                                $celda3 = $celda3 + 1;
                             }
                         }
                    }
                }     
                      $celdaini2 = 11;
                      $limite2 = $celdaini2 + $cantidadM - 1;
                      if($periodo==1){
                        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'BOLETIN PRIMER PERIODO ACADEMICO');
                        for($i=11; $i<=$limite2; $i++){
                            $valornot = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $valornot);
                        }
                      }elseif($periodo==2){
                        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'BOLETIN SEGUNDO PERIODO ACADEMICO');
                        for($i=11; $i<=$limite2; $i++){
                            $valornot1 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $valornot2 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                            $definitiv = ($valornot1+$valornot2)/$periodo;
                            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $definitiv);
                        }
                      }elseif($periodo==3){
                        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'BOLETIN TERCER PERIODO ACADEMICO');
                        for($i=11; $i<=$limite2; $i++){
                            $valornot1 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $valornot2 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                            $valornot3 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
                            $definitiv = ($valornot1+$valornot2+$valornot3)/$periodo;
                            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $definitiv);
                        }
                      }else{
                        $objPHPExcel->getActiveSheet()->SetCellValue('A6', 'BOLETIN CUARTO PERIODO ACADEMICO');
                        for($i=11; $i<=$limite2; $i++){
                            $valornot1 = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                            $valornot2 = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                            $valornot3 = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
                            $valornot4 = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
                            $definitiv = ($valornot1+$valornot2+$valornot3+$valornot4)/$periodo;
                            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$i, $definitiv);
                        }
                      }
                      
                      for($i=11; $i<=$limite2; $i++){
                        $notamateria2 = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
                        $suma2 = $suma2 + $notamateria2;

                        //SI(G8>4,49;"S";SI(G8>3,69;"A";SI(G8>2,99;"BS";SI(G8>0;"B")))) De esta forma se calcula el desempeño. 
                        if($notamateria2 > 4.49){
                          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, "S");
                        }elseif($notamateria2 > 3.69){
                          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, "A");
                        }elseif($notamateria2 > 2.99){
                          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, "BS");
                        }elseif($notamateria2 > 0){
                          $objPHPExcel->getActiveSheet()->SetCellValue('J'.$i, "B");
                        }

                      }
                     $promedioEst2 = $suma2/$cantidadM;
                     $celdapromedio = $cantidadM + 20;
                     $objPHPExcel->getActiveSheet()->SetCellValue('F'.$celdapromedio, $promedioEst2);
                     $objPHPExcel->getActiveSheet()->SetCellValue('J'.$celdapromedioCurso, $promedioCurso);
                     rsort($puesto, SORT_NUMERIC);
                      for($j = 0; $j< $cant2;$j++){
                      if($puesto[$j] == $promedioEst2 and is_null($objPHPExcel->getActiveSheet()->getCell('J'.$celdapromedio)->getCalculatedValue())){
                        $nu= $j + 1;
                        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$celdapromedio, $nu);
                      }
                    
                     }
                     $suma2 = 0;
                      //insertar fecha actual en el boletin.
                     $objPHPExcel->getActiveSheet()->SetCellValue('A'.$celdafecha, $dia." DE ".$mes2." DE ".$año2);
                     //Insertar nombre del director de grado en el boletin.
                     $objPHPExcel->getActiveSheet()->SetCellValue('C'.$celdadirector, $nombreprofesor." ".$apellidoprofesor);

                     //Consulta para extraer las observaciones, fallas y retardos para cada estudaiante.
                      $consultaobservaciones = "select observacion_academica, observacion_convivencia, observacion_comportamiento, nota_comportamiento, fallas, retardos from observaciones where id_estudiante='$codigo2' and id_periodo='$periodo' and id_grado='$grado' and id_year='$año'";
                      $resultadoobservaciones = pg_query($conn, $consultaobservaciones);
                      $test1=pg_num_rows($resultadoobservaciones);

                      if($test1 > 0 ){ //En caso de que el estudiante tenga registadas las observaciones, fallas y retardos.
                      $rowobservacionestudiante = pg_fetch_array($resultadoobservaciones);
                      $academica = $rowobservacionestudiante["0"];
                      $convivencia = $rowobservacionestudiante["1"];
                      $comportamiento = $rowobservacionestudiante["2"];
                      $notacomportamiento = $rowobservacionestudiante["3"];
                      $fallasestudiante = $rowobservacionestudiante["4"];
                      $retardosestudiante = $rowobservacionestudiante["5"];

                     //Insertar observaciones, fallas y retardos en el boletin.
                     $objPHPExcel->getActiveSheet()->SetCellValue('J'.($cantidadM + 15), $notacomportamiento);
                     $objPHPExcel->getActiveSheet()->SetCellValue('B'.($cantidadM + 19), $retardosestudiante);
                     $objPHPExcel->getActiveSheet()->SetCellValue('B'.($cantidadM + 20), $fallasestudiante);
                     $objPHPExcel->getActiveSheet()->SetCellValue('A'.($cantidadM + 23), $academica);
                     $objPHPExcel->getActiveSheet()->SetCellValue('A'.($cantidadM + 16), $comportamiento);
                     $objPHPExcel->getActiveSheet()->SetCellValue('D'.($cantidadM + 23), $convivencia);
                      }else{
                        //En caso de que el estudiante no tenga registradas las observaciones, fallas y retardos.
                     $objPHPExcel->getActiveSheet()->SetCellValue('J'.($cantidadM + 15), '--');
                     $objPHPExcel->getActiveSheet()->SetCellValue('B'.($cantidadM + 19), '--');
                     $objPHPExcel->getActiveSheet()->SetCellValue('B'.($cantidadM + 20), '--');
                     $objPHPExcel->getActiveSheet()->SetCellValue('A'.($cantidadM + 23), 'No se han registrado observaciones en el sistema');
                     $objPHPExcel->getActiveSheet()->SetCellValue('A'.($cantidadM + 16), 'No se han registrado observaciones en el sistema');
                     $objPHPExcel->getActiveSheet()->SetCellValue('D'.($cantidadM + 23), 'No se han registrado observaciones en el sistema');
                      }
                     $hoja++;  //Para ir trabajando en diferentes hojas del libro.

                     
                  } 

//Remover la primera hoja del libro, esa es la plantilla de los boletines.
$objPHPExcel->removeSheetByIndex(0);     

//Guardamos los cambios
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save("Boletines/Grado $grado/Periodo $periodo/$grado $periodo.xlsx"); 
//Añadimos el documento al archivo .zip.
$zip->addFile("Boletines/Grado $grado/Periodo $periodo/$grado $periodo.xlsx",$dir."/Boletines grado $grado periodo $periodo.xlsx");
$zip->close();

///Then download the zipped file.
header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Length: ' . filesize($zipname));
readfile($zipname);
unlink($zipname);//Destruye el archivo temporal

?>

