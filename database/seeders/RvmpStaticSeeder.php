<?php

namespace Database\Seeders;
use App\Models\RvmpStatic;
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
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'RVMP_FILE'
            ],
            [
                'id'             => 2,
                'static_value'   => 'revamp_logo_alt',
                'image'          => 'revamp-system-solutions-alt.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'RVMP_FILE'
            ],
            [
                'id'             => 3,
                'static_value'   => 'brand-logo',
                'image'          => 'brand-logo.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'CLIENT_FILE'
            ],
            [
                'id'             => 4,
                'static_value'   => 'brand-logo-no-text',
                'image'          => 'brand-logo-no-text.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'CLIENT_FILE'
            ],
            [
                'id'             => 5,
                'static_value'   => 'brand-logo-small',
                'image'          => 'brand-logo-small.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'CLIENT_FILE'
            ],
           
        ];
        $saved_statics = RvmpStatic::all();
        foreach ($saved_statics as $index => $saved_static)
        {
            foreach ($rvmps as $rvmp)
            {
                if (strtolower($rvmp['static_value']) === strtolower($saved_static['static_value']))
                {
                    unset($rvmps[$rvmp['id']-1]);
                }

            }
        }

        RvmpStatic::insert($rvmps);
    }
}
