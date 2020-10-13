<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search     =   $request->search;
        $product    =   Product::orderBy('id','desc')->where('product_name','like',"%".$search."%")->paginate(15);
        $category   =   Category::all();

        return view('backend/product', compact('product','category'));
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
            $image->move(public_path('image/product-image'), $new_name);

            $form_data  =   array(
            'product_name'  =>  $request->product,
            'category_id'   =>  $request->category_id,
            'price'         =>  $request->price,
            'image'         =>  $new_name
            );
        }
        else
        {
            $form_data  =   array(
                'product_name'  =>  $request->product,
                'category_id'   =>  $request->category_id,
                'price'         =>  $request->price,
                'image'         =>  'default.jpg'
                );
        }

        Product::create($form_data);

        return redirect('backend/product')->with('success','Product created successfully !');
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
        $product    =   Product::findOrFail($request->id);
        $image      =   $request->file('image');

        if($image !='')
        {
            $new_name   =   rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/product-image'), $new_name);

            $form_data  =   array(
                'product_name'  =>  $request->product,
                'category_id'   =>  $request->category_id,
                'price'         =>  $request->price,
                'image'         =>  $new_name
                );
        }
        else
        {
            $form_data  =   array(
                'product_name'  =>  $request->product,
                'category_id'   =>  $request->category_id,
                'price'         =>  $request->price
                );
        }

        Product::whereId($request->id)->update($form_data);
        return redirect('/backend/product')->with('success','Product edited successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->delete();

        return redirect('/backend/product')->with('success','Product deleted successfully !');
    }
}
