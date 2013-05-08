<?php
include("configuracion.php");
   //$user 		= $_COOKIE['user'];
	$asignatura = $_GET['asignatura'];
	$curso      = $_GET['curso'];
//Rescato IDS
		$query_datos = "SELECT u.user_id
						FROM   course c, course_rel_user cru, user u
						WHERE  cru.course_code = c.code
						AND    title = '$asignatura'
						AND    cru.user_id = u.user_id
						AND    c.category_code = '$curso'
						AND    u.status = 5";
		
		$resultado 	= mysql_query($query_datos);
		$filas	 	= mysql_num_rows($resultado);
		
		while($row = mysql_fetch_assoc($resultado)) {
			//Contruye Update
		  $update  = "UPDATE course_rel_user 
		              set nota1 = ".$_POST['Nota1_19']." 
					  WHERE user_id =  ".$row['user_id']."
					  AND course_rel_user.course_code = (select code from course where title='$asignatura' and category_code='$curso')
					  AND course_rel_user.status=5";
		  echo $update;
		}


?>