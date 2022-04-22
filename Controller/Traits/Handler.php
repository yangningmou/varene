<?php
namespace Controller\Traits;
trait Handler{
 
   //截取字符串
    public static function jiequ($input,$start,$final){
        return substr($input,strlen($start)+strpos($input,$start),(strlen($input)-strpos($input,$final))*(-1));
    }//jiequ
   
   //获取命令
    public static function getml($orign,$model){
        $orign = strstr($orign,$model,true);
        if($orign){
            return trim($orign,$model);
        }else{
            return false;
        }
   
   }//getml
}