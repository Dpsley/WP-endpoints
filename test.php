<?
function create_table() {
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table_name = $wpdb->get_blog_prefix() . 'test';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table_name} (
	id  varchar(20) NOT NULL,
	address varchar(255) NOT NULL default '',
	PRIMARY KEY  (id),
	)
	{$charset_collate};";

	dbDelta($sql);
}

create_table();
?>
