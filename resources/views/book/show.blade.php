@extends('layouts.master') 

@section('search')

@if(session()->has('message'))
    <div class="alert alert-success">
        {!! session()->get('message') !!}
    </div>
@endif
<div class="collapse navbar-collapse">
  <div class="books-search navbar-form navbar-right" role="search">
      {!! csrf_field()!!}
      <div class="form-group  is-empty">
             <input type="text" class="form-control" name="search_input" placeholder="Type & Search...">
            <span class="material-input"></span>
        </div>
        <button class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>        
    </div>
</div>
@endsection 

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="custom-book">
                <h4 style="display: inline-block;" class="title">Book List</h4>
                  <a style="cursor: pointer;" type="button" rel="tooltip" title="" class="add_book pull-right" data-toggle="modal" data-target="#CreateBook" data-original-title="Add New Book">   
                 <i class="material-icons">add</i>
                </a>
            </div>
            <div class="book_ajax_paginatable card-content table-responsive">
                @include('book.paginate')              
            </div>
        </div>
    </div>
</div>

   <div class="clearfix"></div>
@include('book.create') 
              <div class="clearfix"></div>
@include('book.update') 
              <div class="clearfix"></div>
@include('book.delete') 
              <div class="clearfix"></div>
@include('book.cantdelete') 
              <div class="clearfix"></div>              
@include('issue.create')
              <div class="clearfix"></div>

@include('book.error')

@endsection