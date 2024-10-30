<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.js-ss.co.uk
 * @since             1.1.1
 * @package           Javascript_Stylesheet
 *
 * @wordpress-plugin
 * Plugin Name:       Javascript StyleSheet
 * Plugin URI:        www.js-ss.co.uk
 * Description:       Javascript Stylesheet is a responsive Framework plugin for Website Creation, in an easy-to-use graphical interface environment.
 * Version:           1.1.1
 * Author:            Nathanael Ainsworth
 * Author URI:        www.js-ss.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       javascript-stylesheet
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-javascript-stylesheet-activator.php
 */
function activate_javascript_stylesheet() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-javascript-stylesheet-activator.php';
	Javascript_Stylesheet_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-javascript-stylesheet-deactivator.php
 */
function deactivate_javascript_stylesheet() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-javascript-stylesheet-deactivator.php';
	Javascript_Stylesheet_Deactivator::deactivate();
}


global $jsss_stylesheet_db_version;
$jsss_stylesheet_db_version = '1.1';

function jsss_stylesheet_install() {
	global $wpdb;
	global $jsss_stylesheet_db_version;

	$table_name = $wpdb->prefix . 'jsss_stylesheet';
	
	$charset_collate = $wpdb->get_charset_collate();

/* {objectname:"parallax1",inneritem:"body",sizetype:"height",csseffect:"height",itemsize:"100"}, */
$row = $wpdb->get_results(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
WHERE table_name = '$table_name' AND column_name = 'screensize'"  );

if(empty($row)){
   	$wpdb->query("ALTER TABLE `$table_name` CHANGE `itemsize` `screensize` CHAR( 11 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL");
}
	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		rowhidden mediumint NOT NULL,
		pagename tinytext NOT NULL,
		objectname tinytext NOT NULL,
		inneritem tinytext NOT NULL,
		sizetype tinytext NOT NULL,
		csseffect tinytext NOT NULL,
		wscreensize char(11) NOT NULL,
		screensize char(11) NOT NULL,
		tabletsize char(11) NOT NULL,
		mobsize char(11) NOT NULL,
		position char(1) NOT NULL,
		lockstatus tinytext NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'jsss_stylesheet_db_version', $jsss_stylesheet_db_version );

  

$installed_ver = get_option( "jsss_stylesheet_db_version" );

if ( $installed_ver != $jsss_stylesheet_db_version ) {

	$table_name = $wpdb->prefix . 'jsss_stylesheet';


$row = $wpdb->get_results(  "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS
WHERE table_name = '$table_name' AND column_name = 'screensize'"  );

if(empty($row)){
   	$wpdb->query("ALTER TABLE `$table_name` CHANGE `itemsize` `screensize` CHAR( 11 ) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL");
}

	$sql = "CREATE TABLE $table_name ( 
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		rowhidden mediumint NOT NULL,
		pagename tinytext NOT NULL,
		objectname tinytext NOT NULL,
		inneritem tinytext NOT NULL,
		sizetype tinytext NOT NULL,
		csseffect tinytext NOT NULL,
		wscreensize char(11) NOT NULL,
		screensize char(11) NOT NULL,
		tabletsize char(11) NOT NULL,
		mobsize char(11) NOT NULL,
		position char(1) NOT NULL,
		lockstatus tinytext NOT NULL,
		UNIQUE KEY id (id)
	);";
	



	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	
	dbDelta( $sql );


	update_option( "jsss_stylesheet_db_version", $jsss_stylesheet_db_version );
}


function jsss_stylesheet_update_db_check() {
    global $jsss_stylesheet_db_version;
    if ( get_site_option( 'jsss_stylesheet_db_version' ) != $jsss_stylesheet_db_version ) {
        jsss_stylesheet_install();
    }
}
add_action( 'plugins_loaded', 'jsss_stylesheet_update_db_check' );


}


function jsss_stylesheet_install_data() {
	global $wpdb;

	    $rowhidden = '0';
	    $pagename = 'index';
		$objectname = 'example';
		$inneritem = 'body';
		$sizetype = 'width';
		$csseffect = 'margin-left';
		$wscreensize = '100';
		$screensize = '100';
		$meditemsize = '100';
		$smallitemsize = '100';
		$position = '-';
		$lockstatus = 'unlocked';
		


	$table_name = $wpdb->prefix . 'jsss_stylesheet';
	
	$wpdb->insert( 
		$table_name, 
		array( 
			'rowhidden'	=> $rowhidden,		
			'pagename' => $pagename,
			'objectname' => $objectname, 
			'inneritem' => $inneritem, 
			'sizetype' => $sizetype,
			'csseffect' => $csseffect, 
			'wscreensize' => $wscreensize, 
			'screensize' => $screensize, 
			'tabletsize' => $meditemsize,
			'mobsize' => $smallitemsize,
			'position' => $position,
			'lockstatus' => $lockstatus,

		) 
	);
}


register_activation_hook( __FILE__, 'jsss_stylesheet_install' );
register_activation_hook( __FILE__, 'jsss_stylesheet_install_data' );


register_activation_hook( __FILE__, 'activate_javascript_stylesheet' );
register_deactivation_hook( __FILE__, 'deactivate_javascript_stylesheet' );


function jsss_settings_install() {
	global $wpdb;
	global $jsss_settings_db_version;

	$table_name = $wpdb->prefix . 'jsss_settings';
	
	$charset_collate = $wpdb->get_charset_collate();

/* {objectname:"parallax1",inneritem:"body",sizetype:"height",csseffect:"height",itemsize:"100"}, */

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		mobactive mediumint NOT NULL,
		tabletactive mediumint NOT NULL,
		monitoractive mediumint NOT NULL,
		wideactive mediumint NOT NULL,
		lockonsave mediumint NOT NULL,
		gridsystem char(9) NOT NULL,
		loaderstatus mediumint NOT NULL,
		loadertype char(9) NOT NULL,
		bgcolour char(7) NOT NULL,
		gifurl VARCHAR(225) NOT NULL,
		loadtimer SMALLINT NOT NULL,
		animationtype char(9) NOT NULL,
		animationspeed char(9) NOT NULL,
		animationclass VARCHAR(225) NOT NULL,
		svghtml text NOT NULL,
		svgcss text NOT NULL,
		helperonoff INT(1) NOT NULL DEFAULT '1',
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'jsss_settings_db_version', $jsss_settings_db_version );

  

$installed_ver = get_option( "jsss_settings_db_version" );

if ( $installed_ver != $jsss_settings_db_version ) {

	$table_name = $wpdb->prefix . 'jsss_settings';

	$sql = "CREATE TABLE $table_name ( 
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		mobactive mediumint NOT NULL,
		tabletactive mediumint NOT NULL,
		monitoractive mediumint NOT NULL,
		wideactive mediumint NOT NULL,
		lockonsave mediumint NOT NULL,
		gridsystem char(9) NOT NULL,
		loaderstatus mediumint NOT NULL,
		loadertype char(9) NOT NULL,
		bgcolour char(7) NOT NULL,
		gifurl VARCHAR(225) NOT NULL,
		loadtimer SMALLINT NOT NULL,
		animationtype char(9) NOT NULL,
		animationspeed char(9) NOT NULL,
		animationclass VARCHAR(225) NOT NULL,
		svghtml text NOT NULL,
		svgcss text NOT NULL,
		helperonoff INT(1) NOT NULL DEFAULT '1',
		UNIQUE KEY id (id)
	);";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	update_option( "jsss_settings_db_version", $jsss_settings_db_version );
}


function jsss_settings_update_db_check() {
    global $jsss_settings_db_version;
    if ( get_site_option( 'jsss_settings_db_version' ) != $jsss_settings_db_version ) {
        jsss_settings_install();
    }
}
add_action( 'plugins_loaded', 'jsss_settings_update_db_check' );


}

function jsss_settings_install_data() {
	global $wpdb;
	$table_name = $wpdb->prefix . 'jsss_settings';
$settings = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE id='1' ");
if($settings < "1"){
		$mobactive = '1';
		$tabletactive = '1';
		$monitoractive = '1';
		$wideactive = '1';
		$lockonsave = '0';
		$gridsystem = 'masonry';
		$loaderstatus = '0';
		$loadertype = 'gif';
		$bgcolour = '#ffffff';
		$gifurl = 'http://';
		$loadtimer = '1';
		$animationtype = '';
		$animationspeed = '';
		$animationclass = '';
		$svghtml = 'html';
		$svgcss = 'css';
		


	
	
	$wpdb->insert( 
		$table_name, 
		array( 
			'mobactive' => $mobactive,
			'tabletactive' => $tabletactive,
			'monitoractive' => $monitoractive,
			'wideactive' => $wideactive,
			'lockonsave' => $lockonsave,
			'gridsystem' => $gridsystem,
			'loaderstatus' => $loaderstatus,
			'loadertype' => $loadertype,
			'bgcolour' => $bgcolour,
			'gifurl' => $gifurl,
			'loadtimer' => $loadtimer,
			'animationtype' => $animationtype,
			'animationspeed' => $animationspeed,
			'animationclass' => $animationclass,
			'svghtml' => $svghtml,
			'svgcss' => $svgcss,

		) 
	);
}
}
register_activation_hook( __FILE__, 'jsss_settings_install' );
register_activation_hook( __FILE__, 'jsss_settings_install_data' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-javascript-stylesheet.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.3
 */
function run_javascript_stylesheet() {

	$plugin = new Javascript_Stylesheet();
	$plugin->run();

}
run_javascript_stylesheet();
