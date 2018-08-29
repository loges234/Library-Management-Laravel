<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Book;
use Illuminate\Http\Request; 
use Illuminate\Validation\Rule; 


class CategoryController extends Controller
{

	    // Show Categories on Categories views
    public function show ()
    {
        $categories = Category::where('id','!=','9')->get();
        return view('category.show',compact('categories'));
    }

  public function update(Request $request)
    {  
        // Add Rules 
        $rules = [
        'name' => 'required|unique:categories|min:4',    
        ];
        // Error Messages
        $messages = [
        'name.required' => 'Category Name is required!',
        'name.unique' => 'Category Already Exists!',
        'name.min' => 'Category Name should be at least 4 characters!',
        ];
        // Validate Inputs
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        return response($validator->errors(), 401);
        }
        // Update Book Database and give a json response to show ajax notification

            if ($request->ajax()) {
            $category = Category::find($request->id)->update($request->all());
            return response()->json($category);
            }
    }


    // Category Add Action Using Ajax Request
    public function store(Request $request)
    {
        // Add Rules 
        $rules = [
        'name' => 'required|unique:categories|min:4',    
        ];
        // Error Messages
        $messages = [
        'name.required' => 'Category Name is required!',
        'name.unique' => 'Category Already Exists!',
        'name.min' => 'Category Name should be at least 4 characters!',
        ];
        // Validate Inputs
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
        return response($validator->errors(), 401);
        }
        else {
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return response()->json($category);
        }
    }


    // Category Delete Action Using Ajax Request
    public function destroy(Request $request)
    {  
         Category::find($request->id)->delete();           
         Book::where('book_category','=',$request->id)->update(array(
    'book_category' =>  '9' ) );           
    }

}
