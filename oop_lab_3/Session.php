<?php

class Session
{

    public static function init()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function has($key)
    {
        return (bool) static::get($key);
    }
    public static function get($key, $default = [])
    {
        return $_SESSION[$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function all()
    {
        return $_SESSION;
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function flash($key)
    {
        $value = static::get($key);
        static::remove($key);
        return $value;
    }

    public static function remove($key)
    {
        if (static::has($key)) {
            unset($_SESSION[$key]);
        }
    }
    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {

        static::flush();
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    public static function message($color, $key)
    {
        if (static::has($key)) {
            echo "<p class='alert alert-$color mt-2'>" . static::get($key) . "</p>";
        }

        static::remove($key);
    }
}
