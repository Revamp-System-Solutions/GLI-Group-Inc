<template>
    

        <nav class="flex items-center justify-between flex-wrap py-6 px-6 w-full z-10 pin-t bg-white shadow-lg ">
		<div class="flex items-center flex-no-shrink text-black mr-6">
			<a class="text-black no-underline hover:no-underline" href="#">
				<img src="/images/gli-logo.png" style="display:inline" class="mx-6m lg:w-32 md:w-32 sm:w-32 w-16 ">
			</a>
		</div>

		<div class="block lg:hidden">
			<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-white hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
			<ul class="list-reset lg:flex justify-end flex-1 items-center">
				<li class="mx-6 ">
					 <inertia-link :href="$route('guest.index') " class="nav-link">Home</inertia-link>
				</li>
				
                <li class="mx-6">
					 <inertia-link :href="$route('guest.blog')" class="nav-link">Blog</inertia-link>
				</li>
				<li class="mx-6">
					 <inertia-link :href="$route('guest.portfolio')" class="nav-link">Portfolio</inertia-link>
				</li>
				<li class="mx-6">
					 <inertia-link :href="$route('guest.about')" class="nav-link">About</inertia-link>
				</li>
				<li class="mx-6">
					 <inertia-link :href="$route('guest.contact')" class="nav-link">Contact</inertia-link>
				</li>
                <li class="mx-6" v-if="user">
                    <span  class="nav-link" v-if="user">
                       {{user.name}}
                  
                    <inertia-link :href="$route('logout')" as="button" method="post" class="nav-link logout-link" style="display: inline" type="button"><i class="fas fa-sign-out-alt"></i></inertia-link>  
                    </span>
                </li>
			</ul>
		</div>
	</nav>
  
</template>

<script>
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "AppHeader",
    setup() {
        const user = computed(() => usePage().props.value.auth.user);

        return {
            user
        }
    },
    mounted() {
        document.getElementById('nav-toggle').onclick = function(){
			document.getElementById("nav-content").classList.toggle("hidden");
        }
    }
}
</script>
