<?php
namespace app\index\model;
use think\Model;
class Cards extends Model
{
    //定义方法名:  get + 字段名 + Attr
    public function getKindAttr($val)
    {
        switch ($val){
            case '1':return "爱奇艺";break;
            case '2':return "优酷";break;
            case '3':return "腾讯";break;
            case '4':return "芒果";break;
            case '5':return "乐视";break;
            case '6':return "迅雷";break;
            case '7':return "搜狐影视";break;
            case '8':return "暴风影视";break;
            case '9':return "酷狗音乐";break;
            case '10':return "PPTV";break;
            case '11':return "QQ旋风";break;
            case '12':return "百度网盘";break;
            case '13':return "咪咕视频";break;
            case '14':return "腾讯动漫";break;
            default: return"XXX";break;
        }
    }
    public function getTimesAttr($val)
    {
        //只返回年月日
        $val= explode(' ',$val);
        return $val[0];
    }

}