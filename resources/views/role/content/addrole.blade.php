<?php 
  use App\http\Controllers\roleController;
  $update_data = roleController::getupdateRole(Request::get('id'));
 ?>
<form method="POST" class="formwork w3-container w3-white" id="role_form" style="background: inherit; display: block;" action="save">
  <div class="warner">
    
  </div>
  @if(Request::get('type')=="new_role")
  
   <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Name</label>
            </div>
              <div class="w3-rest">
             <input type="text" class="w3-input w3-border" name="name" placeholder="name *" style="width: 96%" required>
              </div>
  </div>
  <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Description</label>
            </div>
              <div class="w3-rest">
             <input type="text" class="w3-input w3-border" name="desc" placeholder="Description *" style="width: 96%" required>
              </div>
  </div>
  <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Permissions</label>
            </div>
<div class="w3-rest">
  <div id="roletree" class="" style="width: 96%; position: relative;">
    <ul id="treeData" class="w3-ul w3-li w3-list w3-panel-8 li ul" style="display: none;">
      @foreach($licheck as $val)
      @if($val->parent_id==0)
      <li id="{{$val->id}}" class="folder {{$val->icon}}"  extraClasses="" key="{{$val->id}}" title="{{$val->id}}">{{$val->name}}

        <ul>
          @foreach($licheck as $vals)
          @if($val->id==$vals->parent_id)
              <li id="{{$vals->id}}"  key="{{$vals->id}}" title="{{$vals->id}}">{{$vals->name}}</li>
              @endif
               @endforeach
              </ul>
             

      </li>
      @endif
      @endforeach



    </ul>
  </div>
   </div>
  </div>
  @else
  <input type="hidden" name="_id" value="{{$update_data->role->id}}">
   <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Name</label>
            </div>
              <div class="w3-rest">
             <input type="text" class="w3-input w3-border" name="name" placeholder="name *" style="width: 96%" value="{{$update_data->role->name}}" required>
              </div>
  </div>
  <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Description</label>
            </div>
              <div class="w3-rest">
             <input type="text" class="w3-input w3-border" name="desc" placeholder="Description *" style="width: 96%" value="{{$update_data->role->description}}" required>
              </div>
  </div>
  <div class="w3-row w3-section">
            <div class="w3-col" style="width: 100px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Permissions</label>
            </div>
              <div class="w3-rest">
            
  <?php $id = 0 ; ?> 
  <div id="roletree" class="" style="width: 96%; position: relative;">
    <ul id="treeData" class="w3-ul w3-li w3-list w3-panel-8 li ul" style="display: none;">
      @foreach($licheck as $val)
      @if($val->parent_id==0)
      <li id="{{$val->id}}" class="folder {{$val->icon}}" key="{{$val->id}}" title="{{$val->id}}">{{$val->name}}<ul>  
          @foreach($licheck as $vals)
          @if($val->id==$vals->parent_id)
          <li id="{{$vals->id}}"  key="{{$vals->id}}" data-selected="{{roleController::getRolecheck($vals->id,Request::get('id'))}}" title="{{$vals->id}}">{{$vals->name}}</li>
          @endif 
          @endforeach
        </ul>
             

      </li>
      @endif
      @endforeach



    </ul>
  </div>
   </div>
  </div>
  @endif
</form>
<footer class="w3-container w3-border-top" style="position: relative;">
 <div class=" w3-padding" style=" position: relative; ">
    <div class="pull-right">
     <button type="button" class="btn btn-danger" onclick='saveRole(this)' data-loading-text="<i class='fa fa-circle-o-notch fa fa-spin'></i> Wait">save</button>
                    </div>
                  </div>
</footer>        