<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category_model;
use App\Products_model;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=3;
        $i=0;
        $products=Products_model::orderBy('created_at','desc')->get();
        return view('backEnd.products.index',compact('menu_active','products','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=3;
        $categories=Category_model::where('parent_id',0)->pluck('name','id')->all();
        return view('backEnd.products.create',compact('menu_active','categories'));
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
        $menu_active=3;
        $categories=Category_model::where('parent_id',0)->pluck('name','id')->all();
        $edit_product=Products_model::findOrFail($id);
        $edit_category=Category_model::findOrFail($edit_product->categories_id);
        return view('backEnd.products.edit',compact('edit_product','menu_active','categories','edit_category'));
    }
    
}
