<div class="modal fade" id="UpdateBook" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12">
                <div class="card card-box-shadow">
                    <div class="card-header" data-background-color="custom-updatebook">
                        <h4 class="title">Update Book Information</h4>
                    </div>
                    <div class="card-content">
                        <form id="form-update">
                            {!! csrf_field() !!} 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label>Book Name</label>
                                        <input name="id" id="id" type="hidden" class="form-control">
                                        <input name="book_name" id="book_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label>Author Name</label>
                                        <input type="text" id="book_author" name="book_author" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label>Category</label>
                                        <select name="book_category" id="book_category" class="form-control" required>
    <option selected class="d-none"></option>
 @foreach($categories as $category) 
 <option value="{!!$category->id!!}">{!!$category->name!!}</option>
 @endforeach

</select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label>Quantity (pcs)</label>

                                        <input name="stock_qty" id="stock_qty" type="number" min='0' max='500' class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="clearfix"></div>

                        @include('layouts.errors')

                        <p class="error text-center alert alert-danger"></p>
                        <div class="modal-footer">
                            <button type="submit" id="update_done" class="btn btn-primary">Update</button>
                            <button type="button" id="update_cancel" class="btn btn-dark " data-dismiss="modal">Discard</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>