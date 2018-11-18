<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->name = 'User';
        $role_user->save();

        $role_user = new Role();
        $role_user->name = 'Editor';
        $role_user->save();

        $role_author = new Role();
        $role_author->name = 'Admin';
        $role_author->save();
    }
}
