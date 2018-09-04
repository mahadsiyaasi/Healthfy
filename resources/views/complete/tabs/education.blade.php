   <?php 
        use Healthfy\Http\Controllers\doctorsController; 
        use Healthfy\Http\Controllers\customerController; 
        $updateData  =doctorsController::getdoctor();
        $knowledge = \Healthfy\Models\Qualification::where("doctor_id",$updateData->id)->where("status_id",">",0)->get();
        $cls = "";
  ?>

  



 <div class="panel-group" id="accordion">
    <div class="panel panel-default">
    @if(!empty($knowledge[0]))
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#educations"><h5 class="box-title">Educations List</h5></a>
        </h4>
      </div>
     
      <div id="educations" class="panel-collapse collapse in">
        <div class="panel-body">
          
  
    <form method="POST"  class=""  id="educationfm" style="background: inherit; display: block;" action="/educationDoctor" >
    <table class="table w3-table table-bordered table-condensed">
      <thead>
        <tr>
          <th>Modify</th>
           <th>School</th>
            <th>College</th>
         <th>Year</th>
         <th>Reference File</th>
          <th>date</th>
    </tr>
  </thead>
  <tbody>
   
    @foreach($knowledge->all() as $val)
     <tr>
        <td class="w3-padding"><a class="button btn"><i class="fa fa-edit"></i> Edit</a>   
        <a class="button btn w3-text-red" data-toggle="modal" data-target="#modal-warn" onclick="directdel(this)"  id="{{$val->id}}" tablename="Qualification" mytag="Qualification"><i class="fa fa-trash"></i> Delete</a></td>
        <td>{{$val->school}}</td>
        <td>{{$val->qualification}}</td>
        <td>{{$val->year}}</td>
        <?php 
          $info = pathinfo($val->file,PATHINFO_EXTENSION);
          $ext =pathinfo($val->file,PATHINFO_EXTENSION);
          $image = ($ext == "docx" ? asset('avatars/doc.png') : $ext == "doc" ? asset('avatars/doc.png') : $ext == "pdf" ? asset('avatars/pdf.png') : $val->file);
         ?>
        <td> <a href="{{$val->file}}"> <img src="{{$image}}" class="user-image img image image-cirle w3-border w3-image-circle w3-circle  circle img-thumbnail w3-hover-opacity" style="width: 40px; height: 40px"> </a> </td>
           
        <td>{{$val->date}}</td>
            </tr>
    @endforeach

  </tbody>
</table>
</form>


        </div>
      </div>
    </div>
    @else
    <?php   
  $cls = "active";

    ?>
    @endif
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#educationview"><h5 class="box-title">Add Educations and Documents</h5></a>
        </h4>
      </div>
      <div id="educationview" class="panel-collapse collapse">
        <div class="panel-body">
          

<form method="POST"  class=""  id="educationfms" action="/educationDoctor" enctype="multipart/form-data">
  <div class="warner"></div>
   <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
         <div class="row">
              <div class="col-sm-6">
                  <div class="form-group">
                   <label class="w3-text-gray w3-small">Qualification *</label>
                     <select class="w3-select w3-border" name="qualification" id="Title" required >
                      <option value="" disabled selected>select qualification . . . </option>
                      @foreach(doctorsController::loaddegrees() as $val)
                       <option value="{{$val->name}}">{{$val->name}}</option>
                      @endforeach  
                    </select> 
                    @if ($errors->has('qualification'))
                     <span class="help-block danger-alert" style="color: red">
                      {{ $errors->first('qualification') }}
                    </span>@endif
                  </div>
                   <div class="form-group">
                   <label class="w3-text-gray w3-small">College *</label>
                   <?php use Healthfy\Models\EnumListing;
                    $Universites = EnumListing::where("group_key","University")->where("type_key","MedicineUniversity")->get();
                    ?>
                     <select class="w3-select w3-border" name="college"  required onended="getselectedOption(this,'{{$updateData->city}}')">
                         <option value="" disabled selected>select unversity ...</option>
                      @foreach($Universites as $uni)

                     <option value="{{$uni->status_name}}">{{$uni->status_name}}</option>

                     @endforeach
                     
                    </select> 
                               @if ($errors->has('college'))
                                                              <span class="help-block danger-alert" style="color: red">
                                                                 {{ $errors->first('college') }}
                                                              </span>
                                                          @endif
                  </div>
                            <div class="form-group">
                      <?php 

                if ($updateData->datebirth) {
                  $range = range(date($updateData->datebirth), date("Y"));
                }else{
                    $range = range(1940, date("Y"));
                }
                 ?>
                  <label class="w3-text-gray w3-small">Complete year *</label>
                 <select class="w3-select w3-border" name="year" id="year" required>
                   <option value="" disabled selected>select year . . .</option>
                     @foreach($range as $year)

                      <option value="{{$year}}">{{$year}}</option>

                     @endforeach
                    </select> 
                     @if ($errors->has('year'))
                                                              <span class="help-block danger-alert" style="color: red">
                                                                 {{ $errors->first('year') }}
                                                              </span>
                                                          @endif
                </div>
                </div>

              
               


        <div class="col-sm-6">

              <div class="form-group">
                
                <div class="text-center">
                  <div class="">
               
                <div class="">
               
                  
                
              
                </div>
                </div>
              </div> 
      </div></div>
           <div class="col-sm-6">
         <div class="w3-display-container w3-hover-opacity">
          
           
        <div class="row w3-border">
          <div class="col-sm-6 w3-border-right" style="width: 50%">
            <button onclick="$('#imagedoctors').trigger('click')" class="btn "  type="button" style="background: inherit;">
                 <img src="{{ asset('avatars/upload.png')}}" class="img image w3-image" id="fileload" style="width: 100%; height: 80%; position: relative;"></button>
                 </div>
                 <div class="col-sm-6">
                  <p id="refdetail">
                     Upload reference files of your education  . . .
                     <br>
                     Available files you can upload is Pdf file document file  or image (png or jpg)
                  </p>
                 </div>
                  
                </div>
                 <div class="w3-display-middle w3-display-hover"><button   type="button" onclick="$('#imagedoctors').trigger('click')" class="w3-button w3-red  w3-center">Choose New File</button> </div>
                 <input type="file" onchange="return fileValidationpdf('imagedoctors','fileload')"  name="imagefile" id="imagedoctors" style="display: none;" class="user-image img image image-cirle w3-border" style="width: 100%;">
              </div>
               @if ($errors->has('imagefile'))
                                                              <span class="help-block danger-alert" style="color: red">
                                                                 {{ $errors->first('imagefile') }}
                                                              </span>
                                                          @endif
       </div>                

   
        
  </div>
     <div class="w3-padding">
                        
        <p  class="">    
          Changes made here requires varification, if its not reflected back in 48 hours please contact with the assistance <a href="/feedback"> Here</a>

          <div class="pull-right" style="display: inline-block;"><button class="w3-button w3-teal w3-text-white w3-hover" type="submit">Save</button></div>                      
        </p>
      </div>
</form>



        </div>
      </div>
    </div>
    </div> 
</div>