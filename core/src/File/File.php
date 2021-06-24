<?php


namespace core\File;


class File
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
     * root function
     */

    public static function root()
    {
        return ROOT;
    }

    /**
     * directory separator function
     */
    public static function ds()
    {
        return DS;
    }

    /**
     * check file exist => route/web.php
     * @param $path
     * @return bool
     */
    public static function exist($path)
    {
        return file_exists(static::path($path));
    }

    /**
     * get file full path => route/web.php
     * @param $path
     * @return string $path
     */
    public static function path($path)
    {
        $path = static::root() . static::ds() . trim($path, "/"); // /route/.php/ => trim => route/web.php
        $path = str_replace(["/", "\\"], static::ds(), $path);
        return $path;
    }

    /**
     * set  file require
     * @param $path
     * @return mixed
     */
    public static function require_file($path)
    {
        if (static::exist($path)) {
            require_once self::path($path);
        }
    }

    /**
     * set  file require
     * @param $path
     * @return mixed
     */
    public static function include_file($path)
    {
        if (static::exist($path)) {
            include_once self::path($path);
        }
    }

    /**
     * set  folder require
     * @param $path
     * @return mixed
     */
    public static function require_directory($path)
    {
        //scandir(self::path($path)); // return array ["0"=>. ,  "1"=>.. , "2"=>web.php]
        //we need to remove .. and .
         $files= array_diff(scandir(self::path($path)) , ["." , ".."]); // return array [ "0"=>web.php]
        // foreach
        foreach ($files as $file){
           $file_path=  $path . self::ds() . $file;
           if (self::exist($file_path)){
                static::require_file($file_path);
           }
        }
    }


}