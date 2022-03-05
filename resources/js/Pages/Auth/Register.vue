<template>
                <form method="post" @submit.prevent="submit" class="space-y-4">
                     <div class="rounded-md shadow-sm space-y-4">
                            <div class="flex flex-row">
                                <label class="w-3/12" for="name" >Name:</label>
                                <input name="name" id="name"  type="text" autocomplete="off" required="" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Fullname" v-model="userData.name" />
                            </div>
                            <div class="flex flex-row">
                                <label class="w-3/12" for="email-address" >Email:</label>
                                <input id="email-address" name="email" type="email" autocomplete="off" required="" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Email address" v-model="userData.email" />

                            </div>
                             <div class="flex flex-row" v-if="button === 'register'">
                                <label class="w-3/12" for="password" >Password</label>
                                <input id="password" name="password" type="password" autocomplete="off" required="" class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Password" v-model="userData.password"/>
                            </div>
                             <div class="flex flex-row">
                                 <label class="w-3/12" for="roles">Roles</label>
                                <div class="flex flex-row w-full">
                                    <template v-for="role in userRoles" :key="role">
                                        <div id="roles" class="relative w-1/4 border whitespace-nowrap" :class="clicked === role.id ? 'bg-green-500 ':'bg-gray-300 '">
                                            <input type="radio" :id="role.slug"  v-model="userData.role" name="roles" :value="role.id" class="invisible" @click="setActive(role.id)">
                                            <label :for="role.slug" class="absolute left-0 w-full text-center"  :class="clicked === role.id ? 'text-gray-50 ':'text-gray-900 '">{{role.title}}</label>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>

                         <button type="submit" class="group relative w-full flex justify-center align-middle py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 uppercase">
                            {{button}}
                        </button>
                </form>
</template>

<script>

import {ref} from 'vue';

export default {
    name: "Register",
    components: {
    },
    props: ["userData","userRoles", "button"],
    setup(props,{ emit }) {
        const clicked = ref(props.userData.role)
        function submit() {
            emit('submitCreate', props.userData)
        }
        return {
            clicked,
            submit,
            setActive(data){
                clicked.value=data
            }
        }
    }
}
</script>
