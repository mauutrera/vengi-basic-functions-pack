<?php

/*
 |---------------------------------------
 | Check if a value is a natural integer.
 |---------------------------------------
 */

function is_natural_int($value)
{
    if (is_numeric($value) && $value >= 1) {
        return true;
    } else {
        return false;
    }
}

/*
 |------------------------------------------------
 | Check if an array is associative or sequential.
 |------------------------------------------------ 
 */

function is_assoc( $array ) {
	return array_keys( $array ) !== range( 0, count($array) - 1 );
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