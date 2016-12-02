<?php

/**
 * Created by: Dilski
 * Date: 16/11/2016
 * Time: 21:24
 */
class session
{

    public static function init()
    {
        if (session_id() == '') {
            session_start();
        }
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    public static function isKeySet($key) {
        return isset($_SESSION[$key]);
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


}