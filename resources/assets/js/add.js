var selectdata =[];
$(document).ready(function(){

doctortable= $('#new_tests').DataTable({
        "initComplete": function( settings, json ) {
    $('div.loading').remove();
         },
    paging: false,
    searching: { "regex": false },
    lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    pageLength: 10,
     "bProcessing": true,
     "bPaginate":true,
     "sPaginationType":"full_numbers",
     info:false,
     searching:false,
     ajax:{
        url: "loadtest", // Change this URL to where your json data comes from
        type: "POST", // This is the default value, could also be POST, or anything you want.
        data: function(d) {
            //d.patient_ids = $("input[name=patient_ids]").val(),
            d.group = "DataTable",
            d._token  = _token
            },

    },
           //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content'),
           
          columns: [
            
            {data: 'id',  name: 'id' , visible:false },
            {data: 'name', "className":"details-control", name: 'name'},
            {data: 'name',  "className":"details-control", name: 'name', width:2},
            ], 
            "columnDefs": [{
         'targets': 2,
         'searchable': false,
         'orderable': false,
         'width': '1%',
         "bJQueryUI": true,     
         "bAutoWidth": false,
         'className': 'dt-body-center',
         "render": function ( data, type, row ) {
          return '<a class="w3-padding" onclick="edititem(this)"><i class="fa fa-angle-left"></i></a>'
         },

      }]
       
    });
$('#new_tests').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = doctortable.row( tr); 
        if ( row.child.isShown() ) {
           row.child.hide();           
           tr.find("i").removeClass("fa fa-angle-down")
           tr.find("i").addClass("fa fa-angle-left")
           
            tr.removeClass('shown');            
            tr.removeClass("w3-border-left w3-border-red active")
            tr.find("i").addClass("fa fa-angle-down")
           tr.find("i").removeClass("fa fa-angle-left")
        }
        else {
            format(row) ;
            tr.addClass('shown');
            tr.addClass('accordoin');
           tr.addClass("w3-border-left w3-border-red active");
        }
    } );
})
 function cartadd(thiss){
    var $this = $(thiss);
    $this.button('loading');
    //$//this.button('reset');
    var data  = $(thiss).closest("tr").find(".testname").text();
    var total = $(".total").text();
    var count =$("#cart_sub").text();
     $(".listopt").append('<div class="w3-padding w3-list-group"><i class="fa fa-times w3-text-red w3-hover-text-blue" style="cursor:pointer"></i> <a style="position:relative; right:-20px" class="tagtest" tagid="'+$(thiss).attr("tagid")+'" tagamount="'+$(thiss).attr("tagamount")+'">'+$(thiss).attr("tagtest")+'</a> <p class="pull-right tagamount">$'+$(thiss).attr("tagamount")+'</p></div>') 
        $("#cart_sub").text((count*1)+1)
        $(".total").text((total*1)+($(thiss).attr("tagamount")*1));
        
   }
function format ( d ) {
        var name= d.data().id;
        var headerz = '<table cellpadding="5" class="table table-bordered" cellspacing="0" border="0" style="padding-left:50px;"><tr><th>Name</th><th></th><th>Price</th><th class="w3-text-center w3-center">Action</th></tr><tbody>'; 
$.each(eval(items), function(i,item){
            var inerhtml;
            if ( item.parent_id == name ) {
            $(".listopt").find(".tagtest").each(function(){
                if ($(this).text()==item.name) {
            inerhtml='<tr><td><strong class="testname">'+item.name+'</strong><br><small>'+item.description+'</small></td>'+
               '<td><a class="w3-padding" onclick="plaininfo(this)"><span id=""  class="badge w3-blue" aria-hidden="true" style="cursor:pointer" title="'+item.advice+'">A</span></a></td>'+
               '<td> $'+item.amount+'</td>'+
            '<td><button  id="button'+item.id+'" tagid="'+item.id+'" tagtest="'+item.name+'" tagamount="'+item.amount+'" class="w3-btn w3-blue" onclick="cartadd(this)" disabled data-loading-text="Added"><i id=""  class="w3-padding w3-hover-opacity w3-animate-zoom fa fa-shopping-cart" aria-hidden="true"  style="cursor:pointer"> </i>Added</button></td></tr>';
        }
        });
          
            if (inerhtml==null || inerhtml=="" || typeof inerhtml=="undefined") {
            inerhtml='<tr><td><strong class="testname">'+item.name+'</strong><br><small>'+item.description+'</small></td>'+
               '<td><a class="w3-padding" onclick="plaininfo(this)"><span id=""  class="badge w3-blue" aria-hidden="true" style="cursor:pointer" title="'+item.advice+'">A</span></a></td>'+
               '<td> $'+item.amount+'</td>'+
            '<td><button  id="button'+item.id+'" tagid="'+item.id+'" tagtest="'+item.name+'" tagamount="'+item.amount+'" class="w3-btn w3-blue" onclick="cartadd(this)" data-loading-text="Added"><i id=""  class="w3-padding w3-hover-opacity w3-animate-zoom fa fa-shopping-cart" aria-hidden="true"  style="cursor:pointer"> </i>add cart</button></td></tr>';
            }
              
            headerz= headerz +  inerhtml;
    
    }
   
     });
        headerz += '</tbody></table>';
        return d.child(headerz).show();       
}
function plaininfo(thhis){
    var tr = $(thhis).closest('tr td').find("span").attr("title");
    var modal = '<div class="modal fade" id="modalwarn">'
                +'<div class="modal-dialog w3-round-xlarge " style="width:40%">'
                +'<div class="modal-content w3-white">'
                +'<div class="modal-header" style="border: none;">'
                +'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                +'<span aria-hidden="true">&times;</span></button><h4 class="modal-title"> Warning</h4></div>'
                +'<div class="modal-body w3-text-red"><h3>'
                +tr+
                '</h3></div>';
                removebesmodal()
                $(".specialmodal").html(modal);
                $(".specialmodal").find("#modalwarn").modal("show");
}
var items = [];
loaditem();
function loaditem(){
     $.ajax({
            url:"loadtest",
            data:{_token:_token,id:"h"},
            datatype:"json",
            success:function(data){  
            items = data.item;
            }
        });
}
function submittest(){
    var data =[];
    data.length = 0;
     $(".listopt").find(".tagtest").each(function(){
        data.push({name:"amount[]", value:$(this).attr("tagamount")})
        data.push({name:"id[]", value:$(this).attr("tagid")})
    });
      data.push({name:"total", value:$(".total").text()})
      data.push({name:"patient_id", value:$("input[name=patient_id]").val()})
      data.push({name:"_token", value:_token})
      data.push({name:"doctor_id", value:$("select[name=doctor_id]").val()}) 
     ajaxtoserv(data,null,"array","saveorder");
}