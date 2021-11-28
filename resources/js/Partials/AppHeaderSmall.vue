<template>
    <nav class="flex items-center justify-between flex-wrap py-2 w-full z-10 pin-t bg-gray-700 ">
	

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto  pt-0"   id="nav-content" >
			<ul class="brand-text font-semibold text-xl list-reset text-white lg:flex justify-end flex-1 items-center uppercase">
				
					 <li class="mr-3" v-if="user">

                        <span  class="nav-link" v-if="user">
							<i class="fas fa-user mr-3"></i>	
							{{user.name}}
                        </span>
                     </li>
			
           
			</ul>
		</div>
	</nav>
  
</template>

<script>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import { directive } from "vue3-click-away";
export default {
    name: "AppHeaderSmall",
	directives: {
    	ClickAway: directive
  	},
	 setup() {
        const user = computed(() => usePage().props.value.auth.user);

        return {
            user
        }
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
  
  }
}
</script>
