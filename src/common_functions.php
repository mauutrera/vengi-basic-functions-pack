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