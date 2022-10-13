<?php

/*
 |------------------------------------------------------------------------
 | It receives a path and returns an absolute path, including the PROTOCOL 
 | (http/https), the SERVER HOST, and the path.
 |------------------------------------------------------------------------
 */

function hostPath($path = null){
    $http = 'http';
    
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $http = 'https';
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
        $http = 'https';
    }

    $slash = '' ;
    
    if ($path !== null) {
        $slash = '/';
        
        if ($path[0] === '/') {
            $slash = '';
        }
    }

    return $http.'://'.$_SERVER['HTTP_HOST'].$slash.$path;
}

/*
 |------------------------------------------------------------
 | Receives the name of a cookie, checks if the cookie exists, 
 | if it exists it returns the value of the cookie, if it does
 | not exist it returns false.
 |------------------------------------------------------------
 */

function msg($msg)
{
    if (isset($_COOKIE[$msg])) {
        return $_COOKIE[$msg];
    } else {
        return false;
    }
}

/*
 |------------------------------------------------------------------------------------------
 | Get a value from request, if $_GET['value'] array is null return null, else return value.
 |------------------------------------------------------------------------------------------
 */

function issetGet($request,$value)
{
    if (!isset($request[$value])) {
        return null;
    } else {
        return $request[$value];
    }
}

/*
 |----------------------------------------------------------
 | Import resources (CSS, JS) from /public path.
 | Example: resource('js','js/main.js') It is equivalent to:
 | <script src='https://hostname/js/main.js'></script>
 |----------------------------------------------------------
 */

function resource($type, $resource)
{
    if ($type === 'js') {
        return "<script src='".hostPath($resource)."'></script>";
    } elseif ($type === 'css') {
        return "<link rel='stylesheet' href='".hostPath($resource)."'>";
    } else {
        trigger_error("Invalid resource type <b>$type</b> in <b>resource()</b>.", E_USER_ERROR);
    }
}

/*
 |-----------------------------------------------------------------------
 | When the current route ['path'] is equal to $route_url, it returns the 
 | value $string_value of the second parameter/argument.
 |-----------------------------------------------------------------------
 */

function whenRoute($route_url, $string_value)
{
    $url = $_SERVER['REQUEST_URI'];
    $url_parsed = parse_url($url);

    substr($route_url,0,1) !== '/' ? $route_url = '/'.$route_url :'';

    if ($url_parsed['path'] === $route_url) {
        echo $string_value;
    }
}