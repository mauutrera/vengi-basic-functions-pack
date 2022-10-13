<?php

use Vengi\Basic\Funcs;

/*
 |-----------------------
 | Redirect to $location.
 |-----------------------
 */

function redirect($location)
{
    Funcs::$redirect_patch = $location;
    
    header("Location: $location");

    return new Funcs;
}