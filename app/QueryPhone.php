<?php
namespace app;
// header('Content-Type:text/html;charset=utf-8');
use libs\HttpRequest;
class QueryPhone
{
        //自定义请求的页面
    const TAOBAO_API = "http://tcc.taobao.com/cc/json/mobile_tel_segment.htm";
    
    public static function query($phone){
        
        //先检测手机号码;
        if (self::validateNum($phone)){
         $response = (new HttpRequest())->request(self::TAOBAO_API, ['tel'=>$phone]);
           
         $response = self::formatData($response);
         print_r($response);
//         echo json_encode($response, true);
        }
        
    }
   
    public static function validateNum($num){
        $ret = FALSE;
        if ($num){
            if (preg_match('/^1[34589]{1}\d{9}$/', $num)){
               $ret = true;
            }
            return $ret;
        }
    }
    //匹配字符串中数据data的数字变成数组 格式化数据
    public static function formatData($data = null) {
        $ret = false;
        if ($data){
           preg_match_all("/(\w+):'([^']+)/", $data, $res);
          /*  echo '<pre>';
           var_dump($res); 要合并 1和2 的数组 1是key 2是value
           */
           $ret = array_combine($res[1], $res[2]);
        
        }
        return $ret;
    }
    
    
}