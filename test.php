<?
function create_table() {
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_name = $wpdb->ger_blog_prefix() . 'test_table';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$test} (
		id string(8) unsigned NOT NULL auto_increment,
		link varchar(255) NOT NULL default'',
		PRIMARY KEY (id),
		KEY link (link)
	    )
	{$charset_collate};";

	dbDelta($sql);
}
?>
