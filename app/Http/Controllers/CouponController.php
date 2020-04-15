<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Coupon_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=4;
        $coupons=Coupon_model::all();
        return view('backEnd.coupon.index',compact('menu_active','coupons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_active=4;
        return view('backEnd.coupon.create',compact('menu_active'));
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
        $menu_active=4;
        $edit_coupons=Coupon_model::findOrFail($id);
        return view('backEnd.coupon.edit',compact('menu_active','edit_coupons'));
    }
    
}
