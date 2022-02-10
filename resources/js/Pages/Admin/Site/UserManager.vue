<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex bg-gray-100">
    <app-header-small></app-header-small>
    <!-- content -->
    <div id="content-area" class="max-w-7xl md:w-9/12 mx-auto ">
        <span class="text-xl inline-block p-3 font-semibold text-gray-700">
                    Add Users
                    <inertia-link  class="ml-4 inline-block border py-1 px-3 rounded border-green-700 text-green-700 text-base font-normal
                            transition ease-out duration-400 hover:bg-green-700 hover:text-white"
                            :href="$route('post.create')">
                        <i class="fas fa-plus"></i> Add New
                    </inertia-link>
        </span>
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
                <DialogTitle as="h3" class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700">
                        modalOpen
                </DialogTitle>
                <div class="mt-2 p-6">
                        <register />
                </div>

                </div>

            </TransitionChild>
            </div>
        </div>
        </Dialog>
    </TransitionRoot>
</div>
</template>

<script>
import AppHeaderSmall from './../../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {ref} from 'vue'
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'
import CreateUser from './CreateUser';
import Register from './../Auth/Register';
export default {
    name: "Admin",
    components: {
        ErrorsAndMessages,
        AppHeaderSmall,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        CreateUser,
        Register,
    },
    props: {
        errors: Object
    },
    setup(){
         const isOpen = ref(false)
        return{
            isOpen,
            closeModal() {
                isOpen.value = false
            },
            openModal() {
                isOpen.value = true
            },
        }
    }

}
</script>

