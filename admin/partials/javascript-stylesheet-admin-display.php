<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.js-ss.co.uk
 * @since      1.0.3
 *
 * @package    Javascript_Stylesheet
 * @subpackage Javascript_Stylesheet/admin/partials
 */

?>

<div class="pagetitles">
<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
<h3>Documentation</h3>
</div>
<div class="infobox wppostbox">
<h3>Javascript Stylesheet Documentation info</h3>
<p>Use this page as a quick reference to parts of the documentation. <b>However, to understand the plugin, better documentation and testing visit <a href="http://www.js-ss.co.uk/documentation/">Our Website</a></p>
</div>

<div id="accordionmain" class="accordioncss">

  <div class="group mainpageacord">
  <h3 class="hndle ui-sortable-handle titleheaders">Javascript Stylesheet Plugin</h3>                      
  <div class="tblcontainer maincont">
  <h1 class="maintitle">JS-SS Plugin</h1>
<div id="accordion1" class="accordioncss">

<!--- objectname -->
   <div class="wppostbox catagorybox"><h1>Column Catagories</h1></div>
   <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Sortable &#40;beta&#41;</h3>                 
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Sortable &#40;beta&#41;</h3>
  <p>&#39;Sortable &#40;beta&#41;&#39; allows you to move your rows arround. This was added in v1.2 and is currently in the beta stages it has been launched without being massivly tested, as it is such a useful tool. However, tests so far show it as working fine, please let us know if you have any issues.</p>

  
    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Visibility</h3>                      
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Visibility</h3>
  <p>This allows you to turn rows off and on when the eye shows without a strike through it. The row is active.</p>

    </div>
    </div>
    </div>

    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Object Name</h3>                  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Object Name</h3>
  <p>&#39;Object Name&#39; is generally written as a <b>Class</b>. However, there is one instance where object name is written as an ID - when working with images.
  </p>

  <!--- inneritem -->
    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Size To</h3>                 
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Size To</h3>
  <p>&#39;Size To&#39; is the item which you are scaling to. You will probably tend to scale most things to the size of the page body. However, sometimes you might decide you want to scale to a different item. The most useful times to use it are when you want to make one div the same size as another, or when scaling font - it can be easier to size your font giving you a bigger range between 1 and 2 percent as the object could be smaller than the body. <b>Size To must always be an ID</b>, it is <b>never</b> used as a Class.</p>

  
    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Size Type</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Size Type</h3>
  <p>&#39;Size Type&#39; controls the type of sizing you want to achieve. There are many options. Click on the one you want to learn more about.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">CSS Effects</h3>                  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Css Effects</h3>
  <p>There are many css effects you can use in a row, they tend to produce more than a one line of css styles and will normally be effecting multiple styles. To see the range of css effects scroll to the css effect section.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Item Sizing</h3>                  
    <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Item Sizing</h3>
  <p>All item sizes are written differently. To find how each different css effect sizing should be written, <b>please use the documentation on <a href="http://www.js-ss.co.uk/documentation/">Our Website</a></b></p>
  <p>In the bottom bar you will find 3 different icons. Tablet, Phone and Monitor. When clicked the item size column will change between each sizing.</p>
  <p>There is also the omit option which will make the row none visible. This is useful when different browser sizes need to use different rows.</p>
    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Position</h3>                  
    <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Position</h3>
  <p>&#39;Position&#39; is the same as position in css, it will change the position of the object. It saves you time on having to add the position of an object into your css file so you can simply select what type of positioning you need.</p>
  <p>&#39;-&#39; is your omit for positioning it will ignore this column</p>
  <p>&#39;A&#39; is your absolute positioning</p>
  <p>&#39;R&#39; is your relative positioning</p>
  <p>&#39;f&#39; is your fixed positioning</p>
  <p>&#39;i&#39; is your initial positioning</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Bin / Delete</h3>                  
    <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Bin / Delete</h3>
  <p>When the bin / delete button is pressed it will remove the row from the table. However, it wont be removed from the database untill you save the change.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Lock / unlock</h3>                  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Lock / unlock</h3>
  <p>For locking rows once you are happy with them stopping them from being edited by mistake.</p>

    </div>
    </div>
    </div>
    <div class="wppostbox catagorybox"><h1>Size Types</h1></div>

    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Width</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Width</h3>
  <p>When you want to scale something to the width of the page you select &#39;width&#39;. You can do things like scale the height or width of objects from the width, scale font, margin, padding etc.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Height</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Height</h3>
  <p>When you want to scale something to the Height of the page you select Height. You can do things like scale the width or height of objects from the height, scale font, margin, padding etc.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">X an Y</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>X an Y</h3>
  <p>Now we are getting a bit more interesting - &#39;x an y&#39; scales things to both the height and the width of your selected Size To element. &#39;x an y&#39; is the biggest improvement on the original javascript stylesheet, cutting down the amount of lines used as you can now scale for height and width in one line.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Off Center</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Off Center</h3>
  <p>&#39;off center&#39; allows you to center objects. But it also does a bit more than that - it will find where to center an object and then if you have provided off center figures it will then move them a percentage off the center. Giving a zeroed figure will align to the center.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Text Center</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Text Center</h3>
  <p>&#39;text center&#39; works very similar to &#39;off center&#39;. However, it is specifically created for text objects you see when a browser is re-sized.  Sometimes text fields will create more lines to fit the text in. This can off center a normal text box. So text center basically works with the new height of a text field once a new line has come and will recenter it for you.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Img Scale</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Img Scale</h3>
  <p>&#39;img scaling&#39; images have their own scaling option to make sure your images sizes beautifully instead of becoming stretched but will actually provide a height figure should you then want to use it as an item to be sized to in the Size To column for something like item locking (Change to locked for more info).</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Locked</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Locked</h3>
  <p>&#39;locked&#39;, or linked as it is sometimes called, is where you can lock one object to another. If you are familiar with Photoshop you will probably understand the use of linking layers - this is pretty much the same thing. It will move your object to be in the center or in an off-center position as (it also uses the off center method in the locked method). It will scale the object to scale with the item it is locked to. The best way to understand this is if you  lock a circle to the center of a square - as the square re-sizes the circle re-sizes with it although it always covers the same amount of surface area of the square in exactly the same place.</p>
    </div>
    </div>
    </div>

    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Response</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Response</h3>
  <p>&#39;response&#39;, This new feature allows you to responsivly change background color, visibility and display css settings. Most useful when you want something to display on a mobile but not on a computer moniter. </p>
    </div>
    </div>
    </div>



    <div class="wppostbox catagorybox"><h1>Css Effects</h1></div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Size</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Size</h3>
  <p>&#39;size&#39; is fairly self explanatory - it is a one-field size and will scale your object to the size percentage you give it, scaling to the size type you gave it, either height or width.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Padding4</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Padding4</h3>
  <p>&#39;padding4&#39; gives you the option to add padding to more than one side in one row. You provide 4 figures of sizing in a clockwise direction starting at Padding-Top - Top:Right:Bottom:Left.  If you put &#39;0&#39; then it won&#39;t add any padding to that side. Your padding will be scaled to the size type you have chosen (&#39;Width&#39;, &#39;Height&#39;, &#39;X an Y&#39;). If you chose &#39;X an Y&#39; it will scale the top and bottom to the height and the left and right to the width.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Margin4</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Margin4</h3>
  <p>&#39;margin4&#39; gives you the option to add margin to more than one side in one row. You provide 4 figures of sizing in a clockwise direction starting at margin-top - Top:Right:Bottom:Left. If you put &#39;0&#39; then it won&#39;t add any margin to that side. Your margin will be scaled to the size type you have chosen (&#39;Width,&#39; &#39;Height&#39;, &#39;X an Y&#39;). If you chose &#39;X an Y&#39; it will scale the top and bottom to the height and the left and right to the width.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Normal Css</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Normal Css</h3>
  <p>This is a field where you can add &#39;Normal css&#39; options such as font-size, padding-top, margin, bottom, left etc. They must be options which are scalable but can be any existing css options. (Don&#39;t write &#39;normal css&#39; as an option or it won&#39;t do anything).</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">X an Y</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>X an Y</h3>
  <p>&#39;x an y&#39; allows you to size both your width and height of an object. It will size them to whatever size type you gave it e.g if you gave it width as it&#39;s size type then it will size both your x and y to the width of your Size To selection. However, if your size type is &#39;X an Y&#39; then it will scale the height to the height and the width to the width. The item size field for &#39;x an y&#39; is written like Width:Height e.g. 100:20</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Vertical</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Vertical</h3>
  <p>&#39;vertical&#39; will align your object to the vertical center. If the size type is at 0 it will center and will off-center if you have given it an off-center figure. When off-centering you can use minuses to go left of the center and positive figures to go right of the center.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Horizontal</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Horizontal</h3>
  <p>&#39;horizontal&#39; will align your object to the horizontal center. If the size type is at 0 it will center and will off-center if you have given it an off-center figure. When off-centering you can use minuses to go above the center and positive figures to go below the center.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Image</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Image</h3>
  <p>&#39;image&#39; is for objects which are have img tags and a src image - it won&#39;t work for background images although there is an option for that. It will scale your image to the size you give it making sure the image doesn&#39;t get squashed or stretched but stays correct to it&#39;s original sizing.</p>
  
    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Background</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Background</h3>
  <p>&#39;background&#39; is for objects which have a background image but not objects that are img tags and src their image.(does this make senese?) However, there is an option for selecting an image instead of background. It will scale your object to the size you give it making sure the image doesn&#39;t get squashed or stretched but stays correct to it&#39;s original sizing.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">ilocked</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>ilocked</h3>
  <p>&#39;ilocked&#39; is for locking objects when both the object and the Size To element are both img tags. Locking an object will center it and scale it down accordingly to the object it is locked to. You provide it with off centering figures to set it&#39;s locked location. X:Y e.g. 0:0 to center 10:-10 off-center upwards and to the right.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">olocked</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>olocked</h3>
  <p>&#39;olocked&#39; is for locking objects when the object being locked is an img tag but the inner could be anything. With &#39;olocked&#39; you provide a width scale percentage for the image to be scaled down to. Locking an object will also center it. You provide it with three figures - first the scale then the off-centering figures to set it&#39;s locked location - Width:X:Y e.g. 10:0:0 to center with a width of 10% or 10:10:-10 off-centering it upwards and to the right.</p>

    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">dlocked</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>dlocked</h3>
  <p>&#39;dlocked&#39; is for locking objects when both the object and the Size To element are both div&#39;s or other tags. With &#39;dlocked&#39; you provide a width and a height scale percentage for the object to be scaled to. Locking an object will also center it. You provide it with four: figures first width, height and then the off-center figures to set it&#39;s locked location. - Width:Height:X:Y e.g. 10:10:0:0 to center with a width and height of 10% or 10:10:10:-10 off-centering it upwards and to the right.</p>
  <p>This is the fastest method for scaling an object&#39;s height and width and then center it or off-center it to another object or the body.</p>
  
    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Display</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Display</h3>
  <p>&#39;display&#39;, allows you to now put normal display css settings onto an element responcivly so you can change your display settings depending on the users device.</p>
  
    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Visibility</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>visibility</h3>
  <p>&#39;visibility&#39;, allows you to now put normal visibility css settings onto an element responcivly so you can change your visibility settings depending on the users device.</p>
  
    </div>
    </div>
    </div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">background-color</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>background-color</h3>
  <p>&#39;background-color&#39; allows you to now put normal background-color css settings onto an element responcivly so you can change your background-color settings depending on the users device.</p>
  
    </div>
    </div>
    </div>


    <div class="wppostbox catagorybox"><h1>Item Size</h1></div>
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Item Size</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Item Size</h3>
  <p>All item sizes are written differently. To find how each different css effect sizing should be written, <b>please use the documentation on <a href="http://www.js-ss.co.uk/documentation/">Our Website</a></b></p>
  <p>In the bottom bar you will find 3 different icons. Tablet, Phone and Monitor. When clicked the item size column will change between each sizing.</p>

    </div>
    </div>
    </div>

    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Omit</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Omit</h3>
  <p>&#39;omit&#39; is one of my favorate parts. It makes making responsive websites better by allowing you to ignore a js-ss row option on a certain broswer size.
  that means if you only want to scale something for a mobile but not for a tablet or computer you can.</p>

    </div>
    </div>
    </div>
  <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Sub</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Sub</h3>
  <p>&#39;sub&#39; works similar to omit. However, it is used when you have another row with css which will counteract the existing css in the row where sub is used. Omit would delete any settings that are related to the row for the object selected this enables you to do an omit but not delete realted settings.</p>

    </div>
    </div>
    </div>

    <div class="wppostbox catagorybox"><h1>Positioning</h1></div>

    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Position</h3>                  
  
  <div class="tblcontainer">
  <div class="docsinfopar">
  <h3>Position</h3>
  <p>&#39;Position&#39; is the same as position in css, it will change the position of the object. It saves you time on having to add the position of an object into your css file so you can simply select what type of positioning you need.</p>
  <p>&#39;-&#39; is your omit for positioning it will ignore this column</p>
  <p>&#39;A&#39; is your absolute positioning</p>
  <p>&#39;R&#39; is your relative positioning</p>
  <p>&#39;f&#39; is your fixed positioning</p>
  <p>&#39;i&#39; is your initial positioning</p>
</div>
</div>
</div>

</div> <!-- Accordion js-ss-->
</div>
</div> <!-- JS Stylesheet Main-->


  <div class="group mainpageacord">
  <h3 class="hndle ui-sortable-handle titleheaders">JSS Scrolling Plugin</h3>                      
  <div class="tblcontainer maincont">
  <h1 class="maintitle">JSS Scrolling Plugin</h1>
<div id="accordion2" class="accordioncss">

<!--- objectname -->
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Documentation Coming Soon.</h3>                      
  <div class="tblcontainer">
  <div class="docsinfopar">
  
  <p>Coming soon</p>

    </div>
    </div>
    </div>


</div> <!-- Accordion JSS scrolling-->
</div>
</div> <!-- JSS scrolling Main-->

  <div class="group mainpageacord">
  <h3 class="hndle ui-sortable-handle titleheaders">JSS Gallery Plugin</h3>                      
  <div class="tblcontainer maincont">
  <h1 class="maintitle">JSS Gallery Plugin</h1>
<div id="accordion3" class="accordioncss">

<!--- objectname -->
    <div class="group wppostbox">
    <h3 class="hndle ui-sortable-handle titleheaders">Documentation Coming Soon.</h3>                      
  <div class="tblcontainer">
  <div class="docsinfopar">
  
  <p>Coming soon</p>

    </div>
    </div>
    </div>


</div> <!-- Accordion JSS Gallery-->
</div>
</div> <!-- JSS Gallery Main-->


</div> <!-- Main page accordion -->


            <div class="bottombar">

            </div>




