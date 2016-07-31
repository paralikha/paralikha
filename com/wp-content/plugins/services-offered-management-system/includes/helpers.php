<?php


function soms_controller($file, $ext='Controller.php')
{
    require_once( SOMS_PLUGIN_CONTROLLER . $file . $ext );
}
 ?>