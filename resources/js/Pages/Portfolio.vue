<template>
    <app-header></app-header>
         <div>

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
                    <TabPanel class="w-full">
                    <div class="flex flex-wrap  -mb-8 mt-4">
                        <div v-for="(image, i) in images" :key="i" class="lg:w-1/6 m-w-1/6 px-4 mb-8">
                          <img  class="rounded object-fill h-52 w-full shadow-none" :src="'https://tom.imgix.net/artsy/' + image" >
                        </div>
                    </div>
                    </TabPanel>
                    <TabPanel>Content 2</TabPanel>
                    <TabPanel>Content 3</TabPanel>
                </TabPanels>
            </TabGroup>
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
import {computed, inject} from "vue";
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
        AppFooter
    },
    props: {
        errors: Object
    },
    data: () =>({
        portfolioCats: {'designstudio':false,'builders':false,'modularcabinets':false},
        hovered: null,
        images: [ '1.jpg?', '2.jpg?', '3.jpg?', '4.jpg?', '5.jpg?', '6.jpg?']

    }),
    
    methods:{
 

    }
   
}
</script>