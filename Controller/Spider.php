<?php
namespace Controller;

class Spider
{

    
    public function remotedownload($url, $path = '')
    {
        $ch = curl_init();
        //以url的形式 进行请求
        curl_setopt($ch, CURLOPT_URL, $url);
        //以文件流的形式 进行返回  不直接输出到浏览器
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //浏览器发起请求 超时设置
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $file = curl_exec($ch);
        curl_close($ch);
        //返回文件路径的信息
        $this->saveAsFile($url,$file,$path);
    }

    //保存图片
    private function saveAsFile($url, $file, $path)
    {
        //返回文件的基本信息
        $filename = pathinfo($url, PATHINFO_BASENAME);
        //打开文件  并且写入到路径中
        $resource = fopen($path . $filename, 'a');
        fwrite($resource, $file);
        fclose($resource);
    }
}

