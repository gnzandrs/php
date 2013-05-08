<?php
/***************************************************************************
 * Autor: Gonzalo Andres Vergara Rojas,
 * Fecha: Diciembre 2009
 * Correo: webmaster@andresvergara.cl
 * @gnzvergara
 * www.andresvergara.cl
 * 
 * Panel principal profesor.
  - Permite seleccionar a que curso le desea editar las notas de las 
    asignaturas que el este dictando.
 **************************************************************************/
    
include("configuracion.php");
$user = $_COOKIE['user'];

if($_POST['boton_tercero_medio']){
	header("Location: tercero_medio.php");
}
elseif($_POST['boton_cuarto_medio']){
	header("Location: cuarto_medio.php");
}


include ("Template.php");

//Carga Plantilla
$plantilla 			= new Template();
$plantilla->setPath('./plantillas/');

$plantilla->setTemplate('principal_profesor');
$plantilla->setVars(array(	"USER"			=>  $user));
echo $plantilla->show();

//Carga CSS
$plantilla->setPath('./css/');
$plantilla->setTemplate('predeterminado');
echo $plantilla->show();
?>