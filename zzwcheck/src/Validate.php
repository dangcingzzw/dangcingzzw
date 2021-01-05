<?php
namespace validate;

use validate\src\core\Main;
class Validate extends Main{
    public function gocheck($scene)
    {
        $param =$_POST;
        $result = $this->batch()->scene($scene)->check($param);
        if ($result !==true) {
            $this->error($this->getError());
        } else {
            return $param;
        }
    }
    protected function error($msg='参数错误',$status_code=40000){
        $arr=[
            'status_code'=>$status_code,
            'msg'=>$msg,
            'data'=>[]
        ];
        echo json_encode($arr,JSON_UNESCAPED_UNICODE);exit;
    }
}