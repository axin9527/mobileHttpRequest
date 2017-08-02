<?php
namespace libs;
// 模型类 不涉及逻辑处理类
class HttpRequest
{
    public function request($url, $param, $method = "GET"){
        $response = null;
        if ($url){
            $method = strtoupper($method);
            if ($method == "POST"){
                echo "这个是post方法";
            }elseif ($method == "PUT"){
                echo "这个是PUT方法";
            }elseif ($method == "DELETE"){
                echo "这个是DELETE方法";
            }else {
                if (is_array($param) and count($param)){
                    if (strpos($url, "?")){
                        $url = $url.'&'.http_build_query($param);
                    }else {
                        $url = $url.'?'.http_build_query($param);
                    }
//                     var_dump($url);
                    $response = file_get_contents($url);
                }
            }
        }
            return $response;
    }
}