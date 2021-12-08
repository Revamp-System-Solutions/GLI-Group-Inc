<?php

namespace Database\Seeders;
use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
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
                'media_name'   => 'revamp_logo',
                'image'          => 'revamp-system-solutions.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'RVMP_FILE'
            ],
            [
                'id'             => 2,
                'media_name'     => 'revamp_logo_alt',
                'image'          => 'revamp-system-solutions-alt.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'RVMP_FILE'
            ],
            [
                'id'             => 3,
                'media_name'     => 'Brand Logo',
                'image'          => 'brand-logo.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'RVMP_CLIENT_FILE'
            ],
            [
                'id'             => 4,
                'media_name'     => 'Brand Logo No Text',
                'image'          => 'brand-logo-no-text.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'RVMP_CLIENT_FILE'
            ],
            [
                'id'             => 5,
                'media_name'     => 'Favicon',
                'image'          => 'brand-logo-small.png',
                'description'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac lorem eu velit pretium sagittis. Integer et interdum velit, vitae laoreet nisi. Phasellus ac nulla dui. Mauris eu dapibus tortor,',
                'type'           => 'RVMP_CLIENT_FILE'
            ],
           
        ];
        $saved_statics = Media::all();
        foreach ($saved_statics as $index => $saved_static)
        {
            foreach ($rvmps as $rvmp)
            {
                if (strtolower($rvmp['media_name']) === strtolower($saved_static['media_name']))
                {
                    unset($rvmps[$rvmp['id']-1]);
                }

            }
        }

        Media::insert($rvmps);
    }
}
