<?php
namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'        => 1,
                'title'     => 'Super Admin',
            ],
            [
                'id'         => 2,
                'title'      => 'Administrator',
            ],
            [
                'id'         => 3,
                'title'      => 'Editor',
            ],
            [
                'id'          => 4,
                'title'       => 'Author',
            ],
            
        ];

        $savd_roles = Role::all();
        foreach ($savd_roles as $index => $saved_role)
        {
            foreach ($roles as $role)
            {
                if (strtolower($role['title']) === strtolower($saved_role['title']))
                {
                    unset($roles[$role['id']-1]);
                }

            }
        }

        Role::insert($roles);
    }
}
