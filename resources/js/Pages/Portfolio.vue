<template>
    <app-header></app-header>
    <div class="rvmp-container">
            <TabGroup>
                <TabList class="flex w-full">
                    <Tab v-slot="{ selected }"
                         class="w-1/3 bg-green-600">
                         <button class="w-full bg-cover h-96 bg-center transition ease-in duration-300"
                                :class="[selected ? 'text-white opacity-100' : 'text-green-800 opacity-25']"
                                style="background-image: url('/images/pages/CABINETS.jpg')">

                            <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                            :class="[selected?'bg-green-800':'']">
                                <div class=" text-4xl  font-semibold">GLI</div>
                                <div>MODULAR CABINETS</div>
                            </div>
                        </button>
                    </Tab>
                    <Tab v-slot="{ selected }"
                         class="w-1/3 bg-green-600">
                          <button class="w-full bg-cover h-96 bg-center transition ease-in duration-300"
                                :class="[selected ? 'text-white opacity-100' : 'text-green-800 opacity-25']"
                                style="background-image: url('/images/pages/BUILDERS-1.jpg')">
                                <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                :class="[selected?'bg-green-800':'']">
                                        <div class=" text-4xl  font-semibold">GLI</div>
                                        <div>BUILDERS</div>
                                </div>
                        </button>
                    </Tab>
                    <Tab v-slot="{ selected }"
                    class="w-1/3  bg-green-600">
                         <button class="w-full bg-cover h-96 bg-center transition ease-in duration-300"
                        :class="[selected ? 'text-white opacity-100' : 'text-green-800 opacity-25']"
                        style="background-image: url('/images/pages/STUDIO.jpg')"> 
                            <div class="w-full transition ease-in duration-300 py-2.5 brand-logo-text"
                                :class="[selected?'bg-green-800':'']">
                                <div class=" text-4xl  font-semibold">GLI</div>
                                <div class="font-thin">DESIGN STUDIO</div>
                            </div>
                        </button>
                    </Tab>
                </TabList>
                <TabPanels>
                    <TabPanel class="bg-transparent">
                      <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 bg-transparent">
                          <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">
                            <a v-for="product in products" :key="product.id" :href="product.href" class="group">
                              <div class="w-full aspect-w-1 aspect-h-1 overflow-hidden xl:aspect-w-7 xl:aspect-h-8 shadow-lg bg-white rounded-md h-18">
                              <div class="w-full h-96"><img :src="product.imageSrc" :alt="product.imageAlt" class="w-full h-full object-center object-cover group-hover:opacity-75" /></div>
                              </div>
                              <h3 class="mt-4 text-sm text-gray-700">
                                {{ product.name }}
                              </h3>
                            </a>
                          </div>
                      </div>
                    </TabPanel>
                    <TabPanel class="bg-transparent">
                      <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 bg-transparent">
                          <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8 bg-transparent">
                            <a v-for="product in products" :key="product.id" :href="product.href" class="group">
                              <div class="w-full aspect-w-1 aspect-h-1 overflow-hidden xl:aspect-w-7 xl:aspect-h-8 shadow-lg bg-white rounded-md h-18">
                              <div class="w-full h-96"><img :src="product.imageSrc" :alt="product.imageAlt" class="w-full h-full object-center object-cover group-hover:opacity-75" /></div>
                              </div>
                              <h3 class="mt-4 text-sm text-gray-700">
                                {{ product.name }}
                              </h3>
                            </a>
                          </div>
                      </div>
                    </TabPanel>
                    <TabPanel class="bg-transparent">
                      <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 bg-transparent">
                          <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8 bg-transparent">
                            <a v-for="product in products" :key="product.id" :href="product.href" class="group">
                              <div class="w-full aspect-w-1 aspect-h-1 overflow-hidden xl:aspect-w-7 xl:aspect-h-8 shadow-lg bg-white rounded-md h-18">
                              <div class="w-full h-96"><img :src="product.imageSrc" :alt="product.imageAlt" class="w-full h-full object-center object-cover group-hover:opacity-75" /></div>
                              </div>
                              <h3 class="mt-4 text-sm text-gray-700">
                                {{ product.name }}
                              </h3>
                            </a>
                          </div>
                      </div>
                    </TabPanel>
                </TabPanels>
            </TabGroup>
    </div>
    <app-footer-contact-form />
</template>

<script>
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import AppHeader from "../Partials/AppHeader";
import AppFooterContactForm from "../Partials/AppFooterContactForm";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject} from "vue";


  const products = [
  {
    id: 1,
    name: 'Furniture Design',
    href: '#',
    price: '$48',
    imageSrc: './images/portfolio/pexels-photo-279648.jpeg',
    imageAlt: 'Tall slender porcelain bottle with natural clay textured body and cork stopper.',
  },
  {
    id: 2,
    name: 'Pool House',
    href: '#',
    price: '$35',
    imageSrc: './images/portfolio/pexels-photo-903028.jpeg',
    imageAlt: 'Olive drab green insulated bottle with flared screw lid and flat top.',
  },
  {
    id: 3,
    name: 'Architectural Design',
    href: '#',
    price: '$89',
    imageSrc: './images/portfolio/pexels-photo-1029803.jpeg',
    imageAlt: 'Person using a pen to cross a task off a productivity paper card.',
  },
  {
    id: 4,
    name: 'White House',
    href: '#',
    price: '$35',
    imageSrc: './images/portfolio/pexels-photo-1115804.jpeg',
    imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
  },
    {
    id: 4,
    name: 'Dining Room',
    href: '#',
    price: '$35',
    imageSrc: './images/portfolio/pexels-photo-2089698.jpeg',
    imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
  },
    {
    id: 4,
    name: 'Wooden House',
    href: '#',
    price: '$35',
    imageSrc: './images/portfolio/pexels-photo-2294125.jpeg',
    imageAlt: 'Hand holding black machined steel mechanical pencil with brass tip and top.',
  },
  // More products...
]



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
        AppFooterContactForm
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
 

    },
     setup() {
    return {
      products,
    }
  },
   
}
</script>