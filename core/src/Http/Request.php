<?php


namespace core\Http;


class Request
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
     *
     * @var $base_url
     */
    private static $baseurl;


    /**
     *
     * @var $full_url
     */
    private static $full_url;

    /**
     *
     * @var $url
     */
    private static $url;

    /**
     *
     * @var $query_string
     */
    private static $query_string;

    /**
     *
     * @var $base_url
     */
    private static $script_name;

    /**
     * handle request
     *
     * @return void
     */
    public static function handle()
    {
        self::$script_name = self::getScriptName();//framework/public
        self::setBaseUrl();
        self::setUrl();
    }

    /**
     * set BaseUrl
     *
     * @return void
     */
    private static function setBaseUrl()
    {
        // http://web.com
        $protocol = Server::get("REQUEST_SCHEME") . "://";
        $host = Server::get("HTTP_HOST");
        $script_name = self::$script_name;
        self::$baseurl = $protocol . $host . "/" . $script_name;
    }

    /**
     * get BaseUrl
     *
     * @return void
     */
    public static function baseUrl()
    {
        // http://web.com
        return self::$baseurl;
    }

    /**
     * set Url
     *
     * @return void
     */
    private static function setUrl()
    {
        $request_uri = urldecode(Server::get("REQUEST_URI"));
        $request_uri = rtrim(str_replace("//", "/", preg_replace("#" . self::$script_name . "#", '', $request_uri)), "/");
        self::$full_url = $request_uri;
        $query_string = '';
        if (strpos($request_uri, "?") !== false) {
            list($request_uri, $query_string) = explode("?", $request_uri);
        }
        self::$url = $request_uri ?: '/';
        self::$query_string = $query_string;
    }

    /**
     * get Url
     *
     * @return void
     */

    public static function url()
    {
        return self::$url;
    }

    /**
     * get full Url
     *
     * @return void
     */

    public static function full_url()
    {
        return self::$full_url;
    }

    /**
     * get query string
     *
     * @return void
     */

    public static function query_string()
    {
        return self::$query_string;
    }

    /**
     * get request method
     *
     */

    public static function method()
    {
        return Server::get("REQUEST_METHOD");

    }

    /**
     * request has data
     *
     * @param string $key
     * @param array $type
     * @return bool
     */

    public static function has($key, $type)
    {
        return array_key_exists($key, $type);
    }

    /**
     * request has data
     *
     * @param  $key
     * @param   $type
     * @return bool
     */

    public static function value($key, $type)
    {
        $type = isset($type) ? $type : $_REQUEST;
        return self::has($key, $type) ? $type[$key] : null;
    }


    /**
     * get data from get request
     *
     * @param $key
     * @return string
     */

    public static function get($key)
    {
        return self::value($key, $_GET);
    }

    /**
     * get data from post request
     *
     * @param $key
     * @return string
     */

    public static function post($key)
    {
        return self::value($key, $_POST);
    }

    /**
     * set data value for a given key
     *
     * @param $key
     * @param $value
     * @return string
     */

    public static function set($key, $value)
    {
        $_REQUEST[$key] = $value;
        $_POST[$key] = $value;
        $_GET[$key] = $value;

        return $value;
    }

    /**
     * return redirect .....
     *
     * @return string
     */

    public static function redirect()
    {

        return Server::get("HTTP_REFEREE");
    }

    /**
     * return request all .....
     *
     * @return string
     */

    public static function all()
    {
        return $_REQUEST;
    }


    private static function getScriptName()
    {
        $script_name = Server::get("SCRIPT_FILENAME");
        $script_name = explode("/", $script_name);
        $key = array_search('htdocs', $script_name);
        $next = array_slice($script_name, $key + 1, 2);
        return implode("/", $next);
    }


}