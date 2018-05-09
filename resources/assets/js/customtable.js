var maxcount;
var tblecount;
var jsonmap;
$.fn.dtab = function(array) {
 var ajax = {
        reload:function(){ajaxdefiner()},
        rows:function(){

        },
        colums:function(){},
        Api:function(){},
        SearchApi:function(searcharray){columngenarator(array,searcharray)}
  }

var  Tab_name = array.table.replace("#","")
  var $parent = $(array.table).parent("div");
  $(array.table).remove();
  $parent.append("<div id='"+Tab_name+"_main'></div>")
    var listop = "";   
       var rightAppend =""
        var leftAppend=""
     listop = "<option value='10'>10</option>";
      listop += "<option value='50'>50</option>";
      listop += "<option value='100'>50</option>";
        
        tblecount = array.table;
       if (array.pagelenght) {
        listop=""
        $.each(eval(array.pagelenght),function(i,item){
                listop += "<option value='"+item+"'>"+item+"</option>";
        })
        }
        if (array.info) {
         leftAppend = '<div class="pull-left" style="position:relative;width:50%"><div class="dataTables_length" id="patientgrid_length"><label class="w3-padding">  Show <select name="'+Tab_name+'_length"  onchange="lengthchanger(this)" aria-controls="grid" class="form-control input-sm"> '+listop+' </select> entries</label></div></div>'          
     }
    if (array.sort){
   
        }

      if (array.search){
         var tabname = array.table.replace("#","")
       rightAppend = '<div class="pull-right" style="position:relative;width:50%"><input type="search" tagtable="'+array.table+'" onkeyup="searchtable(this)"   name="q-search" class="w3-input pull-right customtable_search" placeholder="search" style="width: 50%; position: relative;display: inline-block;"></div>'    
        }
        if (array.tfoot){
        }     
      array.searchhtml =  "<div class='' style='width:100%; position:relative;'>"+leftAppend+rightAppend+"</div>";
      if (array.ajax) {
        ajaxdefiner(array);
     }
   
   return ajax;
}
function columngenarator(array,largedata){
    var colormain =array.tabledata === "undefined"  ? array.tabledata.textFontClass:'w3-text-gray';
    var tabname = array.table.replace("#","")
    var aligner  = (array.align =='center'?'text-center' : array.align =='right'?'text-right' : 'text-left')
    //$(array.table).addClass("table table-condensed table-hover table-bordered table-striped");
    var tablem = '<table id="'+tabname+'" role="grid" aria-describedby="'+tabname+'_info" class="table table-stripped table-bordered   '+colormain+' '+aligner+' no-footer " ><thead></thead><tbody></tbody></table>'
    $(array.table).html("");
    var htmmain = '<div id="'+tabname+'_wrapper" class=" form-inline dt-bootstrap footer"><div class="row">   '+array.searchhtml+' </div><div class="row"><div class="col-sm-12">'
    var end ='<div id="'+tabname+'_processing" class="" style="display: none;"></div></div></div><div class="row"><div class="col-sm-6"><div class="dataTables_info" id="'+tabname+'_info" role="status" aria-live="polite">'+((array.info?'Showing 10 of '+largedata.length+' entries ':''))+'</div></div><div class="col-sm-6"><div class="dataTables_paginate paging_full_numbers pagination pagination-lg pager pull-right" id="'+tabname+'_paginate"></div></div></div></div>'
    $(array.table).prepend("<caption>"+array.searchhtml+"</caption>");
     var lastall =htmmain+tablem+end;  
     $(array.table+"_main").html(lastall)
   maxcount = largedata.length;

    var thead = "<tr>"    
    $.each(eval(array.colums),function(i,item){
      if (item.title) {
      if (item.visible==false) {
            thead +="<th thead_id='"+item.name+"' style='display:none'>"+item.title+"</th>";  
      }else if (item.align) {
        var aligner  = (item.align =='center'?'text-center' : item.align =='right'?'text-right' : 'text-left')
            thead +="<th class='"+aligner+"' thead_id='"+item.name+"' style='display:none'>"+item.title+"</th>";  
      }
      else{
            thead +="<th thead_id='"+item.name+"'>"+item.title+"</th>";   

      }   
    }   
    })
    thead +="</tr>"
    $(array.table+" thead").append(thead)
    var tbody = ""
    largedata.__proto__ =null;  
    $.each(eval(largedata),function(iname,dt){
      json = $.parseJSON(JSON.stringify(dt));
      jsonmap = json;
      tbody +="<tr>";
      $.each(eval(array.colums),function(iner,dataitem){                
            
           $.each(json, function(i, n){              
                if (dataitem.name==i) {                        
                  if (dataitem.visible==false) {                
                      tbody +="<td style='display:none'>"+n+"</td>";
                  }else if (dataitem.align) {
                var aligner  = (dataitem.align =='center'?'text-center' : dataitem.align =='right'?'text-right' : 'text-left')
                tbody +="<td class='"+aligner+"'>"+n+"</td>";
           }else if (dataitem.money && dataitem.name && n) {                
                      tbody +="<td> "+dataitem.money+" "+n+"</td>";
                  }
                  else if (dataitem.status) {
                        tbody +="<td><a class=''><span class='badge  "+dataitem.classColor+"'> " +n+ "</span></a></td>";
                    }else if (dataitem.icon) {
                        tbody +="<td><a class=''><span class='badge  "+dataitem.icon+"'> " +n+ "</span></a></td>";
                    }else{
                       tbody +="<td>"+n+"</td>"; 
                     }
              }
              
              })        
             if (dataitem.icon && dataitem.visible) {
                  tbody +="<td ><a class=''></a></td>";
              }else if(dataitem.icon && dataitem.visible==false){
                   tbody +="<td style='display:none'><a class=''></a></td>";
              }

            }) 
            tbody +="</tr>";
        }) 
       
  
    $(array.table+" tbody").append(tbody)   
    var newpush = [];
    $.each(eval(array.colums),function(iname,dt){
           newpush.push(dt.name)
    })   
    //var $this;  
    array.col = newpush;
    $.each(eval(array.columndefs),function(i,item){           
    $(array.table+" tbody tr td").each(function(){
       if ($(this).index()==item.targets) {     
       //console.log($(this).css("display"))
         $(this).html(item.render(tabletojson(array,$(this).parent('tr:first'))))   
      }
   })
      })
   /// })
     
    if (array.paging) {
      $(array.table+" tbody").pageMe({pagerSelector:array.table+"_paginate",showPrevNext:true,hidePageNumbers:false,perPage:10});
    }
    if ($(array.table+" tbody td")) {
    sortTable(array);
    }
    if (array.drawCallback) {
      
      array.drawCallback(array);
  }
  //$(array.table).Groupizer(array);
}
function lengthchanger(th){
  $(tblecount+"_paginate").html("");
  
  if ($(th).val()=="All") {
        
             $(tblecount+" tbody").pageMe({pagerSelector:tblecount+"_paginate",showPrevNext:true,hidePageNumbers:false,perPage:maxcount});
  }else
       { 
        
             $(tblecount+" tbody").pageMe({pagerSelector:tblecount+"_paginate",showPrevNext:true,hidePageNumbers:false,perPage:$(th).val()});
           }
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
    
    rowcount($(tthis).attr("tagtable")+"_info",$(tthis).attr("tagtable").replace("#",''));
    
}


function sortTable(tables) {
  n = tables.order.sort;
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById(tables.table.replace('#',''));
  switching = true;
  // Set the sorting direction to ascending:
  dir = tables.order.sorttype; 
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
     // $("#tablepagecounter").text(getcountofrows("lbredefine"))
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
    rowcount("#"+$this.parent("table").attr("id")+"_info",$this.parent("table").attr("id"));
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
        rowcount("#"+$this.parent("table").attr("id")+"_info",$this.parent("table").attr("id"));
       
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
              data = $.each(eval(data),function(i,dt){
                if (dt.__proto__) {          
                dt.__proto__ = null;            
              }
              })
                columngenarator(array,data);
            }
        })
}

 function rowcount(paginate, tab){
  var rows = $("#"+tab+' tbody tr:visible').length;
  var strin =  'Showing '+rows+' of'+maxcount+' entries';
  return $(paginate).text(strin);
 }
 function tabletojson(array,tr) {
   var jsn ;
   var otArr = [];
  // var i = 1;
   var tbl2 = $(tr).each(function(e) {        
      x = $(this).children();
      var itArr = [];
      var keys =array.col;
      x.each(function(i) {
         itArr.push('"' + keys[i] + '":"' + $(this).text() + '"');
      });
      otArr.push('{' + itArr.join(',') + '}');
   })
  /// console.log(JSON.parse(otArr))
   return JSON.parse(otArr);
 }
