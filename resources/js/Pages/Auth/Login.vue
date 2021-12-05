<template>
       <inertia-link :href="$route('guest.index')" class="nav-link"><i class="fas fa-arrow-left"></i> Home</inertia-link>
        <div class=" m-auto w-screen md:w-4/12 overflow-y-hidden">
            <div >
                <form method="post" @submit.prevent="submit" class="border-2 border-white  bg-gray-700 p-6 m-2 rounded-sm">
                    <img src="/rvmp-content/rvmp-static/brand-logo.png" class="mx-auto w-auto ">

                    <errors-and-messages :errors="errors"></errors-and-messages>

                        <label for="email">Email</label>
                        <input type="text" class="focus:shadow-outline px-4 py-2 rounded-sm border-2 border-black block w-full text-yellow-700" name="email" id="email" v-model="form.email" />
                
                        <label for="password">Password</label>
                        <input type="password" class="focus:shadow-outline px-4 py-2 rounded-sm border-2 border-black block w-full text-yellow-700" name="password" id="password" v-model="form.password" />
                   

                    <input type="submit" class="px-4 py-2 block w-full rounded-sm mt-4 text-white-700 bg-yellow-700" value="Login" />
                </form>
            </div>
        </div>

</template>

<script>

    import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";

    import {Inertia} from "@inertiajs/inertia";
    import { usePage } from '@inertiajs/inertia-vue3'
    import {reactive,inject} from 'vue';

    export default {
        components: {
            ErrorsAndMessages
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
