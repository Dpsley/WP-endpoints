function create_table() {
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_name = $wpdb->get_blog_prefix() . 'test_table';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$test} (
		id varchar(8) NOT NULL ,
		link varchar(255) NOT NULL default '',
		PRIMARY KEY (id),
		KEY link (link)
	    )
	{$charset_collate};";

	dbDelta($sql);
}
    function get_schema(){
	$schema = array(
		'$schema' => 'https://playground.inkyquill.net/wp-json/iq/v1/',
		'title' => 'activity',
		'type' => 'object',
		'properties' => array(
			'id' => array(
				'description' => 'Идентификатор записи',
				'type' => 'varchar',
			),
			'link' => array(
				'description' => 'Ссылка',
				'type' => 'varchar',
			),
		),
	);
	return $schema;
}
add_action( 'rest_api_init', function() {
	function register_routes(){
	register_rest_route( 'iq/v1', 'redirect_add', array(
		'methods'             => 'POST',
		'callback'            => 'id_get_link',
		'args' => array(
			'link' => array(
				'required'          => true,
			),
		),
	) );
			register_rest_route( 'iq/v1', 'redirect_list', array(
		'methods'             => 'POST',
		'callback'            => '',
		'args' => array(
			'link' => array(
				'required'          => true,
			),
		),
	) );

}
}
		  );
function function_name( WP_REST_Request $request ){

	$request = get_param( [
		'link' => (string) $request['link'],
	] );

	if ( empty( $request ) ) {
		return new WP_Error('Неизвестная ссылка', [ 'status' => 404 ] );
	}

	return $request;
}

function id_get_link( WP_REST_Request $requestq ){

	$parameters = $requestq->get_params();

	if ( empty( $parameters ) ) {
		return new WP_Error('Нет ссылок', [ 'status' => 404 ] );
	}else

	return new WP_REST_Response( true, 200 );
}
