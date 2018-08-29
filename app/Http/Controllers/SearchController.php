<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Book;
use App\Category;

class SearchController extends Controller
{

  
  public function __construct()
    {
          $this->middleware('auth');
    }
    public function searchCategory(Request $request)
    {
     
       	$result = Book::where('book_category','LIKE','%'.$request->term.'%')->distinct()->take(7)->get(['book_category']);  
    		foreach ($result as $key => $value) {
    		$searchResult[] = $value->book_category;    	
    	}
      if (empty($searchResult)) {
     return;
      }
       else {
       return $searchResult;
      }
    } 
    public function searchAuthor(Request $request)
    {
    
        $result = Book::where('book_author','LIKE','%'.$request->term.'%')->distinct()->take(7)->get(['book_author']);  
        foreach ($result as $key => $value) {
        $searchResult[] = $value->book_author;      
      }
      if (empty($searchResult)) {
     return;
      }
       else {
       return $searchResult;
      }
    }
    public function bookSearch(Request $request)
    {
    
        $book_name = Book::where('book_name','LIKE','%'.$request->term.'%')->distinct()->take(10)->get();
        $book_author = Book::where('book_author','LIKE','%'.$request->term.'%')->distinct()->take(10)->get();
       	$book_category = Category::where('name','LIKE','%'.$request->term.'%')->distinct()->take(10)->get();
        foreach ($book_name as $key => $value) {
        $searchResult[] = $value->book_name;
      } 
      foreach ($book_author as $key => $value) {
        $searchResult[] = $value->book_author;
      }
      foreach ($book_category as $key => $value) {
        $searchResult[] = $value->name;
    	}
      if (empty($searchResult)) {
     return;
      }
       else {
       return $searchResult;
      }
    }
    public function searchName(Request $request)
    {
   
        $result = Book::where('book_name','LIKE','%'.$request->term.'%')->distinct()->take(7)->get(['book_name']);  
        foreach ($result as $key => $value) {
        $searchResult[] = $value->book_name;      
      }
      if (empty($searchResult)) {
     return;
      }
       else {
       return $searchResult;
      }
       
    }
    public function issuesearchName(Request $request)
    {

       $issues = DB::table('books')
                ->join('issues','books.id','=','issues.book_id')
                ->join('members','issues.member_id','=','members.member_id')
                ->select('members.*','books.*','issues.*')
                ->where('members.member_email','=', $request->term)   
                ->orWhere('books.book_name','LIKE','%'.$request->term.'%')   
                ->get(); 
        foreach ($issues as $key => $value) {
        $searchResult[] = $value->book_name;      
      }
      if (empty($searchResult)) {
     return;
      }
       else {
       return $searchResult;
      }
       
    }
}
