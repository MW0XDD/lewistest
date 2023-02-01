<?php

if (! function_exists('is_multi_array')) {
    function is_multi_array($arr)
    {
        rsort( $arr );
        return isset( $arr[0] ) && is_array( $arr[0] );
    }
}
