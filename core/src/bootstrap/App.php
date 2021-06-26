<?php

namespace core\bootstrap;

use core\Exception\Whoops;
use core\File\File;
use core\Http\Request;
use core\Http\Server;
use core\Router\Route;
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
        // for handle the error
        Whoops::handle();

        // start the session
        Session::start();

        //handle the request variable
        Request::handle();
        // require all file in route
        File::require_directory("route");
        // get all route
        echo "<pre>";
        print_r(Route::all());
        echo "</pre>";

    }
}

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
//        Request::handle();
//       echo Request::get("id");
//        print_r(Request::all());
//          Request::setUrl();
//        echo File::path("/route/web.php/");
//        echo File::exist("route/web.php");
//        echo File::require_file("route/web.php");
//        print_r(File::require_directory("route"));
