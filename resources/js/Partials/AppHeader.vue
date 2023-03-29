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
				<li class="lg:mx-6 mx-0">
					 <inertia-link :href="$route('guest.index') " class="nav-link hover:rvmp-brand-color-main">Home</inertia-link>
				</li>
				<li class="lg:mx-6 mx-0" >
					 <div class="relative inline-flex align-middle w-full lg:block hidden" v-click-away="onClickAway" style="cursor:pointer">
						<a class="nav-link hover:rvmp-brand-color-main" type="button" @click.prevent="toggleDropdown()"  id="btnDropdownRef" ref="btnDropdownRef" >
						 	Divisions
						</a>
						<div :class="!dropdownPopoverShow ? 'hidden': 'block',  !subdropdownPopoverShow ? 'rvmp-bg-main':'rvmp-bg-alt text-gray-300'" class=" text-base z-40 float-left py-2 list-none text-left rounded shadow-lg mt-1 " style="min-width:12rem" ref="popoverDropdownRef">
							<a @mouseover="subtoggleDropdown('builder')" @mouseleave="subtoggleDropdown('builder')" id="builderbtnsubDropdownRef" ref="builderbtnsubDropdownRef" > 
							<inertia-link href="/home#builders" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white" replace>
								GLI Builders
							</inertia-link></a>
						
							<!-- <a v-if="!switchInertia" href="#builders"  @mouseover="subtoggleDropdown('builder')" @mouseleave="subtoggleDropdown('builder')" id="builderbtnsubDropdownRef" ref="builderbtnsubDropdownRef" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Builders
							</a> -->
							<div :class="subdropdownPopoverShow && subH =='builder' ? 'block rvmp-bg-main rvmp-text-main':'hidden'" @mouseleave="subtoggleDropdown('builder')" class=" text-base z-50 float-left py-2 mr-14 list-none text-left rounded shadow-lg mt-1 absolute -right-1.5" style="min-width:12rem" ref="builderPopoverDropdownRef">
									<ul>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Project Management</li>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Renovations</li>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Construction</li>
									</ul>								
							</div>
							<!-- <a v-if="!switchInertia" href="#designstudio" @mouseover="subtoggleDropdown('design')" @mouseleave="subtoggleDropdown('design')" id="designbtnsubDropdownRef" ref="designbtnsubDropdownRef" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Design Studio
							</a> -->
								<a @mouseover="subtoggleDropdown('design')" @mouseleave="subtoggleDropdown('design')" id="designbtnsubDropdownRef" ref="designbtnsubDropdownRef">
							<inertia-link href="/home#designstudio" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white" replace>
								GLI Architects
							</inertia-link></a>
							
							<div :class="subdropdownPopoverShow && subH =='design' ? 'block rvmp-bg-main rvmp-text-main':'hidden'" @mouseleave="subtoggleDropdown('design')" class=" text-base z-50 float-left py-2 mr-14 list-none text-left rounded shadow-lg mt-1 absolute -right-1.5" style="min-width:12rem" ref="designPopoverDropdownRef">
									<ul>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Planning and Design</li>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Drafting Services for US and AU clients</li>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Animation</li>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">3D Rendering</li>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Building Information Modeling (BIM)</li>
									</ul>								
							</div>
							<!-- <a v-if="!switchInertia" href="#modularcabinets" @mouseover="subtoggleDropdown('cabinet')" @mouseleave="subtoggleDropdown('cabinet')" id="cabinetsbtnsubDropdownRef" ref="cabinetsbtnsubDropdownRef" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">
								Modular Cabinets
							</a> -->
							<a @mouseover="subtoggleDropdown('cabinet')" @mouseleave="subtoggleDropdown('cabinet')" id="cabinetsbtnsubDropdownRef" ref="cabinetsbtnsubDropdownRef">
								<inertia-link :href="$route('guest.index')+'#modularcabinets'"  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white" replace>
								GLI Modular Cabinets
							</inertia-link> </a>
							<div :class="subdropdownPopoverShow && subH =='cabinet' ? 'block rvmp-bg-main rvmp-text-main':'hidden'" @mouseleave="subtoggleDropdown('cabinet')" class=" text-base z-50 float-left py-2 mr-14 list-none text-left rounded shadow-lg mt-1 absolute -right-1.5" style="min-width:12rem" ref="cabinetsPopoverDropdownRef">
									<ul>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Modular Cabinets Installation</li>
										
									</ul>								
							</div>
						
						<a @mouseover="subtoggleDropdown('concrete')" @mouseleave="subtoggleDropdown('concrete')" id="concretesbtnsubDropdownRef" ref="concretesbtnsubDropdownRef">
								<inertia-link :href="$route('guest.index')+'#grindandpolish'"  class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white" replace>
								GLI Concrete Grinding and Polishing
							</inertia-link> </a>
							<!-- <div :class="subdropdownPopoverShow && subH =='concrete' ? 'block rvmp-bg-main rvmp-text-main':'hidden'" @mouseleave="subtoggleDropdown('concrete')" class=" text-base z-50 float-left py-2 mr-14 list-none text-left rounded shadow-lg mt-1 absolute -right-1.5" style="min-width:12rem" ref="concretesPopoverDropdownRef">
									<ul>
										<li class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Modular Cabinets Installation</li>
										
									</ul>								
							</div> -->
					
						</div>
						
					</div>
					<div class="relative inline-flex align-middle w-full lg:hidden block "  style="cursor:pointer">
						<div class="nav-link group w-full" >
						 	<span class="group-hover:rvmp-brand-color-main" @click.prevent="mobileDropdown">Divisions</span> 
							<ul v-if="mobileDropdownShow" class="text-xs font-normal bg-gray-100 p-4 space-y-3">
								<li @click.prevent="subMobileDropdown('builders')">
									<span >GLI Builders</span>	
									
							<template  v-if="mddtarg === 'builders' && mobilesubDropdownShow">
								<inertia-link href="/home#builders" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white" replace>
									<ul class="border-b border-gray-900 list-disc">
										<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Project Management</li>
										<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Renovations</li>
										<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Construction</li>
									</ul>										
								</inertia-link>
							</template>
										
								</li>
								<li>
									<span @click="subMobileDropdown('architects')">GLI Architects</span>
									<template v-if="mddtarg === 'architects' && mobilesubDropdownShow">
										<inertia-link href="/home#designstudio" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white" replace>
											<ul class="border-b border-gray-900 list-disc">
												<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Planning and Design</li>
												<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Drafting Services for US and AU clients</li>
												<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Animation</li>
												<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">3D Rendering</li>
												<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Building Information Modeling (BIM)</li>
											</ul>	
										</inertia-link>	
									</template>
								</li>
								<li>
									<span @click="subMobileDropdown('cabinets')">GLI Modular Cabinets</span>
									<template v-if="mddtarg === 'cabinets' && mobilesubDropdownShow">
										<inertia-link href="/home#cabinet" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white" replace>
											<ul class="border-b border-gray-900 list-disc">
												<li class="text-xs py-1 px-4 font-light block w-full whitespace-nowrap bg-transparent hover:bg-green-600 hover:text-white">Modular Cabinets Installation</li>
											</ul>	
										</inertia-link>
									</template>
								</li>
								<li>
									<inertia-link href="/home#grindandpolish" class="" replace>
										<span @click="subMobileDropdown('grinandpolish')">GLI Concrete Grinding and Polishing</span>
									</inertia-link>	
								</li>
							</ul>
						</div>
						</div>
				</li>
          
				<li class="lg:mx-6 mx-0">
					 <inertia-link :href="$route('guest.portfolio')" class="nav-link hover:rvmp-brand-color-main">Portfolio</inertia-link>
				</li>
				<li class="lg:mx-6 mx-0">
					 <inertia-link :href="$route('guest.about')" class="nav-link hover:rvmp-brand-color-main">About</inertia-link>
				</li>
				<li class="lg:mx-6 mx-0">
					 <inertia-link :href="$route('guest.contact')" class="nav-link hover:rvmp-brand-color-main">Contact Us</inertia-link>
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

export default {
    name: "AppHeader",
	directives: {
    	ClickAway: directive
  	},
	components: {
		MessengerPlugin,
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
