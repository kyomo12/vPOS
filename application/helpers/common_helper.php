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
function insert($table,$data=[])
    {
    $CI = get_instance();
    return $CI->common->insert($table,$data);
     
    }
function model_list($table)
    {
    $CI = get_instance();
    return $CI->common->model_list($table);
     
    }
function update($table,$id_name,$data,$id_value)
{
 $CI = get_instance();
    return $CI->common->update($table,$id_name,$data,$id_value);
           
}
function table_by_id($table,$id_name,$id_value)
    {
    $CI = get_instance();
    return $CI->common->table_by_id($table,$id_name,$id_value);
     
    }

