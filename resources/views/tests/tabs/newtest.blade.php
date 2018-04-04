 <form class="form-horizontal" id="testform">
  <div class="warner"> </div>
  <div class="w3-row-padding">
    <div class="w3-half">
      <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Item</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="inputName" placeholder="item name" required>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Report</label>

                    <div class="col-sm-10">
                      <select  name="report" class="form-control" id="inputName" placeholder="Report " required>
                         <option value="this">This</option>
                      </select>
                    </div>
                  </div>
                       <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">low</label>

                    <div class="col-sm-10">
                      <select  name="lowcheck" class="form-control" id="inputName" required>
                        <option value="yes">Yes</option>
                         <option value="no">Now</option>
                      </select>
    </div>
  </div>

    </div>
    <div class="w3-half">
          <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Amount</label>

                    <div class="col-sm-10">
                      <input type="text" name="amount" pattern="[0-9]{1,}" class="form-control" id="inputName" placeholder="amount $" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Advice </label>

                    <div class="col-sm-10">
                      <textarea class="form-control"  name="advice" id="advice" placeholder="warning or adive" required></textarea>
                    </div>
                  </div>
                     <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Group</label>

                    <div class="col-sm-10">
                      <select  name="group" class="form-control" id="inputName" required>
                      </select>
    </div>
  </div>

             

                  
                  
                  
              </div>
              <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Description </label>

                    <div class="col-sm-10">
                      <textarea class="form-control"  name="desc" id="advice" placeholder="Description" required></textarea>
                    </div>
                  </div>
                
            </div>
            </form>
              <div class="form-group panel w3-padding" style=" position: relative; ">
                    <div class="pull-right">
                      <button type="button" class="btn btn-danger" onclick='var $this= $(this);  if(ajaxtoserv("#testform","form","savetestorder?_token="+_token,this).success){setTimeout(function() {viewonedit.ajax.reload();$this.button("reset");}, 1000);};' data-loading-text="<i class='fa fa-circle-o-notch fa fa-spin'></i> Wait">save</button>
                    </div>
                  </div>
