<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book; 
use App\Member;
use App\Issue;
use Carbon\Carbon ;
class DashboardController extends Controller
{

	
  public function __construct()
    {
        $this->middleware('auth');
    }
        public function show(){

$fromDate = Carbon::now()->startOfMonth()->subMonth(0)->toDateString();
$tillDate = Carbon::now()->toDateString();
$chart = DB::table('issueCounter')->select( DB::raw('DATE(`created_at`) as `date`'),DB::raw('COUNT(*) as `count`'))
    ->where( DB::raw('DATE(`created_at`)'), '>=', $fromDate )    
    ->where( DB::raw('DATE(`created_at`)'), '<=', $tillDate )    
    ->groupBy('date')
    ->orderBy('date', 'asc')
    ->pluck('count', 'date');

  $total_qty = DB::table('books')
 ->join('categories','books.book_category','=','categories.id')
  ->sum('books.stock_qty') - DB::table('books')
 ->join('categories','books.book_category','=','categories.id')
  ->sum('books.borrow_qty')
  ; 
  $total_issue_qty = DB::table('issues')->count('id');
	$total_issue_not_retrun_qty = DB::table('issues')->whereDate('return_date', '<', Carbon::now())->count();
  $total_members = DB::table('members')->count('member_id');   

	return view('dashboard.show',compact('total_qty','total_category','total_members','total_issue_qty',
'total_issue_not_retrun_qty','chart'));


    }
}
