<?php
class Session
{
    public static function exists($first_name)
    {
        return(isset($_SESSION[$first_name])) ? true : false;
    }
    public static function put($first_name, $value)
    {
        return$_SESSION[$first_name] = $value;
    }

    public static function get($first_name)
    {
        return $_SESSION[$first_name];
    }
    public static function delete($first_name)
    {
        if(self::exists($first_name))
        {
            unset($_SESSION[$first_name]);
        }
    }

    public static function flash($first_name, $string = '')
    {
        if(self::exists($first_name))
        {
            $session = self::get($first_name);
            self::delete($first_name);
            return $session;
        }
        else
        {
            self::put($first_name, $string);
        }
    }

}