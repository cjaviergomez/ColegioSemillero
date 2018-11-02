<?PHP
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

 extract($_POST);
 

 include("conec.php"); 
 $conn=conectarse();


 $id = $_GET['id'];
 
//echo "id-->", $id;

 $sql5="select tamano, nombre, tipo from archivos where id_archivo='$id'"; 
 $actualizar= pg_query($conn,$sql5);

 					while ($row1=pg_fetch_array($actualizar)) 
							{ 
											$contenido=$row1["0"];
											$nombre=$row1["1"];
											$tipo=$row1["2"];
											$file = 'archivos/'.$nombre;
					
											//echo "tamano-->",$contenido;
											//echo "nombre-->",$nombre;
											//echo "tipo-->", $tipo;
											
							header("Cache-Control: public");
                            header("Content-Description: File Transfer");				
                            header("Content-type: $tipo");
                            header("Content-Disposition: attachment; filename= ".$nombre );
                            header("Content-Transfer-Encoding: binary");

                           // read the file from disk
                            readfile($file);
                           
                           // echo $contenido;

							}  

	
//$tipo = pg_get_result( $actualizar, 0, "tipo");
//$contenido = pg_get_result( $actualizar, 0, "tamano");
//$nombre = pg_get_result($actualizar, 0, "nombre");
 

      pg_free_result($actualizar); 
      pg_close($conn);  

?>