<template>  
    <errors-and-messages :errors="errors"></errors-and-messages>     
      <div class="grid xl:grid-cols-5 grid-cols-1  gap-0 w-full ">
        <div class="xl:col-span-3 xl:block hidden w-full shadow-2xl">
            <img class="object-cover w-full h-screen" src="/images/portfolio/pexels-photo-3935316.jpeg">
        </div>
        <div class="xl:col-span-2 col-span-1 w-full grid grid-cols-1 gap-0 place-content-center mx-auto">
            <div class="flex flex-col my-16 pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
               <img class="mx-auto h-44 w-auto" src="/images/brand-logo.png" alt="Workflow" />
                <form class="mt-8 space-y-6" action="#" method="POST" @submit.prevent="submit"> 
                        <input type="hidden" name="remember" value="true" />
                        <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="email" class="sr-only">Email address</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Email address" v-model="form.email" />
                        </div>
                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Password" v-model="form.password"/>
                        </div>
                        </div>
                
                        <div>
                        <button type="submit" class="group relative w-full flex justify-center align-middle py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            
                            <i class="fas fa-lock h-5 w-5 text-white pr-5" aria-hidden="true"></i>
                    
                            Sign in
                        </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
    import {Inertia} from "@inertiajs/inertia";
    import { usePage } from '@inertiajs/inertia-vue3'
    import {reactive,inject} from 'vue';

    export default {
        components: {
            ErrorsAndMessages,
        },
        name: "Login",
        props: {
            errors: Object
        },
        setup() {
            const form = reactive({
               email: null,
               password: null,
               _token: usePage().props.value.csrf_token
            });

            const route = inject('$route');

            function submit() {
                Inertia.post(route('login'), form);
            }

            return {
                form, submit
            }
        }
    }
</script>


