<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Document_Studies;
use App\Models\Student_Info;
use App\Models\College;
use App\Models\Course;
use App\Models\Tag1;
use App\Models\Tag2;
use App\Models\Tag3;
use App\Models\Tag4;


class AdminViewsController extends Controller
{
    public function overview(){

        $document_studies = Document_Studies::paginate(10);
        $student_info = Student_Info::paginate(10);
        $college = College::paginate(10);
        $course = Course::paginate(10);
        $tag1 = Tag1::paginate(10);
        $tag2 = Tag2::paginate(10);
        $tag3 = Tag3::paginate(10);
        $tag4 = Tag4::paginate(10);

      
        return view('AdminViews.overview',compact('document_studies'),compact('student_info'),compact('college'),compact('course'),compact('tag1'),compact('tag2'),compact('tag3'),compact('tag4'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function manageaccount(){
        return view('AdminViews.manageaccount');
    }
    public function managedocument(){
        return view('AdminViews.managedocument');
    }
    public function addnewaccount(){
        $total_accounts = DB::select("SELECT COUNT('library_id_number') as total_accounts
            FROM student_info");


        $student_number = Str(Carbon::now()->format('y')).sprintf('%05d', $total_accounts[0]->total_accounts+1);


        return view('AdminViews.addnewaccount')->with(compact('student_number'));
    }
    public function addnewdocument(){
        return view('AdminViews.addnewdocument');
    }










    // public function index()
    // {
        
    // }
  
    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('products.create');
    // }
  
    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'detail' => 'required',
    //     ]);
      
    //     Product::create($request->all());
       
    //     return redirect()->route('products.index')
    //                     ->with('success','Product created successfully.');
    // }
  
    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Product $product)
    // {
    //     return view('products.show',compact('product'));
    // }
  
    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Product $product)
    // {
    //     return view('products.edit',compact('product'));
    // }
  
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'detail' => 'required',
    //     ]);
      
    //     $product->update($request->all());
      
    //     return redirect()->route('products.index')
    //                     ->with('success','Product updated successfully');
    // }
    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Product $product)
    // {
    //     $product->delete();
       
    //     return redirect()->route('products.index')
    //                     ->with('success','Product deleted successfully');
    // }


}
