<?php

namespace Database\Seeders;
use App\Models\BrandColor;
use Illuminate\Database\Seeder;

class BrandColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = [
            [
                'id'            => 1,
                'attribute'      => 'Enable Customer Chat',
                'value'         => 'true',

            ],
            [
                'id'            => 2,
                'attribute'      => 'Facebook Page ID',
                'value'         => '110623211526439',

            ],
            [
                'id'            => 3,
                'attribute'      => 'Developer App ID',
                'value'         => '468041464709531',

            ],
            [
                'id'            => 4,
                'attribute'      => 'Google Map API',
                'value'         => 'AIzaSyB5SiSMKLwgubZJHNWFH92onf3HX2p3pNE',

            ],
            [
                'id'            => 5,
                'attribute'      => 'Map Pin Position (Latitude, Longitude)',
                'value'         => '{lat:9.2865474, lng:123.2556617}',

            ],
            
        ];
        $saved_defs = BrandColor::all();
        foreach ($saved_defs as $index => $saved_def)
        {
            foreach ($defaults as $default)
            {
                if (strtolower($default['var_name']) === strtolower($saved_def['var_name']))
                {
                    unset($defaults[$default['id']-1]);
                }

            }
        }

        BrandColor::insert($defaults);
    }
}
