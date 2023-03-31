<template>
    <nav id="appheader" class="sticky top-0 flex items-center justify-between flex-wrap py-6 px-8 w-full z-20 pin-t transition-height duration-500 ease-in-out rvmp-header-bg  shadow-lg">
		<div id="logo-container" class="flex items-center flex-no-shrink transition duration-500 ease-in-out rvmp-header-text lg:ml-6">
			<a id="logo-link" class="lg:flex lg:items-center rvmp-header-text no-underline hover:no-underline transition duration-500 ease-in-out" href="#">
				<img src="/rvmp-content/rvmp-static/brand-logo-no-text.png" class="mx-auto w-12 lg:inline block transition duration-500 ease-in-out">
				<span class="mx-3 w-full text-center lg:text-2xl text-base uppercase">
					<span class="rvmp-brand-color-main font-semibold brand-logo-text">Revamp</span> <span class="font-semibold brand-logo-text"> System Solutions</span>
				</span>
			</a>
		</div>

		<div class="block lg:hidden" >
			<button @click.prevent="menuOpen=!menuOpen" class="flex items-center px-4 py-2 border rounded text-grey border-grey-dark ">
				<i class="fas " :class="{'fa-bars': !menuOpen, 'fa-times': menuOpen}"></i>

			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto  pt-6 lg:pt-0" :class="{'hidden': !menuOpen, 'block': menuOpen}"  id="nav-content" >
			<ul class="brand-text font-bold list-reset lg:flex justify-end flex-1 items-center uppercase rvmp-header-text">

				<li li v-for="link in menuLinks" :key="link.title" class="lg:mx-6 mx-0">
					 <inertia-link :href="$route(link.href)" v-if="link.has_dropdown == 0"   class="nav-link hover:rvmp-brand-color-main">{{link.title}}</inertia-link>
					 <div v-else class="relative inline-flex align-middle w-full lg:block hidden" v-click-away="onClickAway" style="cursor:pointer">
						<a class="nav-link hover:rvmp-brand-color-main" type="button" @click.prevent="toggleDropdown()"  id="btnDropdownRef" ref="btnDropdownRef" >
							{{link.title}}
						</a>
						<ul :class="!dropdownPopoverShow ? 'hidden': 'block',  !subdropdownPopoverShow ? 'rvmp-bg-main':'rvmp-bg-alt text-gray-300'" class=" text-base z-40 float-left py-2 list-none text-left rounded shadow-lg mt-1 " style="min-width:12rem" ref="popoverDropdownRef">
							<li v-for="submenu in menuSubLinks" :key="submenu.title" >	
								<a v-if="!switchInertia" :href="submenu.href" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
									{{submenu.title}}
           						</a> 
							<inertia-link v-else :href="'/home'+submenu.href" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white" replace>
								{{submenu.title}}
							</inertia-link>
							</li>
						</ul>
					</div>
				</li>
				

			</ul>
		</div>
	</nav>
    <messenger-plugin/>
</template>

<script>
import { createPopper } from "@popperjs/core";
import { directive } from "vue3-click-away";
import MessengerPlugin from "../Components/Plugins/MessengerPlugin";
import {usePage} from "@inertiajs/inertia-vue3";
import {computed} from "vue";
export default {
    name: "AppHeader",
	directives: {
    	ClickAway: directive
  	},
	components: {
		MessengerPlugin,
 	 },
	  setup() {
		
		const menuLinks = computed(() => usePage().props.value.page_links.parentLinks);
		const menuSubLinks = computed(() => usePage().props.value.page_links.subLinks);
        
        return {
            
			menuLinks,
			menuSubLinks
        }
    },
	 data: () => ({
    	dropdownPopoverShow: false,
		subdropdownPopoverShow: false,
		mobileDropdownShow: false,
		mobilesubDropdownShow: false,
		mddtarg: '',
		subH: '',
		switchInertia: false,
		menuOpen: false,
  	}),

    mounted() {
		if(window.location.pathname !== "/home"){
			this.switchInertia = true
		}

    },
	methods: {
		subMobileDropdown(target){
			this.mddtarg=target
			this.mobilesubDropdownShow = !this.mobilesubDropdownShow
		},
		mobileDropdown: function(){
			this.mobileDropdownShow = !this.mobileDropdownShow
		},
		toggleDropdown: function(){
		if(this.dropdownPopoverShow){
			this.dropdownPopoverShow = false;
		} else {
			this.dropdownPopoverShow = true;
			createPopper(this.$refs.btnDropdownRef, this.$refs.popoverDropdownRef, {
			placement: "bottom-start"
			});
		}
		},
		subtoggleDropdown: function(div){
			
		if(this.subdropdownPopoverShow){
			this.subdropdownPopoverShow = false;
			this.subH = ''
		} else {
			this.subdropdownPopoverShow = true;
			this.subH = div
			createPopper(div === 'builder' ? this.$refs.builderbtnsubDropdownRef : (div === 'design' ? this.$refs.designbtnsubDropdownRef: ( div === 'cabinet' ? this.$refs.cabinetsbtnsubDropdownRef : '')), div === 'builder' ? this.$refs.builderPopoverDropdownRef : (div === 'design' ? this.$refs.designPopoverDropdownRef: ( div === 'cabinet' ? this.$refs.cabinetsPopoverDropdownRef : '')), {
			placement: "right"
			});
		}
		},
		onClickAway: function(){
			this.dropdownPopoverShow = false;
		},
	}
}
</script>
