<?
function redirect_add_link( WP_REST_Request $request ){//тут обработчик
}

	//$link = $request->get_param('link');
	$a=8;	//генерируем id
	function idfortable($a = null) {
		   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		   $randomString = '';

		   for ($i = 0; $i < $a; $i++) {
		   	$index = rand(0, strlen($characters) - 1);
		   	$randomString .= $characters[$index];
		   }
		   return $randomString;
	}

idfortable();
	//проверим в БД существование, регенерируем id при необходимости
	function read_tables(){
		global $wpdb;
$fivesdrafts = $wpdb->get_var( "SELECT id FROM plg_redirect WHERE id = '.idfortable($a).'");// подставил вместо статического id тот который сформирован генератором и если совпадений нет то выводит null 
var_dump ($fivesdrafts);
}
read_tables();
var_dump (idfortable($a));
	// я вывожу результат запроса и генерации нового id 

//заносим в БД

?>
