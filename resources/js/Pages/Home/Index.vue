<template>
    <errors-and-messages :errors="errors"></errors-and-messages>
    <app-header></app-header>
    <div class="rvmp-container h-full space-y-6 mb-8">

        <lead-banner :lead-banner-data="page_content.lead_banner"/>
        <services :url="$page.url" :services-data="page_content.services"/>
        <testimonial :carousel-settings="settings" :carousel-breakpoints="breakpoints" :carousel-testimonials="posts"/>
    </div>
    <app-footer-default/>
</template>

<script>

import AppHeader from "../../Partials/AppHeader";
import AppFooterDefault from "../../Partials/AppFooterDefault";
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {computed} from "vue";


//sections import
import LeadBanner from "./LeadBanner";
import Services from './Services';
import Testimonial from './Testimonial';


export default {
    name: "Home",
    components: {
    ErrorsAndMessages,
    AppHeader,
    AppFooterDefault,
    LeadBanner,
    Services,
    Testimonial,
},
    props: {
        errors: Object,
        carouselSettings: {
                Type: Object,
                default: null
            },
        carouselBreakpoints: {
                Type: Object,
                default: null
            },
        carouselTestimonials: {
                Type: Object,
                default: null
            },
        leadBannerData: {
            Type: Object,
            default: null
        },
        servicesData: {
            Type: Object,
            default: null
        },
   },
    setup() {
        const pdata = computed(() => usePage().props.value.page.data);
        const page_content = JSON.parse(pdata.value.page_content)
        // console.log(page_content)
         const posts = computed(() => usePage().props.value.posts);
		return {
            page_content,
            posts,
			// carousel settings
			settings: {
				itemsToShow: 1,
				snapAlign: "center",
			},
			breakpoints: {
				// md
				768: {
					itemsToShow: 1.95,
					snapAlign: "center-odd",

				},
				// lg
				1024: {
					itemsToShow: 2.95,
					snapAlign: "center-odd",

				},
                //custom
                1440: {
					itemsToShow: 3.95,
					snapAlign: "center-odd",

				}
			}
		};
	}
}
</script>
