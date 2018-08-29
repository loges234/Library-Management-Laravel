<div class="modal fade" id="CantDeleteBook" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>Can't Delete!</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
            </div>
            <div class="modal-body">
                <h4>'<strong id="show_delete_name"></strong>' book has not returned!</h4>
                <p>Get book from the borrower and then try again.</p>
                <form style="display: none;" >
                    {!! csrf_field()!!}
                    <input id="show_delete_id" type="text" name="id" id="id">              
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>