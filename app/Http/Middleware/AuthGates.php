<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\Admin;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    // public function handle($request, Closure $next)
    // {
    //     $user = auth()->user();
    //     if ($user) {
    //         $roles = Cache::rememberForever('roles',function() {
    //             return Role::with('permissions')->get();
    //         });
    //         $permissionsArray = [];
    //         foreach ($roles as $role) {
    //             foreach ($role->permissions as $permissions) {
    //                 $permissionsArray[$permissions->name][] = $role->id;
    //             }
    //         }
    //         foreach ($permissionsArray as $name => $roles) {
    //             Gate::define($name, function (Admin $user) use ($roles) {
    //                 return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
    //             });
    //         }
    //     }
    //     return $next($request);
    // }
    public function handle($request, Closure $next) 
    {
        $user = auth()->user();
        if($user)
        {
            $permissionsArray = Cache::rememberForever('role_permission_gate', function () {
                $roles = Role::with('permissions')->get();
                $permissionList = [];
                foreach ($roles as $role) {
                    foreach ($role->permissions as $permission) {
                        $permissionList[$permission->name][] = $role->id;
                    }
                }
                return $permissionList;
            });
            foreach ($permissionsArray as $name => $roles) {
                Gate::define($name, function (Admin $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
            
        }
        return $next($request);
    }
}
