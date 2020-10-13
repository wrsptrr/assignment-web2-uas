<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search     =   $request->search;

        $category   =   Category::where('category','like',"%".$search."%")->orderBy('id', 'desc')->paginate();
        return view('backend/category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image      =   $request->file('image');

        if($image)
        {
            $new_name   =   rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/category-image'), $new_name);

            $form_data  =   array(
                'category'  =>  $request->category,
                'image'     =>  $new_name
            );
        }
        else
        {
            $form_data  =   array(
                'category'  =>  $request->category,
                'image'     =>  'default.jpg'
                );
        }

        Category::create($form_data);

        return redirect('backend/category')->with('success','Category created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category   =   Category::findOrFail($request->id);
        $image      =   $request->file('image');

        if($image !='')
        {
            $new_name   =   rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/category-image'), $new_name);

            $form_data  =   array(
                'category'   =>  $request->category,
                'image'      =>  $new_name
                );
        }
        else
        {
            $form_data  =   array(
                'category'   =>  $request->category,                 
                );
        }

        Category::whereId($request->id)->update($form_data);

        return redirect('/backend/category')->with('success','Category edited successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();

        return redirect('/backend/category')->with('success','Category deleted successfully !');
    }
    
    public function search(Request $request)
    {
        $search     =   $request->search;

        $purchase   =   Purchase::where('id','like',"%".$search."%")->paginate();

        return view('backend/purchase', compact('purchase'));
    }

    
}
