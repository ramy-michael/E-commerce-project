<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ImageGallery_model;
use App\Products_model;
use Image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu_active =3;
        $product=Products_model::findOrFail($id);
        $imageGalleries=ImageGallery_model::where('products_id',$id)->get();
        return view('backEnd.products.add_images_gallery',compact('menu_active','product','imageGalleries'));
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
    
}
