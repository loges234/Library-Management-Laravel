                <table class="table table-hover">
                    <thead>
                        <tr>                        	
                            <th><strong>Book Name</strong></th>
                            <th><strong>Author</strong></th>
                            <th><strong>Category</strong></th>
                            <th><strong>Stock Qty</strong></th>
                            <th class="text-center"><strong>Availibility</strong></th>
                            <th class="text-center"><strong>Actions</strong></th>
                        </tr>

                    </thead>
                    <tbody id="ins">

                        @foreach($books as $book)
                      
                        <tr id="book-{!!$book->id!!}">
                            <td class="text-center d-none"> {!!$book->id!!} </td>
                            <td> {!!$book->book_name!!} </td>
                            <td>{!!$book->book_author!!} </td>
                            <td>{!!$book->name!!} </td>
                            <td>{!! $book->stock_qty - $book->borrow_qty !!} out of {!! $book->stock_qty !!}</td>
                            @if($book->stock_qty - $book->borrow_qty == 0)
                            <td class="text-center"><button type="button" rel="tooltip" class="label label-warning btn btn-xs" data-original-title="Not Available">Not Available</button></td>
                            @elseif($book->stock_qty - $book->borrow_qty < 0)
                            <td class="text-center"><button type="button" rel="tooltip" class="label label-danger btn btn-xs" data-original-title="Illigal Issues Here">Something is wrong here</button></td>

                            @else
                            <td class="text-center"><button type="button" rel="tooltip" class="label label-success btn btn-xs" data-original-title="Available">Available</button></td>

                            @endif
                            <td class="text-center">                               
                        </button>
                        @if($book->stock_qty - $book->borrow_qty > 0)
                         <button type="button" rel="tooltip" class="btn btn-warning btn-simple btn-xs" data-toggle="modal" data-target="#IssueModal " data-book_name="{!!$book->book_name!!}" data-id="{!!$book->id!!}" data-book_author="{!!$book->book_author!!}" id="issue" data-original-title="Issue This Book">
                              <i class="material-icons">gavel</i>
                        </button>
                        @endif
                                <button type="button" rel="tooltip" class="btn btn-success btn-simple btn-xs" data-toggle="modal" id="update" data-id="{!!$book->id!!}" data-target="#UpdateBook" data-original-title="Update Information">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" rel="tooltip" class="delete btn btn-danger btn-simple btn-xs" data-toggle="modal" data-target="#DeleteBook" data-id="{!!$book->id!!}" data-book_name="{!!$book->book_name!!}" data-original-title="Delete This Book"> 
                            <i class="fa fa-times"></i>  
                        <div class="ripple-container"></div></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if  ($links==1)
                    {!!$books->links()!!}
                @endif
