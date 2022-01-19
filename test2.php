add_action( 'rest_api_init', function() {

	register_rest_route( 'iq/v1', 'redirect_add', array(
		'methods'             => 'POST',            
		'callback'            => 'function_name',  
		'permission_callback' => 'function_name', 
		'args' => array(
			'link' => array(
				'default'           => null,           // значение параметра по умолчанию
				'required'          => null,           // является ли параметр обязательным. Может быть только true
			),
		),
	) );

} );
