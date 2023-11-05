<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class SetupPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup:permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate permissions for each model';
    private $permission_words = [];
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->permission_words = config('permission.permission_prefixes');
        $model_permissions = $this->getModelPermissions();
        $role = Role::first();
        $super_admin = Admin::first();
        $created_permissions = [];
        $this->info("Truncate permissions");
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::query()->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->info("Setting roles and permissions");
        foreach ($model_permissions as $result) {
            if ($result) {
                $prefix = class_basename($result);
                foreach ($this->permission_words as $permission) {
                    $payload = ['name' => $permission . '-' . $this->camelCase2UnderScore($prefix)];
                    $per = Permission::firstOrCreate($payload);
                    array_push($created_permissions, $per->id);
                }
                $role->permissions()->sync($created_permissions);
                $this->info("Generated permission for : " . $prefix);
            }
        }
        $super_admin->roles()->sync([Role::first()->id]);
        $this->info("Finish RolePermissions Setting");
    }
    public function getModelPermissions(): array
    {
        $founded_models = collect(File::allFiles(app_path('Models')))
            ->map(function ($file) {
                $namespace = 'App\\Models\\' . $file->getBasename('.php');
                // return class_exists($namespace) ? $namespace : null;
                return $namespace;
            })
            ->toArray();
        return $founded_models;
    }
    function camelCase2UnderScore($str, $separator = "_")
    {
        if (empty($str)) {
            return $str;
        }
        $str = lcfirst($str);
        $str = preg_replace("/[A-Z]/", $separator . "$0", $str);
        return strtolower($str);
    }
}
