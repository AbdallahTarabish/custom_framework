<?php
use core\bootstrap\App;
class Application
{

    /**
     * framework
     * create by abdallah tarabish
     */


    /*
     * Application Constructor
     */
    private function __construct()
    {
    }

    /*
     * run Application
     */

    public static function run()
    {
        /*
         * define the root path  and define SEPARATOR
         */
        define("ROOT" , realpath(__DIR__."/.."));
        define("DS" , DIRECTORY_SEPARATOR);
        App::run();
    }
}