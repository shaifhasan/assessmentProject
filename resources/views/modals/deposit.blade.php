<div id="addDepositModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('deposit_amount')}}" id="add_form">
                <div class="modal-header">
                    <h4 class="modal-title">Add Information</h4>
               
                   
                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <span id="form_output"></span>
                  
                               
                    <div class="form-group">
                        <label>Deposit Amount</label>
                       
                       
                        <input type="number" name="deposit_amount" min='0'  class="form-control" required />
                    </div>

                 
                            
                </div>
                <div class="modal-footer">
                  <input type="hidden" name="button_action" id="button_action" value="insert"/>
                    <input type="submit" name="submit" value="Submit" class="btn btn-info" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close </button>
                </div>
            </form>
        </div>
    </div>
</div>

