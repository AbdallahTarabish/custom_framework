<?php

namespace core\Http;
class Server
{
    /**
     * framework
     * create by abdallah tarabish
     */

    /**
     * private constructor
     */
    private function __construct()
    {
    }
    /**
     * get all server variable
     * @return array
     */

    public static function all(){
        return $_SERVER;
    }


    /**
     * check  server variable BASED ON KEY
     * @param $key
     * @return array
     */

    public static function has($key){
        return isset($_SERVER[$key]);
    }


    /**
     * get  server variable BASED ON KEY
     * @param $key
     * @return string
     */

    public static function get($key){
        return self::has($key) ?  $_SERVER[$key] : null;
    }

    /**
     * get  path info   BASED ON path
     * @param $path
     * @return array
     */

    public static function pathInfo($path){
        return pathinfo($path);
    }



}