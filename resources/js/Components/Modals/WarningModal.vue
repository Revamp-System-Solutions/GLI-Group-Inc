<template>    
    <Dialog :open="isDialogOpen" as="div"  @close="setIsOpen">
        <div class="fixed inset-0 z-30 overflow-y-auto bg-gray-600 bg-opacity-30 ">
            <div class="min-h-screen px-4 text-center flex flex-col justify-center items-center">

                <span class="inline-block h-2/4 align-middle" aria-hidden="true">
                    &#8203;
                </span>

                <div  class="inline-block w-full max-w-xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-lg rounded-t-lg p-6 pb-1">
                        <DialogTitle as="div" class="flex flex-row">
                            <div class="w-1/6 flex flex-col justify-center items-center">
                                <i class="fa-solid fa-triangle-exclamation text-3xl text-red-700"></i> 
                            </div>
                            <div class="w-full">
                                <h3  class="text-lg font-medium leading-6"> {{wModalContent.title}} </h3>
                                <DialogDescription  class="text-sm font-thin">
                                    {{wModalContent.description}}
                                </DialogDescription>
                            </div>
                        </DialogTitle>
                        
                        <div class="mt-2" v-html="wModalContent.message">
                   
                        </div>
                </div> 
                <div class="inline-block w-full max-w-xl overflow-hidden align-middle text-right transition-all transform bg-white shadow-lg rounded-b-lg p-6 pt-1 space-x-4">
                  
                    <button type="submit" class="bg-red-700 text-white py-2 px-4 rounded" @click="setIsOpen(true)">{{wModalContent.buttonText}}</button>

                     <button class="bg-gray-400 text-white py-2 px-4 rounded" @click="setIsOpen(false)">Cancel</button>
                </div>
            </div>
        </div>
    </Dialog>
</template>

<script>
import {ref} from 'vue';
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, DialogDescription, Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'



export default {
    name: "WarningModal",
    components: {
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
        DialogDescription,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
    },
    props:['isDialogOpen','wModalContent'],
    setup(props, {emit}){
        const isOpen =  ref(props.isDialogOpen)
        function submit() {
                emit('submitEvent', isOpen.value)    
            }
        return{
            submit,
            isOpen,
            setIsOpen(value) {
               isOpen.value = value;
               submit()
            },
        }
    }

}
</script>

