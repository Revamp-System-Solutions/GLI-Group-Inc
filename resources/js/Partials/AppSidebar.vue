<template>

			<ul class="flex flex-col w-2/12 h-screen bg-gray-700">
                <li class="my-px flex justify-center">
					<img src="/images/brand-logo-small.png" class="mx-auto lg:w-32 w-12 lg:inline block">
				</li>
				<li class="my-px">
					<inertia-link :href="$route('viewDashboard')"  
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
					
							<i class="fas fa-tachometer-alt "></i>
						
						<span class="ml-3">Dashboard</span>
					
					</inertia-link>
				</li>
                <li class="my-px">
					<a href="#"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
						
							<i class="fas fa-file-alt"></i>
						
						<span class="ml-3">Pages</span>

					</a>
				</li>
                <li class="my-px"  >
					<a @click.prevent="blogDropdown"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600 cursor-pointer">
						
							<i class="fas fa-blog"></i>
						
						<span class="ml-3">Blog</span>
                        
					</a>
                    <ul class="flex flex-col w-full pl-8 transition ease-out duration-700" v-if="this.blogDropdownOpen">
                                <li class="my-px">
									<inertia-link :href="$route('adminPost')"  
										class="w-full flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
										
											<i class="fas fa-sticky-note"></i>
										
										<span class="ml-3">Posts</span>
									</inertia-link> 
                                </li>
                                <li class="my-px">
                                    <a href="#"
                                    class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
										
											<i class="fas fa-bookmark"></i>
										
                                        <span class="ml-3">Category</span>

                                    </a>
                                </li>
                        </ul>
				</li>
				  <li class="my-px">
					<inertia-link :href="$route('admin.media')"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
						
						<i class="fas fa-photo-video"></i>
						
						<span class="ml-3">Media</span>

					</inertia-link>
				</li>
				<li class="my-px">
					<a href="#"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
						
							<i class="fas fa-users"></i>
						
						<span class="ml-3">User Management</span>
		
					</a>
				</li>
				<li class="my-px"  v-if="user">
                    <inertia-link :href="$route('logout')" as="button" method="post" 
						class="w-full flex flex-row items-center h-12 px-4  text-white logout-link hover:bg-red-400" style="display: inline" type="button">
                        
							  <i class="fas fa-sign-out-alt"></i>
	
						<span class="ml-3">Logout</span>
                    </inertia-link>  
				</li>
                <li class="mt-auto mb-12"  v-if="user">
                     <img src="/images/revamp-system-solutions-alt.png" oncontextmenu="return false;" class="mx-auto w-2/3  ">
				</li>
			</ul>

</template>

<script>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import { directive } from "vue3-click-away";
export default {
    name: "AppSidebar",
	directives: {
    	ClickAway: directive
  	},
	methods: {
        blogDropdown: function(){
          this.blogDropdownOpen = !this.blogDropdownOpen
        },
    },
    data: () => ({
    	blogDropdownOpen: false,
  	}),
    setup() {
        const user = computed(() => usePage().props.value.auth.user);

        return {
            user
        }
    },
   
}
</script>
