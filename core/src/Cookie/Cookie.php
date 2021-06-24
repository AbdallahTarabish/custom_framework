<?php

namespace core\Cookie;
class Cookie
{
    /**
     * framework
     * create by abdallah tarabish
     */
    private function __construct()
    {
    }



    /**
     * set new cookie
     * @param string $key $value
     * @param string $value
     * @return string $value
     */
    public static function set($key, $value)
    {
        $expire=time()+(1*365*24*60*60);
        setcookie($key ,$value , $expire , "/" , false , true);
        return  $value;
    }

    /**
     *  check if  cookie exist
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return isset($_COOKIE[$key]);
    }

    /**
     * get the cookie with the entered key
     * @param $key
     * @return mixed|string
     */
    public static function get($key)
    {
        return self::has($key) ? $_COOKIE[$key] : null;
    }

    /**
     * remove the cookie
     * @param $key
     * @return bool
     */
    public static function remove($key)
    {
        if (self::has($key))
            unset($_COOKIE[$key]);
        setcookie($key , null , "-1" , "/");
    }

    /**
     * return all cookie
     * @return array
     */
    public static function all()
    {
        return $_COOKIE;
    }

    /**
     * destroy all cookie
     * @return void
     */
    public static function destroy()
    {
        foreach (self::all() as $key => $value) {
            self::remove($key);
        }
    }



}