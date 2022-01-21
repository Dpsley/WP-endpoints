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
		'args' => [
		    'link' => ['type' =>'string',
		    'required' => true,
		    'status' => 200,
	        ],

	        'id' => ['type' => 'string',
            'required' => true,
		    'status' => 200,
	        ],

]
));
	register_rest_route( 'iq/v1', 'redirect_delete', array(
		'methods'             => 'POST',
		'callback'            => 'redirect_delete_link', //имя функции обработчика
		'args' => [
			'id' => ['type' =>'string',
			'required' => true,
			],
		]
));
});
function redirect_list_show( WP_REST_Request $request ){//тут обработчик эндопоинта 2

	 	 $link = $request->get_param('link');
	 	 $id = $request->get_param('id');

	function quer(){
				global $wpdb;

$mytable = $wpdb->get_results( "SELECT id, link FROM plg_redirect", ARRAY_A );
	var_dump($mytable);
	$array = json_encode($mytable); //кодирование в джейсона
	var_dump($array);
	$response = wp_remote_get('http://test/wp-json/iq/v1/redirect_list');
    $code = wp_remote_retrieve_response_code( $response ); 
// Получаю код ответа
echo $code; //> 200
}
quer();

}
?>
