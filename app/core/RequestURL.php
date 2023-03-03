<?php

class RequestURL
{
    protected static function setURL()
    {
        $url = $_GET['url'] ?? 'home';
        return explode('/', trim($url, '/'));
    }

    public static function getURL()
    {
        return self::setURL();
    }
}