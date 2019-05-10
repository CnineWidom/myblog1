<?php

namespace App\Http\Controllers;

use App\Http\Requests\myRequest;

use Intervention\Image\ImageManager;

use App\image;class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public  function dologin(myRequest $request,ImageManager $image){
        $path = public_path();
        if($request->route('account')){
            $user = (int)$request->route('account');
        }
        else $user = (int)$request->get('account');
        $user = empty($user)? '':$user;
        $imageRes = image::where('id','=',$user)->first();
        $imagePath = $path.$imageRes->image_load;
        if(file_exists($imagePath)){
            $imageEndcode = (string)$image->make($imagePath )->resize(40,40)->encode('png',75);
            $base64_encode = 'data:image/png;base64,'.base64_encode($imageEndcode);
        }else $base64_encode = '111';
        $data = [
            'user' => $imageRes->author,
            'image' => $base64_encode,
            'id' =>$user
        ];
        return view('index',$data);
    }
}
