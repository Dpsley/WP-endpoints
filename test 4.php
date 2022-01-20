<?
add_action( 'rest_api_init', function() {

	register_rest_route( 'iq/v1', 'redirect_add', array(
		'methods'             => 'POST',
		'callback'            => 'redirect_add_link', //имя функции обработчика
		'args' => [
			'link' => ['type' =>'string',
			'required' => true,
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
			],
		]
));
});
?>
