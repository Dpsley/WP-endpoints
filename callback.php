<?
function redirect_add_link( WP_REST_Request $request ){//тут обработчик

	$link = $request->get_param('link');
	do {
	$a=8;	//генерируем id
	function getid($a) {
		   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		   $randomString = '';

		   for ($i = 0; $i < $a; $i++) {
		   	$index = rand(0, strlen($characters) - 1);
		   	$randomString .= $characters[$index];
		   }
		   return $randomString;
	}

	//проверим в БД существование, регенерируем id при необходимости
	$query = "SELECT id FROM plg_redirect WHERE id = $randomString"
	}while ($query!=null);
	//заносим в БД

	return [];
}


?>
