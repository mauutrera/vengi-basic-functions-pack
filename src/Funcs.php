<?php

namespace Vengi\Basic;

class Funcs
{
    /*
     |-------------------------------------------------------
     | Save the redirect() path to use in the cookie message.
     |-------------------------------------------------------
     */
    
    private static $redirect_patch = null;

    public function msg($msg_name, $msg_value)
    {
        setcookie($msg_name, $msg_value, time() + 1,self::$redirect_patch);
    }
}