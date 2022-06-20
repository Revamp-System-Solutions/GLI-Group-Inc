<template>
    <div class="h-screen flex flex-row  sticky top-0">
        <div class="flex flex-col w-56 bg-white overflow-hidden sticky shadow-md">
            <div class="flex items-center justify-center h-20 shadow-md py-2">
                <img class="h-16 w-16" src="/images/brand-logo.png">
            </div>
            <ul class="flex flex-col py-4 bg-gray-300 h-full">
            <li v-for="link in menuLinks" :key="link.title">
	
                <inertia-link :href="$route(link.href)" v-if="!link.has_dropdown"   :data="{ 'page_links':{'parentLinks': menuLinks, 'subLinks': menuSubLinks}  }"
                class="flex flex-row items-center h-9 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-900 group hover:text-gray-300 hover:bg-gray-900" preserve-state>
                <span class="inline-flex items-center justify-center h-9 w-9 text-lg text-gray-800 group-hover:text-gray-300">
                    <i :class="link.icon" class="text-sm py-2"></i>
                </span>
                <span class="text-sm font-medium group-hover:text-gray-300">{{link.title}}</span>
                </inertia-link>
                <span v-else>
					<span class="cursor-pointer flex flex-row items-center h-9 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-900 group hover:text-gray-300 hover:bg-gray-900" @click="toggleMenuOf(link.title)">
						<span class="inline-flex items-center justify-center h-9 w-9 text-lg text-gray-800 group-hover:text-gray-300">
						<i :class="link.icon" class="text-sm py-2"></i>
						</span>
						<span class="text-sm font-medium group-hover:text-gray-300">{{link.title}}</span>
					</span>
                    <ul :class="link.title === dropdownPopoverTarget ? 'flex flex-col py-1 ml-5 bg-gray-500': 'hidden'">
                        <li v-for="submenu in menuSubLinks" :key="submenu.title" >
                             <inertia-link :href="$route(submenu.href)" v-if="submenu.parentLink===link.title" class="flex flex-row items-center h-9 transform group hover:translate-x-2 transition-transform ease-in duration-200 text-gray-800 hover:text-gray-300 hover:bg-gray-900" preserve-state>
                				<span class="inline-flex items-center justify-center h-9 w-9 text-lg text-gray-800 group-hover:text-gray-300">
                                    <i :class="submenu.icon"
                                    class="text-sm py-2"></i>
                                </span>
                                <span class="text-sm font-medium group-hover:text-gray-300">
                                    {{submenu.title}}
                                </span>
                            </inertia-link>
                        </li>
                    </ul>
                </span>
            </li>
            </ul>
            <div class="w-full absolute bottom-0 left-0 bg-gray-500 px-5 py-2 flex justify-between items-center">
                <span class="cursor-default whitespace-nowrap text-sm font-medium text-white hover:text-green-400">
                        Hi {{user.name}}
                </span>
                <span>
                    <inertia-link :href="$route('logout')" as="button" method="post" class="text-white logout-link hover:text-green-400 text-left"  type="button">
                        <span class="fas fa-sign-out-alt"></span>
                    </inertia-link>
                </span>
            </div>
        </div>
    </div>

</template>

<script>
import { Popover, PopoverButton, PopoverGroup, PopoverPanel, Disclosure, DisclosureButton, DisclosurePanel, } from '@headlessui/vue'
import {computed} from "vue";
// import {usePage} from "@inertiajs/inertia-vue3";

export default {
    title: "AppHeaderSmall",
	components: {
		Popover,
		PopoverButton,
		PopoverGroup,
		PopoverPanel,
		Disclosure,
		DisclosureButton,
		DisclosurePanel,
	},
	props:['user','menuLinks','menuSubLinks'],
	 setup(props) {
        const user = props.user;
		const menuLinks = props.menuLinks;
		const menuSubLinks = props.menuSubLinks;

        menuLinks.forEach(function(link, id, arr) {
                console.log(id);
                console.log(link)
                arr[id] = JSON.parse(link)
            }
        )
        menuSubLinks.forEach(function(link, id, arr) {
                console.log(id);
                console.log(link)
                arr[id] = JSON.parse(link)
            }
        )
        return {
            user,
			menuLinks,
			menuSubLinks
        }
    },
	 data: () => ({
    	dropdownPopoverShow: false,
		dropdownPopoverTarget: null,
		switchInertia: false,
		menuOpen: false,
	
  	}),
    mounted() {
		if(window.location.pathtitle !== "/home"){
			this.switchInertia = true
		}

    },
	 methods: {
		 toggleMenuOf(target){
			 this.dropdownPopoverTarget = this.dropdownPopoverTarget === target ? null : target;
		 }
  	}
}
</script>
