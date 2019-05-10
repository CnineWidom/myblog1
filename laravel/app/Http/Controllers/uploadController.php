<?php

namespace App\Http\Controllers;

use App\image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class uploadController extends Controller
{
    //水印路径
    private $newFileNameByTmp = '/uploads/images/userTmp/';
    private $newFileName = '/uploads/images/user/';

    //是否用水印
    public  $useWalkMark = 1;
    //用哪种水印 1图片 2文字
    public  $useMarkType = 1;
    //默认文字水印 文字
    public $markText = '花开蝶自来';
    //默认图片水印路径
    public $markPicPath = '';
    //默认后缀
    public $markBack = '.png';
    //上传
    public  function  doupload(Request $request,ImageManager $image){
        $data = $request->all();
        $userid = $request->get('id');
        $file = $request->file('file');
        $imageRes = image::where('id',$userid)->first();
        $res = [
            'id' => $userid,
            'image' =>$request->get('image_load'),
        ];
        if(!empty($file)){
            $tmpFileName = $file->getPathname();
            $path = public_path();
            $newFileName = $this->newFileName.md5(base64_decode(time())).$this->markBack;
            $newFileNameByTmp = $this->newFileNameByTmp.md5(base64_decode(time())).$this->markBack;
            $img = $image->make($tmpFileName)->resize(300,300);
            $img->save($path.$newFileName);
            if($this->useWalkMark){
                $img->text($this->markText,140,140,function ($font){
                    $font->file('C:/Windows/Fonts/STXINWEI.TTF');//使用本地ttf文件 使用laravel自带的话会出现中文乱码
//                    $font->file(2);
                    $font->size(40);
                    $font->color('#fff');
                    $font->align('center');
                });
            }
            else{
                $img->insert($this->markPicPath);
            }

            $img->save($path.$newFileNameByTmp);

            $imgReplacePath = $path.$imageRes->image_load;
            $imgReplacePathTmp = str_replace('user','userTmp',$imgReplacePath);
            if(file_exists($imgReplacePath))
            {
                unlink($imgReplacePath);
                unlink($imgReplacePathTmp);
            }
            $data['image_load'] = $newFileName;
            $res['image'] = $newFileName;
        }
        unset($data['_token']);
        unset($data['file']);
        unset($data['user']);
        $id = image::where('id',$userid)->update($data);
        $res['user'] = $request->get('author');
        return view('index',$res);
    }

    public  function  download(Request $request,ImageManager $image){
        $id = $request->id;
        $res = image::where('id',$id)->first();
        $path = public_path();
        $imagePath = $path.$res->image_load;
        $imagePath = str_replace('user','userTmp',$imagePath);
        $img = $image->make($imagePath)->resize(500,500);

//        return $img->response('jpg',70);
//        dd($img->dirname);
        $newFileName = md5(time()).'.png';
        return response()->download($imagePath,$newFileName);
    }
}
