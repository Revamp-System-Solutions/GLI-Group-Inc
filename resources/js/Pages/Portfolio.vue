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
                <!-- <TabPanels>
                    <TabPanel class="w-full">
                    <div class="flex flex-wrap  -mb-8 mt-4">
                        <div v-for="(image, i) in images" :key="i" class="lg:w-1/4 m-w-1/4 px-4 mb-8">
                          <img  class="rounded shadow-md object-contain h-52 w-full" :src="'https://tom.imgix.net/artsy/' + image" >
                        </div>
                    </div>
                    </TabPanel>
                    <TabPanel>Content 2</TabPanel>
                    <TabPanel>Content 3</TabPanel>
                </TabPanels> -->
            </TabGroup>
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <h2>GLI GROUP DESIGN WORKSHOP</h2>

      <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">
        <a v-for="product in products" :key="product.id" :href="product.href" class="group">
          <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8 shadow-lg bg-white rounded-xl h-18">
          <div class="w-full h-96"><img :src="product.imageSrc" :alt="product.imageAlt" class="w-full h-full object-center object-cover group-hover:opacity-75" /></div>
          </div>
          <h3 class="mt-4 text-sm text-gray-700">
            {{ product.name }}
          </h3>
          <!-- <p class="mt-1 text-lg font-medium text-gray-900">
            {{ product.price }}
          </p> -->
        </a>
      </div>
    </div>
        <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
        <div class="border-t border-gray-200" />
        </div>
    </div>
    <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900 uppercase semibold">Tell us about your project</h3>
        </div>
      </div>
      <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="#" method="POST">
          <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
              <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                  <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                  <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                  <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                  <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                  <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                  <label for="email-address" class="block text-sm font-medium text-gray-700">Subject</label>
                  <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                </div>

                <div class="col-span-6">
                  <label for="street-address" class="block text-sm font-medium text-gray-700">Message</label>
                  <textarea type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" ></textarea>
                </div>

              </div>
            </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
        <div class="border-t border-gray-200" />
        </div>
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
 

    },
     setup() {
    return {
      products,
    }
  },
   
}
</script>