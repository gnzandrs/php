<?php
/*******************************************************************************
 * Autor: Gonzalo Andres Vergara Rojas,
 * Fecha: Diciembre 2009
 * Correo: webmaster@andresvergara.cl
 * @gnzvergara
 * www.andresvergara.cl
 *
 * Panel de Vista de notas actuales
  - muestra las notas de un determinado curso y asignatura a alumno o apoderado.
  
 *******************************************************************************/

	include("configuracion.php");
	$user	 	= 	$_COOKIE['user'];
	$status 	= 	$_COOKIE['estado'];
	
	//Si el usuario es un alumno estado(5)
	if($status == 5)
	{
		$query_datos = "SELECT		c.title, cru.nota1, cru.nota2, cru.nota3
						FROM 		course_rel_user cru, user u, course_category cc, course c
						WHERE	 	u.username = '$user'
						AND 		cru.course_code = c.code
						AND 		cru.user_id = u.user_id
						GROUP BY 	c.title, cru.nota1, cru.nota2, cru.nota3";
		$resultado = mysql_query($query_datos);
		$tabla = '';
		
		while($row = mysql_fetch_assoc($resultado)) {
			
			
			  $tabla .= "<tr>";
			  $tabla .= "<td class=\"todo\">".$row['title']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota1']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota2']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota3']."</td>";
			 //Calcula promedio
			  $promedio = ( $row['nota1'] + $row['nota2'] + $row['nota3'] )/3;
			  $promedio = substr($promedio,0,3);
			  $tabla .= "<td class=\"promedio\"><label><center>$promedio</center></label></td>";
			  $tabla .= "</tr>";

		}
	}
	//Si el usuario es un apoderado estado(6)
	elseif($status == 6)
	{
		$query_sel_alumno = "SELECT c.title, cru.nota1, cru.nota2, cru.nota3
							FROM course c, course_rel_user cru, user u, user_rel_apod ura
							WHERE cru.course_code = c.code
							AND cru.user_id = u.user_id
							AND u.status =5
							AND username = (
							SELECT user_alumn
							FROM user_rel_apod
							WHERE user_apod = '$user')
							GROUP BY c.title, cru.nota1, cru.nota2, cru.nota3";
		//echo $query_sel_alumno;
		
		$resultado = mysql_query($query_sel_alumno);
		$tabla = '';
		
		while($row = mysql_fetch_assoc($resultado)) {
						
			  $tabla .= "<tr>";
			  $tabla .= "<td class=\"todo\">".$row['title']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota1']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota2']."</td>";
			  $tabla .= "<td class=\"todo\">".$row['nota3']."</td>";
			  //Calcula promedio
			  $promedio = ( $row['nota1'] + $row['nota2'] + $row['nota3'] )/3;
			  $promedio = substr($promedio,0,3);
			  $tabla .= "<td class=\"promedio\"><label><center>$promedio</center></label></td>";
			  $tabla .= "</tr>";

		}
	}	
	

include ("Template.php");

//Carga Plantilla
$plantilla 			= new Template();
$plantilla->setPath('./plantillas/');

$plantilla->setTemplate('ver_notas_alumno');
$plantilla->setVars(array(	
						"USER"			=>  $user,
						"TABLA"	        =>  $tabla));
echo $plantilla->show();

//Carga CSS
$plantilla->setPath('./css/');
$plantilla->setTemplate('predeterminado');
echo $plantilla->show();

?>

