<template>
<div class="w-full sticky top-0 z-20">
<Popover class="relative bg-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">Workflow</span>
			
            <img class="h-8 w-auto sm:h-10" src="/images/brand-logo-no-text-alt.png" alt="" />
          </a>
        </div>
        <div class="-mr-2 -my-2 md:hidden">
          <PopoverButton class="bg-transparent rounded-md p-2 inline-flex items-center justify-center text-white  ring-inset ring-white">
            <span class="sr-only">Open menu</span>
            <span class="fas fa-bars"></span>
          </PopoverButton>
        </div>
        <PopoverGroup as="nav" class="hidden md:flex space-x-10">
			<template v-for="link in menuLinks" :key="link.name">
					<inertia-link :href="$route(link.href)" class="text-base font-medium text-white hover:rvmp-brand-color-main" :class="link.order" v-if="!link.has_dropdown">
						<i :class="link.icon" class="text-sm py-2"></i> {{link.name}}
					</inertia-link>
					<Popover class="relative " v-slot="{ open }" :class="link.order" v-else>
						<PopoverButton :class="[open ? 'rvmp-brand-color-main' : 'text-white', 'group bg-transparent rounded-md inline-flex items-center text-base font-medium hover:rvmp-brand-color-main']">
						<span><i :class="link.icon" class="text-sm py-2"></i> {{link.name}}</span>
						<span class="fas fa-chevron-down" :class="[open ? 'rvmp-brand-color-main' : 'text-white', 'ml-2 h-5 w-5 group-hover:rvmp-brand-color-main']" aria-hidden="true"></span>
						</PopoverButton>

						<transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
						<PopoverPanel class="absolute z-10 -ml-4 mt-3 transform px-2 w-64 max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
							<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
							<div class="relative grid  grid-cols-1 gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8">
								<template v-for="submenu in menuSubLinks" :key="submenu.name" >
									<inertia-link :href="$route(submenu.href)" v-if="submenu.parentLink===link.name" class="group -m-3 p-3 flex items-start rounded-lg hover:rvmp-brand-bg-main">
									<span class="group-hover:text-white" :class="submenu.icon"></span>
									<div class="ml-4">
										<p class="text-base font-medium text-gray-900 group-hover:text-white">
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
				<inertia-link :href="$route('logout')" as="button" method="post" class="w-full flex flex-row items-center h-12 px-4  text-white logout-link hover:bg-red-400 text-left"  type="button">
						<span class="fas fa-sign-out-alt"></span>
				</inertia-link> 
			</span> 
        </div>
      </div>
    </div>

    <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
      <PopoverPanel focus class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-gray-700 ">
          <div class="pt-5 px-5">
            <div class="flex items-center justify-between">
              <div>
                <img class="h-8 w-auto" src="/images/brand-logo-no-text-alt.png" alt="Workflow" />
              </div>
              <div class="-mr-2">
                <PopoverButton class="bg-transparent rounded-md p-2 inline-flex items-center justify-center text-red-600">
					<span class="sr-only">Close menu</span>
					<span class="fas fa-times"></span>
                </PopoverButton>
              </div>
            </div>
            <div class="mt-6">
              <nav class="grid grid-cols-1 gap-y-4">
               <template v-for="link in menuLinks" :key="link.name">
					<inertia-link :href="$route(link.href)" class="text-base font-medium text-white hover:rvmp-brand-color-main px-4" :class="link.order" v-if="!link.has_dropdown">
						<i :class="link.icon" class="text-xs my-4"></i> {{link.name}}
					</inertia-link>
			   </template>
              </nav>
            </div>
          </div>
          <div class="pt-4 px-5 space-y-4 divide-y-2 divide-white">
            <div class="grid grid-cols-1 gap-y-4 gap-x-6">
				 <template v-for="link in menuLinks" :key="link.name">
               <Disclosure v-slot="{ open }" v-if="link.has_dropdown">
					<DisclosureButton class="flex justify-between w-full px-4 py-2 font-medium text-left text-white rounded-lg">
					<span><i :class="link.icon" class="text-xs my-4"></i> {{link.name}}</span>
					<span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ', 'ml-2 h-5 w-5 ']" aria-hidden="true"></span>
					</DisclosureButton>
					<DisclosurePanel class="px-6 pt-4 pb-2 grid grid-cols-2 gap-4 bg-opacity-50 bg-gray-100 text-sm rounded-lg">
						<template v-for="submenu in menuSubLinks" :key="submenu.name" >
							<inertia-link :href="$route(submenu.href)" v-if="submenu.parentLink===link.name" class="group -m-3 p-3 flex text-white  items-start  hover:rvmp-brand-bg-main">
								<span :class="submenu.icon"></span>
								<div class="ml-4">
									<p class="text-base font-medium ">
									{{ submenu.name }}
									</p>
								</div>
							</inertia-link>
						</template>
					</DisclosurePanel>
				</Disclosure>
				 </template>
           
            </div>
            <div class="py-4 flex space-x-4 justify-end">
				<span class="whitespace-nowrap text-base font-medium text-white hover:text-gray-900">
					{{user.name}}
				</span>
				<span>
					<inertia-link :href="$route('logout')" as="button" method="post" class="text-white logout-link hover:text-red-400 text-left"  type="button">
						<span class="fas fa-sign-out-alt"></span>
					</inertia-link> 
				</span> 
            </div>
          </div>
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
</div> 
</template>

<script>
import { Popover, PopoverButton, PopoverGroup, PopoverPanel, Disclosure, DisclosureButton, DisclosurePanel, } from '@headlessui/vue'
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "AppHeaderSmall",
	components: {
		Popover,
		PopoverButton,
		PopoverGroup,
		PopoverPanel,
		Disclosure,
		DisclosureButton,
		DisclosurePanel,
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
				order: 'order-1',
				icon:"fas fa-tachometer-alt",
				has_dropdown: false
			},
			{
				name: 'Pages',
				href: '',
				order: 'order-2',
				icon:"fas fa-file-alt",
				has_dropdown: true
			},
			{
				name: 'Blog',
				href: '',
				order: 'order-3',
				icon:"fas fa-blog",
				has_dropdown: true
			},
			{
				name: 'Media',
				href: '',
				order: 'order-4',
				icon:"fas fa-photo-video",
				has_dropdown: true
			},
			{
				name: 'Site',
				href: '',
				order: 'order-5',
				icon:"fas fa-cogs",
				has_dropdown: true
			},
		],
		menuSubLinks:[
			{
				name: 'Post',
				href: 'adminPost',
				icon: 'fas fa-sticky-note',
				order: 'order-1',
				parentLink: 'Blog'
			},
			{
				name: 'Add New',
				href: 'post.create',
				icon: 'fas fa-plus',
				order: 'order-2',
				parentLink: 'Blog'
			},
			{
				name: 'Library',
				href: 'admin.media',
				icon: 'fas fa-book-open',
				order: 'order-1',
				parentLink: 'Media'
			},
			{
				name: 'Users',
				href: 'admin.manager',
				icon: 'fas fa-users',
				order: 'order-2',
				parentLink: 'Site'
			},
			{
				name: 'Settings',
				href: 'admin.settings',
				icon: 'fas  fa-sliders-h',
				order: 'order-first',
				parentLink: 'Site'
			},
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
