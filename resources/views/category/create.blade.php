<div class="modal fade" id="CreateCategory" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12">
                <div class="card card-box-shadow">
                    <div class="card-header" data-background-color="custom-registration">
                        <h4 class="title">Add New Category</h4>
                    </div>
                    <div class="card-content">
                        <form id="autoload">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Category Name</label>
                                        <input name="cat_name" id="cat_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </form>
 
                        <div class="clearfix"></div>


                        @include('layouts.errors')

                        <p class="error text-center alert alert-danger">
                            
                            <ul>
                                
                            </ul>
                        </p>
                        <div class="modal-footer">
                            <button type="submit" id="addCategory" class="btn btn-primary">Add Category</button>
                            <button type="button" class="btn btn-dark cancel">Close</button>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


