<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 清除缓存
        cache()->forget('spatie.permission.cache');

        // 创建权限
        Permission::create(['name' => 'manage_contents']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_settings']);

        // 创建站长角色
        $founder = Role::create(['name' => 'Founder']);

        // 赋予站长权限
        $founder->givePermissionTo('manage_contents');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('edit_settings');

        // 创建管理员角色
        $maintainer = Role::create(['name' => 'Maintainer']);

        // 赋予管理员权限
        $maintainer->givePermissionTo('manage_contents');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 清除缓存
        cache()->forget('spatie.permission.cache');

        // 清空所有数据表数据
        Model::unguard();
        DB::table(config('permission.table_names.role_has_permissions'))->delete();
        DB::table(config('permission.table_names.model_has_roles'))->delete();
        DB::table(config('permission.table_names.model_has_permissions'))->delete();
        DB::table(config('permission.table_names.roles'))->delete();
        DB::table(config('permission.table_names.permissions'))->delete();
        Model::reguard();
    }
}
