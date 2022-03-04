<?php

namespace Database\Seeders;
use App\Models\PageLinks;
use Illuminate\Database\Seeder;

class PageLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuLinks = [
            [
                "title"             =>       'Dashboard',
				"href"              =>       'viewDashboard',
				"order"             =>       'order-1',
				"icon"              =>       "fas fa-tachometer-alt",
                "is_parent"         =>       true,
				"has_dropdown"      =>       false,
                "parentLink"        =>       ''
            ],
            [
                "title"      =>         'Pages',
				"href"      =>         '',
				"order"             =>         'order-2',
				"icon"              =>        "fas fa-file-alt",
                "is_parent"      =>         true,
				"has_dropdown"      =>         true,
                "parentLink"        =>       ''
            ],
            [
                "title"      =>         'Posts',
				"href"      =>         '',
				"order"      =>         'order-3',
				"icon"      =>        "fas fa-blog",
                "is_parent"      =>         true,
				"has_dropdown"      =>         true,
                "parentLink"        =>       ''

            ],
            [
                "title"      =>         'Media',
				"href"      =>         '',
				"order"      =>         'order-4',
				"icon"      =>        "fas fa-photo-video",
                "is_parent"      =>         true,
				"has_dropdown"      =>         true,
                "parentLink"        =>       ''

            ],
            [
                "title"      =>         'Site',
				"href"      =>         '',
				"order"      =>         'order-5',
				"icon"      =>        "fas fa-cogs",
                "is_parent"      =>         true,
				"has_dropdown"      =>         true,
                "parentLink"        =>       ''
            ],
            [
                "title"      =>         'Blog',
				"href"      =>         'blog.admin',
				"icon"      =>         'fas fa-sticky-note',
				"order"      =>         'order-1',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Posts'
            ],
            [
                "title"      =>         'Testimonials',
				"href"      =>         'testimonial.admin',
				"icon"      =>         'fas fa-comment-dots',
				"order"      =>         'order-2',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Posts'
            ],
            [
                "title"      =>         'Portfolio',
				"href"      =>         'portfolio.admin',
				"icon"      =>         'fas fa-portrait',
				"order"      =>         'order-3',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Posts'

            ],
            [
                "title"      =>         'Library',
				"href"      =>         'media.admin',
				"icon"      =>         'fas fa-book-open',
				"order"      =>         'order-1',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Media'

            ],
            [
                "title"      =>         'Users',
				"href"      =>         'admin.manager',
				"icon"      =>         'fas fa-users',
				"order"      =>         'order-2',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Site'
            ],
            [
                "title"      =>         'Settings',
				"href"      =>         'settings.admin',
				"icon"      =>         'fas  fa-sliders-h',
				"order"      =>         'order-first',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Site'
            ],
        ];

        // $pLinks = PageLinks::all();
        // foreach ($pLinks as $index => $plink)
        // {
        //     foreach ($defaults as $default)
        //     {
        //         if (strtolower($default['title']) === strtolower($plink['title']))
        //         {
        //             unset($defaults[$default['id']-1]);
        //         }

        //     }
        // }

        PageLinks::insert($menuLinks);
    }
}
