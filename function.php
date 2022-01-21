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
//		    'link' => ['type' =>'string',
//		    'required' => true,
//		    'status' => 200,
//	        ],
//
//	        'id' => ['type' => 'string',
//            'required' => true,
//		    'status' => 200,
//	        ],
//
]
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
function redirect_add_link( WP_REST_Request $request ){//тут обработчик эндпоинта 1


         global $link;
	 	 $link = $request->get_param('link');
	$a=8;	//генерируем id

	//проверим в БД существование, регенерируем id при необходимости
do {
	function read_tables(){
		global $wpdb;
		global $generated;
	 $generated = idfortable(8);
		$fivesdrafts = $wpdb->get_var( "SELECT id FROM plg_redirect WHERE id = '{$generated}'");

		//var_dump ($generated);
		var_dump ($fivesdrafts);
		return $generated;
	}


read_tables();
var_dump($link);



	//заносим в БД
//$id = read_tables($generated);
//var_dump($id);
function insertlink(){
	global $wpdb;
    global $generated;
    global $link;
var_dump($generated);
$sql = $wpdb->prepare("INSERT INTO plg_redirect (id,link) values ('$generated', '$link')");
$wpdb->query($sql);

	//$test = $wpdb->insert( 'plg_redirect', ['id' =>  $generated , 'link' => $link ]);
	//var_dump($link);
}
}while($fivesdrafts=null);
insertlink();
	return new WP_REST_Response( true, 200 );
}


function redirect_list_show( WP_REST_Request $request ){//тут обработчик эндопоинта 2

	 	 $link = $request->get_param('link');
	 	 $id = $request->get_param('id');

	function quer(){
				global $wpdb;

$mytable = $wpdb->get_results( "SELECT id, link FROM plg_redirect", ARRAY_A );
	var_dump($mytable);
	$array = json_encode($mytable);
	//var_dump (array_filter($array));
	var_dump($array);
	$response = wp_remote_get('http://test/wp-json/iq/v1/redirect_list/');
    $code = wp_remote_retrieve_response_code( $response );

echo $code; //> 200
}
quer();

}

function redirect_delete_link( WP_REST_Request $request ){//тут обработчик эндопоинта 3

		 	 $id = $request->get_param('id');
		 	 $id = 1;
      function delete_link_id(){
           global $wpdb;
           $wpdb->delete( 'plg_redirect', [ 'id' => '$id' ] );

		   $response = wp_remote_get('http://test/wp-json/iq/v1/redirect_list/');
           $code = wp_remote_retrieve_response_code( $response );

echo $code; //> 200
}
delete_link_id();
}
?>
