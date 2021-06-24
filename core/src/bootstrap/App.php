<?php

namespace core\bootstrap;

use core\Exception\Whoops;
use core\Http\Request;
use core\Http\Server;
use core\Session\Session;

class App
{

    /**
     * framework
     * create by abdallah tarabish
     */

    /*
     * private constructor
     */

    private function __construct()
    {
    }

    public static function run()
    {
        Whoops::handle();
//        Session::start();
//        Session::set("name" , "ahmed");
//        Session::set("age" , "12");
//        Session::remove("name");
        // Session::has("name");
        // print_r(Session::all());
        //Session::destroy();
//        echo "<pre>";
//        print_r(Server::all());
//        echo "</pre>";
        //   echo Session::flash("name");
//      echo  Server::has("DOCUMENT_ROOT");
//       Server::get("REDIRECT_MYSQL_HOME");
        Request::handle();
       echo Request::method();
//          Request::setUrl();


    }
}