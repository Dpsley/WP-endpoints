<?
add_action( 'rest_api_init', function() {

	register_rest_route( 'iq/v1', 'redirect_add', array(
		'methods'             => 'POST',
		'callback'            => 'qwe',
		'args' => [
			'link' => 'string',
			'required' => true,
			], //имя функции обработчика
));
});
?>
