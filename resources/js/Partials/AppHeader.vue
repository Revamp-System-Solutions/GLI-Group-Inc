<template>
    <nav id="appheader" class="sticky top-0 flex items-center justify-between flex-wrap py-6 px-8 w-full z-20 pin-t transition-height duration-500 ease-in-out rvmp-bg-main  shadow-lg">
		<div id="logo-container" class="flex items-center flex-no-shrink transition duration-500 ease-in-out text-black lg:ml-6">
			<a id="logo-link" class="lg:flex lg:items-center text-black no-underline hover:no-underline transition duration-500 ease-in-out" href="#">
				<img src="/rvmp-content/rvmp-static/brand-logo-no-text.png" class="mx-auto w-12 lg:inline block transition duration-500 ease-in-out">
				<span class="mx-3 w-full text-center lg:text-2xl text-base uppercase">
					<span class="font-semibold brand-logo-text">GLI </span><span class="rvmp-brand-color-main font-light brand-logo-text">Group Inc.</span>
				</span>
			</a>
		</div>

		<div class="block lg:hidden" >
			<button @click.prevent="menuOpen=!menuOpen" class="flex items-center px-4 py-2 border rounded text-grey border-grey-dark ">
				<i class="fas " :class="{'fa-bars': !menuOpen, 'fa-times': menuOpen}"></i>

			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto  pt-6 lg:pt-0" :class="{'hidden': !menuOpen, 'block': menuOpen}"  id="nav-content" >
			<ul class="brand-text font-bold list-reset lg:flex justify-end flex-1 items-center uppercase">
				<li class="mx-6 ">
					 <inertia-link :href="$route('guest.index') " class="nav-link hover:rvmp-brand-color-main">Home</inertia-link>
				</li>
				<li class="mx-6 " >
					 <div class="relative inline-flex align-middle w-full" v-click-away="onClickAway" style="cursor:pointer">
						<a class="nav-link hover:rvmp-brand-color-main" type="button" @click.prevent="toggleDropdown()"  id="btnDropdownRef" ref="btnDropdownRef" >
						 	Services
						</a>
						<div v-bind:class="{'hidden': !dropdownPopoverShow, 'block': dropdownPopoverShow}" class="rvmp-bg-main text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1" style="min-width:12rem" ref="popoverDropdownRef">
							<a v-if="!switchInertia" href="#designstudio" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Design Studio
							</a>
							<a v-if="!switchInertia" href="#builders" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Builders
							</a>
							<a v-if="!switchInertia" href="#modularcabinets" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Modular Cabinets
							</a>

							<inertia-link v-if="switchInertia" :href="$route('guest.studio') " class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Design Studio
							</inertia-link>
							<inertia-link v-if="switchInertia" :href="$route('guest.builders') " class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Builders
							</inertia-link>
							<inertia-link v-if="switchInertia" :href="$route('guest.modcabinet') " class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Modular Cabinets
							</inertia-link>

						</div>
					</div>
				</li>
                <li class="mx-6">
					 <inertia-link :href="$route('guest.blog')" class="nav-link hover:rvmp-brand-color-main">Blog</inertia-link>
				</li>
				<li class="mx-6">
					 <inertia-link :href="$route('guest.portfolio')" class="nav-link hover:rvmp-brand-color-main">Portfolio</inertia-link>
				</li>
				<li class="mx-6">
					 <inertia-link :href="$route('guest.about')" class="nav-link hover:rvmp-brand-color-main">About</inertia-link>
				</li>
				<li class="mx-6">
					 <inertia-link :href="$route('guest.contact')" class="nav-link hover:rvmp-brand-color-main">Contact Us</inertia-link>
				</li>

			</ul>
		</div>
	</nav>

</template>

<script>
import { createPopper } from "@popperjs/core";
import { directive } from "vue3-click-away";
export default {
    name: "AppHeader",
	directives: {
    	ClickAway: directive
  	},
	 data: () => ({
    	dropdownPopoverShow: false,
		switchInertia: false,
		menuOpen: false,
  	}),

    mounted() {
		if(window.location.pathname !== "/home"){
			this.switchInertia = true
		}

    },
	methods: {
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
		onClickAway: function(){
			this.dropdownPopoverShow = false;
		},
	}
}
</script>
