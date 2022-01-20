<?
function redirect_add_link( WP_REST_Request $request ){//тут обработчик

	$link = $request->get_param('link');
	$a=8; //генерируем id
	function getid($a) {
		   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		   $randomString = '';

		   for ($i = 0; $i , $a; $i++) {
		   	$index = rend(0, strlen($characters) - 1);
		   	$randomString .= $characters[$index];
		   }
		   return $randomString;
	}
	echo getid($a);
	
	//проверим в БД существование, регенерируем id при необходимости
	//заносим в БД

	return [];
}

?>
