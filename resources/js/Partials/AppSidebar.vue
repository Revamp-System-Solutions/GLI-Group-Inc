<template>
<div id="sidebar" class="w-2/12 h-auto bg-gray-700">
				<div class="my-px flex justify-center">
					<img src="/rvmp-content/rvmp-static/brand-logo-small.png" class="mx-auto lg:w-32 w-12 lg:indivne block">
				</div>
			
			<ul class="flex flex-col h-screen">
                
				<li class="my-px">
					<inertia-link :href="$route('viewDashboard')"  
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600" :class="{'bg-green-600': path==='/gli-admin/dashboard'}">
					
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
										class="w-full flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600" :class="{'bg-green-600': path==='/gli-admin/posts'}">
										
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
					<a @click.prevent="mediaDropdown"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600 cursor-pointer">
						
						<i class="fas fa-photo-video"></i>
						
						<span class="ml-3">Media</span>

					</a>
					 <ul class="flex flex-col w-full pl-8 transition ease-out duration-700" v-if="this.mediaDropdownOpen">
                                <li class="my-px">
									<inertia-link :href="$route('admin.media')"  
										class="w-full flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
										
											<i class="fas fa-book-open"></i>
										
										<span class="ml-3">Library</span>
									</inertia-link> 
                                </li>
                                <li class="my-px">
                                    <inertia-link :href="$route('media.create')"
                                    class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
										
											<i class="fas fa-upload"></i>
										
                                        <span class="ml-3">Add New</span>

                                   </inertia-link> 
                                </li>
                        </ul>
				</li>
			
				<li class="my-px">
					<a  @click.prevent="settingsDropdown"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600 cursor-pointer">
						
							<i class="fas fa-cogs"></i>
						
						<span class="ml-3">Settings</span>
		
					</a>
					<ul class="flex flex-col w-full pl-8 transition ease-out duration-700" v-if="this.settingsDropdownOpen">
                                <li class="my-px">
                                    <a href="#"
                                    class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
										
											<i class="fas fa-bookmark"></i>
										
                                        <span class="ml-3">Site Settings</span>

                                    </a>
                                </li>
								<li class="my-px">
									<a href="#"
									class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
										
											<i class="fas fa-users"></i>
										
										<span class="ml-3">User Management</span>
						
									</a>
								</li>	
                                
                        </ul>
				</li>
				<li class="my-px mb-8"  v-if="user">
                    <inertia-link :href="$route('logout')" as="button" method="post" 
						class="w-full flex flex-row items-center h-12 px-4  text-white logout-link hover:bg-red-400" style="display: inline" type="button">
                        
							  <i class="fas fa-sign-out-alt"></i>
	
						<span class="ml-3">Logout</span>
                    </inertia-link>  
				</li>
               
			</ul>
			 <div class="my-16 sticky bottom-0"  v-if="user">
                     <img src="/rvmp-content/rvmp-static/revamp-system-solutions-alt.png" oncontextmenu="return false;" ondragstart="return false;" class="mx-auto w-2/3  ">
				</div>
</div>
</template>

<script>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "AppSidebar",

	methods: {
        blogDropdown: function(){
          this.blogDropdownOpen = !this.blogDropdownOpen
        },
		mediaDropdown: function(){
          this.mediaDropdownOpen = !this.mediaDropdownOpen
        },
		settingsDropdown: function(){
          this.settingsDropdownOpen = !this.settingsDropdownOpen
        },

    },
    data: () => ({
    	blogDropdownOpen: false,
		mediaDropdownOpen: false,
		settingsDropdownOpen: false,
		path: ''
  	}),
    setup() {
        const user = computed(() => usePage().props.value.auth.user);

        return {
            user
        }
    },
	mounted(){
		this.path = window.location.pathname;

		switch(this.path){
			case '/gli-admin/posts':
			case '/gli-admin/posts/create':
			case '/gli-admin/posts/edit':
				this.blogDropdownOpen = true;
				break;
			case '/gli-admin/media':
				this.mediaDropdownOpen = true;
				break;
			default:
				this.blogDropdownOpen = false;
				this.mediaDropdownOpen = false;

		}
	},
   
}
</script>
