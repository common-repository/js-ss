<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.js-ss.co.uk
 * @since      1.1.0
 *
 * @package    Javascript_Stylesheet
 * @subpackage Javascript_Stylesheet/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Javascript_Stylesheet
 * @subpackage Javascript_Stylesheet/admin
 * @author     Nathanael Ainsworth <info@seeksupport.org>
 */
class Javascript_Stylesheet_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.5
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.5
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.5
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		add_action('admin_post_add_admin_post_jss', array($this, 'add_admin_post_jss'));
		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.1.0
	 */
	public function enqueue_styles($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Javascript_Stylesheet_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Javascript_Stylesheet_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

    if ( 'toplevel_page_javascript-stylesheet' == $hook || 'javascript-stylesheet_page_javascript-stylesheet_submenu1' == $hook ) {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/javascript-stylesheet-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'genericons', plugin_dir_url( __FILE__ ) . 'css/genericons/genericons.css' );
		// wp_enqueue_style( 'codemirrorcss', plugin_dir_url( __FILE__ ) . 'css/codemirror.css' );
		// wp_enqueue_style( 'monokai', plugin_dir_url( __FILE__ ) . 'css/monokai.css' );
		
    }
    
		/*echo "<p style='text-align:center;'>" .$hook. "</p>";	*/


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.1.0
	 */
	public function enqueue_scripts($hook) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Javascript_Stylesheet_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Javascript_Stylesheet_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

    if ( 'toplevel_page_javascript-stylesheet' == $hook || 'javascript-stylesheet_page_javascript-stylesheet_submenu1' == $hook ) {

		wp_enqueue_script('jquery');                    // Enque jQuery
		wp_enqueue_script('jquery-ui-core');            // Enque jQuery UI Core
		wp_enqueue_script('jquery-ui-accordion'); 
		wp_enqueue_script('jquery-ui-tabs');            // Enque jQuery UI Tabs
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-selectable');
		wp_enqueue_script('jquery-ui-draggable'); 
		wp_enqueue_script('jquery-ui-resizable');  
		wp_enqueue_script( 'wp-color-picker' ); 
	
		wp_register_script('uploads', 
	    // path to upload script
	    	get_template_directory_uri().'/lib/js/media-upload.js' 
		);
		wp_enqueue_script('uploads');
			if ( function_exists('wp_enqueue_media') ) {
			        // this enqueues all the media upload stuff
			        wp_enqueue_media();
			}	

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/javascript-stylesheet-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'Javascript Stylesheet', plugin_dir_url( __FILE__ ) . 'js/javascript-stylesheet-plugin.js', array( 'jquery' ), $this->version, false );
		// wp_enqueue_script( 'codemirror js', plugin_dir_url( __FILE__ ) . 'js/codemirror/codemirror.js', array( 'jquery' ), $this->version, false );
		// wp_enqueue_script( 'codemirror css', plugin_dir_url( __FILE__ ) . 'js/codemirror/css.js', array( 'jquery' ), $this->version, false );
		// wp_enqueue_script( 'codemirror html', plugin_dir_url( __FILE__ ) . 'js/codemirror/htmlmixed.js', array( 'jquery' ), $this->version, false );
		// wp_enqueue_script( 'codemirror sublime', plugin_dir_url( __FILE__ ) . 'js/codemirror/sublime.js', array( 'jquery' ), $this->version, false );
		// wp_enqueue_script( 'codemirror xml', plugin_dir_url( __FILE__ ) . 'js/codemirror/xml.js', array( 'jquery' ), $this->version, false );
	


	}
	}



	public function add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */


		add_menu_page( 'Javascript Stylesheet' , 'Javascript Stylesheet' , 'manage_options' , $this->plugin_name , array($this, 'display_plugin_setup_page'));
		add_submenu_page( $this->plugin_name , 'JS Stylesheet', 'JS Stylesheet' , 'manage_options' , $this->plugin_name . '_submenu1' , array($this, 'js_ss_submenu_1'));

	}
 



   
	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.5
	 */
	 
	public function add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.5
	 */
	 
	public function display_plugin_setup_page() {
	    include_once( 'partials/javascript-stylesheet-admin-display.php' );

	}
	public function js_ss_submenu_1() {
	    include_once( 'partials/javascript-stylesheet-admin-jss-display.php' );


	}	

	public function add_admin_post_jss(){
            if (isset($_POST['add_admin_post_nonce'], $_POST['add_admin_post_jss_submit']) && wp_verify_nonce($_POST['add_admin_post_nonce'], 'add_admin_post_jss')) {
                //include_once('inc/backend/save-set.php');



// table Info / get current results from database
global $wpdb;		
$table_name = $wpdb->prefix . 'jsss_stylesheet';
$set_tbl_name = $wpdb->prefix . 'jsss_settings';
$result = $wpdb->get_results( "SELECT * FROM $table_name "); 
$settings = $wpdb->get_results("SELECT * FROM $set_tbl_name WHERE id='1' ");
$lock_on_save = $settings["0"]->lockonsave;


if ($_POST['add_admin_post_jss_submit'] == 'Save all changes') {
    // Do nothing different
    
} else if ($_POST['add_admin_post_jss_submit'] == 'Add row') { // isn't save all changes but is a number instead
    // Add Row


    	$rowhidden = '0';

		$page = get_page_by_title($_POST['pagenames']);
		$pagename =  $page->ID;
		$amountofrows = $_POST['addrowval'] ;
		
		$objectname = 'Object Name';
		$inneritem = 'Inside Item';
		$sizetype = 'Size Type';
		$csseffect = 'CSS Effect';
		$wscreensize = '0';
		$screensize = '0' ;
		$meditemsize = '0';
		$smallitemsize = '0';
		$position = '-';
		$lockstatus = 'unlocked';

for ($i = 0; $i < $amountofrows; $i++) {
   
		$wpdb->insert( 
		$table_name, 
		array( 
			'rowhidden' => $rowhidden,
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

} else if ($_POST['add_admin_post_jss_submit'] == 'Save Settings'){
	
    echo "settings saved";
    	$jsoncontent = $_POST['settingdata'];
		$jsonreplaed = str_replace("\\", "", $jsoncontent );
		$jsonreplaed2 = str_replace("'", '"', $jsonreplaed );
		
		$jsonArray = json_decode($jsonreplaed2, false);
		echo "<pre>";  print_r($jsonArray); echo "</pre>";
		$setid = $jsonArray->id;
    	$mobactive = $jsonArray->mobactive;
 		$tabletactive = $jsonArray->tabletactive;
 		$monitoractive = $jsonArray->monitoractive;
 		$wideactive = $jsonArray->wideactive;
 		$hideallset = $jsonArray->hideallset;
 		$lockonsave = $jsonArray->lockonsave;
 		$gridsystem = $jsonArray->gridsystem;
 		$loaderstatus = $jsonArray->loaderstatus;
 		$loadertype = $jsonArray->loadertype;
		$bgcolour = $_POST['bgcolour'];
		$gifurl= $jsonArray->gifurl;
		$loadtimer = $_POST['loadtimer'];
 		$animationtype = $jsonArray->animationtype;
		$animationspeed = $jsonArray->animationspeed;
		$animationclass = $jsonArray->animationclass;
 		$svghtml = $_POST['svghtml'];
 		$svgcss = $_POST['svgcss'];
 		$helperonoff = $jsonArray->helperonoff;

		$wpdb->update( 
				$set_tbl_name,
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
					'helperonoff' =>$helperonoff,
				), 
				array( 'id' => $setid)
			);

} else{
	//invalid action!
}

// GETS ARRAY AND PUTS IT IN NEW VARIABLE
$identityarray = $_POST['identityarray'];

$arrset1 = [];
$arrset2 = [];

foreach( $identityarray as $key => $singleid ) {
		

		$jsoncontent = $_POST['fulldata'. $singleid];
		$jsonreplaed = str_replace("\\", "", $jsoncontent );
		$jsonreplaed2 = str_replace("'", '"', $jsonreplaed );
		//$obj = json_decode($jsonreplaed);


$jsonArray = json_decode($jsonreplaed2, false);

/*echo "<pre>";  print_r($jsonreplaed2); echo "</pre>"; 
	echo "<pre>";  print_r($jsonArray->id); echo "</pre>"; 	
*/
		$arrset1[] = $jsonArray->resortid;
		$sortedid = $jsonArray->resortid;
	    $rowhidden = $jsonArray->rowhidden;
		$pageid = $jsonArray->pagename ;
		$objectname = $jsonArray->objectname ;
		$inneritem = $jsonArray->inneritem ;
		$sizetype = $jsonArray->sizetype ;
		$csseffect = $jsonArray->csseffect ;
		$wscreensize = $jsonArray->wscreensize ;
		$screensize = $jsonArray->screensize ;
		$tabletsize = $jsonArray->tabletsize ;
		$mobsize = $jsonArray->mobsize ;
		$position = $jsonArray->position ;
		if($lock_on_save == "1"){
		$lockstatus = "locked";
		}else{
		$lockstatus = $jsonArray->lockstatus ;
		}

		$wpdb->update( 
				$table_name,
				array( 
					'rowhidden' => $rowhidden,
					'pagename' => $pageid,
					'objectname' => $objectname, 
					'inneritem' => $inneritem, 
					'sizetype' => $sizetype,
					'csseffect' => $csseffect, 
					'wscreensize' => $wscreensize,
					'screensize' => $screensize,  
					'tabletsize' => $tabletsize, 
					'mobsize' => $mobsize, 
					'position' => $position,
					'lockstatus' => $lockstatus, 
				), 
				array( 'id' => $sortedid)
			);
			
}
foreach($result as $row) {
		$arrset2[] = $row->id;
}
$addlist = array_diff($arrset1, $arrset2);
$deletelist = array_diff($arrset2, $arrset1);
/*print_r($deletelist);
echo "<pre>";  print_r($arrset1); echo "<pre>"; 
echo "<pre>";  print_r($arrset2); echo "<pre>";
print_r($addlist);
echo "<pre>";  print_r($_POST); echo "<pre> </br> </br>"; 

*/

foreach ($deletelist as $key => $delid) {
	$wpdb->delete(
	$table_name, 
	array( 
		'ID' => $delid 
		) 
	);

}

foreach ($addlist as $key => $add) {

		$jsoncontent = $_POST['fulldata'. $add];
		$jsonreplaed = str_replace("\\", "", $jsoncontent );
		$jsonreplaed2 = str_replace("'", '"', $jsonreplaed );
		//$obj = json_decode($jsonreplaed);


$jsonArray = json_decode($jsonreplaed2, false);

/*echo "<pre>";  print_r($jsonreplaed2); echo "</pre>"; 
	echo "<pre>";  print_r($jsonArray->id); echo "</pre>"; 	
*/

	   $rowhidden = $jsonArray->rowhidden;
		$pageid = $jsonArray->pagename ;
		$objectname = $jsonArray->objectname ;
		$inneritem = $jsonArray->inneritem ;
		$sizetype = $jsonArray->sizetype ;
		$csseffect = $jsonArray->csseffect ;
		$wscreensize = $jsonArray->wscreensize ;
		$screensize = $jsonArray->screensize ;
		$tabletsize = $jsonArray->tabletsize ;
		$mobsize = $jsonArray->mobsize ;
		$position = $jsonArray->position ;

		if($lock_on_save == "1"){
		$lockstatus = "locked";
		}else{
		$lockstatus = $jsonArray->lockstatus ;
		}

		$wpdb->insert( 
		$table_name, 
		array( 
					'rowhidden' => $rowhidden,
					'pagename' => $pageid,
					'objectname' => $objectname, 
					'inneritem' => $inneritem, 
					'sizetype' => $sizetype,
					'csseffect' => $csseffect, 
					'wscreensize' => $wscreensize,
					'screensize' => $screensize,  
					'tabletsize' => $tabletsize, 
					'mobsize' => $mobsize, 
					'position' => $position,
					'lockstatus' => $lockstatus, 
			) 
		);


}

if(isset($_POST['current_page']))
{
    wp_redirect($_POST['current_page']);
}
else
{
  wp_redirect(admin_url().'admin.php?page=javascript-stylesheet_submenu1');    

}



            } else {
                die('No messing please!');
            }

	}


}
