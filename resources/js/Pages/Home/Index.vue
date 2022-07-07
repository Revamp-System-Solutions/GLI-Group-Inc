<template>
    <app-header></app-header>
    <div class="rvmp-container h-full space-y-6 mb-8">
        <lead-banner/>
        <services :url="$page.url"/>
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
   },
    setup() {
         const posts = computed(() => usePage().props.value.posts);
		return {
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
