<template>
    

        <nav class="flex items-center justify-between flex-wrap p-6 w-full z-10 pin-t bg-gray-700">
		<div class="flex items-center flex-no-shrink text-white mr-6">
			<a class="text-white no-underline hover:text-white hover:no-underline" href="#">
				<span class="text-2xl pl-2"><img src="/images/jl-logo.png" style="display:inline" class="mx-auto w-5 "> Justice League</span>
			</a>
		</div>

		<div class="block lg:hidden">
			<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-grey border-grey-dark hover:text-white hover:border-white">
				<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
			</button>
		</div>

		<div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
			<ul class="list-reset lg:flex justify-end flex-1 items-center">
				<li class="mr-3">
					 <inertia-link :href="$route('home.index')" class="nav-link">Home</inertia-link>
				</li>
                <li class="mr-3">
					 <inertia-link :href="$route('adminPost')" class="nav-link">Post</inertia-link>
				</li>
				<li class="mr-3">
					 <inertia-link :href="$route('post.create')" class="nav-link">Create Post</inertia-link>
				</li>
				 <li class="mr-3" v-if="!user">
                        <inertia-link :href="$route('showLoginForm')" class="nav-link">Login</inertia-link>
                </li>
                <li class="mr-3" v-if="!user">
                    <inertia-link :href="$route('showRegisterForm')" class="nav-link">Register</inertia-link>
                </li>
                <li class="mr-3" v-if="user">
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
