<div class="modal fade" id="IssueModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">       
       <div class="col-md-12">
                            <div class="card card-box-shadow">
                                <div class="card-header" data-background-color="custom-issuebook">
                                    <h4 class="title">Borrow Book</h4>
                                </div>
                                <div class="card-content">
                                    <form id="form-issue">
                                        {!! csrf_field() !!}
                                        <div class="row">
                                            <div class="col-md-12 GetIssueInfo text-center ">  
                                        
                                        <input type="hidden" id="show_book_id"> 
                     <h4><b><span id="show_book_name"></span> </b> by <span id="show_book_author"></span>
                                         </h4>
                                         </div>
                                     </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Member Email/ID</label>
                                                    <input type="text" id="member_email" class="form-control" required>                               
                                                    <input type="hidden" id="member_id">                               
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">                                                   
                                                   <h4><span id="member_name"></span> 
                                                    <span class="tickCorrect"><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></span>
                                                  
                                                </h4>
                                                </div>
                                            </div>
                                        </div>
                                             <div class="row">
                                                
                                             <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Quantity (pcs)</label>

                                                    <input type="number" id="issue_quantity" min = '0' max = '500' class="qty-collect form-control" required="true">
                                                </div>
                                            </div>
                                                        <div class="col-md-6">
                                                                <div class="form-group label-static">
                                                                <label class="control-label">Return Date</label>
                                                                <input type="date" id="issue_return_date" class="date-collect datepicker form-control" required="">
                                                                <span class="material-input"></span></div>
                                                        </div>
                                            </div>
                                      
                                                  </form>
                                      
                                        <div class="clearfix"></div>

                              
                               <p class="error text-center alert alert-danger hidden"></p>
                        <div class="modal-footer">
                            <button type="submit" class="btn issue-add btn-primary" id="issue_done">Issue Book </button>
                                        <button class="btn btn-dark" id="modal-issue_cancel" data-dismiss="modal">Cancel</button> 
                         </div>      
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>
