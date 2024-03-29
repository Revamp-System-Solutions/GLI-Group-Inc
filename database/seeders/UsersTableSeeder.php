<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Super Admin',
                'email'          => 'su@gligroupinc.com',
                'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Administrator',
                'email'          => 'admin@gligroupinc.com',
                'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Editor',
                'email'          => 'editor@gligroupinc.com',
                'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Author',
                'email'          => 'author@gligroupinc.com',
                'password'       => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => null,
            ],
            
        ];

        $saved_users = User::all();
        foreach ($saved_users as $index => $saved_user)
        {
            foreach ($users as $user)
            {
                if (strtolower($user['name']) === strtolower($saved_user['name']))
                {
                    unset($users[$user['id']-1]);
                }

            }
        }

        User::insert($users);
    }
}
