<?php
/*********************************************
	@Autor	: Gonzalo Andres Vergara R.
	@Web	: www.andresvergara.cl
	@Email	: andresvergara.cl@gmail.com
*********************************************/

require('configuracion.php');
require('/libs/Smarty.class.php');

// se inicializa la variable tabla.
$tabla = "";

// boton buscar
if($_POST['Buscar'])
{
	$letras = $_POST['letras'];
	
	// select que busca la la similitud de caracteres ingresados.
	$select = "select * from persona where nombre like '%".$letras."%'";
	$resultado 	= mysql_query($select);
	
	while($row = mysql_fetch_assoc($resultado)) 
	{	
		// le cargo a la variable el codigo de la tabla que sera enviada a la plantilla.
		$tabla .= "<tr>";
		$tabla .= "<td>".$row['rut']."</td>";
		$tabla .= "<td><a href=\"persona.php?nombre=".$row['nombre']."\">".$row['nombre']."</a></td>";
		$tabla .= "</tr>";	
	}	
	
}
	
// boton volver.
if($_POST['Volver'])
{
	header("Location: index.php");
}	

$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

$smarty->assign("tabla", $tabla);

$smarty->display('buscar_persona.tpl');

?>