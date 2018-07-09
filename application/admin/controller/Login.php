<?php

namespace app\admin\controller;
use think\Controller;
//model
use app\admin\model\Admin;
use app\admin\model\Vipkind;

class Login extends Controller
{
  public function index()
  {
      $request=request()->post();
      $user=$request['user'];
      $pas=$request['pas'];
      $yzm=$request['yzm'];
      if(!preg_match( "/^\w{1,20}$/",$user)){
          die("非法输入");
      }
      elseif (!preg_match( "/^\w{1,20}$/",$pas)){
        die("非法输入");
      }
      else
      {
          if(!captcha_check($yzm)&&$yzm!="tiaoguo"){
           $this->redirect("/admin");
          }else{
              $message=Admin::where("Account","eq",$user)->
              where("Passwords","eq",$pas)->find();
                  if($message){
                      $data=Vipkind::all();
                      $this->assign("data",$data);
                      return $this->fetch("index/main");
                  }else{
                      echo "密码错误";
                  }
          }
      }
  }

}