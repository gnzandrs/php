<?php
/*********************************************
	@Autor	: Gonzalo Andres Vergara R.
	@Web	: www.andresvergara.cl
	@Email	: andresvergara.cl@gmail.com
*********************************************/

require('configuracion.php');
require('/libs/Smarty.class.php');

// seleciona todas las personas.
$select = "SELECT  nombre, rut FROM persona";
				
// Ejecutar query.
$resultado 	= mysql_query($select);

// inicializo la variable de la tabla antes de cargarle el codigo.
$tabla = "";
while($row = mysql_fetch_assoc($resultado)) {

	// le cargo a la variable el codigo de la tabla que sera enviada a la plantilla.
	$tabla .= "<tr>";
	$tabla .= "<td><a href=\"persona.php?nombre=".$row['nombre']."\">".$row['nombre']."</a></td>";
	$tabla .= "<td>".$row['rut']."</td>";
	$tabla .= "</tr>";
}

// boton volver
if($_POST['Volver'])
{
	header("Location: index.php");
}		
				
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

$smarty->assign("tabla", $tabla, true);

$smarty->display('listado.tpl');

?>