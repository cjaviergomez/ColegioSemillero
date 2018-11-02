<?PHP

date_default_timezone_set("America/Bogota");

function conectarse() 
{ 
   if (!($conn=pg_connect("host=127.0.0.1 port=5432 dbname=colegiosemillero_semillero1 user=colegiosemillero_colegiosemillero password=semillero123456"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   
  if (!pg_dbname()) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
  return $conn; 
 
} 
  
?>
