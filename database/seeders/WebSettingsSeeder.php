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
        // Settings Group 00_client_inf, 01_meta_pltf, 02_gmaps
        // Social media fb, ig, yt, twttr
        $defaults = [
            [
                'id'                => 1,
                'attribute'         => 'Site Profile',
                'value'             => '{"site_name": "Revamp System Solutions", "address_line_1": "Unit 3, Uypitching Building", "address_line_2":"Km. 8, Jose Romero Road" , "town":"Valencia" ,"state":"6215", "postal_code":"6215", "country":"Philippines", "phone": "+63 905-000-0000", "email":"support@revampsystemsolutions.com"}',
                'short_name'        => 'site_inf',
                'is_activated'      => true,
                'settings_group'    => '00_client_inf'

            ],
            [
                'id'                => 2,
                'attribute'         => 'Google Map API',
                'value'             => '{"api_key":"AIzaSyB5SiSMKLwgubZJHNWFH92onf3HX2p3pNE", "pin_position": {"lat":9.2865474, "lng":123.2556617}, "pin_information": "Revamp System Solutions is located here", "zoom": 16.79, "map_type_id": "roadmap"}',
                'short_name'        => 'gmap_api',
                'is_activated'      => true,
                'settings_group'    => '02_gmap_api'

            ],
            [
                'id'                => 3,
                'attribute'         => 'Meta Platforms Integrations',
                'value'             => '{ "fb_page_id" : 110623211526439, "dev_app_id": 468041464709531}',
                'short_name'        => 'meta_pltf',
                'is_activated'      => true,
                'settings_group'    => '01_meta_pltf'
            ],
            [
                'id'                => 4,
                'attribute'         => 'Social Media links',
                'value'             => '{"fb":["https://www.facebook.com/gligroupinc","https://www.facebook.com/GLidesignstudio","https://www.facebook.com/GLidesignstudio", "https://www.facebook.com/glimodularcabinets"], "ig":[], "yt":[], "twttr":[]}',
                'short_name'        => 'social_links',
                'is_activated'      => true,
                'settings_group'    => '00_client_inf'

            ],
            
        ];
        WebSetting::insert($defaults);
    }
}
