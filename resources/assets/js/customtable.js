 function generaltable(array){
     var listop = "";
   
       var rightAppend =""
        var leftAppend=""
     listop = "<option value='10'>10</option>";
      listop += "<option value='50'>50</option>";
      listop += "<option value='100'>50</option>";
    
if (array.paging){
       $(array.table).pageMe({pagerSelector:'#pagetablepage',showPrevNext:true,hidePageNumbers:false,perPage:10});
       if (array.pagelenght) {
        listop=""
        $.each(eval(array.pagelenght),function(i,item){
                listop += "<option value='"+item+"'>"+item+"</option>";
        })
        }
         leftAppend = '<div class="pull-left" style="position:relative;width:50%"><div class="dataTables_length" id="patientgrid_length"><label class="w3-padding">  Show <select name="patientgrid_length" aria-controls="patientgrid" class="form-control input-sm"> '+listop+' </select> entries</label></div></div>'          
      }
    if (array.sort){
   
        }
      
    if (array.info){
        
      }
      if (array.search){
         var tabname = array.table.replace("#","")
       rightAppend = '<div class="pull-right" style="position:relative;width:50%"><input type="search" tagtable="'+array.table+'" onkeyup="searchtable(this)"   name="q-search" class="w3-input pull-right customtable_search" placeholder="search" style="width: 50%; position: relative;display: inline-block;"></div>'    
        }
        if (array.tfoot){
        }     
    array.countRows = getcountofrows(5);
    array.searchhtml =  "<div class='' style='width:100%; position:relative;'>"+leftAppend+rightAppend+"</div>";
      if (array.ajax) {
        ajaxdefiner(array);
     }
    
   
}
function columngenarator(array){
    console.log(array)
    var tabname = array.table.replace("#","")
    //$(array.table).addClass("table table-condensed table-hover table-bordered table-striped");
    var tablem = '<table id="'+tabname+'" role="grid" aria-describedby="'+tabname+'_info" class="table table-stripped table-bordered  no-footer">'
    $(array.table).html("");
    var htmmain = '<div id="'+tabname+'_wrapper" class=" form-inline dt-bootstrap no-footer"><div class="row">   '+array.searchhtml+' </div><div class="row"><div class="col-sm-12">'
    var end ='<div id="'+tabname+'_processing" class="" style="display: none;"></div></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="'+tabname+'_info" role="status" aria-live="polite">'+array.countRows+'</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_full_numbers" id="'+tabname+'_paginate"><ul class="pagination"><li class="paginate_button first disabled" aria-controls="patientgrid" tabindex="0" id="patientgrid_first"><a href="#">First</a></li><li class="paginate_button previous disabled" aria-controls="patientgrid" tabindex="0" id="patientgrid_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="patientgrid" tabindex="0"><a href="#">1</a></li><li class="paginate_button next disabled" aria-controls="patientgrid" tabindex="0" id="patientgrid_next"><a href="#">Next</a></li><li class="paginate_button last disabled" aria-controls="patientgrid" tabindex="0" id="patientgrid_last"><a href="#">Last</a></li></ul></div></div></div></div>'
    $(array.table).prepend("<caption>"+array.searchhtml+"</caption>");
    var thead = "<thead><tr>"
    $.each(eval(array.colums),function(i,item){
    $.each(eval(array.largedata),function(iner,dataitem){
        if (i==iner) {
             thead +="<th>"+item.title+"</th>";
         }  
    })
    })
    thead +="</tr></thead>"
    var tbody = "<tbody><tr>"
    
         $.each(eval(array.largedata),function(iner,dt){
            $.each(eval(array.colums),function(i,item){
        if (i==iner) {
             tbody +="<td>"+dt+"</td>";
         }  
    })
    
       
    })
    tbody +="</tr></tbody>"
    var lastall =htmmain+tablem+thead+tbody+"</table>"+end;  
   var $parent = $(array.table).parent("div");
   $parent.find($(array.table)).remove();
   $parent.append(lastall)
}
function searchtable(tthis) {

 var $rows = $($(tthis).attr("tagtable")).find("tbody tr");

    var val = $.trim($(tthis).val()).replace(/ +/g, ' ').toLowerCase();

     $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        setTimeout(function() {
         }, 10);
        return !~text.indexOf(val);
    }).hide()
    
}


function sortTable(n,table) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById(table);
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      $("#tablepagecounter").text(getcountofrows("lbredefine"))
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

function getcountofrows(rows){
return "Showing 1 of "+rows+" rows";
}
$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.length;
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link"><i class="fa fa-angle-left"></i></a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link"><i class="fa fa-angle-right"></i></a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
    pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
        pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
         $("#tablepagecounter").text(getcountofrows("lbredefine"))
    
    }

};
function ajaxdefiner(array){
        $.ajax({
            url:array.ajax.url,
            type:array.ajax.type,
            datatype:"json",
            data:array.ajax.data,
           async: false,
            success:function(data){
                array.largedata = data;
                columngenarator(array);
            }
        })
}