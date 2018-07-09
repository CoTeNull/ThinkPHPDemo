<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;

use app\admin\model\Vipkind;
class Index extends Controller
{
    var $kinder=0;
    public function index()
    {
        return $this->fetch();
    }
    public function main()
    {
        return $this->fetch();
    }
    public function kind(Request $request)
    {
        $kind=$request->post("nowKind");
        $data=Vipkind::find($kind);
        return ["dataUp" => $data->UpContent,"dataDown" => $data->DownContent];
    }
    public function kindChange(Request $request)
    {
        $kind     = $request->post("nowKind");
        $upText   = $request->post("upText");
        $downText = $request->post("downText");
        $yzm      = $request->post("yzm");
        if(!captcha_check($yzm)){
            $this->redirect("/login");
        }else{
           $newVip =Vipkind::get($kind);
           $newVip->UpContent=$upText;
           $newVip->DownContent=$downText;
           if($newVip->save()){
               echo true;
           }else{
               echo false;
           }
        }
    }
}