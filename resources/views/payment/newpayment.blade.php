<form class="w3-form  form" method="post" id="paymentfm">
  <div class="warner"></div>
	 @if(Request::get("new")=="sub_main")
	 <div class="w3-row-padding">
	 	<div class="w3-half">
	 		 <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Name</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="name" type="text" placeholder="name" value="" required> 
             
              </div>
          </div>
          <div class="w3-half">
	 		 <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Provider</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="provider" type="text" placeholder="Provider" value="" required> 
             
              </div>
          </div>
	 	</div>
	 	 <div class="w3-half">
	 		 <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Main</label>
            </div>
              <div class="w3-rest">
               <select name="parent_id" class="form-control w3-select w-input" required>
               	@foreach($payment as $val)
                @if($val->parent_id==null)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endif
                  @endforeach
                
               </select>
              </div>
          </div>
	 	</div>
	 	</div>
	 	<div class="w3-half ">
	 		 <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px"  >Account</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="account" type="number" placeholder="account" value="" pattern="[0-9]{2,}" required> 
             
              </div>
          </div>
         
	 		 <div class="w3-section" style="width: 100%; padding-top:15px">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Description</label>
            </div>
              <div class="w3-rest">
               <textarea class="w3-textrea w3-input textarea form-control w3-border" placeholder="description Eg passord of the account owner and so " name="desc" required></textarea>
             
              </div>
          </div>
	 	</div>
	 	
         
	 	</div>

	  <input type="hidden" name="type" value="sub">
     <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
             
            </div>
              <div class="w3-rest w3-padding w3-border-top">
               <button type="button" class="btn btn-info w3-large pull-right" onclick='var $this= $(this);  if(ajaxtoserv("#paymentfm",null,"form","savepayment?_token="+_token,this).success){setTimeout(function() {location.href="/payment";$this.button("reset");}, 1000);};' data-loading-text="<i class='fa fa-circle-o-notch fa fa-spin'></i> Wait">Save</button>
              </div>
              </div>
          </div>
	  
          @elseif(Request::get("new")=="main")
            <div class="w3-row-padding">
    <div class="w3-half">
       <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Name</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="name" type="text" placeholder="name" value="" required> 
             
              </div>
          </div>
          <div class="w3-half">
      
    </div>
     <div class="w3-half">

    </div>
    </div>
    <div class="w3-half ">
       <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Provider</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="provider" type="text" placeholder="Provider" value="" required> 
             
              </div>
          </div>
         
      
    </div>
          
         
    </div>
    <input type="hidden" name="type" value="main">

     <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Main</label>
            </div>
              <div class="w3-rest w3-padding">
               <textarea class="w3-input  w3-border" name="desc" placeholder="description"></textarea>
              </div>
          </div>
  
   <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
             
            </div>
              <div class="w3-rest w3-padding w3-border-top">
              <button type="button" class="btn btn-info pull-right" onclick='var $this= $(this);  if(ajaxtoserv("#paymentfm",null,"form","savepayment?_token="+_token,this).success){setTimeout(function() {location.href="/payment";$this.button("reset");}, 1000);};' data-loading-text="<i class='fa fa-circle-o-notch fa fa-spin'></i> Wait">save</button>
              </div>
          </div>
          
      @endif
</form>