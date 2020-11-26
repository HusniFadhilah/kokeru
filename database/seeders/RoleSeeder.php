<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $is_exist = Role::all();

        if (!$is_exist->count()) {
            $role_supervisor = new Role([
                'name' => 'Supervisor',
                'description' => 'Supervisor untuk distribusi ruang & CS',
            ]);
            $role_supervisor->save();

            $role_cs = new Role([
                'name' => 'CS',
                'description' => 'Cleaning Service yang bertugas membersihkan ruangan & melaporkannya',
            ]);
            $role_cs->save();
        }
    }
}
