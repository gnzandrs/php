<?php
/*********************************************
	@Autor	: Gonzalo Andres Vergara R.
	@Web	: www.andresvergara.cl
	@Email	: andresvergara.cl@gmail.com
*********************************************/
 
require('configuracion.php');
require('/libs/Smarty.class.php');

// funcion que codifica la imagen para la bd. 
function carga_imagen($archivo)
{
	// abro la imagen en modo lectura
	$fp = fopen ($archivo, 'r');
	if ($fp)
	{
		// carga imagen buffer
		$datos = fread ($fp, filesize ($archivo)); 
		fclose($fp);
		// codifica la imagen
		$datos = base64_encode ($datos);
		return $datos;
	}
}

// boton ingresar persona.
if($_POST['Ingresar'])
{
	// rescata variables.
	$rut		= $_POST['rut'];
	$nombre 	= $_POST['nombre'];
	$telefono	= $_POST['telefono'];
	$foto		= $_FILES['foto']['tmp_name'];	
	
	// tipo de imagen permitidos.
	$mime_tipos = array("image/jpeg", "image/pjpeg", "image/gif", "image/png", "image/bmp", "image/tiff");
	$tipo = $_FILES["foto"]["type"];
		
	// Restricciones
	if(ereg('[^A-Za-z]', $nombre))
	{
		echo "Error: el nombre solo puede contener  letras. <br>";
	}
	else if(strlen($rut) != 12)
	{
		echo "Error: el rut tiene demaciados  o insuficientes caracteres.  ej : xx.xxx.xxx-x<br>";
	}
	else if(!is_numeric($telefono))
	{
		echo "Error: el Telefono debe ser en digitos. <br>";
	}
	else if($rut == "" && $nombre == "" && $saldo == 0 && $foto == null)
	{
		echo "Error: debe rellenar todos los campos.";
	}
	else if(!in_array($tipo, $mime_tipos))
    {
		echo "El archivo de imagen tiene un formato no valido.";
	}		
	// de pasar las restricciones..
	else{
		// Realiza el insert en la base de datos.
		$insert = "INSERT INTO PERSONA(rut, nombre, telefono, foto, tipo_foto) VALUES('".$rut."', '".$nombre."', ".$telefono.", '".carga_imagen($foto)."', '".$tipo."')";
		
		$resultado = mysql_query($insert);

		// Comprueba si se pudo insertar en la bd.
		if($resultado == 1)
		{
			echo "La persona fue insertada correctamente en la base de datos. <br>";
		}
		else{
			echo "Error al insertar la persona a la base de datos. <br>";
		}
	}
	
}

// boton volver
if($_POST['Volver'])
{
	header("location:index.php");
}

$smarty = new Smarty;

$smarty->force_compile = true;
$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->display('ingresar_persona.tpl');

?>