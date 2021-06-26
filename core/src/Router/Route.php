<?php


namespace core\Router;


class Route
{
    /**
     * framework
     * create by abdallah tarabish
     */

    /**
     *  route container => contain all route
     * @var $array
     *
     */
    private static $routes = [];

    /**
     * $middleware
     * @var string
     *
     */
    private static $middleware = "";

    /**
     * prefix
     * @var string
     *
     */
    private static $prefix;

    private function __construct()
    {
    }

    /**
     *add route
     * @var string $methods
     * @var string $uri
     * @var string callback function
     */
    private static function add($methods, $uri, $callback)
    {
        $uri = trim($uri);
        $uri = rtrim(static::$prefix . "/" . trim($uri, "/"), "/"); //
        $uri = $uri ?: '/'; // if uri exist , else set the uri '/'
        foreach (explode("|", $methods) as $method) {
            static::$routes[] = [
                "method" => $method,
                "uri" => $uri,
                "callback" => $callback,
                "middleware" => static::$middleware
            ];
        }
    }

    /**
     *add new Get Route
     * @var string $uri
     * @var string callback function
     */
    public static function get($uri, $callback)
    {
        static::add("GET", $uri, $callback);
    }

    /**
     *add new POST Route
     * @var string $uri
     * @var string callback function
     */
    public static function post($uri, $callback)
    {
        static::add("POST", $uri, $callback);
    }

    /**
     *add new any Route
     * @var string $uri
     * @var string callback function
     */
    public static function any($uri, $callback)
    {
        static::add("GET|POST", $uri, $callback);
    }

    /**
     *set prefix
     * @var string $prefix
     * @var \Closure $callback
     * @var string callback function
     */

    public static function prefix($prefix , $callback)
    {
        $parent_prefix=self::$prefix;
        self::$prefix.='/'.trim($prefix,'/');
        if (is_callable($callback)){
            call_user_func($callback);
        }else{
            throw  new \BadFunctionCallException("Please , Add A Valid Prefix");
        }
        static::$prefix=$parent_prefix;
    }

    /**
     *set prefix
     * @var string $middleware
     * @var \Closure $callback
     * @var string callback function
     */

    public static function middleware($middleware , $callback)
    {
        $middleware_prefix=self::$middleware;
        self::$middleware.='|'.trim($middleware,'|');
        if (is_callable($callback)){
            call_user_func($callback);
        }else{
            throw  new \BadFunctionCallException("Please , Add A Valid Prefix");
        }
        static::$middleware=$middleware_prefix;
    }

    /**
     *get all Route
     */
    public static function all()
    {
        return static::$routes;
    }

}