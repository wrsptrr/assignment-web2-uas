<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
use App\Category;



class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search     =   $request->search;
        $size       =   size::orderBy('id','desc')->where('size','like',"%".$search."%")->paginate(15);
        $category   =   category::all();
        return view('backend/size', compact('size','category'));
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
        Size::create($request->all());
        
        return redirect('backend/size')->with('success','Size created successfully !');
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
        $size = Size::findOrFail($request->id);
        $size->update($request->all());

        return redirect('/backend/size')->with('success','Size edited successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $size = Size::findOrFail($request->id);
        $size->delete();
        
        return redirect('/backend/size')->with('success','Size deleted successfully !');
    }
}
