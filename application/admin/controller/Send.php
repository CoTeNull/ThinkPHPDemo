<?php

namespace app\admin\controller;
use think\Controller;
use think\Request;
use app\admin\model\Cards;
use app\admin\model\Vipkind;

class Send extends Controller
{
   public function index(Request $request)
   {
       $req=$request->post();
       $text=$req['text'] ;
       $kind=$req['kind'];
       $yzm=$req['yzm'];

       if(!captcha_check($yzm)&&$yzm!="tiaoguo"){
           echo false;
          }else{
           $card =new Cards();
           //接受类别的头和尾
           $sqlKind =new Vipkind();

           $nowUp=$sqlKind->where("ID","eq",$kind)->find()->UpContent;
           $nowDown=$sqlKind->where("ID","eq",$kind)->find()->DownContent;
           $card->UpContent=$nowUp;
           $card->DownContent=$nowDown;
           $card->Content=$text;
           $card->Kind=$kind;

           $res=$card->save();
           return $res;
       }
   }
   public function timeSend(Request $request)
   {
       $req=$request->post();
       $text=$req['text'] ;
       $kind=$req['kind'];
       $yzm=$req['yzm'];
       //获取个数
       if(!captcha_check($yzm)&&$yzm!="tiaoguo"){
            echo false;
       }else{
      $text=json_decode($text);
      $num=count($text);

       //接受类别的头和尾
       $sqlKind =new Vipkind();
       $nowUp=$sqlKind->where("ID","eq",$kind)->find()->UpContent;
       $nowDown=$sqlKind->where("ID","eq",$kind)->find()->DownContent;

      for($i=0;$i<$num/2;$i++){
          $newText[]=$text[$i*2];
          $newText[]=$text[$i*2+1];
          $newText=json_encode($newText);
          $card =new Cards();
           $card->UpContent=$nowUp;
           $card->DownContent=$nowDown;
           $card->Content=$newText;
           $card->Kind=$kind;
           //Time
          $newDate=date("Y-m-d H:i:s",strtotime("+".$i." day"));
          $card->Times=$newDate;
          $card->save();

           unset($newText);
        }
         return true;
       }





   }
}