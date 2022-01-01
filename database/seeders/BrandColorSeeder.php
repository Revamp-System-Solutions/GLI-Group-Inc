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
                'var_name'      => '--rvmp-brand-color-one',
                'alias'         => 'Brand Color Main',
                'value'         => '34, 156, 35',
                'group'         => '_CLIENT_BRANDING'
            ],
            [
                'id'            => 2,
                'var_name'      => '--rvmp-brand-color-two',
                'alias'         => 'Brand Accent Color',
                'value'         => '0, 0, 0',
                'group'         => '_CLIENT_BRANDING'
            ],
            [
                'id'            => 3,
                'var_name'      => '--rvmp-brand-color-three',
                'alias'         => 'Brand Highlight Color ',
                'value'         => '34, 156, 35',
                'group'         => '_CLIENT_BRANDING'
            ],
            [
                'id'            => 4,
                'var_name'      => '--rvmp-brand-color-four',
                'alias'         => 'Brand Darker Main Color',
                'value'         => '28, 127, 28',
                'group'         => '_CLIENT_BRANDING'
            ],
            [
                'id'            => 5,
                'var_name'      => '--rvmp-banner-bg',
                'alias'         => 'Banner Background color',
                'value'         => '34, 156, 35',
                'group'         => '_CLIENT_BRANDING'
            ],
            [
                'id'            => 6,
                'var_name'      => '--rvmp-banner-color',
                'alias'         => 'Banner Font Color',
                'value'         => '255, 255, 255',
                'group'         => '_CLIENT_BRANDING'
            ],
            [
                'id'            => 7,
                'var_name'      => '--rvmp-bg-main',
                'alias'         => 'Content Background Color',
                'value'         => '255, 255, 255',
                'group'         => '_SITE_MAIN_CONTENT'
            ],
            [
                'id'            => 8,
                'var_name'      => '--rvmp-text-main',
                'alias'         => 'Content Font Color',
                'value'         => '112, 112, 112',
                'group'         => '_SITE_MAIN_CONTENT'
            ],
            [
                'id'            => 9,
                'var_name'      => '--rvmp-bg-alt',
                'alias'         => 'Content Background Color',
                'value'         => '237, 237, 237',
                'group'         => '_SITE_ALT_CONTENT'
            ],
            [
                'id'            => 10,
                'var_name'      => '--rvmp-text-alt',
                'alias'         => 'Content Font Color',
                'value'         => '255, 255, 255',
                'group'         => '_SITE_ALT_CONTENT'
            ],

            [
                'id'            => 11,
                'var_name'      => '--rvmp-header-bg',
                'alias'         => 'Background color',
                'value'         => '237, 237, 237',
                'group'         => '_SITE_HEADER'
            ],
            [
                'id'            => 12,
                'var_name'      => '--rvmp-header-text',
                'alias'         => 'Font Color',
                'value'         => '0, 0, 0',
                'group'         => '_SITE_HEADER'
            ],  
            [
                'id'            => 13,
                'var_name'      => '--rvmp-footer-bg',
                'alias'         => 'Background color',
                'value'         => '237, 237, 237',
                'group'         => '_SITE_FOOTER'
            ],
            [
                'id'            => 14,
                'var_name'      => '--rvmp-footer-text',
                'alias'         => 'Font Color',
                'value'         => '0, 0, 0',
                'group'         => '_SITE_FOOTER'
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
