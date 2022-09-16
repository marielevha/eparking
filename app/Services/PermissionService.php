<?php


namespace App\Services;


use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

trait PermissionService
{
    public static function findAllPermissions()
    {
        if (Auth::user()) {
            $originalsPermissions = Auth::user()->getAllPermissions();
            $finalPermissions = [];
            foreach ($originalsPermissions as $permission) {
                $obj = new Permission();
                $obj->id = $permission->id;
                $obj->name = $permission->name;
                $obj->guard_name = $permission->guard_name;
                array_push($finalPermissions, $obj);
            }
            return $finalPermissions;
        }
        return [];
    }
}
