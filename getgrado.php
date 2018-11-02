<?php
	
	session_start();

	 include("conec.php"); 
     $conn=conectarse(); 
     //echo "entrante a get materia";
	
	$idp=$_SESSION["identi"];
	//$id_grado = $_POST['id_grado'];
	$year =  $_SESSION["year"]; //obtengo el año por sesión
	
	$queryM = "select id_grado from directorgrado where id_profesor = '$idp' and id_year = '$year'";

	$resultadoM = pg_query($conn,$queryM);
	
	$html= "<option value=''>Seleccionar Grado</option>";
	
	while($row = pg_fetch_array($resultadoM))
	{
		$html.= "<option value='".$row['id_grado']."'>".$row['id_grado']."</option>";
	}
	
	echo $html;
?>		