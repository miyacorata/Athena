<?php
/**
 * Created by PhpStorm.
 * User: miyano
 * Date: 2019/01/13
 * Time: 午前 1:18
 */

if(!function_exists('hsc')){
    function hsc($text){
        return htmlspecialchars($text,ENT_QUOTES);
    }
}

if(!function_exists('SeparateString')){
    /**文字列指定位置分割関数
     * 文字列の $position 文字目にスペースを入れる
     * @param $string
     * @param $position
     * @return string
     */
    function SeparateString($string, $position){
        $last = mb_substr($string,$position);
        $first = mb_substr($string,0,$position);
        return $first." ".$last;
    }
}

if(!function_exists('ConvertDateString')){
    function ConvertDateString($date,$type){
        switch ($type){
            case 'slash':
                return date('n/j',strtotime($date));
            case 'ja':
                return date('n月j日',strtotime($date));
            case 'ja_year':
                return date('Y年n月j日',strtotime($date));
            default:
                return false;
        }
    }
}

if(!function_exists('GetCurrentUrl')){
    function GetCurrentUrl(){
        $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
        return $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    }
}