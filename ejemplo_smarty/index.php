<?php
/*************************************************************************** 
   .: Pagina principal :.
	- Pagina principal de la web. 
	
	@Autor	: Gonzalo Andres Vergara R.
	@Web	: www.andresvergara.cl
	@Email	: andresvergara.cl@gmail.com
        @twitter: @gnzvergara
	
 **************************************************************************/
require('/libs/Smarty.class.php');

// Carga plantilla.
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

$smarty->display('index.tpl');

?>
