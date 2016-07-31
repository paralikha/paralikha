<?php

function epms_view($file, $ext='.view.php')
{
    require_once( EPMS_PLUGIN_VIEW . $file . $ext );
}

function epms_partials($file, $ext='.view.php')
{
    require_once( EPMS_PLUGIN_VIEW . 'partials/' . $file . $ext );
}

function epms_controller($file, $ext='Controller.php')
{
    require_once( EPMS_PLUGIN_CONTROLLER . $file . $ext );
}



function epms_value($array, $key, $default_value='')
{
    if(null !== $array && array_key_exists($key, $array)) {
        return is_null($array[$key]) ? $default_value : $array[$key];
    } else {
        return $default_value;
    }
}

function epms_check($value, $old_value='', $default_value='checked')
{
    return $value == $old_value ? $default_value : '';
}

 ?>