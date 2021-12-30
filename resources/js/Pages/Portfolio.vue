<template>
    <app-header></app-header>
    <div class="rvmp-container">
            <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 bg-transparent">
                          <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">
                            <span @click="openModal(product)" v-for="product in products" :key="product.id" :href="product.href" class="group cursor-pointer">
                              <div class="w-full aspect-w-1 aspect-h-1 overflow-hidden xl:aspect-w-7 xl:aspect-h-8 shadow-lg bg-white rounded-md h-18">
                              <div class="w-full h-96"><img :src="product.imageSrc" :alt="product.imageAlt" class="w-full h-full object-center object-cover group-hover:opacity-75" /></div>
                              </div>
                              <h3 class="mt-4 text-sm text-gray-700">
                                {{ product.name }}
                              </h3>
                            </span>
                          </div>
                      </div>
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
   
            <div class="inline-block w-full h-auto text-left align-middle transition-all transform bg-white shadow-xl rounded-md">              
              <div class="p-8 grid grid-cols-6 space-x-5">
                  <div class="col-span-4 mt-6 grid grid-cols-1 gap-8 px-8">
                    <div class="hidden aspect-w-2 aspect-h-3 rounded-md overflow-hidden lg:block shadow-md">
                      <img :src="product.images[0].src" :alt="product.images[0].alt" class="w-full h-full object-center object-cover" />
                    </div>
                    <div class="grid grid-cols-2 gap-8">
                      <div class="aspect-w-3 aspect-h-2 rounded-md overflow-hidden shadow-md">
                        <img :src="product.images[1].src" :alt="product.images[1].alt" class="w-full h-full object-center object-cover" />
                      </div>
                      <div class="aspect-w-3 aspect-h-2 rounded-md overflow-hidden shadow-md">
                        <img :src="product.images[2].src" :alt="product.images[2].alt" class="w-full h-full object-center object-cover" />
                      </div>
                    </div>
                    <div class="aspect-w-2 aspect-h-3 sm:rounded-md sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4 shadow-md">
                      <img :src="product.images[3].src" :alt="product.images[3].alt" class="w-full h-full object-center object-cover" />
                    </div>
                  </div>
                  <div class="col-span-2 mt-6">
                      <div class="w-full lg:space-y-10 space-y-3 lg:px-0">
                                    <ul class="border-l-4 rvmp-brand-border-highlight brand-logo-text text-xl text-left pl-2.5 font-semibold">
                                        <li>Modular Cabinets</li>
                                    </ul>
                                    <div class="lg:text-3xl text-xl uppercase brand-text font-bold text-left">
                                        <span class="">
                                            Furniture
                                        </span>
                                        <span class="rvmp-brand-color-highlight">
                                            Design
                                        </span>
                                    </div>
                                    <div class="text-left px-8">
                                        <p class="mb-2">
                                          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum ipsum eget elit lacinia dignissim. Donec nec neque orci. Proin in tincidunt leo. Aliquam pretium placerat lacinia. Sed nec enim posuere, dignissim ipsum a, ornare magna. Cras ac volutpat enim. Donec commodo sem quam, sit amet tristique massa vestibulum sed.

                                          Nulla vitae vestibulum purus. Nulla vitae rhoncus mauris, at condimentum nisi. Aenean maximus ultricies elementum. Ut sed turpis id enim ultricies faucibus sed at dui. Pellentesque dapibus, nulla ut porta scelerisque, metus justo cursus tellus, eget fermentum orci justo quis ipsum. Donec pulvinar ac augue eu dignissim. Quisque eget vestibulum magna. Nullam quis mauris non turpis faucibus molestie. Vivamus sapien ipsum, mattis quis eleifend eu, aliquet a lacus. Sed at fermentum purus, eu imperdiet mi.

                                          Integer eget scelerisque dolor, at pharetra enim. Phasellus posuere lectus eget dui cursus, maximus imperdiet sapien faucibus. Nullam ligula diam, laoreet nec ex in, tempor consectetur felis. Etiam et leo at massa vehicula lacinia quis nec neque. Cras ac dolor nec magna ultrices vestibulum fringilla id lorem. Proin viverra accumsan diam, a eleifend nulla imperdiet elementum. Aliquam aliquet, tortor sit amet ornare pretium, metus lacus auctor tortor, vitae commodo purus metus et justo. Pellentesque tincidunt augue leo. Integer posuere volutpat elit, maximus pretium nunc malesuada in. Morbi a lobortis leo. Donec sit amet vulputate ante.
                                        </p>
                                        <span class="italic block mb-2">Project Architect/Lead Designer</span>
                                        <span class="italic block mb-2">Photos: RVMP</span>
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
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, TabGroup, TabList, Tab, TabPanels, TabPanel} from '@headlessui/vue'
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
      src: './images/portfolio/pexels-photo-903028.jpeg',
      alt: 'Two each of gray, white, and black shirts laying flat.',
    },
    {
      src: './images/portfolio/pexels-photo-2294125.jpeg',
      alt: 'Model wearing plain black basic tee.',
    },
    {
      src: './images/portfolio/pexels-photo-2089698.jpeg',
      alt: 'Model wearing plain gray basic tee.',
    },
    {
      src: './images/portfolio/pexels-photo-1029803.jpeg',
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