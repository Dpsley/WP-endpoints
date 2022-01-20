<?
function redirect_add_link( WP_REST_Request $request ){//тут обработчик

	$request->get_param('link');

	return ['param' => 'value'];
}

?>
