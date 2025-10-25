<?php
namespace core;
class App{
    protected static $datas=[
    //    "config"=>"require 'config.php'", ဒီလိုသိမ်းသွားမှာ
    ];
    public static function bind($key,$value){
        // static method ထဲမှာ $this keyword သုံးလို့မရလို့ variable ကို static ကြေညာတာ
        //အဲ့လိုဆို  staic::(or)self:: ဘာသုံးသုံးရတယ်
        static::$datas[$key]=$value;
    }

    public static function get($key){
        return static::$datas[$key];
    }

}