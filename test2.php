add_action( 'rest_api_init', function() {

	register_rest_route( 'iq/v1', 'redirect_add', array(
		'methods'             => 'GET',            // метод запроса: GET, POST ...
		'callback'            => 'function_name',  // функция обработки запроса. Должна вернуть ответ на запрос
		'permission_callback' => 'function_name',  // функция проверки доступа к маршруту. Должна вернуть true/false
		// описание передаваемых параметров
		'args' => array(
			'param_name' => array(
				'default'           => null,           // значение параметра по умолчанию
				'required'          => null,           // является ли параметр обязательным. Может быть только true
				'validate_callback' => 'function_name', // функция проверки значения параметра. Должна вернуть true/false
				'sanitize_callback' => 'function_name', // функция очистки значения параметра. Должна вернуть очищенное значение
			),
			'param_name2' => array(
				...
			)
			...
		),
	) );

} );
