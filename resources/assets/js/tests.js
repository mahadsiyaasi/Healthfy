var test_view;
var viewonedit ;
$(document).ready(function(){
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

  
	 viewonedit= $('#Tests').DataTable({
        "initComplete": function( settings, json ) {
    $('div.loading').remove();
         },
    paging: true,
    searching: { "regex": true },
    lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
    pageLength: 10,
     "bProcessing": true,
     "bPaginate":true,
          "sPaginationType":"full_numbers",
             ajax:{
        url: "loadtest", // Change this URL to where your json data comes from
        type: "POST", // This is the default value, could also be POST, or anything you want.
        data: function(d) {
            //d.patient_ids = $("input[name=patient_ids]").val(),
            d.filter = "DataTable",
            d._token  = _token
            },

    },
           //"sAjaxSource":'?_token='+$('meta[name="csrf-token"]').attr('content'),
           
          columns: [
            {title:"Action", data: 'Action', name: 'Action',width:5 },
            { title:"Name",data: 'name', name: 'name' , width:10 },
            {title:"Description", data: 'description', name: 'description',width:200 },
            {title:"Advice", data: 'advice', name: 'advice', width:10 },            
            { title:"Amount",data: 'amount', name: 'amount',width:20},
            { title:"id",data: 'id', name: 'id', visible:false},
            ],
        "columnDefs": [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'width': '1%',
         "bJQueryUI": true,     
         "bAutoWidth": false,
         'className': 'dt-body-center',
         "render": function ( data, type, row ) {
          return '<a class="w3-padding" onclick="edititem(this)"><i id=""  class=" w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer"></i></a>' + 
             '<a data-toggle="modal" data-target="#modal-warn" onclick="testthis(this)" ><i id="" class="fa fa-trash-o w3-large w3-hover-w3-pale-blue w3-panel-8 w3-hover-opacity w3-animate-zoom warn" style="cursor:pointer" data-title="Goto twitter?" aria-hidden="true"></i></a>';
         },

      },
             {
                "render": function ( data, type, row ) {
                    return "<a href='/tess/?update="+row.id+"'>"+row.name+"</a>";
                },
                "targets": 1
            }
        ]
    });

$(".new_group").click(function(){
modalmakeup({
	title:"New Group",
	width:"50%",
	color:"w3-white",
	fade:"w3-animate-zoom",
	buttontext:"save",
	buttoneventclass:"saveg",
	buttoncolor:"w3-blue",
	buttons: {
                saveg: function() {
                    alert("this paresed")
                    
                },
                "Cancel": function() {
                    $(this).dialog("close");
                }
            },
	body :' <div class="form-group"><label for="inputName" class=" control-label">Group name</label><div class=""><input type="text" pattern="[a-z 0-9]{3,}" name="groupname" class="form-control" id="inputName" placeholder="group name "></div></div>'
	});
 $("#oncreate").on("click",".saveg",function(e){
 	 var $this = $(this);
  	if ($("body").find("input[name=groupname]").val() !="") {
 	 	$this.button('loading');
 	 	$.ajax({
 	 		url:"savegroup",
 	 		data:{_token:_token,gn:$("body").find("input[name=groupname]").val()},
 	 		datatype:"json",
 	 		success:function(data){
 	 			$this.button('reset');
 	 			$("body").find("input[name=groupname]").val("")
 	 			$("body").find("#oncreate").modal("hide");
 	 			$("body").find('#oncreate').on('hidden',function(e){
				    $(this).remove();
				});
 	 			grouplist();
 	 			}
 	 	})
 	 }
 	 e.stopPropagation();
 })
})
})

function modalmakeup(array){
	var wait = '<i class=a fa-circle-o-notch fa-spin></i>'
	var modal = '<div class="modal  w3-card-8 w3-border w3-round-medium" id="oncreate">'
          		+'<div class="modal-dialog   w3-round-medium w3-card-8 w3-card w3-panel-8 w3-border " style="width:'+array.width+'">'
            	+'<div class="modal-content '+array.color+'">'
              	+'<div class="modal-header" style="border: none;">'
                +'<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                +'<span aria-hidden="true">&times;</span></button><h4 class="modal-title">'+array.title+'</h4></div>'
              	+'<div class="modal-body">'
              	+array.body+
                '</div><div class="modal-footer" style="border: none;">'
                +'<button type="button" onclick= "removebesmodal()" class="btn w3-text-red dismism" data-dismiss="modal" style="background:inherit">Close</button>'
                +'<button type="button" class="btn  '+array.buttoneventclass+' w3-text-blue" style="background:inherit" data-loading-text="'+wait+' Wait">'+array.buttontext+'</button></div></div></div></div>';
                removebesmodal()
 	 			$(".specialmodal").html(modal);
                $(".specialmodal").find("#oncreate").modal("show");
}

grouplist();
function grouplist(){
	var tthis  = "Tests"
		$.ajax({
 	 		url:"/loadtest",
 	 		data:{_token:_token},
 	 		datatype:"json",
 	 		success:function(data){
 	 			$(".listholder").html("");
 	 			$("select[name=group]").html("")
 	 			$.each(eval(data.group), function(i,item){
                    $("testnew_tab").html('<div class="box">'
        +'<div class="box-header with-border">'
          +'<h3 class="box-title">'+item.name+'</h3>'
          +'<div class="box-tools pull-right">'
            +'<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">'
              +'<i class="fa fa-minus"></i></button></div></div>'
        +'<div class="box-body"></div></div>');
 	 			$("select[name=group]").append('<option value="'+item.id+'">'+item.name+'</option>');
 	 			$(".listholder").append(' <li class="list-group-item"><div class="w3-row-padding" style="width:100%; padding: 0px 0px 0px 0px"><div class="w3-half" style="width:50%"><b>'+item.name+'</b></div><div class="w3-half pull-right" style="width:50%"> <a class="pull-right"><span class="badge w3-black w3-hover-red" style="cursor:pointer" data-toggle="tooltip" data-placement="top" onclick="rangemodal(this)" grouptag="'+item.id+'" title="click to add range"><i class="fa fa-plus"></i></span>| <span style="cursor:pointer" class="badge w3-green w3-hover-red" id="'+item.id+'" itemname="'+item.name+'"  data-toggle="tooltip" data-placement="top" title="Edit this test name" onclick="editgroup(this)"><i class="w3-small fa fa-edit "></i></span><span data-placement="top" title="click to delete this test " class="badge w3-red w3-hover-green" data-toggle="modal" data-target="#modal-warn" id="'+item.id+'" mytag="Tests" onclick="directdel(this)"> <i class="fa fa-trash" style="cursor:pointer"></i></span></a></div></li>');
 	 			})
 	 			
 	 			
 	 		}
 	 	})
}
loadunitrange();
function loadunitrange(){
    $.ajax({
            url:"loadrange",
            data:{_token:_token},
            datatype:"json",
            success:function(data){
                $("#ref-table tbody").html("");
                $.each(eval(data.range),function(i,item){
                 $("#ref-table tbody").append('<tr><td>'+item.max+'</td><td>'+item.min+'</td><td>'+item.name+'</td></tr>');   
                })
                $("#unit-table tbody").html("");
                $.each(eval(data.unit),function(i,item){
                 $("#unit-table tbody").append('<tr><td>'+item.unit+'</td><td>'+item.name+'</td></tr>');   
                })

            }
        })
}