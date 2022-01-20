<?
function create_table() {
	global $wpdb;

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$table = $wpdb->get_blog_prefix() . 'redirect';
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE {$table} (
	id  varchar(20) NOT NULL,
	address varchar(255) NOT NULL default '',
	)
	{$charset_collate};";

	dbDelta($sql);
}

create_table();
?>
