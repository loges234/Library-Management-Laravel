<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request; 

use Illuminate\Validation\Rule; 

use App\Http\Controllers\Controller;

use App\Book;

use App\Member;

use App\Category;

use App\Issue;


class BooksController extends Controller
    {  
// Constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

 // View All Books
    public function show()
    {
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('book.show',compact('books','categories','links'));
    } 
    public function showPage()
    {
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('book.paginate',compact('books','categories','links'));
    } 
    public function ajaxsearch(Request $request)
    {
    if ($request->term=='') {
       $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('book.paginate',compact('books','categories','links'));
    }
    else {
        $links = 0;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
     ->where('books.book_name','LIKE','%'.$request->term.'%')->orWhere('books.book_author','LIKE','%'.$request->term.'%')->orWhere('categories.name','LIKE','%'.$request->term.'%')->orderBy('books.id','desc')->get();    
     
        $categories = Category::all();
        return view('book.paginate',compact('books','categories','links'));
    }
    } 

 // Book/Author/Category Search
    public function search(Request $request)
    { 
        if ($request->search_input=='') {
        $links = 1;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('categories.name','books.*')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = Category::all();
        return view('book.show',compact('books','categories','links'));
        }
        else {
        $links = 0;
        $books = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')
        ->select('books.*','categories.name')
        ->where('books.book_name','LIKE','%'.$request->search_input.'%')->orWhere('books.book_author','LIKE','%'.$request->search_input.'%')->orWhere('categories.name','LIKE','%'.$request->search_input.'%')->orderBy('books.id','desc')->get();        
       $categories = Category::all();
        return view('book.show', compact('books','categories','links'));
        }
    }
// Add Books Into the Database::Book
    public function store(Request $request)
    {  
    // Add Rules
    $rules = [
                    'id',
                    'book_name' => 'required',
                    'book_author' => 'required|min:4',
                    'book_category' => 'required',           
                    'stock_qty' => ['required',
                    Rule::notIn(['0'])]
    ];
    // Error Messages
    $messages = [
                    'book_name.required' => 'Book name is required!',
                    'book_author.required' => 'Author name is required!',
                    'book_author.min' => 'Author name should be at least 4 characters!',
                    'book_category.required' => 'Category is required',


                    'stock_qty.required' => 'Stock Quantity is required!',
                    'stock_qty' => 'Stock Can not be 0.'         
    ];
    // Validate inputs
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        return response($validator->errors(), 401);
        }

        else {
        $book = new Book;
        $book->book_name = $request->book_name;
        $book->book_author = $request->book_author;
        $book->book_category = $request->book_category;            
        $book->stock_qty = $request->stock_qty;

        $book->save();
        return response()->json($book);
        }
    }
// Get Book Information to set in input fields for UpdateBook.

    public function update(Request $request)
    {
        if($request->ajax()){
            $book = DB::table('books')
        ->join('categories','books.book_category','=','categories.id')            
         ->select('categories.id as category_id','books.*')
         ->where('books.id','=',$request->id)         
         ->get();
       
            return response()->json($book);
        }

    } 
// Get Member Information
    public function MemberInfo(Request $request)
    {
        if($request->ajax()){
        $member = Member::where('member_email','=',$request->member_email)
        ->orWhere('member_id','=',$request->member_email)
        ->get(['member_name','member_id']);     
        return response($member);
        }

    }
// Get Information About the Book
    public function updatebook(Request $request)
    {  
        // Add Rules
            $rules = [
            'book_name' => 'required',
            'book_author' => 'required|min:4',
            'book_category' => 'required',           
            'stock_qty' => ['required',
            Rule::notIn(['0'])]
            ];
        // Error Messages
            $messages = [
            'book_name.required' => 'Book name is required!',
            'book_author.required' => 'Author name is required!',
            'book_author.min' => 'Author name should be at least 4 characters!',
            'book_category.required' => 'Category is required',
            
            'stock_qty.required' => 'Stock Quantity is required!',
            'stock_qty' => 'Stock Can not be 0.'
            ];
            // Validate Input
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
            return response($validator->errors(), 401);
            }

// Update Book Database and give a json response to show ajax notification

            if ($request->ajax()) {
            $book = Book::find($request->id)->update($request->all());
            $book = DB::table('books')
            ->join('categories','books.book_category','=','categories.id')
            ->select('categories.name','books.*')
            ->where('books.id','=', $request->id)
            ->get();
            return response()->json($book);
            }
    }

// Delete The Book
    public function destroy(Request $request)
    {  
                       
       $hasIssue =  Issue::where('book_id','=',$request->id)->first();   
         if($hasIssue){
             return response()->json(400);
         }
         else {
            Issue::where('book_id','=',$request->id)->delete();
            Book::where('id','=',$request->id)->delete();
            return response()->json('300');
        }
               
    }


    }
