<?php

/*
 |---------------------------------------------------------------------
 | Generates a Token to validate the form, saves the token in a session 
 | variable, and returns a hidden input with the value of the token.
 |---------------------------------------------------------------------
 */

function csrf()
{
    session_status() === PHP_SESSION_NONE ? session_start() :'';
    
    $_SESSION['token'] = bin2hex(random_bytes(32));

    return "<input type='hidden' name='token' value=".$_SESSION['token'].">";
}

/*
 |-------------------------------------------------------------------------------------------- 
 | Validate the csrf token of the request in the form, if it matches the token of the session, 
 | the process continues, if not, it returns an error and stops the execution.
 |--------------------------------------------------------------------------------------------
 */

function csrf_token_validation()
{
    if (empty($_POST['token'])) {
        trigger_error("The <b>csrf token</b> was not received with the form.", E_USER_ERROR);
    } else {
        session_status() === PHP_SESSION_NONE ? session_start() :'';

        if ($_POST['token'] !== $_SESSION['token']) {
            trigger_error("Invalid form request, <b>csrf token</b> does not match.", E_USER_ERROR);
        }
    }

    /*
     |----------------------------------------------------
     | Remove the used token, this way the generated token 
     | only works once per request in the session.
     |----------------------------------------------------
     */
    
    unset($_SESSION['token']);
    unset($_POST['token']);
}