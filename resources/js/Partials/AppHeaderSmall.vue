<template>
<Popover class="relative bg-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">Workflow</span>
			
            <img class="h-8 w-auto sm:h-10" src="/rvmp-content/rvmp-static/brand-logo-no-text-alt.png" alt="" />
          </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
          <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
            <span class="sr-only">Open menu</span>
            <span class="fas fa-bars"></span>
          </PopoverButton>
        </div>
        <PopoverGroup as="nav" class="hidden md:flex space-x-10">
			<template v-for="link in menuLinks" :key="link.name">
					<inertia-link :href="$route(link.href)" class="text-base font-medium text-white hover:text-gray-900" v-if="!link.has_dropdown">
						{{link.name}}
					</inertia-link>
					<Popover class="relative" v-slot="{ open }" v-else>
						<PopoverButton :class="[open ? 'rvmp-brand-color-main' : 'text-white', 'group bg-transparent rounded-md inline-flex items-center text-base font-medium ']">
						<span>{{link.name}}</span>
						<span class="fas fa-chevron-down" :class="[open ? 'rvmp-brand-color-main' : 'text-white', 'ml-2 h-5 w-5 group-hover:text-white']" aria-hidden="true"></span>
						<!-- <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-white']" aria-hidden="true" /> -->
						</PopoverButton>

						<transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
						<PopoverPanel class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
							<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
							<div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
								<template v-for="submenu in menuSubLinks" :key="submenu.name" >
									<inertia-link :href="$route(submenu.href)" v-if="submenu.parentLink===link.name" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
									<span :class="submenu.icon"></span>
									<!-- <component :is="item.icon" class="flex-shrink-0 h-6 w-6 text-indigo-600" aria-hidden="true" /> -->
									<div class="ml-4">
										<p class="text-base font-medium text-gray-900">
										{{ submenu.name }}
										</p>
									</div>
									</inertia-link>
								</template>
							</div>
						
							</div>
						</PopoverPanel>
						</transition>
					</Popover>
			</template>
          
          
    
          
        </PopoverGroup>
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
			<span class="whitespace-nowrap text-base font-medium text-white hover:text-gray-900">
				{{user.name}}
			</span>
			<span>
				<inertia-link :href="$route('logout')" as="button" method="post"	class="w-full flex flex-row items-center h-12 px-4  text-white logout-link hover:bg-red-400 text-left"  type="button">
						<i class="fas fa-sign-out-alt"></i>
				</inertia-link> 
			</span> 
        </div>
      </div>
    </div>

    <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
      <PopoverPanel focus class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
          <div class="pt-5 pb-6 px-5">
            <div class="flex items-center justify-between">
              <div>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
              </div>
              <div class="-mr-2">
                <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Close menu</span>
                  <!-- <XIcon class="h-6 w-6" aria-hidden="true" /> -->
                </PopoverButton>
              </div>
            </div>
            <div class="mt-6">
              <nav class="grid gap-y-8">
                <!-- <a v-for="item in solutions" :key="item.name" :href="item.href" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                  <component :is="item.icon" class="flex-shrink-0 h-6 w-6 text-indigo-600" aria-hidden="true" />
                  <span class="ml-3 text-base font-medium text-gray-900">
                    {{ item.name }}
                  </span>
                </a> -->
              </nav>
            </div>
          </div>
          <div class="py-6 px-5 space-y-6">
            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Pricing
              </a>

              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                Docs
              </a>
              <!-- <a v-for="item in resources" :key="item.name" :href="item.href" class="text-base font-medium text-gray-900 hover:text-gray-700">
                {{ item.name }}
              </a> -->
            </div>
            <div>
              <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Sign up
              </a>
              <p class="mt-6 text-center text-base font-medium text-white">
                Existing customer?
                {{ ' ' }}
                <a href="#" class="text-indigo-600 hover:text-indigo-500">
                  Sign in
                </a>
              </p>
            </div>
          </div>
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
  
</template>

<script>
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "AppHeaderSmall",
	components: {
		Popover,
		PopoverButton,
		PopoverGroup,
		PopoverPanel,
	},
	 setup() {
        const user = computed(() => usePage().props.value.auth.user);

        return {
            user,
        }
    },
	 data: () => ({
    	dropdownPopoverShow: false,
		switchInertia: false,
		menuOpen: false,
		menuLinks:[
			{
				name: 'Dashboard',
				href: 'viewDashboard',
				has_dropdown: false
			},
			{
				name: 'Blog',
				href: '',
				has_dropdown: true
			},
			{
				name: 'Media',
				href: '',
				has_dropdown: true
			},
			{
				name: 'Site',
				href: '',
				has_dropdown: true
			},
		],
		menuSubLinks:[
			{
				name: 'Post',
				href: 'adminPost',
				icon: 'fas fa-sticky-note',
				parentLink: 'Blog'
			},
			{
				name: 'Add New',
				href: 'post.create',
				icon: 'fas fa-plus',
				parentLink: 'Blog'
			}
		]
  	}),

    mounted() {
		if(window.location.pathname !== "/home"){
			this.switchInertia = true
		}
		
    },
	 methods: {
  
  }
}
</script>
