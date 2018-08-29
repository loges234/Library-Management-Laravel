<?php

namespace App\Http\Controllers;

use Validator;

use Illuminate\Http\Request; 

use Illuminate\Validation\Rule; 

use App\Http\Controllers\Controller;

use App\Book;

use App\Member;

use Carbon\Carbon ;

use Illuminate\Support\Facades\DB;

use App\Issue;

class IssuesController extends Controller
{
    
  public function __construct()
    {
       $this->middleware('auth');
    }
 
  public function search(Request $request)
    {
        if ($request->search_input=='') {    
            return redirect('/issues');
        }
        else {
        $links = 0;
        $not_return_text = 0;
          $issues = DB::table('books')
                ->join('issues','books.id','=','issues.book_id')
                ->join('members','issues.member_id','=','members.member_id')
                ->select('members.*','books.*','issues.*')
                ->where('members.member_email','=', $request->search_input)   
                ->orWhere('books.book_name','LIKE','%'.$request->search_input.'%')   
                ->get(); 
          return view('issue.show', compact('issues','links','not_return_text'));
    }
}
  public function search_not_returned(Request $request)
    {
        if ($request->search_input=='') {
             return redirect('/issues/not_returned');
        }
        else {
             $links = 0;
             $not_return_text = 1;
          $issues =DB::table('books')
                ->join('issues','books.id','=','issues.book_id')
                ->join('members','issues.member_id','=','members.member_id')
                ->select('members.*','books.*','issues.*')                
                ->where('members.member_email','=', $request->search_input)  
                ->orWhere('books.book_name','LIKE','%'.$request->search_input.'%')  
                ->where('return_date', '<', Carbon::now()) 
                ->get(); 


          return view('issue.show', compact('issues','links','not_return_text'));
    }
}

    public function show(){
             $links = 1;
             $not_return_text = 0;
            $issues = DB::table('books')
                ->join('issues','books.id','=','issues.book_id')
                ->join('members','issues.member_id','=','members.member_id')
                ->select('members.*','books.*','issues.*')
                ->orderBy('issues.return_date')
                ->paginate(50);

            return view('issue.show',compact('issues','links','not_return_text'));
        }
    public function not_returned(){
       $not_return_text = 1;
         $links = 1;
            $issues = DB::table('books')
                ->join('issues','books.id','=','issues.book_id')
                ->join('members','issues.member_id','=','members.member_id')
                ->select('members.*','books.*','issues.*')
                 ->where('return_date', '<', Carbon::now())
                 ->orderBy('issues.return_date')
                ->paginate(50);

            return view('issue.show',compact('issues','links','not_return_text'));
        }

        // Store Issue to Issu table
    public function store(Request $request)
    {
            // Perform a Validation
            // Using
            // set of rules    
            // and customized error messages   

        $rules = [
               
                'member_id' => 'required',           
                'book_id' => 'required',
                'return_date' => 'required',
               'issue_qty' => ['required',
                Rule::notIn(['0'])]
            ];
        $messages = [
            'member_id' => 'Please select a valid member.',
            'book_id.required' => 'Try Again.. Something went wrong.',
            'return_date.required' => 'Please select a Issue Return Date.',
            'issue_qty.required' => 'Quantitiy is Required.',
            'issue_qty' => 'Book quantitiy can not be 0.'    
            
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
                 return response($validator->errors(), 401);
        }

        else {
                $issue = new Issue;
              
                $issue->member_id = $request->member_id;
                $issue->book_id = $request->book_id;
                $issue->issue_qty = $request->issue_qty;
                $issue->return_date = $request->return_date;

                $issue->save();

               
                $book = Book::where('id', $request->book_id)->increment('borrow_qty', $issue->issue_qty);
                $issueCounter = DB::table('issueCounter');
                $issueCounter->insert(['qty' => $request->issue_qty]);
                return response()->json($issue);
            }

    }

    public function destroy(Request $request)
        {  
            $issueinfodel = Issue::find($request->id)->delete();      

             $book = Book::where('id', $request->book_id)->decrement('borrow_qty', $request->qty);      
        }
    public function chart(){
        
    }
}
