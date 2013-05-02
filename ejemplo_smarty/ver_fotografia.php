<?php
/*********************************************
	@Autor	: Gonzalo Andres Vergara R.
	@Web	: www.andresvergara.cl
	@Email	: andresvergara.cl@gmail.com
*********************************************/

	require('configuracion.php');
	// obtiene el nombre de la persona que se va a mostrar.
	$nombre = $_GET['nombre'];

	// selecciona los datos de la persona.
	$select = "SELECT * FROM PERSONA WHERE nombre = '".$nombre."'";
	$resultado 	= mysql_query($select);

		while($row = mysql_fetch_assoc($resultado)) {
		
		  $foto = $row['foto'];
		  $tipo = $row['foto_type'];
		}

	// cambia el tipo de contenido del html	
	header ('Content-type: ' . $tipo);
	// decodifico y muestra la imagen codificada en la bd.
	echo base64_decode($foto);
?>