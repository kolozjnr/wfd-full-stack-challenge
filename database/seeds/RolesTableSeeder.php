<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role;
        $role_admin->name = "admin";
        $role_admin->description = "This is the root user and has access to the entire application. The admin user can add more users, delete / ban users";
        $role_admin->save();

        $role_supervior = new Role;
        $role_supervior->name = "supervisor";
        $role_supervior->description = "This is a regular user and has the ability to add / bulk upload / view the referrals.";
        $role_supervior->save();

        $role_executive = new Role;
        $role_executive->name = "executive";
        $role_executive->description = "This is a regular user and has the ability to view the referrals. However, they can add comments on the referrals. A separate table needs to be created for storing the comments. Comments will be visible to all users";
        $role_executive->save();

    }
}
