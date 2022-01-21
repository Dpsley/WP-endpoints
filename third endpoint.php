<?
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
