<?php
 namespace app\index\controller;
 use think\Controller;
 use app\index\model\Cards;

 class Index extends Controller
 {
     //首页
     public function index()
     {
         $data =Cards::order('ID desc')->
         where("Times","<=",date("Y-m-d H:i:s"))->limit(10)->select();
         //多余的字数省略
         $item =[];
         for ($i=0;$i<count($data);$i++){
             $val=substr($data[$i]->UpContent,0,550);
             if(strlen($val)>=550){
                 $val=$val."<a href='javascript:;'; style='color: blue'>......</a>";
             }
             $item[]=[
                 "minUpContent" => $val
             ];
         }
         $this->assign("data",$data);
         $this->assign("minUpContent",$item);
         return $this->fetch();

     }
     //详情页
     public function message($id)
     {
         $data=Cards::get($id);
         $this->assign("data",$data);
         return $this->fetch("message");
     }
     //关于我们页面
     public function about()
     {
         return $this->fetch("about");
     }
     //其他种类页面
     public function other($id)
     {
         $data =Cards::order('ID desc')->where("Kind","eq",$id)->
              where("Times","<=",date("Y-m-d H:i:s"))->limit(10)->select();
         //多余的字数省略
         $item =[];
         for ($i=0;$i<count($data);$i++){
             $val=substr($data[$i]->UpContent,0,550);
             if(strlen($val)>=550){
                 $val=$val." <a href='javascript:;'; style='color: blue'>......</a>";
             }
             $item[]=[
                 "minUpContent" => $val
             ];
         }
         $this->assign("data",$data);
         $this->assign("minUpContent",$item);
         return $this->fetch("index");
     }
 }