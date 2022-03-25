<template>
    <errors-and-messages :errors="errors"></errors-and-messages>
    <div class="flex bg-gray-100">
        <app-header-small :user="user" :menu-links="menuLinks" :menu-sub-links="menuSubLinks" />
        <div id="content-area" class="max-w-7xl md:w-9/12 mx-auto ">
            <div class="flex flex-col justify-center px-4" >
                <!-- search box -->
                <div class="flex justify-between">
                    <span class="text-xl inline-block p-3 font-semibold text-gray-700">
                            Add Users
                            <a  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal
                                    transition ease-out duration-400 hover:bg-green-700 hover:text-white"
                                    @click.prevent="register">
                                <i class="fas fa-plus"></i> Add New
                            </a>
                    </span>
                    <div class="pt-2 relative text-gray-600">
                        <input class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                                type="search" name="search" placeholder="Search">
                            <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                                <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                    width="512px" height="512px">
                                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                    </div>
                </div>
                <!-- table -->
                <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody  v-if="users.data.length > 0" class="bg-white divide-y divide-gray-200">
                                <tr v-for="user in users.data" :key="user.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-700">{{user.name}}</div>
                                    </td>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-700">{{user.email}}</div>
                                    </td>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-700">
                                            <template v-for="role in user.roles" :key="role">
                                                {{role.title}}
                                            </template>
                                            
                                            </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap space-x-1 ">
                                        <span  class="text-sm text-white bg-blue-400 px-3 py-1 rounded-sm" v-if="user" @click.prevent="updateUsr(user)"><i class="fas fa-edit"></i> Update user</span>
                                        <a href="javascript:void(0);" class="text-sm text-white bg-red-400 px-3 py-1 rounded-sm" @click.prevent="setIsOpen(true, user)" v-if="user"><i class="fas fa-trash-alt"></i> Disable user</a>
                                    </td>
                                   
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr class="text-center">
                                    <td colspan="4" class="text-center px-6 py-4 whitespace-nowrap">
                                        <div class="mb-2">No users found!</div>
                                        <a  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal
                                                transition ease-out duration-400 hover:bg-green-700 hover:text-white"
                                                @click.prevent="openModal;action='register'">
                                            <i class="fas fa-plus"></i> Add New
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                </table>
                <!-- pagination -->
                <nav aria-label="Page navigation" v-if="users.total > users.per_page" style="margin-top: 20px" class="w-1/5 mx-auto">
                          <ul class="pagination  flex flex-row justify-between">
                              <!-- Previous link -->
                              <li :class="'page-item' + (users.links[0].url == null ? ' disabled' : '')">
                                  <inertia-link :href="users.links[0].url == null ? '#' : users.links[0].url" class="page-link" v-html="users.links[0].label"></inertia-link>
                              </li>

                              <!-- Numbers -->
                              <li v-for="item in usersLinks" :class="'page-item' + (item.active ? ' disabled' : '')" :key="item">
                                  <inertia-link :href="item.active ? '#' : item.url" class="page-link" v-html="item.label"></inertia-link>
                              </li>

                              <!-- Next link -->
                              <li :class="'page-item' + (users.links[users.links.length - 1].url == null ? ' disabled' : '')">
                                  <inertia-link :href="users.links[users.links.length - 1].url == null ? '#' : users.links[users.links.length - 1].url" class="page-link" v-html="users.links[users.links.length - 1].label"></inertia-link>
                              </li>
                          </ul>
                </nav>

            </div>
        </div>
    </div>

<TransitionRoot appear :show="isOpen">
        <Dialog as="div" @close="closeModal">
        <div class="fixed inset-0 z-30 overflow-y-auto bg-gray-600 bg-opacity-30 ">
            <div class="min-h-screen px-4 text-center">
            <TransitionChild
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0">
                <DialogOverlay class="fixed inset-0" />
            </TransitionChild>
            <span class="inline-block h-2/4 align-middle" aria-hidden="true">
                &#8203;
            </span>
            <TransitionChild
                enter="duration-300 ease-out"
                enter-from="opacity-0 scale-95"
                enter-to="opacity-100 scale-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100 scale-100"
                leave-to="opacity-0 scale-95">

                <div  class="inline-block w-full max-w-xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                    <DialogTitle as="h3" class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700 ">                    
                            {{ action == 'register' ? 'Create New': 'Update'}} User
                    </DialogTitle>
                    <div class="mt-2 p-6">
                            <register :user-data="form" :user-roles="roles" :button="action" @submit-create="submit"/>
                    </div>

                </div>

            </TransitionChild>
            </div>
        </div>
        </Dialog>
    </TransitionRoot>

<warning-modal :is-dialog-open="isDialogOpen" :w-modal-content="WarningModalContent" @submit-event="setAction"/>

</template>

<script>
import AppHeaderSmall from './../../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import WarningModal from "./../../../Components/Modals/WarningModal";
import {computed, ref, inject, reactive} from 'vue'
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, DialogDescription, Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import CreateUser from './CreateUser';
import Register from '../../Auth/Register';


export default {
    name: "UserManager",
    components: {
        ErrorsAndMessages,
        AppHeaderSmall,
        WarningModal,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
        DialogDescription,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        CreateUser,
        Register,
    },
    props:{
            errors: Object,
            userData: {
                Type: Object,
                default: null
            },
            userRoles: {
                Type: Object,
                default: null
            },
            wModalContent: {
                Type: Object,
                default: null
            },
        },
    data(){
        return{
        
        }
    },
    setup(){
        const form = reactive({
            id: null,
            name: null,
            email: null,
            password: null,
            role: null,
            _token: usePage().props.value.csrf_token
        });

         const action = ref('register')

        const isOpen = ref(false);

        const isDialogOpen = ref(false);

        const WarningModalContent = {
                title: 'Disable User ',
                description : 'This action will disable the account',
                'message': ' <p class=""> Are you sure you want to disable this user&#63;  Account data will be archived</p>',
                buttonText: 'disable'
            }

        const users = computed(() => usePage().props.value.users);

        const usersLinks = users.value.links.filter((v, i) => i > 0 && i < users.value.links.length - 1);

        const roles = computed(() => usePage().props.value.roles);
       
        function setIsOpen(value,data) {
            form.id = data.id
            isDialogOpen.value = value;
        }

        function submit() {
            Inertia.post(route('user.'+action.value), form,{
                forceFormData: true,
                preserveState:true,
                replace:false,
                onError: (event) =>{console.log(event)},
                onSuccess: () =>{
                    action.value != 'disable' ? isOpen.value = false : isDialogOpen.value = false
                }
            });
        }
       
      const menuLinks = computed(() => usePage().props.value.page_links.parentLinks);
		const menuSubLinks = computed(() => usePage().props.value.page_links.subLinks);
		
        return {
            menuLinks,
			menuSubLinks,
            users,
            usersLinks,
            roles,
            form,
            isOpen,
            isDialogOpen,
            action,
            WarningModalContent,
            submit,
            closeModal() {
                isOpen.value = false
            },
            openModal() {
                isOpen.value = true
            },
            setIsOpen,
            setAction(value) {
                action.value = "disable"
                value ? submit(): isDialogOpen.value = false;
            },
            register(){
                action.value = "register"
                this.openModal()
            },
            updateUsr(data){
                action.value = "update"
                form.id = data.id
                form.name = data.name
                form.email = data.email
                form.role = data.roles[0].id
                this.openModal()
            },

        }
    }

}
</script>

