<?php

namespace Database\Seeders;
use App\Model\RvmpStatic;
use Illuminate\Database\Seeder;

class RvmpStaticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rvmps = [
            [
                'id'             => 1,
                'static_value'   => 'revamp_logo',
                'image'          => 'revamp-system-solutions.png',
            ],
            [
                'id'             => 2,
                'static_value'   => 'revamp_logo_alt',
                'image'          => 'revamp-system-solutions-alt.png',
            ],
            [
                'id'             => 3,
                'static_value'   => 'brand-logo',
                'image'          => 'brand-logo.png',
            ],
            [
                'id'             => 4,
                'static_value'   => 'brand-logo-no-text',
                'image'          => 'brand-logo-no-text.png',
            ],
            [
                'id'             => 5,
                'static_value'   => 'brand-logo-small',
                'image'          => 'brand-logo-small.png',
            ],
           
        ];
        $saved_statics = RvmpStatic::all();
        foreach ($saved_statics as $index => $saved_static)
        {
            foreach ($rvmps as $rvmp)
            {
                if (strtolower($rvmp['name']) === strtolower($saved_static['name']))
                {
                    unset($rvmps[$rvmp['id']-1]);
                }

            }
        }

        User::insert($rvmps);
    }
}
