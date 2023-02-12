<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
// Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit account']);

        Permission::create(['name' => 'See admin panel']);

        Permission::create(['name' => 'Edit products']);
        Permission::create(['name' => 'Delete products']);
        Permission::create(['name' => 'Publish products']);

        Permission::create(['name' => 'Edit categories']);
        Permission::create(['name' => 'Delete categories']);
        Permission::create(['name' => 'Publish categories']);

        Permission::create(['name' => 'Update orders']);

//        Permission::create(['name' => 'delete articles']);
//        Permission::create(['name' => 'publish articles']);
//        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign existing permissions
        $customer = Role::create(['name' => 'customer']);
        $customer->givePermissionTo('edit account');

        $admin = Role::create(['name' => 'admin']);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo('See admin panel');
        $editor->givePermissionTo('Edit products');
        $editor->givePermissionTo('Delete products');
        $editor->givePermissionTo('Publish products');
        $editor->givePermissionTo('Edit categories');
        $editor->givePermissionTo('Delete categories');
        $editor->givePermissionTo('Publish categories');

  //      $sAdmin = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

    }
}
