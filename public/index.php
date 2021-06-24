<?php
/**
 * framework
 * create by abdallah tarabish
 */

/**
 * 1- register the autoloader
 * load and register the autoloader that will be used
 */

require __DIR__."./../vendor/autoload.php";


/**
 * 2- register the bootstrap.php
 *  register the bootstrap that will be used ato do action in framework
 */
require __DIR__."./../bootstrap/app.php";



/**
 *   run the application
 */

/*
 * handle the request and send response
 */
Application::run();
