<template>
    <app-header></app-header>
    <div  class="flex lg:flex-row flex-col-reverse mx-auto h-full lg:px-36 md:px-2">
        <div class="lg:w-2/5 my-auto p-5 py-10 lg:-mr-28 z-10 bg-white opacity-75 ">
            <ul class="border-l-4 px-5 uppercase text-lg font-bold">
                <li>simple</li>
                <li>modern</li>
                <li>innovative</li>
                <li>residential architecture</li>
            </ul>
            <div class="font-light italic mt-20 mb-10">
                Our team of professionals will help you turn your dream house into reality fast.
            </div>
            <div class="space-x-5">
                <button class="bg-green-600 text-white px-4 py-1.5 hover:bg-green-700 transition ease-in-out duration-300">Give us a Call!</button>
                <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">Our Portfolio</button>
            </div>
        </div>
        <div class="lg:w-4/6 lg:right-0 bg-cover bg-center"><img src="/images/pages/section-1.jpg"></div>
    </div>
    <div>
        <div class=" uppercase text-center my-10">
            <span class="border-b-4 text-xl font-bold pb-2.5">Here's what we can offer</span>
        </div>
            <TabGroup>
                <TabList class="flex w-full">
                    <Tab v-slot="{ selected }"
                         class="w-1/3 bg-green-600">
                         <button class="w-full bg-cover h-96 bg-center transition ease-in duration-300"
                                :class="[selected ? 'text-white opacity-100' : 'text-green-800 opacity-25']"
                                style="background-image: url('/images/pages/CABINETS.jpg')">

                            <div class="w-full transition ease-in duration-300 py-2.5"
                            :class="[selected?'bg-green-800':'']">
                                <div class=" text-4xl font-bold">GLI</div>
                                <div>MODULAR CABINETS</div>
                            </div>
                        </button>
                    </Tab>
                    <Tab v-slot="{ selected }"
                         class="w-1/3 bg-green-600">
                          <button class="w-full bg-cover h-96 bg-center transition ease-in duration-300"
                                :class="[selected ? 'text-white opacity-100' : 'text-green-800 opacity-25']"
                                style="background-image: url('/images/pages/BUILDERS-1.jpg')">
                                <div class="w-full transition ease-in duration-300 py-2.5"
                                :class="[selected?'bg-green-800':'']">
                                        <div class=" text-4xl font-bold">GLI</div>
                                        <div>BUILDERS</div>
                                </div>
                        </button>
                    </Tab>
                    <Tab v-slot="{ selected }"
                    class="w-1/3  bg-green-600">
                         <button class="w-full bg-cover h-96 bg-center transition ease-in duration-300"
                        :class="[selected ? 'text-white opacity-100' : 'text-green-800 opacity-25']"
                        style="background-image: url('/images/pages/STUDIO.jpg')">
                            <div class="w-full transition ease-in duration-300 py-2.5"
                                :class="[selected?'bg-green-800':'']">
                                <div class=" text-4xl font-bold">GLI</div>
                                <div>DESIGN STUDIO</div>
                            </div>
                        </button>
                    </Tab>
                </TabList>
                <TabPanels>
                    <TabPanel class="flex items-center text-center m-20 space-x-10">
                        <div class="w-1/2">
                            <img src="/images/pages/CABINETS.jpg">
                        </div>
                        <div class="w-1/2 space-y-10">
                                <ul class="border-l-4 text-left pl-2.5 font-bold">
                                    <li>Here at GLI Modular Cabinets</li>
                                    <li>We offer you</li>
                                </ul>
                                <div class="text-5xl uppercase font-bold text-left">
                                    <div class="">
                                        firm building
                                    </div>
                                    <div class="text-green-800">
                                        Structures
                                    </div>
                                </div>
                                <p class="text-left pl-32">
                                    is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                </p>
                                <div class="space-x-5 flex justify-start">
                                    <a href="$route('guest.portfolio')">
                                    <button class="bg-green-600 text-white px-4 py-1.5 hover:bg-green-700 transition ease-in-out duration-300">
                                        Give us a Call!
                                    </button>
                                    </a>
                                    <a href="$route('guest.contact')">
                                    <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">
                                        Our Portfolio
                                    </button>
                                    </a>
                                </div>
                        </div>
                    </TabPanel>
                    <TabPanel class="flex items-center text-center m-20 space-x-10">
                        <div class="w-1/2">
                            <img src="/images/pages/BUILDERS-1.jpg">
                        </div>
                        <div class="w-1/2 space-y-10">
                                <ul class="border-l-4 text-left pl-2.5 font-bold">
                                    <li>Here at GLI Modular Cabinets</li>
                                    <li>We offer you</li>
                                </ul>
                                <div class="text-5xl uppercase font-bold text-left">
                                    <div class="">
                                        firm building
                                    </div>
                                    <div class="text-green-800">
                                        Structures
                                    </div>
                                </div>
                                <p class="text-left pl-32">
                                    is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                </p>
                                <div class="space-x-5 flex justify-start">
                                    <a href="$route('guest.portfolio')">
                                    <button class="bg-green-600 text-white px-4 py-1.5 hover:bg-green-700 transition ease-in-out duration-300">
                                        Give us a Call!
                                    </button>
                                    </a>
                                    <a href="$route('guest.contact')">
                                    <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">
                                        Our Portfolio
                                    </button>
                                    </a>
                                </div>
                        </div>
                    </TabPanel>
                    <TabPanel class="flex items-center text-center m-20 space-x-10">
                        <div class="w-1/2">
                            <img src="/images/pages/STUDIO.jpg">
                        </div>
                        <div class="w-1/2 space-y-10">
                                <ul class="border-l-4 text-left pl-2.5 font-bold">
                                    <li>Here at GLI Modular Cabinets</li>
                                    <li>We offer you</li>
                                </ul>
                                <div class="text-5xl uppercase font-bold text-left">
                                    <div class="">
                                        firm building
                                    </div>
                                    <div class="text-green-800">
                                        Structures
                                    </div>
                                </div>
                                <p class="text-left pl-32">
                                    is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the
                                    1500s, when an unknown printer took a galley of type and scrambled it to make a
                                    type specimen book. It has survived not only five centuries, but also the leap into
                                    electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                                </p>
                                <div class="space-x-5 flex justify-start">
                                    <a href="$route('guest.portfolio')">
                                    <button class="bg-green-600 text-white px-4 py-1.5 hover:bg-green-700 transition ease-in-out duration-300">
                                        Give us a Call!
                                    </button>
                                    </a>
                                    <a href="$route('guest.contact')">
                                    <button class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">
                                        Our Portfolio
                                    </button>
                                    </a>
                                </div>
                        </div>
                    </TabPanel>
                </TabPanels>
            </TabGroup>
    </div>
    <div class="overflow-x-hidden 2xl:px-80 xl:px-56 lg:px-28 px-8">
        <div class=" uppercase text-center my-10">
            <span class="border-b-4 text-xl font-bold pb-2.5">Our Client's Testimonial</span>
        </div>
    
    <Carousel :settings="settings" :breakpoints="breakpoints" :wrapAround="true" :mouseDrag="true">
        <Slide v-for="slide in 10" :key="slide" >
        <div class="carousel__item m-4" >
            <div class="w-full h-auto shadow-md rounded-md bg-gray-50 text-center flex flex-col space-y-3 ">
                <img src="/images/pages/mission.jpg" class="rounder-t-md"/>
                <div class="w-full text-center ratings text-yellow-400 space-x-2"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                <div class="p-4 testimonial-content">
                    <p class="brand-text italic text-xs text-center mb-5 font-light">
                   Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <h3 class="text-base font-semibold leading-6 mb-0 brand-text rvmp-footer-contact-text capitalize">Elonzo Musk</h3>
                <h2 class="text-xs font-light leading-6 brand-text rvmp-footer-contact-text capitalize">Tesla</h2>
                </div>
                
            </div>
        </div>
        </Slide>

        <template #addons>
        <Pagination />
        <Navigation />
        </template>
  </Carousel>
    </div>
    <app-footer></app-footer>
</template>

<script>
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import AppHeader from "../Partials/AppHeader";
import AppFooter from "../Partials/AppFooter";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject } from "vue";
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
export default {
    name: "Home",
    components: {
        ErrorsAndMessages,
        AppHeader,
        TabGroup,
        TabList,
        Tab,
        TabPanels,
        TabPanel,
        AppFooter,
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    props: {
        errors: Object
    },
    setup() {
		return {
			// carousel settings
			settings: {
				itemsToShow: 1,
				snapAlign: "center-odd",
			},
			// breakpoints are mobile first
			// any settings not specified will fallback to the carousel settings
			breakpoints: {
				// 700px and up
				700: {
					itemsToShow: 1.95,
					snapAlign: "center-odd",

				},
				// 1024 and up
				1024: {
					itemsToShow: 2.95,
					snapAlign: "center-odd",

				},
                1280: {
					itemsToShow: 3.95,
					snapAlign: "center-odd",

				}
			}
		};
	}
}
</script>
