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
                'description'   => 'for affected classes',
                'value'         => '34, 156, 35',

            ],
            [
                'id'            => 2,
                'var_name'      => '--rvmp-brand-color-two',
                'alias'         => 'Brand Accent Color',
                'description'   => 'for affected classes',
                'value'         => '0, 0, 0',
            ],
            [
                'id'            => 3,
                'var_name'      => '--rvmp-brand-color-three',
                'alias'         => 'Brand Highlight Color ',
                'description'   => 'for affected classes',
                'value'         => '34, 156, 35',
            ],
            [
                'id'            => 4,
                'var_name'      => '--rvmp-brand-color-four',
                'alias'         => 'Brand Darker Main Color',
                'description'   => 'for affected classes',
                'value'         => '28, 127, 28',
            ],
            [
                'id'            => 5,
                'var_name'      => '--rvmp-text-color',
                'alias'         => 'Standard Content Font Color',
                'description'   => 'for affected classes',
                'value'         => '0, 0, 0',
            ],
            [
                'id'            => 6,
                'var_name'      => '--rvmp-bg-main',
                'alias'         => 'Main Content Background Color',
                'description'   => 'for affected classes',
                'value'         => '34, 156, 35',
            ],
            [
                'id'            => 7,
                'var_name'      => '--rvmp-text-main',
                'alias'         => 'Main Content Font Color',
                'description'   => 'for affected classes',
                'value'         => '112, 112, 112',
            ],
            [
                'id'            => 8,
                'var_name'      => '--rvmp-bg-alt',
                'alias'         => 'Alternate Content Background Color',
                'description'   => 'for affected classes',
                'value'         => '112, 112, 112',
            ],
            [
                'id'            => 9,
                'var_name'      => '--rvmp-text-alt',
                'alias'         => 'Alternate Content Font Color',
                'description'   => 'for affected classes',
                'value'         => '255, 255, 255',
            ],
            [
                'id'            => 10,
                'var_name'      => '--rvmp-brand-color-five',
                'alias'         => 'Banner Font Color',
                'description'   => 'effects on Hero Banner text',
                'value'         => '255, 255, 255',
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
