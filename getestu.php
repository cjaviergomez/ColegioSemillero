<?php
	
	session_start();

	  //error_reporting(E_ALL);
      //ini_set('display_errors', '1');

	 include("conec.php"); 
     $conn=conectarse(); 
     //echo "entrante a get materia";
	
	$id_grado = $_POST['id_grado'];
    //$id_grado = '1';
	$year =  $_POST['id_year']; //obtengo el año por sesión

	//$year =  '2017';
	$queryM = "select id_estudiante, (select nombre from estudiante where estudiante.id_estudiante=materiaestudiante.id_estudiante) as name from materiaestudiante where id_grado = '$id_grado' and id_year='$year' group by id_estudiante";
	$resultadoM = pg_query($conn,$queryM);
	
	$html= "<option value=''>Seleccionar Estudiante</option>";
	
	while($row = pg_fetch_array($resultadoM))
	{
		$html.= "<option value='".$row['id_estudiante']."'>".$row['name']."</option>";
	}
	
	echo $html;
?>	