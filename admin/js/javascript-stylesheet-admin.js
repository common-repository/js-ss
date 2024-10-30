(function( $ ) {
  'use strict';

window.revert=revert;
 window.change=change;
 window.lockunlock=lockunlock;
 window.lockrow=lockrow;
 window.unlockrow=unlockrow;
 window.deleterow=deleterow;
window.edittitle=edittitle;
window.confirmtitle=confirmtitle;
window.hiddenshow = hiddenshow;
window.hiderow = hiderow;
window.showrow = showrow;
window.activewide = activewide;
window.activefull = activefull;
window.activetablet = activetablet;
window.activemob = activemob;
window.decodejson = decodejson;
window.in_array = in_array;
window.rowrevert = rowrevert;
window.imageuploader = imageuploader;
window.getsortedorder = getsortedorder;
window.helper_settings = helper_settings;

var originalorder = [];
var $tbodylist = [];
var changedorder = [];


  jQuery(document).ready(function($) {
     
window.setchange = setchange;
    var active = false,
        sorting = false;

    var acordarray = [];
        acordarray[0] = "#accordionmain";
        acordarray[1] = "#accordion1";
        acordarray[2] = "#accordion2";
        acordarray[3] = "#accordion3";
        acordarray[4] = "#accordion";
jQuery.each( acordarray, function( i, val ) {
        var separateacord = val;

   $( separateacord )
    .accordion({
        header: "> div > h3",
        collapsible: true,
        active: false,
        heightStyle: "content",
        activate: function( event, ui){
            //this fixes any problems with sorting if panel was open 
            //remove to see what I am talking about
            if(sorting)
                $(this).sortable("refresh");  
        var activeset = $(this).accordion( "option", "active" );
       console.log($(this).accordion( "option", "active" ));
        if( activeset === false){
        $(this).find('.accordarrow').html('&#9666;');  
        $(this).find('.settingsarrow').html('&#9666;'); 
        }else{
        $(this).find('.accordarrow').html('&#9662;');
        $(this).find('.settingsarrow').html('&#9662;');
        }

        }

    }) 
    .sortable({
        handle: "h3",
        placeholder: "ui-state-highlight",
        start: function( event, ui ){
            //change bool to true
            sorting=true;

            //find what tab is open, false if none
            active = $(this).accordion( "option", "active" ); 

            //possibly change animation here (to make the animation instant if you like)
            $(this).accordion( "option", "animate", { easing: 'swing', duration: 0 } );

            //close tab
            $(this).accordion({ active:false });
        },
        stop: function( event, ui ) {
            ui.item.children( "h3" ).triggerHandler( "focusout" );

            //possibly change animation here; { } is default value
            $(this).accordion( "option", "animate", { } );

            //open previously active panel
            $(this).accordion( "option", "active", active );

            //change bool to false
            sorting=false;
        }
    });
    
});
$('[data-tbodylist]').each(function(){
  var $tbodyid = $(this).data('tbodylist');
  $tbodylist.push($tbodyid);
    
  $('#' + $tbodyid).sortable({
     cancel: ".ui-state-disabled",
     handle: ".ui-row-handle",
  stop: function(event, ui){
    
    getsortedorder($tbodyid);

    }
  });

originalorder[$tbodyid] = $('#' + $tbodyid).sortable("toArray");

});

$( "#helperdiv" ).draggable({ 
        handle: ".helper-handle",
        containment: "#wpbody",
        scroll: false,
        snap: ".bottombar, #wpadminbar",
        snapMode: "outer"
        });

/*
    $( "#helperdiv" ).resizable({
      animate: true
    });

*/


checkedset();
var checkednew;
function setchange(n){
    var objJSON; 
    var checkedtype = $(n).data('checked');
    var setid = $(n).attr('id');
    var settingdata = $('#settingdata').val();
    objJSON = eval("(function(){return " + settingdata + ";})()");
    
    if(checkedtype == 1){
      checkednew = '0';
    }else{
      checkednew = '1';
    }
    objJSON[setid] = checkednew;
    var newobj = JSON.stringify(objJSON);
    $('#settingdata').val(newobj);
    $(n).data('checked',checkednew);
    checkedset();
}

function checkedset(){

$('[data-checked]').each(function(){
    var checkedtype = $(this).data('checked');
    var checkid = $(this).attr('id');
    if(checkedtype == '1'){
      var tickhtml = '<span class="genericon genericon-checkmark"></span>';
      $(this).html(tickhtml);
    }else{
       var uncheckedhtml = '<span class="genericon genericon-checkmark whitecheck"></span>';
       $(this).html(uncheckedhtml);
    }

    if((checkid == "loaderstatus") && (checkedtype == '1') ){
      loadercoder('');

    }
    if((checkid == "loaderstatus") && (checkedtype == '0') ){
      loadercoder('none');

    }

    if((checkid == "helperonoff") && (checkedtype == '1') ){
      
      $("#helperdiv").removeClass("helperonoff0").addClass("helperonoff1");

    }
    if((checkid == "helperonoff") && (checkedtype == '0') ){
       $("#helperdiv").removeClass("helperonoff1").addClass("helperonoff0");

    }


});
}



function loadercoder(status){

    $('.loadcode').css('display', status);
}

$('.color-picker').wpColorPicker();


/* code mirror editor code for v2.0
var myTextArea = document.getElementById("svghtml") ;


var value = $("svghtml").val();
  var map = CodeMirror.keyMap.sublime;
  for (var key in map) {
    var val = map[key];
    if (key != "fallthrough" && val != "..." && (!/find/.test(val) || /findUnder/.test(val)))
      value += "  \"" + key + "\": \"" + val + "\",\n";
  }
  value += "}\n\n// The implementation of joinLines\n";
  value += CodeMirror.commands.joinLines.toString().replace(/^function\s*\(/, "function joinLines(").replace(/\n  /g, "\n") + "\n";
  


var editor = CodeMirror.fromTextArea(myTextArea, {
        value: value,
    lineNumbers: true,
    mode: "xml",
    theme: "monokai",
    inputStyle:"contenteditable",
    htmlMode: true


  });


var myTextArea2 = document.getElementById("svgcss") ;
var value2 = $("svgcss").val();
  var map = CodeMirror.keyMap.sublime;
  for (var key in map) {
    var val = map[key];
    if (key != "fallthrough" && val != "..." && (!/find/.test(val) || /findUnder/.test(val)))
      value2 += "  \"" + key + "\": \"" + val + "\",\n";
  }
  value2 += "}\n\n// The implementation of joinLines\n";
  value2 += CodeMirror.commands.joinLines.toString().replace(/^function\s*\(/, "function joinLines(").replace(/\n  /g, "\n") + "\n";
  
var editor2 = CodeMirror.fromTextArea(myTextArea2, {
    value: value2,
    lineNumbers: true,
    mode: "css",
    theme: "monokai",
    inputStyle:"contenteditable",
    htmlMode: true


  });
*/


}); // end of jquery function on ready

//var $resortedlist = [];

function getsortedorder(current){
  
  changedorder[current] = $('#' + current).sortable("toArray");
  var $originalitem = originalorder[current];
  var $changedorderid = changedorder[current];
  var $changedlist = [];
  //var $resortedlist2 = [];

    jQuery.each($originalitem, function( i, val ) {
        $changedlist[val] = $changedorderid[i];
        //console.log(jQuery.inArray(val.substr(4), $resortedlist))
        // if(val == $changedorderid[i] && !jQuery.inArray(val.substr(4), $resortedlist)){
        //   console.log("Not changed:" + val)
        // }else{

          val = val.substr(1);

          $('[data-rowinput]').each(function(){
              var fulldataid = $(this).data('rowinput');
                  
              if ($changedorderid[i].substr(1) == fulldataid) {
                //console.log("This row has changed from:" + $changedorderid[i].substr(1) + " To:"+ val);
                var fulldata = $(this).val();
                var objJSON = eval("(function(){return " + fulldata + ";})()");
                objJSON["resortid"] = val.substr(3);
                var newobj = JSON.stringify(objJSON);
                //$resortedlist.push(val.substr(3));
                //console.log(newobj);
                $(this).val(newobj);
              }
          });      
    //}
    });

    //$resortedlist = $resortedlist2;
    //console.log($resortedlist);

}


function rowrevert(){
$(".activeel").each(function(){
var revertid = $(this).data('row');

revert(revertid);
});

}
   function revert(n) { 
    
    var datagroup = n;
    
  $('[data-rowinput]').each(function(){
   var fulldataid = $(this).data('rowinput');
        if (datagroup == fulldataid) {
           var fulldata = $(this).val();
           var objJSON = eval("(function(){return " + fulldata + ";})()");

var revertarray = [];
$(".activeel").each(function(){

var columnid2 = $(this).attr('id');
revertarray['id'] = columnid2.substr(1);
revertarray[columnid2] = $(this).val();
        var reversedata = $(this).data('row');
        var content2 = $(this).val();
        $(".editon").removeClass("editon").addClass("editoff");
 if ($(this).attr('data-sizefield')) {
        var sizefieldval = $(this).data('sizefield');
          $( this ).replaceWith( "<p id='" + columnid2 + "' class='tblelement' data-row='" + reversedata + "' data-sizefield='" + sizefieldval + "' onclick='change(this)' >" + content2 + "</p>" );

}else{
          $( this ).replaceWith( "<p id='" + columnid2 + "' class='tblelement' data-row='" + reversedata + "' onclick='change(this)' >" + content2 + "</p>" );

}

});
var revertid = revertarray['id'];
var sizechecke = 'e'+revertid;
var sizechecki = 'i'+revertid;
var sizecheckh = 'h'+revertid;
var sizecheckh = 'k'+revertid;

if('k'+revertid in revertarray){
var savecontent = '{"id": "'+ revertid +'","rowhidden": "'+ objJSON.rowhidden +'","pagename": "'+ objJSON.pagename +'","objectname": "'+ revertarray['a'+revertid] +'", "inneritem":"'+ revertarray['b'+revertid] +'", "sizetype": "'+ revertarray['c'+revertid]  +'", "csseffect" : "'+ revertarray['d'+revertid] +'", "wscreensize" : "'+ revertarray['k'+revertid] +'", "screensize" : "'+ objJSON.screensize +'", "tabletsize" : "'+ objJSON.tabletsize +'", "mobsize" : "'+  objJSON.mobsize +'", "position" : "'+ revertarray['j'+revertid] +'", "lockstatus": "'+ objJSON.lockstatus +'", "resortid": "'+ objJSON.resortid +'"}';

}

if('e'+revertid in revertarray){
var savecontent = '{"id": "'+ revertid +'","rowhidden": "'+ objJSON.rowhidden +'","pagename": "'+ objJSON.pagename +'","objectname": "'+ revertarray['a'+revertid] +'", "inneritem":"'+ revertarray['b'+revertid] +'", "sizetype": "'+ revertarray['c'+revertid]  +'", "csseffect" : "'+ revertarray['d'+revertid] +'", "wscreensize" : "'+ objJSON.wscreensize +'", "screensize" : "'+ revertarray['e'+revertid] +'", "tabletsize" : "'+ objJSON.tabletsize +'", "mobsize" : "'+  objJSON.mobsize +'", "position" : "'+ revertarray['j'+revertid] +'", "lockstatus": "'+ objJSON.lockstatus +'", "resortid": "'+ objJSON.resortid +'"}';

}
if('h'+revertid in revertarray){
var savecontent = '{"id": "'+ revertid +'","rowhidden": "'+ objJSON.rowhidden +'","pagename": "'+ objJSON.pagename +'","objectname": "'+ revertarray['a'+revertid] +'", "inneritem":"'+ revertarray['b'+revertid] +'", "sizetype": "'+ revertarray['c'+revertid]  +'", "csseffect" : "'+ revertarray['d'+revertid] +'", "wscreensize" : "'+ objJSON.wscreensize +'", "screensize" : "'+ objJSON.screensize +'", "tabletsize" : "'+ revertarray['h'+revertid] +'", "mobsize" : "'+  objJSON.mobsize +'", "position" : "'+ revertarray['j'+revertid] +'", "lockstatus": "'+ objJSON.lockstatus +'", "resortid": "'+ objJSON.resortid +'"}';


}
if('i'+revertid in revertarray){
var savecontent = '{"id": "'+ revertid +'","rowhidden": "'+ objJSON.rowhidden +'","pagename": "'+ objJSON.pagename +'","objectname": "'+ revertarray['a'+revertid] +'", "inneritem":"'+ revertarray['b'+revertid] +'", "sizetype": "'+ revertarray['c'+revertid]  +'", "csseffect" : "'+ revertarray['d'+revertid] +'", "wscreensize" : "'+ objJSON.wscreensize +'", "screensize" : "'+ objJSON.screensize +'", "tabletsize" : "'+ objJSON.tabletsize +'", "mobsize" : "'+  revertarray['i'+revertid] +'", "position" : "'+ revertarray['j'+revertid] +'", "lockstatus": "'+ objJSON.lockstatus +'", "resortid": "'+ objJSON.resortid +'"}';
}
$('#fullrow'+ revertid ).val(savecontent);


}
});
     
    
    };

    function change(n) {


     var datagroup = $(n).data('row');
     rowrevert();
    
    var elem = $(n).text().length;

$('[data-row]').each(function(){


    var individualdata = $(this).data('row');
    
if(individualdata == datagroup){
      if($(n).hasClass("locked")){      
      }else{


      var content = $(this).text();
      var columnid = $(this).attr('id');

      if ($(this).attr('data-sizefield')) {
        var sizefieldval = $(this).data('sizefield');
        $( this ).replaceWith( "<textarea id='" + columnid + "' class='tblelement activeel' data-row='" + individualdata + "' data-sizefield='" + sizefieldval + "'>" + content + "</textarea>" );
        
}else{
  if ($(this).attr('data-editrow')) {
    $(this).removeClass("editoff").addClass("editon");
}else{
        $( this ).replaceWith( "<textarea id='" + columnid + "' class='tblelement activeel' data-row='" + individualdata + "'>" + content + "</textarea>" );
      }  
}



        if(this == n){
            $("textarea").prop("selectionStart", elem).focus();
        }  

}
}
});

};

$('textarea').live("keydown", function(e) {
    if(e.keyCode == 13){
      
        rowrevert(this);
    }
});

function hiddenshow(n){
  rowrevert();
  
  if($(n).hasClass("eyevisable")){
    hiderow(n);
  }else{

    showrow(n);
  }
}


function hiderow(n){
  rowrevert();
 var hiderow = $(n).data('btnhrow');
 var hiderowid = hiderow.substr(3);
 var obj = [decodejson(hiderowid)];

      $(n).removeClass("genericon-show").addClass("genericon-hide");
      $(n).removeClass("eyevisable").addClass("hiddenrow");


    var hidejson = '{"id": "'+ obj[0].id +'","rowhidden": "0","pagename": "'+ obj[0].pagename +'","objectname": "'+ obj[0].objectname +'", "inneritem":"'+ obj[0].inneritem  +'", "sizetype": "'+ obj[0].sizetype  +'", "csseffect" : "'+ obj[0].csseffect +'", "wscreensize" : "'+ obj[0].wscreensize +'", "screensize" : "'+ obj[0].screensize +'", "tabletsize" : "'+ obj[0].tabletsize +'", "mobsize" : "'+  obj[0].mobsize +'", "position" : "'+  obj[0].position +'", "lockstatus": "'+ obj[0].lockstatus +'", "resortid": "'+ obj[0].resortid +'"}';
    $('#fullrow'+ hiderowid ).val(hidejson)


};

function showrow(n){
  rowrevert();
 var showrow = $(n).data('btnhrow');
 var showrowid = showrow.substr(3);
 var obj = [decodejson(showrowid)];

      $(n).removeClass("genericon-hide").addClass("genericon-show");
      $(n).removeClass("hiddenrow").addClass("eyevisable");


    var showjson = '{"id": "'+ obj[0].id +'","rowhidden": "1","pagename": "'+ obj[0].pagename +'","objectname": "'+ obj[0].objectname +'", "inneritem":"'+ obj[0].inneritem  +'", "sizetype": "'+ obj[0].sizetype  +'", "csseffect" : "'+ obj[0].csseffect +'", "wscreensize" : "'+ obj[0].wscreensize +'", "screensize" : "'+ obj[0].screensize +'", "tabletsize" : "'+ obj[0].tabletsize +'", "mobsize" : "'+  obj[0].mobsize +'", "position" : "'+  obj[0].position +'", "lockstatus": "'+ obj[0].lockstatus +'", "resortid": "'+ obj[0].resortid +'"}';
    $('#fullrow'+ showrowid ).val(showjson)


};

function lockunlock(n){
  rowrevert();
  var result = $(n).hasClass("locked");
  if($(n).hasClass("locked")){
    unlockrow(n);
  }else{

    lockrow(n);
  }


};


    function lockrow(n) {
      rowrevert();
     var lockgroup = $(n).data('btnrow');
      $('[data-row]').each(function(){
      var rowid = $(this).data('row');

          if(lockgroup == rowid){
            $(this).addClass("locked");            
          };        

      $(n).removeClass("genericon-key").addClass("genericon-lock");
      $(n).removeClass("unlocked").addClass("locked");
      });

      $('[data-binbtnrow]').each(function(){
      var binid = $(this).data('binbtnrow');

          if(lockgroup == binid){
            $(this).removeClass("binunlocked").addClass("binlocked");
          }; 
      }); 

    var lockrowid = lockgroup.substr(3);
    var obj = [decodejson(lockrowid)];

    var lockjson = '{"id": "'+ obj[0].id +'","rowhidden": "'+ obj[0].rowhidden +'","pagename": "'+ obj[0].pagename +'","objectname": "'+ obj[0].objectname +'", "inneritem":"'+ obj[0].inneritem  +'", "sizetype": "'+ obj[0].sizetype  +'", "csseffect" : "'+ obj[0].csseffect +'", "wscreensize" : "'+ obj[0].wscreensize +'", "screensize" : "'+ obj[0].screensize +'", "tabletsize" : "'+ obj[0].tabletsize +'", "mobsize" : "'+  obj[0].mobsize +'", "position" : "'+  obj[0].position +'", "lockstatus": "locked", "resortid": "'+ obj[0].resortid +'"}';
                        
    $('#fullrow'+ lockrowid ).val(lockjson)



};

    function unlockrow(n) {
      rowrevert();
     var unlockgroup = $(n).data('btnrow');

      $('[data-row]').each(function(){
      var rowid = $(this).data('row');

          if(unlockgroup == rowid){
            $(this).removeClass("locked");
          };       

      $(n).removeClass("locked").addClass("unlocked");
      $(n).removeClass("genericon-lock").addClass("genericon-key");

      });

      $('[data-binbtnrow]').each(function(){
      var binid = $(this).data('binbtnrow');

          if(unlockgroup == binid){
            $(this).removeClass("binlocked").addClass("binunlocked");
          }; 
      }); 

    var unlockrowid = unlockgroup.substr(3);
    var obj = [decodejson(unlockrowid)];

    var unlockjson = '{"id": "'+ obj[0].id +'","rowhidden": "'+ obj[0].rowhidden +'","pagename": "'+ obj[0].pagename +'","objectname": "'+ obj[0].objectname +'", "inneritem":"'+ obj[0].inneritem  +'", "sizetype": "'+ obj[0].sizetype  +'", "csseffect" : "'+ obj[0].csseffect +'", "wscreensize" : "'+ obj[0].wscreensize +'", "screensize" : "'+ obj[0].screensize +'", "tabletsize" : "'+ obj[0].tabletsize +'", "mobsize" : "'+  obj[0].mobsize +'", "position" : "'+  obj[0].position +'", "lockstatus": "unlocked", "resortid": "'+ obj[0].resortid +'"}';
                        
    
    $('#fullrow'+ unlockrowid ).val(unlockjson)

};


    function deleterow(n){
      rowrevert();

      var deleterowid = $(n).data('binbtnrow');
      var tableid;

      $('[data-tablerow]').each(function(){
        var delrowid = $(this).data('tablerow');
        

          if(deleterowid == delrowid){
            var pageid = $(this).find('.data-store');
            var pageid2 = $(pageid).data('pageid');
            var arrayid;
            arrayid = jQuery.inArray(this.id, originalorder[pageid2]);
            console.log(arrayid + " " + pageid );

            originalorder[pageid2].splice(arrayid, 1);
            $(this).remove();
            getsortedorder(pageid2);
          }


      }); 


     
    }


    function edittitle(n){
    rowrevert();
     var edittitleid = $(n).data('titleedit');

      $(n).removeClass("genericon-edit").addClass("genericon-checkmark");
            $(n).attr("onClick", "confirmtitle(this);" );

      $('[data-titlelist]').each(function(){
        var tlistid = $(this).data('titlelist');

          if(edittitleid == tlistid){
            $(this).removeClass("hiddennames");

            $('[data-titlen]').each(function(){
            var titlen = $(this).data('titlen');

              if(edittitleid == titlen){
               $(this).addClass("hiddennames");

              }
            });  
          }
      });     
    }

    function confirmtitle(n){
     var edittitleid = $(n).data('titleedit');

      $(n).removeClass("genericon-checkmark").addClass("genericon-edit");
            $(n).attr("onClick", "edittitle(this);" );



      $('[data-titlelist]').each(function(){
        var tlistid = $(this).data('titlelist');

          if(edittitleid == tlistid){

            var valueofbtn = $(this).val();
            var textofbtn = $(this).find("option:selected").text();//$(this).text();
            $(this).addClass("hiddennames");

            $('[data-pageid]').each(function(){
                var pageid = $(this).data('pageid'); 
                if(edittitleid == pageid){

                        var titlerowid = $(this).data('rowinput');
                        var trowid = titlerowid.substr(3);
                        var obj = [decodejson(trowid)];
                        var titlejson = '{"id": "'+ obj[0].id +'","rowhidden": "'+ obj[0].rowhidden +'","pagename": "'+ valueofbtn +'","objectname": "'+ obj[0].objectname +'", "inneritem":"'+ obj[0].inneritem  +'", "sizetype": "'+ obj[0].sizetype  +'", "csseffect" : "'+ obj[0].csseffect +'", "wscreensize" : "'+ obj[0].wscreensize +'", "screensize" : "'+ obj[0].screensize +'", "tabletsize" : "'+ obj[0].tabletsize +'", "mobsize" : "'+  obj[0].mobsize +'", "position" : "'+  obj[0].position +'", "lockstatus": "'+ obj[0].lockstatus +'", "resortid": "'+ obj[0].resortid +'"}';
   
                        $('#fullrow'+ trowid).val(titlejson);

                 }
            });

            $('[data-titlen]').each(function(){
            var titlen = $(this).data('titlen');

              if(edittitleid == titlen){
               $(this).removeClass("hiddennames");
               
                $(this).text(textofbtn);
              }
            });  
            $('[data-titlehead]').each(function(){
            var titleh = $(this).data('titlehead');

              if(edittitleid == titleh){
              
                $(this).text(textofbtn);
              }
            });  





          }
      });

}



function activemob(n){
  rowrevert();
  $('[data-sizefield]').each(function(){
      var fieldrowid = $(this).data('sizefield');
      var newfieldid = "i"+fieldrowid;
      var sizevalue;
      $(this).attr("id", newfieldid );
          $('[data-screensize]').each(function(){
              var screensizeid = $(this).data('screensize');
              var matchid = screensizeid.substr(1);
              matchid = "i" + matchid;
              
              if(newfieldid == matchid){
                
                        var mobrowid = screensizeid.substr(1);
                      
                        var obj = [decodejson(mobrowid)];
                        sizevalue = obj[0].mobsize;
                        

                $('#'+newfieldid).text(sizevalue);
              }

          });
  });
    $('.screensize').removeClass().addClass('screensize genericon genericon-phone');
}

function activetablet(n){
  rowrevert();
  $('[data-sizefield]').each(function(){
      var fieldrowid = $(this).data('sizefield');
      var newfieldid = "h"+fieldrowid;
    var sizevalue;
      $(this).attr("id", newfieldid );
          $('[data-screensize]').each(function(){
              var screensizeid = $(this).data('screensize');
              var matchid = screensizeid.substr(1);
              matchid = "h" + matchid;
              
              if(newfieldid == matchid){
                        var tabletsrowid = screensizeid.substr(1);
                  
                        var obj = [decodejson(tabletsrowid)];
                        sizevalue = obj[0].tabletsize;
                   

                $('#'+newfieldid).text(sizevalue);
              }

          });
  });

  $('.screensize').removeClass().addClass('screensize genericon genericon-tablet');
}

function activefull(n){
  rowrevert();
  $('[data-sizefield]').each(function(){
      var fieldrowid = $(this).data('sizefield');
      var newfieldid = "e"+fieldrowid;
      var sizevalue;
      $(this).attr("id", newfieldid );
          $('[data-screensize]').each(function(){
              var screensizeid = $(this).data('screensize');
              if(newfieldid == screensizeid){


                        var fullsrowid = screensizeid.substr(1);
                        var obj = [decodejson(fullsrowid)];
                        sizevalue = obj[0].screensize;

                $('#'+newfieldid).text(sizevalue);
              }
 
 
          });
  });
    $('.screensize').removeClass().addClass('screensize genericon genericon-maximize');
}
function activewide(n){
  rowrevert();
  $('[data-sizefield]').each(function(){
      var fieldrowid = $(this).data('sizefield');
      var newfieldid = "k"+fieldrowid;
      var sizevalue;
      $(this).attr("id", newfieldid );
          $('[data-screensize]').each(function(){
              var screensizeid = $(this).data('screensize');
              var matchid = screensizeid.substr(1);
              matchid = "k" + matchid;
              
              if(newfieldid == matchid){
                        var widerowid = screensizeid.substr(1);
                  
                        var obj = [decodejson(widerowid)];
                        sizevalue = obj[0].wscreensize;
                   

                $('#'+newfieldid).text(sizevalue);
              }

          });
  });

  $('.screensize').removeClass().addClass('screensize genericon genericon-fullscreen');
}

function decodejson(n){

  var objJSON; 
  var idfield = 'fulldata' + n;
  
  $('[data-fulldata]').each(function(){
   var fulldataid = $(this).data('fulldata');
        if (idfield == fulldataid) {
           var fulldata = $(this).val();
           objJSON = eval("(function(){return " + fulldata + ";})()");
        };
});
  return (objJSON);
}

function imageuploader(){
 var file_frame, attachment;
    event.preventDefault();

    if ( file_frame ) {
      file_frame.open();
      return;
    }

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: true  // Set to true to allow multiple files to be selected
    });


  // When an image is selected, run a callback.
  file_frame.on( 'select', function() {

    var selection = file_frame.state().get('selection');

    selection.map( function( attachment ) {

    attachment = attachment.toJSON();

    var objJSON; 
    var settingdata = $('#settingdata').val();
    objJSON = eval("(function(){return " + settingdata + ";})()");
    
   
    
    objJSON["gifurl"] = attachment.url;
    var newobj = JSON.stringify(objJSON);
    $('#settingdata').val(newobj);
    $("#gifurltxt").text(attachment.url);

    });
  });



    file_frame.open();

};

function helper_settings(n){
  var $helper_div = $("#helperdiv").prop('style');;
    if (n == "1") {
        $("#helperdiv").removeClass("helperonoff1").addClass("helperonoff0");

    };

    if (n == "2") {
      var handle_height = $("#helper-handle").height();
      var helper_height = $("#helperdiv").height();
      if(handle_height == helper_height){
        $("#helperdiv").css("height", "");
        $("#helperdiv").css("overflow", "");
        $helper_div.removeProperty("height");
        $helper_div.removeProperty("overflow");
      }else{
        $("#helperdiv").css('height', handle_height);
        $("#helperdiv").css('overflow', 'hidden');

      };
      
    };
}

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
