(function( $ ) {
  'use strict';
window.js_stylesheet=js_stylesheet;  

function js_stylesheet(pagewidth, pageheight, objarray, $display_array,$loader_array, pageloader){
  var $omitarray = [];

 $omitarray = {
      'x an y':[{'margin4':['margin-top','margin-right','margin-bottom','margin-left'],'padding4':['padding-top','padding-right','padding-bottom','padding-left'],'size':['height','width']}],
      'width':[{'margin4':['margin-top','margin-right','margin-bottom','margin-left'],'padding4':['padding-top','padding-right','padding-bottom','padding-left'],'size':['width']}],
      'height':[{'margin4':['margin-top','margin-right','margin-bottom','margin-left'],'padding4':['padding-top','padding-right','padding-bottom','padding-left'],'size':['height']}],
      'off center':[{'x an y':['margin-top','margin-left'],'vertical':['margin-top'],'horizontal':['margin-left']}],
      'text center':[{'x an y':['margin-top','margin-left'],'vertical':['margin-top'],'horizontal':['margin-left']}],
      'img scale':[{'image':['height','width'],'background':['height','width']}],
      'locked':[{'ilocked':['margin-top','margin-left'],'olocked':['height','width','margin-top','margin-left'],'dlocked':['height','width','margin-top','margin-left']}],
      'response':[{'display':['display'],'visibility':['visibility']}],
      };
  
  var effectarray = [
                    'width',
                    'height',
                    'max-height',
                    'max-width',
                    'min-height',
                    'min-width',
                    'padding',
                    'padding-top',
                    'padding-left',
                    'padding-right',
                    'padding-bottom',
                    'margin',
                    'margin-top',
                    'margin-left',
                    'margin-right',
                    'margin-bottom',
                    'font-size',
                    'border'
                    ];
    var $checker1 = $display_array[1];
    var $checker2 = $display_array[2];
    var $checker3 = $display_array[3];
    var $checker4 = $display_array[4];

    jQuery.each( objarray, function( i, val ) {
    var stylesheet = val;
    var $responsive_size, // responsive size changes depending on which size of browser is used
      $ef_width, // effect width (body or inner)
      $ef_height; // effect height (body or inner)

    var $sizeing_array = [];
    $sizeing_array[0] = "0";
    $sizeing_array[1] = stylesheet.mobsize;
    $sizeing_array[2] = stylesheet.tabletsize;
    $sizeing_array[3] = stylesheet.screensize;
    $sizeing_array[4] = stylesheet.wscreensize;



    if (pagewidth < 756) {
      $responsive_size = $sizeing_array[$checker1];

    };

    if (pagewidth > 756 && pagewidth < 1024) {
      $responsive_size = $sizeing_array[$checker2];
    };

    if (pagewidth > 1024 && pagewidth < 1600) {
      $responsive_size = $sizeing_array[$checker3];
    };

    if (pagewidth > 1700) {
      $responsive_size = $sizeing_array[$checker4];
    };

    var $object_name = stylesheet.objectname,
      $name_as_class = "." + stylesheet.objectname,
      $name_as_id = "#" + stylesheet.objectname,
      $inner_item = stylesheet.inneritem,
      $inner_as_class = "." + stylesheet.inneritem,
      $inner_as_id = "#" + stylesheet.inneritem,
      $size_type = stylesheet.sizetype,
      $css_effect = stylesheet.csseffect,
      $position_handler = stylesheet.position,
      $elm_width = $($name_as_class).width(),
      $elm_height = $($name_as_class).height(),
      $inner_w_margin,
      $inner_h_margin,
      $parent_id = $($name_as_class).parent().attr('id');
        


        // taking a full width including margin away from a width without margin gives the margin size of an element. 
        $inner_w_margin = $($inner_as_id).outerWidth(true) - $($inner_as_id).outerWidth();
        $inner_h_margin = $($inner_as_id).outerHeight(true) - $($inner_as_id).outerHeight(); 
              


        
    if($position_handler == "a"){
        var positiontype = "absolute";
        $($name_as_class).css("position", positiontype);
    }
    if($position_handler == "f"){
        var positiontype = "fixed";
        $($name_as_class).css("position", positiontype);
    }
    if($position_handler == "i"){
        var positiontype = "initial";
        $($name_as_class).css("position", positiontype);
    }
    if($position_handler == "r"){
        var positiontype = "relative";
        $($name_as_class).css("position", positiontype);
    }

    if($responsive_size == "sub"){
      return;
    }

    if($responsive_size == "omit"){
      if($size_type == "response"){
          $($name_as_class).css($css_effect, "");
          var omit_object = $($name_as_class).prop('style');
          omit_object.removeProperty($css_effect);
          return;
      }else{
         if( in_array($css_effect, effectarray, false) == true){ // check if sizing is existing css option
          
          $($name_as_class).css($css_effect, "0");
        }else{

      var $omitvalues = $omitarray[$size_type][0][$css_effect];
      var omit_object = $($name_as_class).prop('style');
      jQuery.each( $omitvalues, function( i, val ) {
          $($name_as_class).css(val, "");
          omit_object.removeProperty(val);
         
      });
      // console.log($omitarray[$size_type][0][$css_effect]);
      return; // if item has omit sizing the loop will be ended fast and move onto looping other items.
      }
      }
    }else{ // start of else if omit isn't present and a figure is in place

      if($inner_item == "body"){ //get body width and height and call function

        $ef_width = pagewidth;
        $ef_height = pageheight;
        size_all($ef_width, $ef_height);

      }else{ //get inner item width and height and call function


        $ef_width = $($inner_as_id).width();
        $ef_height = $($inner_as_id).height();
        size_all($ef_width, $ef_height);

      };

    }; // end of else for valid none omit responsive size

    function size_all($ef_width, $ef_height){ //using this function means it doesn't need to have multiple if's of the same thing

      if($size_type == "x an y"){ // sizes for both width and height collecting to figures seperated by ':'
        var $type = "both";
        var $splitstr = $.map( $responsive_size.split(':'), Number );

        if($css_effect == "margin4"){ // sizes all 4 margins to both x and y ###############
          var $existing_css = "margin";
          four_option_css($ef_width, $ef_height, $existing_css, $type);
        }

        if($css_effect == "padding4"){ // sizes all 4 padding to both x and y ###############
          var $existing_css = "padding";
          four_option_css($ef_width, $ef_height, $existing_css, $type); 
        }

        if($css_effect == "size"){
          
          var width_size = quick_size($ef_width, $splitstr[0], 1); // gets pixel size for width
          var height_size = quick_size($ef_height, $splitstr[1], 1); // gets pixel size for height
          
          $($name_as_class).css("width", width_size);
          $($name_as_class).css("height", height_size);
        }
      };

      if($size_type == "width"){ // sizes using width as main rule

        if( in_array($css_effect, effectarray, false) == true){ // check if sizing is existing css option
          var css_output = quick_size($ef_width, $responsive_size, 1);
          $($name_as_class).css($css_effect, css_output);
        }

        if($css_effect == "size"){
          var width_size = quick_size($ef_width, $responsive_size, 1);
          $($name_as_class).css($size_type, width_size);
        }

        if($css_effect == "margin4"){ // sizes all 4 margins to the width
          var $existing_css = "margin";
          four_option_css($ef_width, $ef_height, $existing_css, $ef_width);
        }

        if($css_effect == "padding4"){ // sizes all 4 padding to the width
          var $existing_css = "padding";
          four_option_css($ef_width, $ef_height, $existing_css, $ef_width); 
        }

      };

      if($size_type == "height"){ // sizes using width as main rule

        if( in_array($css_effect, effectarray, false) == true){ // check if sizing is existing css option
          var css_output = quick_size($ef_height, $responsive_size, 1);
          $($name_as_class).css($css_effect, css_output);

        };

        if($css_effect == "size"){
          var height_size = quick_size($ef_height, $responsive_size, 1); // gets pixel size for height          
          $($name_as_class).css($size_type, height_size);
        }

        if($css_effect == "margin4"){ // sizes all 4 margins to the height
          var $existing_css = "margin";
          four_option_css($ef_width, $ef_height, $existing_css, $ef_height);
        }

        if($css_effect == "padding4"){ // sizes all 4 padding to the height
          var $existing_css = "padding";
          four_option_css($ef_width, $ef_height, $existing_css, $ef_height);  
        }


      };

      if($size_type == "off center"){ // sizes using width as main rule
        var $splitstr = $.map( $responsive_size.split(':'), Number );

        if($css_effect == "x an y"){
                  project_margins($splitstr[0], $splitstr[1], $elm_width, $elm_height,$name_as_class);        
        }

        if($css_effect == "vertical"){
                  var offset_t_margin = offset_margin($inner_h_margin, $ef_height, $elm_height, $responsive_size, 1);
                  $($name_as_class).css("margin-top", offset_t_margin);         
        }

        if($css_effect == "horizontal"){
          var offset_l_margin = offset_margin($inner_w_margin, $ef_width, $elm_width, $responsive_size, 1);
          $($name_as_class).css("margin-left", offset_l_margin);
          
        }   
      };

      if($size_type == "text center"){ // sizes using width as main rule
        var $splitstr = $.map( $responsive_size.split(':'), Number );
        var $font_size = text_center($splitstr[0], $splitstr[1]);
        if($css_effect == "x an y"){
          project_margins($splitstr[0], $splitstr[1], $font_size[0], $font_size[1], $name_as_id);
        
        }

        if($css_effect == "vertical"){
                  var offset_t_margin = offset_margin($inner_h_margin, $ef_height, $font_size[1], $responsive_size, 1);
                  $($name_as_id).css("margin-top", offset_t_margin);          
        
        }

        if($css_effect == "horizontal"){
          var offset_l_margin = offset_margin($inner_w_margin, $ef_width, $font_size[0], $responsive_size, 1);
          $($name_as_id).css("margin-left", offset_l_margin);
          
        }   
      };
      if($size_type == "img scale"){ // sizes using width as main rule
  
        if($css_effect == "image"){ 
                  $img_original = load_img_size($name_as_class); //$img_original[0] = width
          
          image_scale($img_original[0],  $img_original[1]);

        }

        if($css_effect == "background"){
                  $img_original = load_bg_size($name_as_class); //$img_original[0] = width
 
          image_scale($img_original[0],  $img_original[1]);
        }

      };

      if($size_type == "locked"){ // sizes using width as main rule   //
        var $splitstr = $.map( $responsive_size.split(':'), Number );

        if($css_effect == "ilocked"){
          var $cont_original = load_img_size($inner_as_id); //$img_original[0] = width
          var $img_original = load_img_size($name_as_class);
          
          var $object_new_w = scale_to_container($cont_original[1], $ef_height, $img_original[0], 2);
          var $object_new_h = scale_to_container($img_original[0], $object_new_w[0], $img_original[1], 2);
          
          
          $($name_as_class).css("width", $object_new_w[1]);
          $($name_as_class).css("height", $object_new_h[1]);
          
          // $elm_width_m, $elm_height_m may need changing if the sizing is changed in another part of this if
          project_margins($splitstr[0], $splitstr[1], $object_new_w[0], $object_new_h[0], $name_as_class);      
        }

        if($css_effect == "olocked"){ // requires 3 parameters 0:1:2 (0 = width percentage)(1 = x off center)(2 = y off center)
          var $img_original = load_img_size($name_as_class); //$img_original[0] = width
           
          var $object_new_w = $ef_width / 100 * $splitstr[2]; //$splitstr[2] = Percentage scale of after the offcenter figures
          var $object_new_h = scale_to_container($img_original[0], $object_new_w, $img_original[1], 2);
          
          $object_new_w = $object_new_w + "px";
          $($name_as_class).css("width", $object_new_w);
          $($name_as_class).css("height", $object_new_h[1]);

          project_margins($splitstr[0], $splitstr[1], $object_new_w, $object_new_h[0], $name_as_class);
        }

        if($css_effect == "dlocked"){ // requires 4 parameters 0:1:2:3 (0 = width percentage)(1 = height percentage)(2 = x off center)(3 = y off center)
          var $object_new = [];
              $object_new[0] = $ef_width / 100 * $splitstr[0]; //$splitstr[2] = Percentage scale of after the offcenter figures
              $object_new[1] = $ef_height / 100 * $splitstr[1]; //$splitstr[3] = Percentage scale of after the offcenter figures
              $object_new[2] = $object_new[0] + "px";
              $object_new[3] = $object_new[1] + "px";

          $($name_as_class).css("width", $object_new[2]);
          $($name_as_class).css("height", $object_new[3]);

          project_margins($splitstr[2], $splitstr[3], $object_new[0], $object_new[1], $name_as_class);
        }

      };


      if($size_type == "response"){ // sizes using width as main rule
  
        if($css_effect == "display"){ 
          $($name_as_class).css("display", $responsive_size);

        }
        if($css_effect == "visibility"){ 
          $($name_as_class).css("visibility", $responsive_size);

        }
        if($css_effect == "background-color"){ 
          $($name_as_class).css("background-color", $responsive_size);

        }


      };

    }; // end of size_all function

    function four_option_css($ef_width, $ef_height, $existing_css, $type){ // for css options that take 4 sizing types
      var $splitstr = $.map( $responsive_size.split(':'), Number );
      if($size_type == "x an y"){ 
      var set_1 = $ef_width;
      var set_2 = $ef_height;     
      }else{
      var set_1 = $type;
      var set_2 = $type;  
      }

      //N E S W option
      var four_array = [];
        four_array[0] = '{"' + $existing_css + '-top":"' + quick_size(set_2, $splitstr[0], 1) +'"}';
        four_array[1] = '{"' + $existing_css + '-right":"' + quick_size(set_1, $splitstr[1], 1) +'"}';
        four_array[2] = '{"' + $existing_css + '-bottom":"' + quick_size(set_2, $splitstr[2], 1) +'"}';
        four_array[3] = '{"' + $existing_css + '-left":"' + quick_size(set_1, $splitstr[3], 1) +'"}';

      jQuery.each( four_array, function( i, val ) {
        var obj = jQuery.parseJSON(four_array[i]);
        $($name_as_class).css(obj);

      });

    }; // end of four_option_css function

    function quick_size($main_ef_size, $size_percent, $size_output){ //sizes and returns a size in pixels for either height or width
        var $pixelsize = [];
        $pixelsize[0] = $main_ef_size / 100 * $size_percent; //$size_percent is responcive size without any ':'
        $pixelsize[1] = $pixelsize[0] + "px";
        return $pixelsize[$size_output];
    }// end of quicksize

    //Creates left and right margins used in both locking and off centering to position
    function project_margins($left_size, $top_size, $elm_width_m, $elm_height_m, $object_identity){
      var offset_l_margin = offset_margin($inner_w_margin, $ef_width, $elm_width_m, $left_size, 1);
      var offset_t_margin = offset_margin($inner_h_margin, $ef_height, $elm_height_m, $top_size, 1);
                           
      $($object_identity).css("margin-left", offset_l_margin);
      $($object_identity).css("margin-top", offset_t_margin);
    }// end of projected margins

        //returns an offset margin for how many pixels off center 
        function offset_margin($inner_margin, $ef_size, $elm_size, $offcenter, $size_output){
            // elm_w_offset is the difference in sizing between the to so you could see it as the px's that are between both
            var $elm_offset = ($ef_size / 2) - ($elm_size / 2);
            // Get the amount of pixels off the center the element is to be positioned at. if 0:0 was given it wont equal anything
            var $el_offcenter = $ef_size / 100 * $offcenter;

      // first adds the margin of the outside of the element container
            // Then adds the offset area which is the area between the outside of the element and the container
            // then adds the pixels the element is to be off the center. if center it wont add anything. 


            var $elm_margin = [];

          //if it is being centered to it's parent element it will not take the add the outside margins of the inner div
          if($inner_item == $parent_id){
            $elm_margin[0] = $elm_offset + $el_offcenter;
            
          }else{
            $elm_margin[0] = $elm_offset + $el_offcenter + $inner_margin;
          }
            
            $elm_margin[1] = $elm_margin[0] + "px";
            return $elm_margin[$size_output];
        }// end of offset margin

    // scales to the container it is contained in.
    function scale_to_container($original_cont_size, $current_cont_size, $object_original, $size_output){
      var $size_reduced = reduced_down_percent($original_cont_size, $current_cont_size);
      var $object_size = [];
          $object_size[0] = $object_original - ($size_reduced * $object_original);
          $object_size[1] = $object_size[0] + "px";
          $object_size[2] = [$object_size[0],$object_size[1]];
      return $object_size[$size_output];
    }// end of scale to container

    //finds out the percentage something has been scaled down by using either the height or size of something. *deduced by percentage.
    function reduced_down_percent($original_cont_size, $current_cont_size){
      var $scaled_down_size = $original_cont_size - $current_cont_size;
      var $scaled_down_percent = $scaled_down_size / $original_cont_size; 
      return $scaled_down_percent;
    }// end of reduced percentage function

    // Gets original height and width of an image that is an <img> tag object not background
    function load_img_size($image_identity){
        var img = new Image ;
        img.src = $($image_identity).attr('src');
        var $size_array = [];
        $(img).ready(function() {
            $size_array[0] = img.width;
            $size_array[1] = img.height;    
        });
        return $size_array;
    };// end or load image sizing


    // Gets original height and width of background that is a css background not a img tag
    function load_bg_size($image_identity){
      var img = new Image ;
            img.src = $($image_identity).css('background-image').replace("url(", "").replace(")", "").replace("\"", "").replace("\"", "");
        var $size_array = [];
        $(img).ready(function() {
            $size_array[0] = img.width;
            $size_array[1] = img.height;    
        });
        return $size_array;
        };// end of load bg size

    // Scales images so they don't get streched from there width
    function image_scale($img_original_w, $img_original_h){
      var $object_new_size = [];
      $object_new_size[0] = $ef_width / 100 * $responsive_size;
      $object_new_size[1] = scale_to_container($img_original_w, $object_new_size[0], $img_original_h, 1);        
          
      $object_new_size[0] = $object_new_size[0] + "px";
      
      $($name_as_class).css("width", $object_new_size[0]);
      $($name_as_class).css("height", $object_new_size[1]);

    }; // end of image scale

       // for centering text only works as an id 
       function text_center($left_size, $top_size){
              var text_element = document.getElementById($object_name);
              var font_size_px = $(text_element).css('font-size');
              
              text_element.style.fontSize = font_size_px;
              var $font_sizes = [];
              $font_sizes[0] = (text_element.clientWidth + 1);
              $font_sizes[1] = (text_element.clientHeight + 1);
              
              return $font_sizes;

       }; //end of text center function

  }); // end of for each loop on stylesheet


// Function from David Walsh: http://davidwalsh.name/css-animation-callback
function whichAnimationEvent(){
  var t,
      el = document.createElement("fakeelement");

  var animations = {
    "animation"      : "animationend",
    "OAnimation"     : "oAnimationEnd",
    "MozAnimation"   : "animationend",
    "WebkitAnimation": "webkitAnimationEnd"
  }

  for (t in animations){
    if (el.style[t] !== undefined){
      return animations[t];
    }
  }
}




if(pageloader == '1'){

  if($loader_array["loadertype"] == "gif"){
      $( document ).ready(function() { 
         setTimeout(function () {
        $('#jss_pageloader').animate({opacity: 0},"slow", function() {
            $('#jss_pageloader').hide();
        });
      
      },$loader_array["loadertimer"] );
      });
  }else{

  }
/*
//var $e = document.getElementsByClassName($animationname)[0];
var transitionEvent = whichAnimationEvent();
var animation_array = [];
animation_array[0] = {opacity: 0};
animation_array[2] = '1';

  
     

       $( document ).ready(function() { 
        var animatedclass = "path";
        $('#'+animatedclass).attr('class',animatedclass);
        $('#'+animatedclass +'2').attr('class',"path2");
        var $animationname = $('.' + animatedclass);
        $animationname.one(transitionEvent,
               function(event) {
     // Do something when the transition ends
     
     $('#jss_pageloader').animate(animation_array[0],animation_array[2], function() {

      $('#jss_pageloader').hide();
     });//.fadeOut( "slow" );
      });
   });
        $( document ).ready(function() {
        setTimeout(function () {
     $('#jss_pageloader').animate(animation_array[0],animation_array[2], function() {

      $('#jss_pageloader').hide();
      });
          //$('#jss_pageloader').animate({opacity: 0},"slow");
//.fadeOut( "slow" );
        }, 12000);
        });
 

  */
}// end of page loader
}; // end of js_stylesheet function

function in_array(needle, haystack, argStrict) {

  var key = '',
    strict = !! argStrict;

  if (strict) {
    for (key in haystack) {
      if (haystack[key] === needle) {
        return true;
      }
    }
  } else {
    for (key in haystack) {
      if (haystack[key] == needle) {
        return true;
      }
    }
  }
  return false;
}


})( jQuery );
 