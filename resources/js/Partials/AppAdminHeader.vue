<template>
    <nav id="appadminheader" class="fixed top-0 flex items-center justify-between flex-wrap py-4 px-8 w-full z-40 pin-t transition-height duration-500 ease-in-out rvmp-bg-alt border-b-2 border-gray-900">
	            <span class="flex flex-row justify-center items-center space-x-4">
                    <span class="bg-black rounded-full w-10 h-10 flex justify-center items-center">
                        <img src="/rvmp-content/rvmp-static/rvmp-delta.png" class="w-7 "/>
                    </span>
                    
                      <inertia-link :href="$route('page.admin')" class=""> <i class="fas fa-times text-red-600 text-xl"></i></inertia-link>
                </span>
                <span class="space-x-3">
                    <!-- <inertia-link href="/home" class="rounded-lg border-2 border-green-400 px-4 py-2 text-green-400 hover:text-gray-100 hover:bg-green-700">Preview</inertia-link> -->
                    <!-- <inertia-link href="#" class="rounded-lg border-2 border-blue-300 px-4 py-2 text-blue-300 hover:text-gray-100 hover:bg-blue-300">Save Draft</inertia-link> -->
                    <button @click="update" href="#" class="rounded-lg border-2 border-blue-400 bg-blue-500 px-4 py-2  text-gray-100 hover:bg-blue-700">Update</button>
                </span>
	</nav>

</template>

<script>
import { createPopper } from "@popperjs/core";
import { directive } from "vue3-click-away";


export default {
    name: "AppAdminHeader",
	directives: {
    	ClickAway: directive
  	},
	components: {

 	 },
	 data: () => ({
    	dropdownPopoverShow: false,
		subdropdownPopoverShow: false,
		subH: '',
		switchInertia: false,
		menuOpen: false,
  	}),

    mounted() {
		

    },
	methods: {
    update() {
      console.log("trying");
      this.$emit("updatePage", "someValue");
    },
  },
}
</script>
