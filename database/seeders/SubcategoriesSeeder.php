<?php

namespace Database\Seeders;
use App\Models\Subcategories;
use Illuminate\Database\Seeder;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcats = [
            [
                'id'                => 1,
                'name'              => 'Post',
                'description'       => 'DO NOT CHANGE OR DELETE',
                'category_id'       => 3
            ],
            [
                'id'                => 2,
                'name'              => 'Testimonials',
                'description'       => 'DO NOT CHANGE OR DELETE',
                'category_id'       => 3
            ],            
            [
                'id'                => 3,
                'name'              => 'Comments',
                'description'       => 'DO NOT CHANGE OR DELETE',
                'category_id'       => 3
            ],
           
        ];
        $saved_subcats = Subcategories::all();
        foreach ($saved_subcats as $index => $saved_subcat)
        {
            foreach ($subcats as $subcat)
            {
                if (strtolower($subcat['name']) === strtolower($saved_subcat['name']))
                {
                    unset($subcats[$subcat['id']-1]);
                }

            }
        }

        Subcategories::insert($subcats);
    }
}