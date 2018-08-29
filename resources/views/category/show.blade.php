@extends('layouts.master') 
@section('content')

<div class="row text-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-header" data-background-color="custom-book">
                <h4 style="display: inline;" class="title">Categories</h4>
                <a style="cursor: pointer;" type="button" rel="tooltip" title="" class="add_book pull-right" data-toggle="modal" data-target="#CreateCategory" data-original-title="Add New Category">   
                 <i class="material-icons">add</i>
                </a>
            </div>
            <div class="card-content table-responsive">
                <table class="table table-hover">
         <thead>
                            <tr>
                               <th class="text-center"><strong>No.</strong></th>
                                <th><strong>Category Name</strong></th>
                                <th><strong>Actions</strong></th>

                            </tr>
                        </thead>
                    <tbody>
                        @foreach($categories as $category)                      
                        <tr>
                          <td class="text-center">
                            {{$category->id}}
                          </td>
                            <td class="text-left"> 
                               {{$category->name}} 
                            </td>
                            <td class="text-center"> 
        
                  <button type="button" rel="tooltip" class="btn btn-success btn-simple btn-xs" data-toggle="modal" id="UpdateCategory" data-id="{{$category->id}}" data-name="{{$category->name}}" data-target="#updateCat" data-original-title="Edit">
                  <i class="fa fa-edit"></i>
                  </button> 
             
                 <button type="button" rel="tooltip" title="" class="delete_category btn btn-danger btn-simple btn-xs" data-original-title="Delete" data-id="{{$category->id}}" data-toggle="modal" data-target="#memberDelete">  
                <i class="fa fa-times"></i>  
                   </button>
   

                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@include('category.create')

@include('category.update')
@include('member.delete')

@include('book.error')

@endsection