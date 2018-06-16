        $(document).ready(function() {
        $("#roletree").fancytree({ 
        checkbox: true,
        selectMode: 3,
        icon: function(event, data){
        if(data.node.isFolder() ) {  
        var classe = data.node.extraClasses;
        var child = data.node.children;
        $.each(data.node.children,function(i){
        child[i].icon = "fa fa-folder mafont" 
        })
        data.node.extraClasses = null;  	
        return classe+" mafont" ;

        }
        },
        });
        getroleview();
        })
        saveRole = function(th){
        formdata = [];
        formdata.length=0;
        var form = '#role_form';
        commonvalidator(form); 
        if($(form).valid()){

        var allKeys = $.map($('#roletree').fancytree('getRootNode').getChildren(), function (node) {
        return node;
        });
        $.each(allKeys, function (event, data) {	
        $.each(data.children, function (event, data2) {
        if (data2.selected) {
        formdata.push({name:"child_id[]", value:data2.key});
        }
        });
        });
        $(form).find("input").each(function(){
        formdata.push({name:$(this).attr("name"), value:$(this).val()})
        })
        formdata.push({name:"_token", value:_token})
        if(ajaxtoserv(formdata,"not form","saverole",th).success){
        location.href="/role"
        }
        }
        }
        var Roletable;
        function getroleview(){
        Roletable = $("#role_table").dtab({
        table:"#role_table",
        ajax: {
        type   : "POST",
        url    : 'getroleview',
        data:{_token:_token},
        },
        paging: true,
        sort: true,
        info:true,
        search: true,
        //tabledata: {textFontClass:'w3-text-gray'},
        pagelenght:[10,20,100,350],
        colums:[
        {'title': "Name",   name:"id"},
        {'title': "Name", name:"name",visible:false},
        {'title': "Description",  name:"description"},
        {'title': "Permission Count",  name:"count", status:true}
        ],
        align:'left',
        columndefs:[       
        {
        "render": function (data) {                                     
        return data.name + '<div class="w3-container pull-right" style="display: inline-block"><a href="/role?id='+data.id+'&type=update"><i class="fa fa-edit badge w3-green"> edit </i> </a> |  <i class="fa fa-trash badge allback" data-toggle="modal" data-target="#modal-warn" forid="'+data.id+'" tablename="Roles" onclick="docancels(this)" tabletoreload="Roletable" style="cursor:pointer"> cancel </i></div>';
        },
        "targets": 0
        },

        ],
        "order": {'sort':0 , 'sorttype':'asc'},
        /* "drawCallback": function ( settings ) {
        //console.log(settings)
        var tx = ''; 
        var last=""; 
        $(this.table).find('tbody tr').each(function() {
        var $this = $(this);
        var emptyraw;//='<tr class=""><td  class="" style="height:10px" colspan="2"> </td></tr>';
        var data =  tabletojson(settings,$this)
        header= '<tr><tgroup><td class="w3-light-gray active"> Lab Dr : <span class="badge blue">  '+data.doctor_name+' </span><a class="btn"><i class="fa fa-eye"></i> Detail</a> </th>'
        +'<th class="w3-light-gray active"> Patient : <span class="badge w3-blue">'+data.patient_name+'</span> <a class="btn"><i class="fa fa-eye"></i> Detail</a></th>'
        + '<th class="w3-light-gray active">Total :  <span class="badge w3-green">$ '+data.total_amount+' </span></th>'
        +'<th class="w3-light-gray active"> <span class=""> '+statusController(data.master_status_id,data.master_status,data.master_id,data.patient_id,"test_master",data.test_id)+'  </span></th>'
        +'  </tgroup></tr>'
        $(this).children().each(function(i){
        if ($(this).index()==settings.order.sort && last != $(this).text()) {
        //$(this).parent("tbody").prepend()
        $this.before(header);
        last = $(this).text();
        }

        ///tabletojson(opts,$this)

        })
        })


        }*/

        })
        }

        function addAuth(th){
            var attrId = $(th).attr("_id")
            var closeafterwork = $("body").DeteilView({
             title:' Authentication',
            width:"50%",
            color:"w3-white",
            fade:"w3-animate-zoom",
            buttontext:"Save",
            buttoneventclass:"OK",
            buttoncolor:"w3-blue",
            body:'<form method="POST" action="/checkoutFBkit" id="authform"><input type="hidden" value="'+_token+'" name="_token"> <input type="hidden" value="manualy" name="registered_by"><input type="hidden" value="'+attrId+'" name="id"><div class="warner"></div><div class="modal-body mx-4"><div class="md-form mb-5"><input type="email" placeholder="email" name="email" id="email" class="form-control validate" required><label data-error="wrong" data-success="right" for="Form-email1">Your email</label></div><div class="md-form pb-3"><input type="password" id="Form-pass1" name="password" class="form-control validate" required> <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label></div></form><div class="text-center mb-3"></div>'+
            '<div class="w3-padding"> <div class="row my-3 d-flex justify-content-center w3-padding"> Or Sign up with <button type="button" class="btn btn-white w3-padding btn-rounded mr-md-3 z-depth-1a w3-btn button  w3-blue" onclick="emailLogin();"><i class="fa fa-facebook text-center"></i></button><button type="button" class="btn w3-padding button w3-btn w3-red btn-white btn-rounded z-depth-1a"><i class="fa fa-google-plus"></i></button></div></div></div>',
            savebtn:true,
            cancelbtn:true,
            submitData: function(){
              var data  = ajaxtoserv($("body").find("#authform"),"form","saveUserdata",null);
                if (data.success) {
                  doctors_table.reload();
                  return true;
                  }

            }
          })

        }