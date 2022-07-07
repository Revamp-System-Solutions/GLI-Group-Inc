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
                "parentLink"        =>       '',
                "is_admin"          =>       true,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Pages',
				"href"      =>         'page.admin',
				"order"             =>         'order-2',
				"icon"              =>        "fas fa-file-alt",
                "is_parent"      =>         true,
				"has_dropdown"      =>         false,
                "parentLink"        =>       '',
                "is_admin"          =>       true,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Posts',
				"href"      =>         '',
				"order"      =>         'order-3',
				"icon"      =>        "fas fa-blog",
                "is_parent"      =>         true,
				"has_dropdown"      =>         true,
                "parentLink"        =>       '',
                "is_admin"          =>       true,
                "is_active"         =>       true

            ],
            [
                "title"      =>         'Media',
				"href"      =>         '',
				"order"      =>         'order-4',
				"icon"      =>        "fas fa-photo-video",
                "is_parent"      =>         true,
				"has_dropdown"      =>         true,
                "parentLink"        =>       '',
                "is_admin"          =>       true,
                "is_active"         =>       true

            ],
            [
                "title"      =>         'Site',
				"href"      =>         '',
				"order"      =>         'order-5',
				"icon"      =>        "fas fa-cogs",
                "is_parent"      =>         true,
				"has_dropdown"      =>         true,
                "parentLink"        =>       '',
                "is_admin"          =>       true,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Blog',
				"href"      =>         'blog.admin',
				"icon"      =>         'fas fa-sticky-note',
				"order"      =>         'order-1',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Posts',
                "is_admin"          =>       true,
                "is_active"         =>       false
            ],
            [
                "title"      =>         'Testimonials',
				"href"      =>         'testimonial.admin',
				"icon"      =>         'fas fa-comment-dots',
				"order"      =>         'order-2',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Posts',
                "is_admin"          =>       true,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Portfolio',
				"href"      =>         'portfolio.admin',
				"icon"      =>         'fas fa-portrait',
				"order"      =>         'order-3',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Posts',
                "is_admin"          =>       true,
                "is_active"         =>       true

            ],
            [
                "title"      =>         'Library',
				"href"      =>         'media.admin',
				"icon"      =>         'fas fa-book-open',
				"order"      =>         'order-1',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Media',
                "is_admin"          =>       true,
                "is_active"         =>       true

            ],
            [
                "title"      =>         'Users',
				"href"      =>         'admin.manager',
				"icon"      =>         'fas fa-users',
				"order"      =>         'order-2',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Site',
                "is_admin"          =>       true,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Settings',
				"href"      =>         'settings.admin',
				"icon"      =>         'fas  fa-sliders-h',
				"order"      =>         'order-first',
				"is_parent"      =>         false,
                "has_dropdown"      =>         true,
                "parentLink"      =>         'Site',
                "is_admin"          =>       true,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Home',
				"href"      =>         'guest.index',
				"icon"      =>         '',
				"order"      =>         'order-1',
				"is_parent"      =>         true,
                "has_dropdown"      =>         false,
                "parentLink"      =>         '',
                "is_admin"          =>       false,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Divisions',
				"href"      =>         '',
				"icon"      =>         '',
				"order"      =>         'order-2',
				"is_parent"      =>         true,
                "has_dropdown"      =>         true,
                "parentLink"      =>         '',
                "is_admin"          =>       false,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Modular Cabinets',
				"href"      =>         '#modularcabinets',
				"icon"      =>         '',
				"order"      =>         'order-1',
				"is_parent"      =>         false,
                "has_dropdown"      =>         false,
                "parentLink"      =>         'Services',
                "is_admin"          =>       false,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Builders',
				"href"      =>         '#builders',
				"icon"      =>         '',
				"order"      =>         'order-2',
				"is_parent"      =>         false,
                "has_dropdown"      =>         false,
                "parentLink"      =>         'Divisions',
                "is_admin"          =>       false,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Design Studio',
				"href"      =>         '#designstudio',
				"icon"      =>         '',
				"order"      =>         'order-3',
				"is_parent"      =>         false,
                "has_dropdown"      =>         false,
                "parentLink"      =>         'Divisions',
                "is_admin"          =>       false,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Blog',
				"href"      =>         'guest.blog',
				"icon"      =>         '',
				"order"      =>         'order-3',
				"is_parent"      =>         true,
                "has_dropdown"      =>         false,
                "parentLink"      =>         '',
                "is_admin"          =>       false,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Portfolio',
				"href"      =>         'guest.portfolio',
				"icon"      =>         '',
				"order"      =>         'order-4',
				"is_parent"      =>         true,
                "has_dropdown"      =>         false,
                "parentLink"      =>         '',
                "is_admin"          =>       false,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'About',
				"href"      =>         'guest.about',
				"icon"      =>         '',
				"order"      =>         'order-5',
				"is_parent"      =>         true,
                "has_dropdown"      =>         false,
                "parentLink"      =>         '',
                "is_admin"          =>       false,
                "is_active"         =>       true
            ],
            [
                "title"      =>         'Contact Us',
				"href"      =>         'guest.contact',
				"icon"      =>         '',
				"order"      =>         'order-6',
				"is_parent"      =>         true,
                "has_dropdown"      =>         false,
                "parentLink"      =>         '',
                "is_admin"          =>       false,
                "is_active"         =>       true
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
