<?php

class Validator
{

    public static function filter($value)
    {
        return trim(htmlspecialchars($value));
    }

    public static function required($value)
    {
        return (bool) empty($value);
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function less($value, $length)
    {
        return strlen($value) < $length;
    }
}
