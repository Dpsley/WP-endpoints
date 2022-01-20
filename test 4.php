<?
add_action( 'rest_api_init', function() {
	register_rest_route( 'iq/v1', '/link/(?P<pricode_param>\d+)', array(
		'methods'             => 'GET',
		'callback'            => 'pricode_api_test_callback',
));
});
function pricode_api_test_callback( $request ){
	$response['status'] = 200;
	$response['success'] = true;
	$response['data'] = $request->get_param('pricode_param');
	return new WP_REST_Response( $response);
}
?>
