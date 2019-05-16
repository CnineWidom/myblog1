<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    public function show ($id)
    {
    	$res = Product::find($id);
    	$res->msg = '成功';
    	$res->show = 1;
        return new ProductResource($res);
    }
}
