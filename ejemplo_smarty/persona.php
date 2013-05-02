<?php

/*********************************************
	@Autor	: Gonzalo Andres Vergara R.
	@Web	: www.andresvergara.cl
	@Email	: andresvergara.cl@gmail.com
*********************************************/

require('configuracion.php');
require('/libs/Smarty.class.php');

// obtiene el nombre de la persona que se va a mostrar.
$nombre = $_GET['nombre'];

// selecciona los datos de la persona.
$select = "SELECT * FROM PERSONA WHERE nombre = '".$nombre."'";
$resultado 	= mysql_query($select);

while($row = mysql_fetch_assoc($resultado)) {
  // carga los datos en las variables.
  $rut = $row['rut'];
  $foto = $row['foto'];
  $telefono = $row['telefono'];
  $tipo = $row['foto_type'];
}

// boton aceptar
if($_POST['Aceptar'])
{
	header("Location: index.php");
}

$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

$smarty->assign("nombre", $nombre, true);
$smarty->assign("rut", $rut, true);
$smarty->assign("transacciones", $transacciones, true);
$smarty->assign("telefono", $telefono, true);

$smarty->display('persona.tpl');

?>