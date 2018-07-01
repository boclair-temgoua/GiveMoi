<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('Event_create','Event_edit', 'Event_delete', 'comment_create');

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('comment_create');
    }
}
