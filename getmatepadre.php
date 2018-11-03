<?php
	
	session_start();

	 include("conec.php"); 
     $conn=conectarse(); 
     //echo "entrante a get materia";
	
	$id_estudiante = $_POST['id_estudiante'];

	$consul2="SELECT EXTRACT(YEAR FROM current_date) FROM current_date";
    $res2 = pg_query($conn,$consul2);
    $row2 = pg_fetch_array($res2);
    $year= 2017;//$row2["0"];
	//$year =   $_SESSION["year"]; //obtengo el año por sesión
	
	$queryM = "select id_materia, (select nombre_mate from materia where materia.id_materia=materiaestudiante.id_materia ) as name from materiaestudiante where id_estudiante = '$id_estudiante' and id_year='$year'";
	$resultadoM = pg_query($conn,$queryM);
	
	$html= "<option value=''>Seleccionar Materia</option>";
	
	while($row = pg_fetch_array($resultadoM))
	{
		$html.= "<option value='".$row['id_materia']."'>".$row['name']."</option>";
	}
	
	echo $html;
?>		