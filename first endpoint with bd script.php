<?
function create_table() {
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table = $wpdb->get_blog_prefix() . 'redirect';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table} (
	id  varchar(20) NOT NULL,
	link varchar(255) NOT NULL default ''
	)
	{$charset_collate};";

	dbDelta($sql);
}

create_table();

add_action( 'rest_api_init', function() {

	register_rest_route( 'iq/v1', 'redirect_add', array(
		'methods'             => 'POST',
		'callback'            => 'redirect_add_link', //имя функции обработчика
		'args' => [
			'link' => ['type' =>'string',
			'required' => true,
			'status' => 200,
			],
		]
));
	register_rest_route( 'iq/v1', 'redirect_list', array(
		'methods'             => 'POST',
		'callback'            => 'redirect_list_show', //имя функции обработчика
		'args' => []
));
	register_rest_route( 'iq/v1', 'redirect_delete', array(
		'methods'             => 'POST',
		'callback'            => 'redirect_delete_link', //имя функции обработчика
		'args' => [
			'id' => ['type' =>'string',
			'required' => true,
			'status' => 200,
			],
		]
));
});
function redirect_add_link( WP_REST_Request $request ){//тут обработчик

		global $wpdb;




	       $a=8;
function idfortable($a = null) { //генерируем id
		   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		   do{
		   	$randomString = '';

		   for ($i = 0; $i < $a; $i++) {
		   	$index = rand(0, strlen($characters) - 1);
		   	$randomString .= $characters[$index];
		   }
		   return $randomString;

	//проверим в БД существование id
	 $generated = $randomString;
		$fivesdrafts = $wpdb->get_var( "SELECT id FROM plg_redirect WHERE id = '{$generated}'");
}while ($fivesdrafts=null);
		return $generated;
	}
		 	 $link = $request->get_param('link');
$gener = idfortable(8);
              $sql = $wpdb->prepare("INSERT INTO plg_redirect (id,link) values ('$gener', '$link')");	//заносим в БД
              $wpdb->query($sql);
return [$gener,$link];

}


?>
