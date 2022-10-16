<?php

    namespace Helpers;

    class Auth
    {
        static $loginPath = '/index.php';

        static function check()
        {
            if(isset($_SESSION['user'])){
                return $_SESSION['user'];
            }else{
                HTTP::redirect(static::$loginPath);
            }
        }
    }