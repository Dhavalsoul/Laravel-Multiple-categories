<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorylist = Category::get();
        return view('categorylist', array('categorylist' => $categorylist));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = 0;
        $parentCategory = category::where('parent',$cat)->get();
        return view('addcategory',['parentlist' => $parentCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $this->validate($request, [
            'parent' => 'required|max:255',
            'category_name' => 'required|string|max:100',
            'pdf' => 'max:5120 | mimes:pdf',
            'status' => 'required',
        ]);

        // request()->pdf->move(public_path('uploads'), $request->pdf);
        // print_r($request->post());
        // print_r($request->pdf);
        // exit;
        // if ($files = $request->file('pdf')) {
        // // Define upload path
        //    $destinationPath = public_path('/uploads/'); // upload path
        // // Upload Orginal Image           
        //    $pdffile = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //    $files->move($destinationPath, $pdffile);
        // }
        /*
            $files = $request->pdf;
            $pdffile=$files->getClientOriginalName();  
            $files->move('pdf',$pdffile);
            $category->pdf=$files;
        */
        

        $category = new Category();
        $category->parent = $request->parent;
        $category->category_name = $request->category_name;
        $category->pdf = $request->pdf;

        // $filename = $request->pdf;
        // $destinationPath = '/uploads/';
        // $request->file('pdf')->move($destinationPath, $filename);
        if ($request->pdf) {
                $filename = $request->pdf->store('pdf');
                $category->pdf = $filename;
            }
        // $request->file('pdf')->store('/uploads/');

        $category->status = $request->status;
        $category->created_at = date('Y-m-d');
        $category->updated_at = date('Y-m-d');
        

        

        if ($category->save()) {
            return redirect()->back()->with('success', 'New category is added.');
        } else {
            return redirect()->back()->withInput($request);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //echo 'Edit: '.$id.'<pre>';
        $viewdata = [];
        $categoryData = Category::find($id);
        $parentCategory = category::where('parent',0)->get();
        $viewdata['parentlist'] = $parentCategory;
        $viewdata['categorydata'] = $categoryData;
        return view('addcategory', $viewdata);
        //return view('addcategory' , compact('categorylist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        // echo 'upadte Cat ID: '.$id;
        // exit; 
        $this->validate($request, [
            'parent' => 'required|max:255',
            'category_name' => 'required|string|max:100',
            // 'pdf' => 'max:5120 | mimes:pdf',
            'status' => 'required',
        ]);

        $category = Category::find($id);
        $category->parent = $request->parent;
        $category->category_name = $request->category_name;

        // $filename = $request->pdf;
        // $destinationPath = '/uploads/';
        // $request->file('pdf')->move($destinationPath, $filename);
        if ($request->pdf) {
                $filename = $request->pdf->store('pdf');
                $category->pdf = $filename;
                $category->pdf = $request->pdf;
                @unlink(storage_path('app/' . $category->pdf));
            }else{
                $category->pdf = $request->hidden_pdf;
            }
        // $request->file('pdf')->store('/uploads/');

        $category->status = $request->status;
        $category->created_at = date('Y-m-d');
        $category->updated_at = date('Y-m-d');

        if ($category->save()) {
            return redirect()->route('category.index')->with('success', 'Category updated successfully.');
        } else {
            return redirect()->back()->withInput($request);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Boat deleted successfully');
    }
}
