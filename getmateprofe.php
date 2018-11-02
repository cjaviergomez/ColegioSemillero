<?php
	
	session_start();

	 include("conec.php"); 
     $conn=conectarse(); 
     //echo "entrante a get materia";
	
	$idp=$_SESSION["identi"];
	$id_grado = $_POST['id_grado'];
	$year =  $_SESSION["year"]; //obtengo el año por sesión
	
	$queryM = "select id_materia, (select nombre_mate from materia where materia.id_materia=profesormateria.id_materia ) as name from profesormateria where id_profesor = '$idp' and id_year='$year' and id_grado='$id_grado'";

	$resultadoM = pg_query($conn,$queryM);
	
	$html= "<option value=''>Seleccionar Materia</option>";
	
	while($row = pg_fetch_array($resultadoM))
	{
		$html.= "<option value='".$row['id_materia']."'>".$row['name']."</option>";
	}
	
	echo $html;
?>		