<?PHP
         session_start();


         error_reporting(E_ALL);
         ini_set('display_errors', '1');

		//vemos si el usuario y contraseña es válido
		 include("conec.php"); 
		 $conn=conectarse(); 

         $usuario = pg_escape_string($conn, $_POST["usuario"]);
         $clave = pg_escape_string($conn, $_POST["clave"]);


		$sql1=" select * from estudiante  where id_estudiante='$usuario' and clave ='$clave' ";
		$result1 = pg_query($conn,$sql1);
	    $ciclo=pg_num_rows($result1);


	    $sql2=" select * from profesor  where id_profesor='$usuario' and clave ='$clave' ";
		$result2 = pg_query($conn,$sql2);
	    $ciclo2=pg_num_rows($result2);


	    $sql3=" select * from padre where id_padre='$usuario' and clave ='$clave' ";
		$result3 = pg_query($conn,$sql3);
	    $ciclo3=pg_num_rows($result3);


	    $sql4=" select * from madre where id_madre='$usuario' and clave ='$clave' ";
		$result4 = pg_query($conn,$sql4);
	    $ciclo4=pg_num_rows($result4);


	                   if ($ciclo==0 and $ciclo2==0 and $ciclo3==0 and $ciclo4==0) 
						{

						//	echo "no encontre nada :)";
						header("Location: index3.html");
                        exit();

						}
						else 
						{
                           // echo " encontre algo :)";

						   $row1 = pg_fetch_array($result1);
						   $tipo_usuario1 = $row1["id_usuario"];

                           $row2 = pg_fetch_array($result2);
						   $tipo_usuario2 = $row2["id_usuario"];

                           $row3 = pg_fetch_array($result3);
						   $tipo_usuario3 = $row3["id_usuario"];

						   $row4 = pg_fetch_array($result4);
						   $tipo_usuario4 = $row4["id_usuario"];

					
						if ($tipo_usuario1=='1')
						{
                           //todo esto es si es estudiante
						   $nombre = $row1["nombre"];
						   $foto = $row1["id_imagen"];
						   $grado = $row1["id_grado"];
						   $year = $row1["id_year"];
						   $apellido = $row1["apellido"];

						   $_SESSION["identi"] =$usuario; 
						   $_SESSION["nombre"]= $nombre;
						   $_SESSION["apellido"]= $apellido ;
						   $_SESSION["foto"]=$foto;
						   $_SESSION["grado"]=$grado;
						   $_SESSION["year"]=$year;
							
						   header("Location: alumno1.php");
						   exit(); 	
						}
						elseif ($tipo_usuario3=='2')
						{

						   $nombre = $row3["nombres"];
						   $foto = $row3["id_imagen"];
						   //$year = $row2["id_year"];
						   $apellido = $row3["apellidos"];

						   $_SESSION["identi"] =$usuario; 
						   $_SESSION["nombre"]= $nombre;
						   $_SESSION["apellido"]= $apellido;
						   $_SESSION["foto"]=$foto;
						   //$_SESSION["year"]=$year;


						header("Location: father1.php");
						exit(); 
						
						}
						elseif($tipo_usuario2=='3')
						{
						   //todo esto si es profesor
                           $nombre = $row2["nombre"];
						   $foto = $row2["id_imagen"];
						   $year = $row2["id_year"];
						   $apellido = $row2["apellido"];

						   $_SESSION["identi"] =$usuario; 
						   $_SESSION["nombre"]= $nombre;
						   $_SESSION["apellido"]= $apellido;
						   $_SESSION["foto"]=$foto;
						   $_SESSION["year"]=$year;

                            // echo "nombre-->",$nombre;
							header("Location: profe1.php");
						    exit(); 
						}
						elseif($tipo_usuario2=='4')
						{
						   //todo esto si es profesor-secretari@
                           $nombre = $row2["nombre"];
						   $foto = $row2["id_imagen"];
						   $year = $row2["id_year"];
						   $apellido = $row2["apellido"];

						   $_SESSION["identi"] =$usuario; 
						   $_SESSION["nombre"]= $nombre;
						   $_SESSION["apellido"]= $apellido;
						   $_SESSION["foto"]=$foto;
						   $_SESSION["year"]=$year;

                            // echo "nombre-->",$nombre;
							header("Location: secretaria1.php");
						    exit(); 
						}
						elseif($tipo_usuario2=='5')
						{
						   //todo esto si es profesor-administrativo@
                           $nombre = $row2["nombre"];
						   $foto = $row2["id_imagen"];
						   $year = $row2["id_year"];
						   $apellido = $row2["apellido"];

						   $_SESSION["identi"] =$usuario; 
						   $_SESSION["nombre"]= $nombre;
						   $_SESSION["apellido"]= $apellido;
						   $_SESSION["foto"]=$foto;
						   $_SESSION["year"]=$year;

                            // echo "nombre-->",$nombre;
							header("Location: admin1.php");
						    exit(); 
						}
	                    elseif($tipo_usuario4 =='6')
						{
						   $nombre = $row4["nombres"];
						   $foto = $row4["id_imagen"];
						   $apellido = $row4["apellidos"];

						   $_SESSION["identi"] =$usuario; 
						   $_SESSION["nombre"]= $nombre;
						   $_SESSION["apellido"]= $apellido;
						   $_SESSION["foto"]=$foto;
						


						header("Location: inter_madre.php");
						exit(); 

						}
						else{


							//echo "no entre a nada";
							
							header("Location:  index3.php");
						    exit();

						 }		


		               }


?>

		