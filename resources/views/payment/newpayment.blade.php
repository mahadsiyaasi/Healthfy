<form class="w3-form  form">
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
               	
               </select>
              </div>
          </div>
	 	</div>
	 	</div>
	 	<div class="w3-half ">
	 		 <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Account</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="account" type="number" placeholder="account" value="" required> 
             
              </div>
          </div>
         
	 		 <div class="w3-section" style="width: 100%; padding-top:15px">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Description</label>
            </div>
              <div class="w3-rest">
               <textarea class="w3-textrea w3-input textarea form-control w3-border" placeholder="description Eg passord of the account owner and so " name="desc"></textarea>
             
              </div>
          </div>
	 	</div>
	 	
         
	 	</div>
	 </div>
	  
          @elseif(Request::get("new")=="main")
           <div class="w3-section" style="width: 100%">
            <div class="w3-col" style="width: 70px">
              <label class="w3-col w3-small" style="bottom: -10px;position: relative; text-align: right; margin-left: -13px">Strenght</label>
            </div>
              <div class="w3-rest">
               <input class="w3-input w3-border" name="strenght" type="number" placeholder="strenght" value="" required> 
             
              </div>
          </div>
      @endif
</form>