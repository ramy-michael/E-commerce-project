<?php

namespace App\Http\Controllers;

use App\User;
use App\Category_model;
use App\ImageGallery_model;
use App\Products_model;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $menu_active=1;
        return view('backEnd.index',compact('menu_active'));
    }
    public function settings(){
        $menu_active=0;
        return view('backEnd.setting',compact('menu_active'));
    }
    public function chkPassword(Request $request){
        $data=$request->all();
        $current_password=$data['pwd_current'];
        $email_login=Auth::user()->email;
        $check_pwd=User::where(['email'=>$email_login])->first();
        if(Hash::check($current_password,$check_pwd->password)){
            echo "true"; die();
        }else {
            echo "false"; die();
        }
    }
    public function bestseller($id=27){
        $menu_active =3;
        $product=Products_model::findOrFail($id);
        $imageGalleries=ImageGallery_model::where('products_id',$id)->get();
        return view('backEnd.products.best_seller',compact('menu_active','product','imageGalleries'));
    }
    
    public function finishedproducts($id=32){
        $menu_active =3;
        $product=Products_model::findOrFail($id);
        $imageGalleries=ImageGallery_model::where('products_id',$id)->get();
        return view('backEnd.products.finished_products',compact('menu_active','product','imageGalleries'));
    }
}
