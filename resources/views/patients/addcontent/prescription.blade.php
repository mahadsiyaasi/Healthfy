<?php 
use App\Http\Controllers\medicationController; 
?>
 <?php 
    $var = medicationController::finddrug(Request::get(null));

   ?>

<div class="w3-row-padding" style="position: relative; width: 100%">
	
  
	<div class="" style="position: relative; width: 100%">
		<ul class="w3-ul w3-hover-border-red">
    <form action="#" method="get" class="w3-border-bottom" style="width: 100%">

        <div class="input-group" style="width: 100%">
          
          <h4 class="" style=" width: 100%">


<div class="dropdown" style="display:inline-block; cursor: pointer;">
          <a class="btndropdown-toggle"  data-toggle="dropdown" style="display:inline-block; cursor: pointer;"><i class="fa fa-bars w3-large" style="display:inline-block; cursor: pointer;"></i> <h3 style="display:inline-block; cursor: pointer;" class="box-title">Prescriotions </h3></a>
            <ul class="dropdown-menu w3-card-8 btn-info" >
    <li class="w3-text-white" onclick="popuplist();avoidduplicate();"><a class="w3-text-white"><i class="fa fa-circle"></i>Select Lists</a></li>
  <li class="w3-text-white"><a  href="/patients/{{$patient->id}}" class="w3-text-white"><i class="fa fa-circle"></i>Cancel</a></li>
  </ul>
</div>

         <a class=" w3-btn btn w3-arround w3-text-blue w3-text-bold" style="background: inherit; font-weight: bold;" onclick="popuplist();avoidduplicate();"><i class="fa fa-plus"> Add</i></a>
         <div class="pull-right">
               <a  href="/patients/{{$patient->id}}" class=" w3-btn btn w3-arround w3-text-red w3-text-bold w3-text-red" style="background:inherit;font-weight: bold;"><i class="fa fa-trash"> Cancel</i></a>
               <a class=" w3-btn btn w3-arround w3-text-green w3-text-bold" style="background:inherit;font-weight: bold;" onclick="saveprescription();"><i class="fa fa-save"> Save</i></a>
            </div>
          </h4>


  </div>
         
      </form>
      <form>      
      <table class="w3-table" id="listtable" style="width: 100%; position: relative;">
        
          <thead class="w3-text-gray">
            <td>Drug Name</td>
            <td>Dosage</td>
            <td>Frequency</td>
            <td>Duration</td>
            <td>Instruction</td>
          </thead>
        <tbody>
          
      </tbody>
      </table>
      </form>
  </div>
	</div>
	
</div>

<div class="re-useload" style="display: none;">
    <ul class="w3-ul">
    <form action="#" method="get" class="">
        <div class="input-group">
          <input type="text" id="myInput" onkeyup="myFunction()"  name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="button"  name="search" id="search-btn" onclick="myFunction()" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
         
      </form>
      <div class="w3-padding">
        <div id="">
          
        </div>
      </div>
      <ul id="myUL" class="w3-list w3-ul w3-list-item w3-border">
    @foreach($var as $key => $val)
        <li class="checked fortick" tagid="{{$val['id']}}" tageffect="{{$val['effect']}}" tagstrenght="{{$val['strenght']}}" tagname="{{$val['name']}}" dn="{{$val['dosage_unit_name']}}">  <a href="#"> {{$val['name']}} </a><span class="pull-right"><i class=""></i></span></li>
      @endforeach
      </ul>
  </div>