<template>
    <app-header></app-header>
    <div class="rvmp-container h-full space-y-6 mb-8">
        <div class="h-auto 2xl:px-40 xl:px-16 lg:px-8" id="rvmp-lead-section-1">
            <div class="flex lg:flex-row flex-col-reverse h-auto z-0 relative">
                <div class="lg:w-2/6 w-full lg:h-3/4 h-full lg:py-32 lg:pl-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-main lg:bg-opacity-0 bg-opacity-80">
                    <div class="lg:py-36 lg:my-12 lg:static">
                        <div class="lg:rvmp-bg-main lg:bg-opacity-70 lg:absolute lg:top-0 xl:pr-32 lg:pr-28 lg:py-16 lg:my-20 xl:w-2/5 lg:w-1/2 w-full lg:space-y-10 space-y-5">
                        <blockquote className="self-start border-l-8 rvmp-brand-border-highlight lg:my-2" id="rvmp-lead-heading">
                                <h1 class="px-5 brand-text uppercase lg:mt-0 mt-8 xl:text-3xl text-xl font-bold">
                                    Building A Better Built Environment Together
                                </h1>
                            </blockquote>
                            <div class="font-light italic lg:mt-20 lg:mb-10" id="rvmp-lead-text">
                                Our team of professionals will help you turn your dream house into reality fast.
                            </div>
                            <div class="space-x-5 flex lg:justify-start justify-center" id="rvmp-lead-cta">
                                <button class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">Give us a Call!</button>
                                <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">Our Portfolio</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-4/6 w-full lg:h-auto h-96 static bg-origin-border bg-cover bg-no-repeat bg-center bg-local" id="rvmp-lead-image" style="background-image: url('/images/pages/section-1.jpg')" >&nbsp;</div>
            </div>
        </div>
        <div id="rvmp-services-section-1">
            <div class="uppercase text-center" id="rvmp-services-heading">
                <span class="border-b-4 rvmp-brand-border-highlight text-xl font-bold pb-2.5">Here's what we offer</span>
            </div>
            <div class="tab-container mt-10" id="rvmp-services-content">
                <TabGroup >
                    <TabList class="flex w-full">
                        <Tab v-slot="{ selected }" id="modularcabinets"
                            class="w-1/3  bg-cover bg-center" style="background-image: url('/images/pages/CABINETS.jpg')">
                            <button class="w-full rvmp-brand-bg-main h-96  transition ease-in duration-300"
                                    :class="[selected ? 'text-white bg-opacity-0' : 'text-black bg-opacity-40']">
                                <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                :class="[selected?'rvmp-brand-bg-darker':'']">
                                    <div class="text-4xl font-semibold">GLI</div>
                                    <div class="font-thin">MODULAR CABINETS</div>
                                </div>
                            </button>
                        </Tab>
                        <Tab v-slot="{ selected }" id="builders"
                            class="w-1/3 bg-cover bg-center"  style="background-image: url('/images/pages/BUILDERS-1.jpg')">
                            <button class="w-full rvmp-brand-bg-main h-96  transition ease-in duration-300"
                                    :class="[selected ? 'text-white bg-opacity-0' : 'text-black bg-opacity-40']">
                                    <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                    :class="[selected?'rvmp-brand-bg-darker':'']">
                                            <div class="text-4xl font-semibold">GLI</div>
                                            <div class="font-thin">BUILDERS</div>
                                    </div>
                            </button>
                        </Tab>
                        <Tab v-slot="{ selected }" id="designstudio"
                        class="w-1/3  bg-cover bg-center" style="background-image: url('/images/pages/STUDIO.jpg')">
                            <button class="w-full rvmp-brand-bg-main h-96 transition ease-in duration-300"
                            :class="[selected ? 'text-white bg-opacity-0' : 'text-black bg-opacity-40']">
                                <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                    :class="[selected?'rvmp-brand-bg-darker':'']">
                                    <div class="text-4xl font-semibold">GLI</div>
                                    <div class="font-thin">DESIGN STUDIO</div>
                                </div>
                            </button>
                        </Tab>
                    </TabList>
                    <TabPanels>
                        <TabPanel class="flex lg:flex-row flex-col items-center text-center lg:m-20 lg:space-x-10">
                            <div class="lg:w-1/2 w-full lg:block hidden">
                                <img src="/images/pages/CABINETS.jpg">
                            </div>
                            <div class="lg:w-1/2 w-full lg:space-y-10 space-y-5 lg:px-0 px-8">
                                    <ul class="border-l-4 rvmp-brand-border-highlight text-left pl-2.5 lg:mt-0 mt-8 font-bold">
                                        <li>Here at GLI Modular Cabinets</li>
                                        <li>We offer you</li>
                                    </ul>
                                    <div class="lg:text-3xl text-xl uppercase font-bold text-left">
                                        <span class="">
                                            firm building
                                        </span>
                                        <span class="rvmp-brand-color-highlight">
                                            Structures
                                        </span>
                                    </div>
                                    <p class="text-left 2xl:pl-32 xl:pl-16 lg:pl-8">
                                        is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to make a
                                        type specimen book. It has survived not only five centuries, but also the leap into
                                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                    </p>
                                    <div class="space-x-5 flex lg:justify-start justify-center">
                                        <button class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">
                                            Give us a Call!
                                        </button>
                                        <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">
                                            Our Portfolio
                                        </button>
                                    </div>
                            </div>
                        </TabPanel>
                        <TabPanel class="flex lg:flex-row flex-col items-center text-center lg:m-20 lg:space-x-10">
                            <div class="lg:w-1/2 w-full lg:block hidden">
                                <img src="/images/pages/BUILDERS-1.jpg">
                            </div>
                            <div class="lg:w-1/2 w-full lg:space-y-10 space-y-5 lg:px-0 px-8">
                                    <ul class="border-l-4 rvmp-brand-border-highlight text-left pl-2.5 lg:mt-0 mt-8  font-bold">
                                        <li>Here at GLI Builders</li>
                                        <li>We offer you</li>
                                    </ul>
                                    <div class="lg:text-3xl text-xl uppercase font-bold text-left">
                                        <span class="">
                                            firm building
                                        </span>
                                        <span class="rvmp-brand-color-highlight">
                                            Structures
                                        </span>
                                    </div>
                                    <p class="text-left 2xl:pl-32 xl:pl-16 lg:pl-8">
                                        is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to make a
                                        type specimen book. It has survived not only five centuries, but also the leap into
                                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                    </p>
                                    <div class="space-x-5 flex lg:justify-start justify-center">
                                        <button class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">
                                            Give us a Call!
                                        </button>
                                        <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">
                                            Our Portfolio
                                        </button>
                                    </div>
                            </div>
                        </TabPanel>
                        <TabPanel class="flex lg:flex-row flex-col items-center text-center lg:m-20 lg:space-x-10">
                            <div class="lg:w-1/2 w-full lg:block hidden">
                                <img src="/images/pages/STUDIO.jpg">
                            </div>
                            <div class="lg:w-1/2 w-full lg:space-y-10 space-y-5 lg:px-0 px-8">
                                    <ul class="border-l-4 rvmp-brand-border-highlight text-left pl-2.5 lg:mt-0 mt-8  font-bold">
                                        <li>Here at GLI Design Studio</li>
                                        <li>We offer you</li>
                                    </ul>
                                    <div class="lg:text-3xl text-xl uppercase font-bold text-left">
                                        <span class="">
                                            firm building
                                        </span>
                                        <span class="rvmp-brand-color-highlight">
                                            Structures
                                        </span>
                                    </div>
                                    <p class="text-left 2xl:pl-32 xl:pl-16 lg:pl-8">
                                        is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to make a
                                        type specimen book. It has survived not only five centuries, but also the leap into
                                        electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                    </p>
                                    <div class="space-x-5 flex lg:justify-start justify-center">
                                        <button class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">
                                            Give us a Call!
                                        </button>
                                        <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">
                                            Our Portfolio
                                        </button>
                                    </div>
                            </div>
                        </TabPanel>
                    </TabPanels>
                </TabGroup>
            </div>
        </div>
        <div id="rvmp-testimonials-section-1">
            <div class="uppercase text-center" id="rvmp-testimonial-heading">
                <span class="border-b-4 rvmp-brand-border-highlight text-xl font-bold pb-2.5">Our Client's Testimonial</span>
            </div>
            <div class="overflow-x-hidden 2xl:px-40 xl:px-20 lg:px-10 px-5" id="rvmp-testimonial-content">
                <Carousel :settings="settings" :breakpoints="breakpoints" :wrapAround="true" :mouseDrag="true">
                    <Slide v-for="(post,index) in posts" :key="post" :index="index">
                        <div class="carousel__item m-4 w-full h-auto shadow-md rounded-md bg-gray-50 text-center flex flex-col space-y-3 ">
                            <img :src="post.image_url" class="rounded-t-md"/>
                            <div class="p-4 testimonial-content space-y-3">
                                <p class="w-full text-center ratings text-yellow-400 space-x-2 mb-0" v-html="post.stars">

                                </p>
                                <div class="brand-text italic text-xs text-center mb-0 font-light" v-html="post.content">

                                </div>
                                <p>
                                    <strong class="text-base font-semibold leading-3 mb-0 brand-text rvmp-footer-text capitalize block">{{post.client_name}}</strong>
                                    <span class="text-xs font-light leading-3 brand-text rvmp-footer-text capitalize">{{post.client_org}}</span>
                                </p>
                            </div>
                        </div>
                    </Slide>
                    <template #addons>
                        <Pagination />
                        <Navigation />
                    </template>
                </Carousel>
            </div>
        </div>
    </div>
    <messenger-plugin/>
    <app-footer-default/>
</template>

<script>
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import AppHeader from "../Partials/AppHeader";
import AppFooterDefault from "../Partials/AppFooterDefault";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import MessengerPlugin from "../Partials/MessengerPlugin";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject } from "vue";
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';



export default {
    name: "Home",
    components: {
        ErrorsAndMessages,
        AppHeader,
        MessengerPlugin,
        TabGroup,
        TabList,
        Tab,
        TabPanels,
        TabPanel,
        AppFooterDefault,
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    props: {
        errors: Object
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
