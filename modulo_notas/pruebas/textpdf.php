<?php
require_once('class.ezpdf.php');
$pdf =& new Cezpdf('a4');
$pdf->selectFont('../fonts/courier.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysql_connect("localhost", "dokeos", "entropia88");
mysql_select_db("dokeos_main", $conexion);
$queEmp = "SELECT firstname,lastname,username,user_id FROM user ORDER BY firstname ASC";
$resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
$totEmp = mysql_num_rows($resEmp);

$ixx = 0;
while($datatmp = mysql_fetch_assoc($resEmp)) { 
	$ixx = $ixx+1;
	$data[] = array_merge($datatmp, array('num'=>$ixx));
}
$titles = array(
				'user_id'=>'<b>Num</b>',
				'firstname'=>'<b>Empresa</b>',
				'lastname'=>'<b>Direccion</b>',
				'username'=>'<b>Telefono</b>'
			);
$options = array(
				'shadeCol'=>array(0.9,0.9,0.9),
				'xOrientation'=>'center',
				'width'=>500
			);
$txttit = "<b>BLOG.UNIJIMPE.NET</b>\n";
$txttit.= "Ejemplo de PDF con PHP y MYSQL \n";

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();
?>