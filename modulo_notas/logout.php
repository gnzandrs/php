<?php
/*************************************************************************** 
 * Autor: Gonzalo Andres Vergara Rojas,
 * Fecha: Diciembre 2009
 * Correo: webmaster@andresvergara.cl
 * @gnzvergara
 * www.andresvergara.cl
 *
 * Descripcion: Setea una cookie pasada
***************************************************************************/

if($_COOKIE['user'])
{
	setcookie("user",$_POST["user"], time()-86400);
	//echo "Usuario Desconectado.";
	header ("location: index.php");  
}
else{
	//echo "No estas conectado.";
	header ("location: index.php");  
}
?>