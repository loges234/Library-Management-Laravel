@extends('layouts.master')
@section('search')
<div class="collapse navbar-collapse">
    <form method="POST" action="members" class="navbar-form navbar-right" role="search">
      {{csrf_field()}}
        <div class="form-group  is-empty">
            <input type="text" class="form-control" name="search_input" placeholder="Search...">
            <span class="material-input"></span>
        </div>
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
            <i class="material-icons">search</i>
            <div class="ripple-container"></div>
        </button>
    </form>
</div>
@endsection 
   @section('content') 
<div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header" data-background-color="custom-bookrequisition">
                  <h4 class="title">Members Information</h4>
              </div>
              <div class="card-content table-responsive">
                  <table class="table table-hover">
      <thead>
          <tr>
              <th class="text-center"><strong>IC</strong></th>
              <th class="text-center"><strong>Member Name</strong></th>
			  <th class="text-center"><strong>Email.</strong></th>
              <th class="text-center"><strong>Contact No</strong></th>
              <th class="text-center"><strong>Member Since</strong></th>			  
              <th><strong>Actions</strong></th>
          </tr>
      </thead>
      <tbody>
        @foreach($members as $member)
          <tr>
              <td class="text-center">{{$member->member_nid_no}}</td>
             <td class="text-center" style="cursor: pointer;"  id="user_info_show" data-id="{{ $member->member_id }}" data-toggle="modal" data-target="#member_info_modal">
              <strong>{{ $member->member_name }}</strong> 
             </td>
              <td class="text-center">{{$member->member_email}}</td>
              <td class="text-center">+60{{$member->member_contact}}</td>
              <td class="text-center">{{$member->created_at->diffForHumans()}}</td>
              <td class="td-actions" > 
                <form>
                {{ csrf_field() }}
                <input type="hidden" id="member_id" name="member_id" value="{{$member->member_id}}" >
                </form>     
                  <button type="button" rel="tooltip" class="btn btn-success btn-simple btn-xs" data-toggle="modal" id="updateMember" data-id="{{$member->member_id}}" data-target="#UpdateMember" data-original-title="Update Member Information">
                  <i class="fa fa-edit"></i>
                  </button>      
                 <button type="button" rel="tooltip" title="" class="delete_member btn btn-danger btn-simple btn-xs" data-original-title="Remove This Member" data-toggle="modal" data-target="#memberDelete">  
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
   @include('member.info')
      @include('member.delete')
      @include('member.update')

      @include('book.error')

   @endsection