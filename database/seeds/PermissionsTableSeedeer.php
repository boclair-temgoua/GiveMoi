<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Event_create']);
        Permission::create(['name' => 'Event_edit']);
        Permission::create(['name' => 'Event_delete']);
        Permission::create(['name' => 'comment_create']);
    }
}
