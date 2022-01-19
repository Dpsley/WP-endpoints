add_action( 'rest_api_init', function() {

	register_rest_route( 'iq/v1', 'redirect_add', array(
		'methods'             => 'POST',   
		'callback'            => 'function_name', 
		'args' => array(
			'link' => array(
				'required'          => true,    
			),
		),
	) );

} );
function function_name( WP_REST_Request $request ){

	$request = get_param( [
		'link' => (string) $request['link'],
	] );

	if ( empty( $request ) ) {
		return new WP_Error('Неизвестная ссылка', [ 'status' => 404 ] );
	}

	return $request;
}
