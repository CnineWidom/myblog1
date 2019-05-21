<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Product;
use App\Model\Announcement;
use App\Model\Information;
use App\Model\Myreadrecode;
use App\Model\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res =new class{};
        $Announce = Announcement::where(function($query){
            $query->where('ment_flag',1);
            $query->where('ment_top',1);
        })->first();
        $messList = Information::where('in_flag',1)->orderBy('in_time','desc')->get();
        if(!$messList->isEmpty()){
            foreach ($messList as $key => &$value) {
                $keyArr = explode(',', $value->in_key);
                $value->key = $keyArr;

                $userMess = Information::find($value->in_userid)->usersBy()->get();
                if($userMess) $value->userMess = $userMess;
                
                $value->in_time = date('Y-m-d',$value->in_time);
                $value->readNum = 10;
            }
            unset($value);
            $res->messList = $this->returnMsg(1,$messList,'messList');
        }else  $res->messList = $this->returnMsg(-1,'没有数据');
        if($Announce) $res->announce = $this->returnMsg(1,$Announce,'announce');
        else  $res->announce = $this->returnMsg(-1,'没有数据');
        return new Product($res);

    }

    public function articlDetail(Request $request)
    {
        $id = (int)$request->get('id');
        $time = time();
        $ip = $request->getClientIp();
        $res =new class{};
        $messDetail = Information::where(function($query) use($id){
            $query->where('in_id',$id);
            $query->where('in_flag',1);
        })->limit(1)->get();
        //推荐
        $messList = Information::where('in_flag',1)->orderBy('in_time','desc')->get();
        if(!$messDetail->isEmpty()){
            foreach ($messDetail as $key => &$value) {
                $userMess = Information::find($value->in_userid)->usersBy()->get();
                $value->name = empty($userMess) ? "***" : $userMess[0]->name;
                $value->in_time = date('Y-m-d',$value->in_time);
                $keyArr = explode(',', $value->in_key);
                $value->key = $keyArr;
                $value->readnum = 10;
            }  

            $readMess = Myreadrecode::where(['re_informationId'=>$id,'re_ip'=>$ip])->whereBetween('re_time',[$time-600,$time])->orderBy('re_time','desc')->limit(1)->get();

            if($readMess->isEmpty()){
                $readData = [
                    're_informationId'=>$id,
                    're_ip' => $ip,
                    're_time' => $time,
                ];

                Myreadrecode::insert($readData);                
            }

            $res->messDetail = $this->returnMsg(1,$messDetail,'messDetail');
            $res->messList = $this->returnMsg(1,$messList,'messList');
            $commentMess = $this->getComment($id);
            if($commentMess->isEmpty()){
                $res->commentMess = $this->returnMsg(-1,'没有数据');
            }
            else $res->commentMess = $this->returnMsg(1,$commentMess,'commentMess');
        }else{
            $res->messDetail = $this->returnMsg(-1,'没有数据');
        }
        echo json_encode($res);
    }

    //获取评论
    public function getCommentList($id,$parentId=0,&$result=array(),$count=1)
    {
        if($count<4){
            $backMessFlag = 1;
            $commentList = Information::find($id)->getcomment()->where('com_parentId',$parentId)->orderBy('created_at','desc')->get();
            if(!$commentList->isEmpty()){
                foreach ($commentList as $key => &$value) {
                    $value->userMess = Information::find($id)->usersBy()->first();
                    $value->count = $count;
                    $value->backMessFlag = $backMessFlag;
                    $parentId = $value->com_id;
                    $thisArr = &$result[];
                    $value->children =  $this->getCommentList($id,$parentId,$thisArr,$count+1);
                    unset($commentList[$key]);
                    $thisArr= $value;
                }
                unset($value);
            }
            else{
                return array();
            }
        }else return array();
        return $result;
    }

    public function getComment($id)
    {
        $commentList = Information::find($id)->getcomment()->where(['com_inforId'=>$id,'com_flag'=>1])->orderBy('created_at','desc')->limit(10)->get();
        return $commentList;
    }

    public function returnMsg($code,$msg="",$name="name")
    {
        return $res = [
            'code' => $code,
            $name => $msg,
        ];
    }
}