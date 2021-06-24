<?php

namespace core\Session;

class Session
{
    /**
     * framework
     * create by abdallah tarabish
     */
    private function __construct()
    {
    }


    /**
     * start session
     * @return void
     */

    public static function start()
    {
        if (!session_id()) {
            //use cookies to store the session id on the client side[to make more secure]
            ini_set("session.use_only_cookies", 1);
            session_start();
        }
    }

    /**
     * set new session
     * @param string $key $value
     * @param string $value
     * @return string $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return $value;
    }

    /**
     *  check if  session exist
     * @param $key
     * @return bool
     */
    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * get the session with the entered key
     * @param $key
     * @return mixed|string
     */
    public static function get($key)
    {
        return self::has($key) ? $_SESSION[$key] : null;
    }

    /**
     * remove the session
     * @param $key
     * @return bool
     */
    public static function remove($key)
    {
        if (self::has($key))
            unset($_SESSION[$key]);
    }

    /**
     * return all session
     * @return array
     */
    public static function all()
    {
        return $_SESSION;
    }

    /**
     * destroy all session
     * @return void
     */
    public static function destroy()
    {
        foreach (self::all() as $key => $value) {
            self::remove($key);
        }
    }

    /**
     * return the session for some second
     *
     */
    public static function flash($key)
    {
        $value = null;
        if (self::has($key)) {
            $value = self::get($key);
            self::remove($key);
        }
        return $value;
    }

}