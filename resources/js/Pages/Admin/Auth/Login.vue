<template>       
      <div class="w-full flex flex-wrap">

        <!-- Image Section -->
        <div class="w-3/5 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="/images/portfolio/pexels-photo-3935316.jpeg">
        </div>

        <!-- Login Section -->
        <div class="w-full md:w-1/3 grid grid-cols-1 gap-0 place-content-center mx-auto">
            <!-- <div>
                  <img class="mx-auto h-44 w-auto" src="/images/brand-logo.png" alt="Workflow" />
                  <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                  Sign in to your account
                  </h2> -->
                  <!-- <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a> -->
            <!-- </div> -->
            <div class="flex flex-col my-16 pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
               <img class="mx-auto h-44 w-auto" src="/images/brand-logo.png" alt="Workflow" />
                  <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                  Sign in to your account
                  </h2>
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
                          <div class="flex items-center justify-between">
                            <div class="flex items-center">
                              <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded" />
                              <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                              </label>
                            </div>
                            <div class="text-sm">
                              <a href="#" class="font-medium text-green-600 hover:text-green-500">
                                Forgot your password?
                              </a>
                            </div>
                          </div>
                          <div>
                            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                              <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <LockClosedIcon class="h-5 w-5 text-green-500 group-hover:text-green-400" aria-hidden="true" />
                              </span>
                              Sign in
                            </button>
                          </div>
                  </form>
    </div>

        </div>


    </div>
       
       
       
       
       
       
        <!-- <div class=" m-auto w-screen md:w-4/12 overflow-y-hidden">
            <div >
                <form method="post" @submit.prevent="submit" class="border-2 border-white  bg-gray-700 p-6 m-2 rounded-sm">
                    <img src="/images/brand-logo.png" class="mx-auto w-auto ">

                    <errors-and-messages :errors="errors"></errors-and-messages>

                        <label for="email">Email</label>
                        <input type="text" class="focus:shadow-outline px-4 py-2 rounded-sm border-2 border-black block w-full text-yellow-700" name="email" id="email" v-model="form.email" />
                
                        <label for="password">Password</label>
                        <input type="password" class="focus:shadow-outline px-4 py-2 rounded-sm border-2 border-black block w-full text-yellow-700" name="password" id="password" v-model="form.password" />
                   

                    <input type="submit" class="px-4 py-2 block w-full rounded-sm mt-4 text-white-700 bg-yellow-700" value="Login" />
                </form>
            </div>
        </div> -->

</template>

<script>

    import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";

    import {Inertia} from "@inertiajs/inertia";
    import { usePage } from '@inertiajs/inertia-vue3'
    import {reactive,inject} from 'vue';
    import { LockClosedIcon } from '@heroicons/vue/solid';

    export default {
        components: {
            ErrorsAndMessages,
            LockClosedIcon,
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

<style scoped>
    form {
        margin-top: 20px;
    }
</style>
