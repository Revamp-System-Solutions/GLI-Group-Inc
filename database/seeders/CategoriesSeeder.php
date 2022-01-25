<?php

namespace Database\Seeders;
use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats = [
            [
                'id'                => 1,
                'name'              => 'Pages',
                'description'       => 'DO NOT CHANGE OR DELETE',
            ],
            [
                'id'                => 2,
                'name'              => 'Templates',
                'description'       => 'DO NOT CHANGE OR DELETE',
            ],            
            [
                'id'                => 3,
                'name'              => 'Blogs',
                'description'       => 'DO NOT CHANGE OR DELETE',
            ],
            [
                'id'                => 4,
                'name'              => 'Testimonials',
                'description'       => 'DO NOT CHANGE OR DELETE',
            ],
            [
                'id'                => 5,
                'name'              => 'Portfolio',
                'description'       => 'DO NOT CHANGE OR DELETE',
            ],
        ];
        $saved_cats = Categories::all();
        foreach ($saved_cats as $index => $saved_cat)
        {
            foreach ($cats as $cat)
            {
                if (strtolower($cat['name']) === strtolower($saved_cat['name']))
                {
                    unset($cats[$cat['id']-1]);
                }

            }
        }

        Categories::insert($cats);
    }
}
