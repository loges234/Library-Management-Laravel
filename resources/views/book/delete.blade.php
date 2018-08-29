<div class="modal fade" id="DeleteBook" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Delete Book</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
            </div>
            <div class="modal-body">
                <h4>Are You Sure To Delete <strong id="show_delete_name"></strong> from Library?</h4>
                <form style="display: none;" >
                    {!! csrf_field()!!}
                    <input id="show_delete_id" type="text" name="id" id="id">              
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger yesDel">Yes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

            </div>
        </div>
    </div>
</div>