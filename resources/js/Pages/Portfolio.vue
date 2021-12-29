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
                            <span @click="openModal(product)" v-for="product in products" :key="product.id" :href="product.href" class="group">
                              <div class="w-full aspect-w-1 aspect-h-1 overflow-hidden xl:aspect-w-7 xl:aspect-h-8 shadow-lg bg-white rounded-md h-18">
                              <div class="w-full h-96"><img :src="product.imageSrc" :alt="product.imageAlt" class="w-full h-full object-center object-cover group-hover:opacity-75" /></div>
                              </div>
                              <h3 class="mt-4 text-sm text-gray-700">
                                {{ product.name }}
                              </h3>
                            </span>
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
    <TransitionRoot appear :show="isOpen">
    <Dialog as="div" @close="closeModal">
      <div class="fixed inset-0 z-30 overflow-y-auto bg-gray-600 bg-opacity-30 ">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild  
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0">
            <DialogOverlay class="fixed inset-0" />
          </TransitionChild>
          <span class="inline-block h-full align-middle" aria-hidden="true">
            &#8203;
          </span>
          <TransitionChild
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95">
   
            <div  class="inline-block w-full h-screen text-left align-middle transition-all transform bg-white shadow-xl rounded-md">
              <!-- <DialogTitle as="h3" class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700">
                hello boss
              </DialogTitle> -->
              <div class="bg-white">
    <div class="pt-6">
      <!-- Image gallery -->
      <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
        <div class="hidden aspect-w-3 aspect-h-4 rounded-lg overflow-hidden lg:block">
          <img :src="product.images[0].src" :alt="product.images[0].alt" class="w-full h-full object-center object-cover" />
        </div>
        <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
          <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
            <img :src="product.images[1].src" :alt="product.images[1].alt" class="w-full h-full object-center object-cover" />
          </div>
          <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
            <img :src="product.images[2].src" :alt="product.images[2].alt" class="w-full h-full object-center object-cover" />
          </div>
        </div>
        <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
          <img :src="product.images[3].src" :alt="product.images[3].alt" class="w-full h-full object-center object-cover" />
        </div>
      </div>

      <!-- Product info -->
      <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
        <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
            {{ product.name }}
          </h1>
        </div>

        <!-- Options -->
        <div class="mt-4 lg:mt-0 lg:row-span-3">
          <h2 class="sr-only">Product information</h2>
          <p class="text-3xl text-gray-900">{{ product.price }}</p>

          <!-- Reviews -->
          <div class="mt-6">
            <h3 class="sr-only">Reviews</h3>
            <div class="flex items-center">
              <div class="flex items-center">
                <StarIcon v-for="rating in [0, 1, 2, 3, 4]" :key="rating" :class="[reviews.average > rating ? 'text-gray-900' : 'text-gray-200', 'h-5 w-5 flex-shrink-0']" aria-hidden="true" />
              </div>
              <p class="sr-only">{{ reviews.average }} out of 5 stars</p>
              <a :href="reviews.href" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{ reviews.totalCount }} reviews</a>
            </div>
          </div>

          <form class="mt-10">
            <!-- Colors -->
            <div>
              <h3 class="text-sm text-gray-900 font-medium">Color</h3>

              <RadioGroup v-model="selectedColor" class="mt-4">
                <RadioGroupLabel class="sr-only">
                  Choose a color
                </RadioGroupLabel>
                <div class="flex items-center space-x-3">
                  <RadioGroupOption as="template" v-for="color in product.colors" :key="color.name" :value="color" v-slot="{ active, checked }">
                    <div :class="[color.selectedClass, active && checked ? 'ring ring-offset-1' : '', !active && checked ? 'ring-2' : '', '-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none']">
                      <RadioGroupLabel as="p" class="sr-only">
                        {{ color.name }}
                      </RadioGroupLabel>
                      <span aria-hidden="true" :class="[color.class, 'h-8 w-8 border border-black border-opacity-10 rounded-full']" />
                    </div>
                  </RadioGroupOption>
                </div>
              </RadioGroup>
            </div>

            <!-- Sizes -->
            <div class="mt-10">
              <div class="flex items-center justify-between">
                <h3 class="text-sm text-gray-900 font-medium">Size</h3>
                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Size guide</a>
              </div>

              <RadioGroup v-model="selectedSize" class="mt-4">
                <RadioGroupLabel class="sr-only">
                  Choose a size
                </RadioGroupLabel>
                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                  <RadioGroupOption as="template" v-for="size in product.sizes" :key="size.name" :value="size" :disabled="!size.inStock" v-slot="{ active, checked }">
                    <div :class="[size.inStock ? 'bg-white shadow-sm text-gray-900 cursor-pointer' : 'bg-gray-50 text-gray-200 cursor-not-allowed', active ? 'ring-2 ring-indigo-500' : '', 'group relative border rounded-md py-3 px-4 flex items-center justify-center text-sm font-medium uppercase hover:bg-gray-50 focus:outline-none sm:flex-1 sm:py-6']">
                      <RadioGroupLabel as="p">
                        {{ size.name }}
                      </RadioGroupLabel>
                      <div v-if="size.inStock" :class="[active ? 'border' : 'border-2', checked ? 'border-indigo-500' : 'border-transparent', 'absolute -inset-px rounded-md pointer-events-none']" aria-hidden="true" />
                      <div v-else aria-hidden="true" class="absolute -inset-px rounded-md border-2 border-gray-200 pointer-events-none">
                        <svg class="absolute inset-0 w-full h-full text-gray-200 stroke-2" viewBox="0 0 100 100" preserveAspectRatio="none" stroke="currentColor">
                          <line x1="0" y1="100" x2="100" y2="0" vector-effect="non-scaling-stroke" />
                        </svg>
                      </div>
                    </div>
                  </RadioGroupOption>
                </div>
              </RadioGroup>
            </div>

            <button type="submit" class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add to bag</button>
          </form>
        </div>

        <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
          <!-- Description and details -->
          <div>
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6">
              <p class="text-base text-gray-900">{{ product.description }}</p>
            </div>
          </div>

          <div class="mt-10">
            <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

            <div class="mt-4">
              <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                <li v-for="highlight in product.highlights" :key="highlight" class="text-gray-400">
                  <span class="text-gray-600">{{ highlight }}</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="mt-10">
            <h2 class="text-sm font-medium text-gray-900">Details</h2>

            <div class="mt-4 space-y-6">
              <p class="text-sm text-gray-600">{{ product.details }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

            </div>
     
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, TabGroup, TabList, Tab, TabPanels, TabPanel, RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import AppHeader from "../Partials/AppHeader";
import AppFooterContactForm from "../Partials/AppFooterContactForm";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject, ref} from "vue";


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

const product = {
  name: 'Basic Tee 6-Pack',
  price: '$192',
  href: '#',
  breadcrumbs: [
    { id: 1, name: 'Men', href: '#' },
    { id: 2, name: 'Clothing', href: '#' },
  ],
  images: [
    {
      src: 'https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg',
      alt: 'Two each of gray, white, and black shirts laying flat.',
    },
    {
      src: 'https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg',
      alt: 'Model wearing plain black basic tee.',
    },
    {
      src: 'https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg',
      alt: 'Model wearing plain gray basic tee.',
    },
    {
      src: 'https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg',
      alt: 'Model wearing plain white basic tee.',
    },
  ],
  colors: [
    { name: 'White', class: 'bg-white', selectedClass: 'ring-gray-400' },
    { name: 'Gray', class: 'bg-gray-200', selectedClass: 'ring-gray-400' },
    { name: 'Black', class: 'bg-gray-900', selectedClass: 'ring-gray-900' },
  ],
  sizes: [
    { name: 'XXS', inStock: false },
    { name: 'XS', inStock: true },
    { name: 'S', inStock: true },
    { name: 'M', inStock: true },
    { name: 'L', inStock: true },
    { name: 'XL', inStock: true },
    { name: '2XL', inStock: true },
    { name: '3XL', inStock: true },
  ],
  description:
    'The Basic Tee 6-Pack allows you to fully express your vibrant personality with three grayscale options. Feeling adventurous? Put on a heather gray tee. Want to be a trendsetter? Try our exclusive colorway: "Black". Need to add an extra pop of color to your outfit? Our white tee has you covered.',
  highlights: [
    'Hand cut and sewn locally',
    'Dyed with our proprietary colors',
    'Pre-washed & pre-shrunk',
    'Ultra-soft 100% cotton',
  ],
  details:
    'The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming "Charcoal Gray" limited release.',
}
const reviews = { href: '#', average: 4, totalCount: 117 }

export default {
    name: "Home",
    components: {
        ErrorsAndMessages,
        AppHeader,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
        TabGroup,
        TabList,
        Tab,
        TabPanels,
        TabPanel,
        AppFooterContactForm,
        RadioGroup,
        RadioGroupLabel,
        RadioGroupOption,
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
       const isOpen = ref(false)
    const selectedColor = ref(product.colors[0])
    const selectedSize = ref(product.sizes[2])

    return {
      product,
      reviews,
      selectedColor,
      selectedSize,
      products,
      isOpen,
      closeModal() {
        isOpen.value = false             
      },
      openModal(cb) {
        isOpen.value = true
  
      },
      
    }
  },
   
}
</script>