<?php

namespace app\admin\model;
use think\Model;

class Cards extends Model
{
    protected $insert =[
         "Times",
        "UserID"
        ];
    public function setTimesAttr($val)
    {
        if($val){
          return $val;
        }else{
            $datetime = new \DateTime;
            $newDate=$datetime->format('Y-m-d H:i:s');
            return $newDate;
        }
    }

    public function setUserIDAttr()
    {
        return "1";
    }
}