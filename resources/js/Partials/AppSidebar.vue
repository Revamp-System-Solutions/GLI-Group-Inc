<template>
<div id="sidebar" class=" h-auto bg-gray-700 transition duration-500 ease-in-out" :class="{'w-14': !menuOpen, 'w-2/12': menuOpen}">
				<div class="my-px flex justify-center transition duration-500 ease-in-out" >
					<img src="/rvmp-content/rvmp-static/brand-logo-small.png" v-if="menuOpen" class="transition duration-500 ease-in-out mx-auto lg:w-32 w-12 lg:indivne block">
					<img src="/rvmp-content/rvmp-static/brand-logo-no-text.png" v-if="!menuOpen" class="transition duration-500 ease-in-out mx-auto w-8 lg:indivne block">
				</div>
		<div class="transition duration-500 ease-in-out mt-1 py-3 w-full flex " :class="{'justify-center': !menuOpen, 'justify-end pr-2 ': menuOpen}">
			<button @click.prevent="menuOpen=!menuOpen" class="transition duration-500 ease-in-out flex items-center px-4 py-2 border rounded text-white border-grey-dark ">
				<i class="fas " :class="{'fa-angle-right': !menuOpen, 'fa-angle-left': menuOpen}"></i> 
						
			</button>
		</div>
			<ul class="flex flex-col h-auto transition duration-500 ease-in-out">
                
				<li class="my-px">
					<inertia-link :href="$route('viewDashboard')"  
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600" :class="{'bg-green-600': path==='/gli-admin/dashboard'}">
					
							<i class="fas fa-tachometer-alt "></i>
						
						<span class="ml-3" v-if="menuOpen">Dashboard</span>
					
					</inertia-link>
				</li>
                <li class="my-px">
					<a href="#"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
						
							<i class="fas fa-file-alt"></i>
						
						<span class="ml-3"  v-if="menuOpen">Pages</span>

					</a>
				</li>
                <li class="my-px"  >
					<a @click.prevent="blogDropdown; menuOpen=true"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600 cursor-pointer">
						
							<i class="fas fa-blog"></i>
						
						<span class="ml-3"  v-if="menuOpen">Blog</span>
                        
					</a>
                    <ul class="flex flex-col w-full pl-8 transition ease-out duration-700" v-if="this.blogDropdownOpen && menuOpen">
                                <li class="my-px">
									<inertia-link :href="$route('adminPost')"  
										class="w-full flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600" :class="{'bg-green-600': path==='/gli-admin/posts'}">
										
											<i class="fas fa-sticky-note"></i>
										
										<span class="ml-3">Posts</span>
									</inertia-link> 
                                </li>
								<li class="my-px">
									<inertia-link :href="$route('post.create')"  
										class="w-full flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600" :class="{'bg-green-600': path==='/gli-admin/posts/create'}">
										
											<i class="fas fa-plus"></i>
										
										<span class="ml-3">Add New</span>
									</inertia-link> 
                                </li>
                                <li class="my-px">
                                    <a href="#"
                                    class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
										
											<i class="fas fa-bookmark"></i>
										
                                        <span class="ml-3">Category</span>

                                    </a>
                                </li>
								<li class="my-px">
                                    <a href="#"
                                    class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600">
										
											<i class="fas fa-tags"></i>
										
                                        <span class="ml-3">tags</span>

                                    </a>
                                </li>
                        </ul>
				</li>
				  <li class="my-px">
					<a @click.prevent="mediaDropdown; menuOpen=true"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600 cursor-pointer">
						
						<i class="fas fa-photo-video"></i>
						
						<span class="ml-3"  v-if="menuOpen">Media</span>

					</a>
					 <ul class="flex flex-col w-full pl-8 transition ease-out duration-700" v-if="this.mediaDropdownOpen && menuOpen">
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
					<a  @click.prevent="settingsDropdown; menuOpen=true"
					   class="flex flex-row items-center h-12 px-4  text-white  hover:bg-green-600 cursor-pointer">
						
							<i class="fas fa-cogs"></i>
						
						<span class="ml-3"  v-if="menuOpen">Settings</span>
		
					</a>
					<ul class="flex flex-col w-full pl-8 transition ease-out duration-700" v-if="this.settingsDropdownOpen && menuOpen">
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
				<li class="my-px mb-8"  v-if="user && menuOpen">
                    <inertia-link :href="$route('logout')" as="button" method="post" 
						class="w-full flex flex-row items-center h-12 px-4  text-white logout-link hover:bg-red-400" style="display: inline" type="button">
                        
							  <i class="fas fa-sign-out-alt"></i>
	
						<span class="ml-3"  v-if="menuOpen">Logout</span>
                    </inertia-link>  
				</li>
				<li class="my-px mb-8"  v-if="user && menuOpen">
                    <inertia-link :href="$route('logout')" as="button" method="post" 
						class="w-full flex flex-row items-center h-12 px-4  text-white logout-link hover:bg-red-400" style="display: inline" type="button">
                        
							  <i class="fas fa-sign-out-alt"></i>
	
						<span class="ml-3"  v-if="menuOpen">Logout</span>
                    </inertia-link>  
				</li>
                
			</ul>
			<div class="my-16 sticky bottom-0 justify-self-end"  v-if="user">
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
		menuOpen: false,
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
