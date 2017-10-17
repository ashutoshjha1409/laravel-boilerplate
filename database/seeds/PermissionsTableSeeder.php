<?php

use App\Permission;
use Illuminate\Database\Seeder;


class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permission = new Permission();
        $permission->name = 'create-request';
        $permission->description = 'Permission to create request';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'edit-request';
        $permission->description = 'Permission to edit request';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'delete-request';
        $permission->description = 'Permission to delete request';
        $permission->save();
    }
}
