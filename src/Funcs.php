<?php

namespace Vengi\Basic;

class Funcs
{
    /*
     |-------------------------------------------------------
     | Save the redirect() path to use in the cookie message.
     |-------------------------------------------------------
     */
    
    public static $redirect_patch = null;
    
    /*
     |-----------------------------------------------------------------------------
     | Create a cookie with a name and a message, To be used as an alert/message.
     | It is used as a complement to the redirect() function.
     |-----------------------------------------------------------------------------
     | Example: return redirect(/home)->msg('success','Item create Successfully!').
     |-----------------------------------------------------------------------------
     */

    public function msg($msg_name, $msg_value)
    {
        setcookie($msg_name, $msg_value, time() + 1,self::$redirect_patch);
    }
}