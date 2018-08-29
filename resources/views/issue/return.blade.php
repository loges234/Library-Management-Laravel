<div class="modal fade" id="ReturnBook" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Return Book</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
            </div>
            <div class="modal-body">
                <h4>Confirm to return <strong id="issued_book_name"></strong> to Library?</h4>
                <form style="display: none;" >
                    {{ csrf_field()}}
                    <input id="issue_id" type="text" name="issue_id">              
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger yesReturn">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

            </div>
        </div>
    </div>
</div>