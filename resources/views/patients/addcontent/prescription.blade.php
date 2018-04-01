<?php 
use App\Http\Controllers\medicationController; 
?>
 <?php 
    $var = medicationController::finddrug(Request::get(null));

   ?>

<div class="w3-row-padding" style="position: relative; width: 100%">
	
  
	<div class="" style="position: relative; width: 100%">
		<ul class="w3-ul w3-hover-border-red">
    <form action="#" method="get" class="w3-border-bottom">
        <div class="input-group">
          
          <h4 class="">
            Selected List  <a class=" w3-button" onclick="popuplist();avoidduplicate();"><i class="fa fa-plus"> Add</i></a>
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