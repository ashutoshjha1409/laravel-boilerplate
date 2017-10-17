<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $owner = new Role();
        $owner->name = 'admin' ;
        $owner->display_name = 'Adminstrator';
        $owner->description = 'Admin for the project';
        $owner->save();

        $owner = new Role();
        $owner->name = 'developer' ;
        $owner->display_name = 'Developer';
        $owner->description = 'developer for the project';
        $owner->save();
    }
}
