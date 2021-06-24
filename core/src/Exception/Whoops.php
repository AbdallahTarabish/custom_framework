<?php

namespace core\Exception;

class Whoops
{
    /*
     * Whooops constructor
     */

    private function __construct()
    {
    }
    /*
     * handle  every error
     *
     */
    public static function handle(){
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();
    }
}