<?
$query = $wpdb->get_var($wpdb->prepare(
	"SELECT id FROM $wpdb->redirect WHERE id = %s", $randomString
));

	$query2 = $wpdb->get_var($wpdb->prepare(
	"SELECT id FROM $wpdb->redirect WHERE id = $randomString"
));
	echo "string";
?>
