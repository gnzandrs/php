<?PHP
/*************************************************************************** 
   .: Archivo de Configuracion :.
	- Archivo de configuracion: Datos Host o servidor y base de datos MySQL
	
	@Autor	: Gonzalo Andres Vergara R.
	@Web	: www.andresvergara.cl
	@Email	: andresvergara.cl@gmail.com
	
 **************************************************************************/
 
$server 	= 'localhost';			   // Dirección del servidor
$user 		= 'prueba';				   // Nombre del Usuario (User) de la base de datos
$pass 		= 'prueba123';			   // Contraseña (Password) del usuario de la base de datos

$bd = mysql_connect($server, $user, $pass);
mysql_select_db("pruebas_web", $bd);		

?>