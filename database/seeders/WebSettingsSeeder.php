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
                'value'             => '{"0_site_name": "Revamp System Solutions", "address_line_1": "Unit 3, Uypitching Building", "address_line_2":"Km. 8, Jose Romero Road" , "town":"Valencia" ,"state":"Negros Oriental", "postal_code":"6215", "country":"Philippines", "phone": "+63 905-000-0000", "email":"support@revampsystemsolutions.com"}',
                'short_name'        => 'site_inf',
                'is_activated'      => true,
                'settings_group'    => '00_client_inf'

            ],
            [
                'id'                => 2,
                'attribute'         => 'Google Map API',
                'value'             => '{"0_api_key":"AIzaSyB5SiSMKLwgubZJHNWFH92onf3HX2p3pNE", "pin_position_latitude": 9.2865474, "pin_position_longitude":123.2556617, "0_pin_information": "Revamp System Solutions is located here", "zoom": 16.79, "map_type_id": "roadmap"}',
                'short_name'        => 'gmap_api',
                'is_activated'      => false,
                'settings_group'    => '02_gmap_api'

            ],
            [
                'id'                => 3,
                'attribute'         => 'Meta Platforms Integrations',
                'value'             => '{ "0_fb_page_id" : 110623211526439, "0_dev_app_id": 468041464709531}',
                'short_name'        => 'meta_pltf',
                'is_activated'      => true,
                'settings_group'    => '01_meta_pltf'
            ],
            [
                'id'                => 4,
                'attribute'         => 'Social Media links',
                'value'             => '{"0_fb":["https://www.facebook.com/gligroupinc","https://www.facebook.com/GLidesignstudio","https://www.facebook.com/GLidesignstudio", "https://www.facebook.com/glimodularcabinets"], "0_ig":[], "0_yt":[], "0_twttr":[], "0_lnkdn":["https://www.linkedin.com/company/gli-group-inc"]}',
                'short_name'        => 'social_links',
                'is_activated'      => true,
                'settings_group'    => '00_client_inf'

            ],
            [
                'id'                => 5,
                'attribute'         => 'Google Map Embed',
                'value'             => '{"0_embed_link": "https://maps.google.com/maps?q=GLI%20Group%20Inc.,%20Unit%203,%20Uypitching%20Building,%20Km.%208%20Jose%20Romero%20Road,%20Valencia,%206215%20Negros%20Oriental&t=&z=19&ie=UTF8&iwloc=&output=embed"}',
                'short_name'        => 'gmap_noapi',
                'is_activated'      => true,
                'settings_group'    => '03_gmap_noapi'

            ],
            
        ];
        WebSetting::insert($defaults);
    }
}
