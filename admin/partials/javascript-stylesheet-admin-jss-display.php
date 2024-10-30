<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.js-ss.co.uk
 * @since      1.1.0
 *
 * @package    Javascript_Stylesheet
 * @subpackage Javascript_Stylesheet/admin/partials
 */

global $wpdb;
global $rowcount;
$table_name = $wpdb->prefix . 'jsss_stylesheet';
$set_tbl_name = $wpdb->prefix . 'jsss_settings';
/* wpdb class should not be called directly.global $wpdb variable is an instantiation of the class already set up to talk to the WordPress database */ 

$result = $wpdb->get_results( "SELECT * FROM $table_name "); /*mulitple row results can be pulled from the database with get_results function and outputs an object which is stored in $result */

 $last = $wpdb->get_row("SHOW TABLE STATUS LIKE '$table_name'");
 $lastid = $last->Auto_increment;

$settings = $wpdb->get_results("SELECT * FROM $set_tbl_name WHERE id='1' ");



?>
<div class="pagetitles">
<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
<h3>Type : Sizing</h3>
</div>

<form method="post" name="add_admin_post_jss" action="<?php echo admin_url() . 'admin-post.php' ?>" class="pluginform">
<?php
add_action( 'admin_post_nopriv_add_admin_post_jss', 'prefix_admin_add_admin_post_jss' );

?>
<input type="hidden" name="action" value="add_admin_post_jss"/>
<div id="accordion" class="accordioncss">
<?php
$results = $wpdb->get_results("SELECT DISTINCT pagename FROM $table_name ORDER BY pagename DESC");
/*print_r($results);*/

$pagetitlelist = [];

$args = array(
    'post_type' => 'page',
);



$page_list = get_pages( $args );
//$page_list2 = wp_list_pages( $args ); returns list of pages as links
foreach($page_list as $singlepage)
 {
$pagetitlelist[] = $singlepage->post_title;

 }

//$results = $wpdb->get_results("SELECT * FROM wp_revsize WHERE pagename='".$getpageid."' ");
foreach($results as $rows)
 {
$resultns = $wpdb->get_results("SELECT * FROM $table_name WHERE pagename='".$rows->pagename."' ");
$pagetitle = get_the_title($rows->pagename);
?>


  <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders" data-titlehead="<?php print('pageid'.$rows->pagename)?>"><?php print($pagetitle)?>&#58;<span class="accordarrow">&#9666;</span></h3>                  
  <div>
<input type="hidden" name="hiddentitle" value="<?php print($pagetitle)?>" />
<div class="tblcontainer">
    <p class="pagetitleedit">Page&#58;<span class="pagetitlee" data-titlen="<?php print('pageid'.$rows->pagename)?>"><?php print($pagetitle)?></span>
    <select name="newnames" class="hiddennames" data-titlelist="<?php print('pageid'.$rows->pagename)?>">
    <?php 
      foreach($pagetitlelist as $singlepaget){
        $pagelists = get_page_by_title($singlepaget);
        $pageids =  $pagelists->ID;
    ?>
      <option value="<?php print($pageids)?>"><?php print($singlepaget)?></option>
    <?php
      } 
    ?>
    </select> 
    <span class="genericon genericon-edit" onclick="edittitle(this)" data-titleedit="<?php print('pageid'.$rows->pagename)?>"></span>
</p>
 <table id="revsizetbl">

      <tr class="ui-state-disabled">
        <td class="smallcolumn">
        <div class="menu-symbol">
          <p>&#8645;</p>
          </div>
        </td>
        <td class="smallcolumn">
          <h3>Visible</h3>
        </td>
        <td class="medcolumn">
          <h3>Object Name</h3>
        </td>
        <td class="medcolumn">
          <h3>Size To</h3>
        </td>
        <td class="medcolumn">
          <h3>Size Type</h3>
        </td>
        <td class="medcolumn">
          <h3>CSS Effect</h3>
        </td>
        <td class="medcolumn">
          <h3>Size &#37; <span class="screensize genericon genericon-maximize"></span></h3>
        </td>
        <td class="medcolumn">
          <h3>Position</span></h3>
        </td>
        <td class="smallcolumn">          
            <span class="genericon genericon-checkmark"></span>
        </td>
        <td class="smallcolumn">
            <span class="genericon genericon-trash"></span>  
        </td>
        <td class="smallcolumn">
        <div class="menuitem">
            <span class="genericon genericon-key menuitem"></span>
            <span class="menuitem">&#8260;</span>
            <span class="genericon genericon-lock menuitem"></span>
        </div>
        </td>

      </tr>
<tbody id="<?php print('pageid'.$rows->pagename)?>" data-tbodylist="<?php print('pageid'.$rows->pagename)?>">

<?php
$rowcount = array();
foreach($resultns as $row)
 {


array_push($rowcount,$row->id);

 
 /* Print the contents of $result looping through each row returned in the result */
if($row->lockstatus == 'locked'){
$lockstatus = $row->lockstatus;
}else{
$lockstatus = '';
}


?>

      <tr id="<?php print('trow'.$row->id)?>" data-tablerow="<?php print('row'.$row->id)?>">
          <td><span class="genericon genericon-menu ui-row-handle"></span></td>
          <td>

            <?php 
            if($row->rowhidden == '0'){
            ?>
                <span class="genericon genericon-hide" data-btnhrow="<?php print('row'.$row->id)?>" onclick="hiddenshow(this)"></span>
            <?php
              }else{
            ?>
                <span class="genericon genericon-show eyevisable" data-btnhrow="<?php print('row'.$row->id)?>" onclick="hiddenshow(this)"></span>
            <?php    } ?>

          </td> 
          <td>
            <p id="<?php print('a'.$row->id)?>" class="tblelement <?php print($lockstatus) ?>" data-row="<?php print('row'.$row->id)?>" onclick="change(this)"><?php print($row->objectname) ?></p>
          <input type="hidden" name="identityarray[<?php print($row->id)?>]" value="<?php print($row->id)?>">
          </td>
          <td>
            <p id="<?php print('b'.$row->id)?>" class="tblelement <?php print($lockstatus) ?>" data-row="<?php print('row'.$row->id)?>" onclick="change(this)"><?php print($row->inneritem) ?></p>
          </td>
          <td>
            <p id="<?php print('c'.$row->id)?>" class="tblelement <?php print($lockstatus) ?>" data-row="<?php print('row'.$row->id)?>" onclick="change(this)"><?php print($row->sizetype) ?></p>
          </td>
          <td>
            <p id="<?php print('d'.$row->id)?>" class="tblelement <?php print($lockstatus) ?>" data-row="<?php print('row'.$row->id)?>" onclick="change(this)"><?php print($row->csseffect) ?></p>
          </td>
          <td>
            <p id="<?php print('e'.$row->id)?>" class="tblelement <?php print($lockstatus) ?>" data-row="<?php print('row'.$row->id)?>" data-sizefield="<?php print($row->id)?>" onclick="change(this)"><?php print($row->screensize) ?></p>

          </td>
          <td>
            <p id="<?php print('j'.$row->id)?>" class="tblelement <?php print($lockstatus) ?>" data-row="<?php print('row'.$row->id)?>" onclick="change(this)"><?php print($row->position) ?></p>

          </td>
          <td>          
            <span class="genericon genericon-checkmark editoff" data-editrow="<?php print('row'.$row->id)?>" data-row="<?php print('row'.$row->id)?>" onclick="rowrevert()"></span>
          </td>
          <td>
            <span class="genericon genericon-trash <?php print('bin'.$row->lockstatus) ?>" data-binbtnrow="<?php print('row'.$row->id)?>" onclick="deleterow(this)"></span>
          </td>   
          <td>

            <?php 
            if($row->lockstatus == 'locked'){
            ?>
                <span class="genericon genericon-lock <?php print($row->lockstatus) ?>" data-btnrow="<?php print('row'.$row->id)?>" onclick="lockunlock(this)"></span>
            <?php
              }else{
            ?>
                <span class="genericon genericon-key <?php print($row->lockstatus) ?>" data-btnrow="<?php print('row'.$row->id)?>" onclick="lockunlock(this)"></span>
            <?php    } ?>
            <input id="<?php print('fullrow'.$row->id)?>" type="hidden" name="<?php print('fulldata'.$row->id)?>" data-screensize="<?php print('e'.$row->id)?>" data-pageid="<?php print('pageid'.$rows->pagename)?>" data-fulldata="<?php print('fulldata'.$row->id)?>" class="hiddenfield data-store" data-rowinput="<?php print('row'.$row->id)?>" value='{"id":"<?php print($row->id) ?>","rowhidden": "<?php print($row->rowhidden) ?>","pagename": "<?php print($row->pagename) ?>","objectname": "<?php print($row->objectname) ?>", "inneritem":"<?php print($row->inneritem) ?>", "sizetype": "<?php print($row->sizetype) ?>", "csseffect" : "<?php print($row->csseffect) ?>", "wscreensize" : "<?php print($row->wscreensize) ?>", "screensize" : "<?php print($row->screensize) ?>", "tabletsize" : "<?php print($row->tabletsize) ?>", "mobsize": "<?php print($row->mobsize) ?>","position": "<?php print($row->position) ?>","lockstatus": "<?php print($row->lockstatus) ?>","resortid": "<?php print($row->id) ?>"}' />
            </td>   
        
      </tr>

  <?php 

  } //end data loop

  ?>
</tbody>
  </table>


</div>
    </div>
  </div>

<?php
}
  wp_nonce_field('add_admin_post_jss', 'add_admin_post_nonce');

?>


</div>
<?php
  foreach($settings as $set)
 {
 $svghtml = $set->svghtml;
 $svghtml2 = str_replace("\\", "", $svghtml );
 $htmlclean = str_replace("'", '"', $svghtml2 );


?>

<div id="helperdiv" class="helperdiv <?php print('helperonoff'.$set->helperonoff) ?>">
  <div id="helper-handle" class="helper-handle noselect"><p><span class="helper-quest">&#63;</span><span class="genericon genericon-close helper-icons" onclick="helper_settings(1)"></span><span class="genericon genericon-minimize helper-icons" onclick="helper_settings(2)"></span><span class="genericon genericon-ellipsis helper-move"></span></p></div>
  <div id="helper-data" class="helper-data"><p></br>New info box coming in v1.2 with new ease of use options and tutorials</br></br>Check out the new sorting (Beta)</br></br><b>&#39;Inner Item&#39;</b> renamed to </br><b>&#39;Size To&#39;</b></br></br>Info box can be crossed off or turned on and off in JSS settings, or you can minimise it and move it to where you like.</br></br> New <b>&#39;response&#39;</b> size type for display, visibility and background-color css settings working responsivly </br></br> Also an omit alternative called sub check documentation for more on what these do and how they work.</p>
  </div>
</div>


            <div class="bottombar">
            <div class="responcivebar">
              <span class="button button-primary genericon genericon-phone" onclick="activemob()"></span>
              <span class="button button-primary genericon genericon-tablet" onclick="activetablet()"></span>
              <span class="button button-primary genericon genericon-maximize" onclick="activefull()"></span>
              <span class="button button-primary genericon genericon-fullscreen" onclick="activewide()"></span>
            </div>
            <div id="accordion1">
              <div class="group wpgreypostbox">
                  <h3 class="hndle ui-sortable-handle settingheader">JSS Settings&#58;<span class="settingsarrow">&#9666;</span></h3>                  
              <div>
              <!--##############################-->
             
              <div class="tblcontainer settingscont">  
              <table class="settingstbl"><tr>
                <tr>
                  <td class="textcolumn">
                    <h3>Responsive Settings&#58;</h3>
                  </td>
                  <td class="inputcolumn"></td> <!--empty -->
                  <td class="textcolumn">
                    <h3>Grid Settings&#58;</h3>
                  </td>
                  <td class="inputcolumn"></td> <!--empty -->
                  <td class="textcolumn">
                    <h3>Page Load Setting&#58;</h3>
                  </td>
                  <td class="inputcolumn"></td> <!--empty -->
                  <td class="helpercolumn helperstyle">
                    <h3>Helper <span class="genericon genericon-help"></span></h3>
                  </td>
                  <td class="inputcolumn"></td> <!--empty -->
                </tr>
                <tr>
                  <td>
                    <p>Mobile</p>
                  </td>
                  <td class="inputcolumn">
                    <button id="mobactive" type="button" class="mobactive checkbox" data-checked="<?php print($set->mobactive) ?>" onclick="setchange(this)"> </button>
                  </td>
                  <td>
                    <p>Grid Type</p>
                  </td>
                  <td class="inputcolumn">
                    <select name="gridtype" disabled>
                        <option value="1">Masonry</option> 
                        <option value="2">Block</option>
                    </select>
                  </td>
                  <td>
                    <p>Screen Loader</p>
                  </td>
                  <td class="inputcolumn">
                    <button id="loaderstatus" type="button" class="loaderstatus checkbox" data-checked="<?php print($set->loaderstatus) ?>" onclick="setchange(this)"> </button>
                  </td>
                  <td rowspan="4" class="helperstyle"><p>On hover helper coming in next update, along with grid system settings and svg page loader.</p></td>
                </tr>
                <tr>
                  <td>
                    <p>Tablet</p>
                  </td>
                  <td class="inputcolumn">
                    <button id="tabletactive" type="button" class="tabletactive checkbox" data-checked="<?php print($set->tabletactive) ?>" onclick="setchange(this)"> </button>
                  </td>
                  <td>
                    <h3>Other&#58;</h3>
                  </td>
                  <td></td> <!--empty -->
                  <td>
                    <p>Loader Type</p>
                  </td>
                  <td>
                    <select name="loadtype" disabled>
                        <option value="1">GIF</option> 
                        <option value="2">SVG</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p>Monitor</p>
                  </td>
                  <td class="inputcolumn">
                    <button id="monitoractive" type="button" class="monitoractive checkbox" data-checked="<?php print($set->monitoractive) ?>" onclick="setchange(this)"> </button>
                  </td> 
                  <td>
                    <p>Lock On Save</p>
                  </td>
                  <td class="inputcolumn">
                    <button id="lockonsave" type="button" class="lockonsave checkbox" data-checked="<?php print($set->lockonsave) ?>" onclick="setchange(this)"> </button>
                  </td>
                  <td>
                    <p>Delay Timer</p>
                  </td>
                  <td><input type="text" id="loadtimer" name="loadtimer" maxlength="6" value="<?php print($set->loadtimer) ?>"></td> <!--empty -->
                </tr>
                <tr>
                  <td>
                    <p>Wide Screen</p>
                  </td>
                  <td class="inputcolumn">
                    <button id="wideactive" type="button" class="wideactive checkbox" data-checked="<?php print($set->wideactive) ?>" onclick="setchange(this)"> </button>
                  </td>
                  <td>
                    <p>Info Box</p>
                  </td>
                  <td class="inputcolumn">
                    <button id="helperonoff" type="button" class="helperonoff checkbox" data-checked="<?php print($set->helperonoff) ?>" onclick="setchange(this)"> </button>
                  </td>
                  <td>
                    <p></p>
                  </td>
                  <td></td> <!--empty -->
                </tr>
                </table>
                <table class="settingstbl">
                <tr class="loadcode">
                  <td>
                    <h3>Additional Loader Settings</h3>
                  </td>
                </tr>
                <tr class="loadcode">
                  <td>
                    <p>Background Colour</p>
                  </td>
                  <td>
                    <input id="bgcolour" name="bgcolour" type="text"  value="<?php print($set->bgcolour) ?>" class="color-picker" >
                  </td>
                  <td>
                    <p>Gif Upload <button type="button" class="button-primary" onclick="imageuploader()">Upload</button></p>
                  </td>
                  <td>
                    <p id="gifurltxt" class="gifurltxt"><?php print($set->gifurl) ?></p>
                  </td> <!--empty -->
                </tr>
              </table>
              <div id="svgloadcode" class="svgloadcode">
              <h3>Html Loader Editor</h3>
              <textarea id="svghtml" name="svghtml" type="textbox" ><?php print($htmlclean) ?></textarea>
              <h3>CSS Loader Editor</h3>
              <textarea id="svgcss" name="svgcss" type="textbox" ><?php print($set->svgcss) ?></textarea>
              
              </div>



              <input id="settingdata" type="hidden" name="settingdata" class="hiddenfield" value='{"id":"<?php print($set->id) ?>","mobactive":"<?php print($set->mobactive) ?>","tabletactive":"<?php print($set->tabletactive) ?>","monitoractive":"<?php print($set->monitoractive) ?>","wideactive":"<?php print($set->wideactive) ?>","lockonsave":"<?php print($set->lockonsave) ?>","gridsystem":"<?php print($set->gridsystem) ?>","loaderstatus":"<?php print($set->loaderstatus) ?>","animationtype":"<?php print($set->animationtype) ?>","animationspeed":"<?php print($set->animationspeed) ?>","animationclass":"<?php print($set->animationclass) ?>","loadertype":"<?php print($set->loadertype) ?>","gifurl":"<?php print($set->gifurl) ?>","helperonoff":"<?php print($set->helperonoff) ?>"}'/>
              <input type="submit" class="button button-primary settingsbutton" value="Save Settings" name="add_admin_post_jss_submit" id="add_admin_post_jss_set" />
              
              </div>
              
              <!--##############################-->
              </div>
              </div>
            </div>


            <table class="addrowtbl">
            <tr>
              <td colspan="4">
                  <h3>Add Rows</h3>
              </td>
            </tr>
            <tr>
              <td>
                  <h2>Name Of Page&#58;</h2>
              </td>
              <td>
                  <select name="pagenames">
                      <?php 
                        foreach($pagetitlelist as $singlepaget){
                      ?>
                            <option value="<?php print($singlepaget)?>"><?php print($singlepaget)?></option>
                      <?php
                        } 
                      ?>
                  </select> 
              </td>
              <td>
                  <h2>Number Of Rows&#58;</h2>
              </td>
              <td>
                  <select name="addrowval">
                      <option value="1">1</option> 
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                  </select> 

                 <!-- <p id="addrowsnumber" class="tblelement" data-row="addrowsnumber" onclick="change(this)">1</p>
                  <input type="hidden" name="addrowval" class="hiddenfield addrowsnumber" data-rowinput="addrowsnumber" value="1" />
            -->  </td><!--TYPE="number" -->
              <td>
                 <!-- <span class="genericon genericon-checkmark editoff" data-editrow="addrowsnumber" onclick="revert(this)"></span>-->
              </td>
              <td> 
                  <input type="submit" class="button button-primary" value="Add row" name="add_admin_post_jss_submit" id="add_admin_post_jss_add" />
              </td>
              <td>
                <input type="submit" class="button button-primary fixedsave" value="Save all changes" name="add_admin_post_jss_submit" id="add_admin_post_jss_submit"/>

              </td>
            </tr>
            </table>
            </div>
<?php
}
?>


</form>
