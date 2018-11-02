<?php
	
	session_start();

	 include("conec.php"); 
     $conn=conectarse(); 
     //echo "entrante a get materia";
	
	$id_grado = $_POST['id_grado'];
	$year =  $_SESSION["year"]; //obtengo el año por sesión
	
	$queryM = "select id_materia, (select nombre_mate from materia where materia.id_materia=gradomateria.id_materia ) as name from gradomateria where id_grado = '$id_grado' and id_year='$year'";
	$resultadoM = pg_query($conn,$queryM);
	
	$html= "<option value=''>Seleccionar Materia</option>";
	
	while($row = pg_fetch_array($resultadoM))
	{
		$html.= "<option value='".$row['id_materia']."'>".$row['name']."</option>";
	}
	
	echo $html;
?>		