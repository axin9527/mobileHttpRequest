<?php
//自动加载类
class autoload {
    public static function load($className) {
       $fileName = str_replace("\\", "/", $className.'.php');
       if(is_file($fileName)){
           require_once $fileName;
       }else {
           echo "此文件不存在";
       }
    }
}
spl_autoload_register(['autoload', 'load']);
