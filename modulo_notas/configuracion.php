<?PHP

/*************************************************************************** *
 * Autor: Gonzalo Andres Vergara Rojas,
 * Fecha: Diciembre 2009
 * Correo: webmaster@andresvergara.cl
 * @gnzvergara
 * www.andresvergara.cl
 *
 * Archivo de configuracion: Datos Host o servidor y base de datos MySQL
 ***************************************************************************/
$server 	= 'localhost';			   // Dirección del servidor
$user 		= 'root';				   // Nombre del Usuario (User) de la base de datos
$pass 		= 'entropia';			   // Contraseña (Password) del usuario de la base de datos

$bd = mysql_connect($server, $user, $pass);
mysql_select_db("dokeos_main", $bd);
		

?>