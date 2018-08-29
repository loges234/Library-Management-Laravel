<?php


Route::get('/admin','HomeController@admin_settings'); 
Route::post('/adminUpdate','HomeController@update'); 
Route::get('/','DashboardController@show'); 

Route::post('addCategory','CategoryController@store'); 
Route::get('categories','CategoryController@show'); 

Route::get('/books','BooksController@show');
Route::get('/books/paginate','BooksController@showPage');
Route::get('/books/ajaxsearch','BooksController@ajaxsearch');
Route::get('/book/edit','BooksController@update'); 

Route::get('/member/info','MembersController@show'); 
Route::get('/member/getinfo','MembersController@show'); 
Route::post('/member/update','MembersController@update'); 
Route::post('/member/create','MembersController@store'); 
Route::post('/member/delete','MembersController@destroy'); 
Route::post('/category/delete','CategoryController@destroy'); 

Route::post('addbook','BooksController@store');
Route::post('books/importCsv','BooksController@importCsv');
Route::post('delete','BooksController@destroy');
Route::post('returnBook','IssuesController@destroy');
Route::post('updatebook','BooksController@updatebook');
Route::post('updatecat','CategoryController@update');

Route::get('/issue_book','IssuesController@create');
Route::get('/issues','IssuesController@show');
Route::post('/issues','IssuesController@search');
Route::post('/issues_not_returned','IssuesController@search_not_returned');
Route::get('/issues_not_returned','IssuesController@not_returned');
Route::post('issueBook','IssuesController@store');

Route::get('/registration','UsersController@create');
Route::get('members','UsersController@show');
Route::post('members','MembersController@search');

Route::get('catSearch','SearchController@searchCategory');
Route::get('nameSearch','SearchController@searchName');
Route::get('issuesearchName','SearchController@issuesearchName');
Route::get('authorSearch','SearchController@searchAuthor');
Route::get('bookSearch','SearchController@bookSearch');

Route::get('book/issue','BooksController@MemberInfo');
Route::post('/books','BooksController@search');

Auth::routes();

