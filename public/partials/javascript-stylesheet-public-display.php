<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       www.js-ss.co.uk
 * @since      1.1.1
 *
 * @package    Javascript_Stylesheet
 * @subpackage Javascript_Stylesheet/public/partials
 */

global $wpdb;

//$result = $wpdb->get_results( "SELECT * FROM wp_revsize "); /*mulitple row results can be pulled from the database with get_results function and outputs an object which is stored in $result */
global $post;
$postID = $post->ID;
$getpageid = get_the_ID();
$table_name = $wpdb->prefix . 'jsss_stylesheet';
$set_tbl_name = $wpdb->prefix . 'jsss_settings';

$results = $wpdb->get_results("SELECT * FROM $table_name WHERE pagename='".$getpageid."' AND rowhidden='1' ");
$settings = $wpdb->get_results("SELECT * FROM $set_tbl_name WHERE id='1'");

$set_loader = $settings["0"]->loaderstatus;



$check_array = [
    "1111" => array("1" => "1", "2" => "2", "3" => "3", "4" => "4"),
    "1110" => array("1" => "1", "2" => "2", "3" => "3", "4" => "3"),
    "1101" => array("1" => "1", "2" => "2", "3" => "4", "4" => "4"),
    "1011" => array("1" => "1", "2" => "3", "3" => "3", "4" => "4"),
    "0111" => array("1" => "2", "2" => "2", "3" => "3", "4" => "4"),
    "1100" => array("1" => "1", "2" => "2", "3" => "2", "4" => "2"),
    "1010" => array("1" => "1", "2" => "3", "3" => "3", "4" => "3"),
    "1001" => array("1" => "1", "2" => "4", "3" => "4", "4" => "4"),
    "0110" => array("1" => "2", "2" => "2", "3" => "3", "4" => "3"),
    "0101" => array("1" => "2", "2" => "2", "3" => "4", "4" => "4"),
    "0011" => array("1" => "3", "2" => "3", "3" => "3", "4" => "4"),
    "1000" => array("1" => "1", "2" => "1", "3" => "1", "4" => "1"),
    "0100" => array("1" => "2", "2" => "2", "3" => "2", "4" => "2"),
    "0010" => array("1" => "3", "2" => "3", "3" => "3", "4" => "3"),
    "0001" => array("1" => "4", "2" => "4", "3" => "4", "4" => "4"),
    "0000" => array("1" => "0", "2" => "0", "3" => "0", "4" => "0")
];
/*echo "<pre>";  print_r($check_array); echo "</pre>"; 
*/
$mob_active = $settings["0"]->mobactive; //  equals 1 or 0
$tab_active = $settings["0"]->tabletactive; //  equals 1 or 0
$scrn_active = $settings["0"]->monitoractive; //  equals 1 or 0
$wide_active = $settings["0"]->wideactive; //  equals 1 or 0


$active_num = $mob_active . $tab_active . $scrn_active . $wide_active; // e.g. 1111

$display_array = $check_array[$active_num]; // e.g. 1 = 1, 2 = 2, 3 = 3, 4 = 4
$loader_settings = [
  "loadertype" => $settings["0"]->loadertype,
  "loadertimer" => $settings["0"]->loadtimer,
  "svghtml" => $settings["0"]->svghtml,
  "svgcss" => $settings["0"]->svgcss,
  "animclass" => $settings["0"]->animationclass,
  "animspeed" => $settings["0"]->animationspeed,
  "animtype" => $settings["0"]->animationtype
  ];



if (count($results)> 0){
    if ( is_page($getpageid) ){
          
?>
<meta name="viewport" content="width=device-width, height=device-height,initial-scale=1., maximum-scale=1.0, user-scalable=0">

<script type="text/javascript"> 
jQuery(function ($) { 
$(document).ready(function() {
    $(window).load(function() {





var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;

var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
var display_array = <?php echo json_encode($display_array) ?>;
var loader_array = <?php echo json_encode($loader_settings) ?>;

var objarray = 
[

<?php
foreach( $results as $key => $row ) {
?>
          {objectname: "<?php print($row->objectname) ?>", inneritem:"<?php print($row->inneritem) ?>", sizetype: "<?php print($row->sizetype) ?>", csseffect : "<?php print($row->csseffect) ?>", wscreensize : "<?php print($row->wscreensize) ?>", screensize : "<?php print($row->screensize) ?>", tabletsize : "<?php print($row->tabletsize) ?>", mobsize : "<?php print($row->mobsize) ?>", position : "<?php print($row->position) ?>"},
<?php
}
?>
]




jsssrefresh();

$(window).resize(function(){
jsssrefresh();
}); 

/*
$(window).scroll(function(event){
jsssrefresh();
});
*/
setTimeout(function () {
  jsssrefresh();
}, 1);
setTimeout(function () {
  jsssrefresh();
}, 2);

function jsssrefresh(){
         var w = $(window).width();
         var h = $(window).height();
    /*var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;

var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;
*/
js_stylesheet(w, h, objarray,display_array,loader_array,<?php print($set_loader) ?>);

}



    });//loaded
});//ready

});
</script>
<?php
}
 $svghtml = $settings["0"]->svghtml;
 $svghtml2 = str_replace("\\", "", $svghtml );
 $htmlclean = str_replace("'", '"', $svghtml2 );
 $svgcss = $settings["0"]->svgcss;
 $svgcss2 = str_replace("\\", "", $svgcss );
 $cssclean = str_replace("'", '"', $svgcss2 );
if($set_loader == '1'){
if($settings["0"]->loadertype == 'gif'){
?>
<div id="jss_pageloader" style="background-color:<?php print($settings['0']->bgcolour); ?> ;">
<div id="gifdiv" class="gifdiv"><img src="<?php print($settings['0']->gifurl); ?>" /></div>

</div>
<?php
}else{
?>


<div id="jss_pageloader">
  <?php 
    print($htmlclean);
  ?>
  <style type="text/css">
  <?php
    print($svgcss);
  ?>
  </style>

</div>
<?php
}
}




}else{
    ?>
<!--<h1>This is not a plugin page</h1>-->
    <?php
}
?>
