<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function initial_view($data=[])
    {
    $CI = get_instance();
    return $CI->common->header_view($data);
     
    }
function footer()
    {
    $CI = get_instance();
    return $CI->common->footer();
     
    }

