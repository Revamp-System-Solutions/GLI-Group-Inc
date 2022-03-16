<?php

namespace Database\Seeders;
use App\Models\WebSetting;
use Illuminate\Database\Seeder;

class WebSettingsSeeder extends Seeder
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
                'attribute'     => 'Facebook Page ID',
                'value'         => '110623211526439',
                'short_name'    => 'fb_page_id',
                'is_activated'    => true,

            ],
            [
                'id'            => 2,
                'attribute'      => 'Developer App ID',
                'value'         => '468041464709531',
                'short_name'    => 'fb_app_id',
                'is_activated'    => true,

            ],
            [
                'id'            => 3,
                'attribute'      => 'Google Map API',
                'value'         => 'AIzaSyB5SiSMKLwgubZJHNWFH92onf3HX2p3pNE',
                'short_name'    => 'gmap_key',
                'is_activated'    => true,

            ],
            [
                'id'            => 4,
                'attribute'      => 'Map Pin Position',
                'value'         => '{"lat":9.2865474, "lng":123.2556617}',
                'short_name'    => 'gmap_pin',
                'is_activated'    => true,

            ],
            
        ];
        WebSetting::insert($defaults);
    }
}
