<?php 

if(!function_exists('checkPermission')) {
    function checkPermission($permission = "")
    {
        if(!$permission) {
            return true;
        }
        
        $allPermission = getSession('permission');
        if(!$allPermission) {
            return false;
        }

        if(in_array($permission, $allPermission)) {
            return true;
        }

        return false;
    }
}