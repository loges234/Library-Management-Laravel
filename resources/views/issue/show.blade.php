@extends('layouts.master')
@section('search')
<div class="issuebooks-search collapse navbar-collapse">
  <form action="{{ Request::is('issues_not_returned')  ? 'issues_not_returned'  : ''}}"   method="POST" class="navbar-form navbar-right" role="search">
      {{ csrf_field()}}
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
                                <div class="card-header" data-background-color="custom-issuebook">
                                    <h4 class="title">Borrowing History
@if ($not_return_text == 1)
                    {{ '> Not Returned' }}
@endif
                                    </h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                                <th><strong>Book Name</strong></th>
                                <th><strong>Author</strong></th>
                                <th><strong>Member Email</strong></th>
                                <th><strong>Borrower</strong></th>
                                <th><strong>Qty</strong></th>
                                <th><strong>Return Date</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($issues as $issue)
                            <tr>
                          
                                <td>{{ $issue->book_name }}</td>
                                <td>{{ $issue->book_author }}</td>                    
                                <td>{{ $issue->member_email }}</td>                    
                                <td style="cursor: pointer;"  id="user_info_show" data-id="{{ $issue->member_id }}" data-toggle="modal" data-target="#member_info_modal">
                                    <strong>  {{ $issue->member_name }}</strong> 
                                 </td>
                                <td>{{ $issue->issue_qty }}</td>
                                @if ($issue->return_date < now())
                                      <td class="add_fine">{{ date('d - M - Y', strtotime($issue->return_date)) }}</td>
                                      <td class="td-actions">
                                    <button type="button"  rel="tooltip" title="" class="return_book btn btn-danger btn-simple btn-xs" data-original-title="Return Book include Fine" data-qty="{{ $issue->issue_qty }}" data-book_name="{{ $issue->book_name }}" data-book_id="{{ $issue->book_id }}" data-id="{{ $issue->id }}" data-toggle="modal" data-target="#ReturnBook">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </td>
                                  
                                  @else
                                  <td>{{ date('d - M - Y', strtotime($issue->return_date)) }}</td>  
                                  <td class="td-actions">
                                    <button type="button" rel="tooltip" title="" class="return_book btn btn-success btn-simple btn-xs" data-original-title="Return Book" data-qty="{{ $issue->issue_qty }}" data-book_name="{{ $issue->book_name }}" data-book_id="{{ $issue->book_id }}" data-id="{{ $issue->id }}" data-toggle="modal" data-target="#ReturnBook">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </td>             
                                @endif               
                                  
                            </tr>
                            @endforeach
                          </tbody>
                    </table>


                @if  ($links==1)
                    {{$issues->links()}}
                @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    @include('member.info')
                    @include('issue.return')
@endsection


