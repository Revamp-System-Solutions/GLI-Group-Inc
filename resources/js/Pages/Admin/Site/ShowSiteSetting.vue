<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<app-header-small></app-header-small>
 

 
   <!-- <div id="site-settings" class="flex flex-row">
   
        <div id="content-area" class="w-full h-auto bg-gray-50">
            <div class="h-full 2xl:px-80 xl:px-56 lg:px-28"> 
                STATICS, BRAND COLORSs
                <table class="table-fixed w-full border-collapse border border-gray-700 mt-2">
                                  <thead>
                                      <tr>
                                      <th class="w-1/4 border border-gray-600">Name</th>
                                      <th class="w-1/4 border border-gray-600">Color</th>
                                      <th class="w-1/4 border border-gray-600">Description</th>
                                      
                                      </tr>
                                  </thead>
                            <tbody>
                                      <tr v-for="system_color in system_colors" :key="system_color.alias" class="">
                                          <td class="border border-gray-600">{{system_color.alias}}</td>
                                          <td class="border border-gray-600">                                                
                                              <input type="color" :value="rgba2hex('rgba('+system_color.value+')')"> 
                                              <button type="button" 
                                              @click="
                                                openModal();
                                                color = rgba2hex('rgba('+system_color.value+')');
                                                stageColor = system_color;
                                              " class="px-4 py-2 text-sm font-medium text-white bg-black rounded-md bg-opacity-20 hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75">Open dialog </button>
                                          </td>
                                          <td class="border border-gray-600">{{ system_color.description }}</td>
                                          
                                      </tr>
                                  </tbody>
                         
                            </table>
            </div>

        </div>
    </div>
  -->
  <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28">
      <div class="py-2 align-middle inline-block min-w-full ">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Title
                </th>
               
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="system_color in system_colors" :key="system_color">
                   <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-base text-gray-900">{{ system_color.alias }}</div>
                  <div class="text-sm text-gray-500">{{ system_color.description }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 rounded-full h-11 w-11 border border-black" :style="rgba2hex('rgba('+system_color.value+')', 'style')">

                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        <span class="block">{{ system_color.value }}</span>
                        <span class="block">{{ rgba2hex('rgba('+system_color.value+')', 'hex') }}</span>
                      </div>
                      <div class="text-sm text-gray-500 capitalize">
                       <span @click="
                            openModal();
                            color = 'rgba('+system_color.value+')';
                            stageColor = system_color;
                            oldColor.alias = system_color.alias;
                            oldColor.value = system_color.value;
                          "> <i class="fas fa-edit"></i>change color</span>
            
                      </div>
                    </div>
                  </div>
                </td>
               
           
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <TransitionRoot appear :show="isOpen" as="template">
    <Dialog as="div" @close="closeModalm">
      <div class="fixed inset-0 z-10 overflow-y-auto bg-gray-700 bg-opacity-30 ">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
          >
            <DialogOverlay class="fixed inset-0" />
          </TransitionChild>

          <span class="inline-block h-screen align-middle" aria-hidden="true">
            &#8203;
          </span>

          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0 scale-95"
            enter-to="opacity-100 scale-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100 scale-100"
            leave-to="opacity-0 scale-95"
          >
            <div
              class="inline-block w-full max-w-xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl"
            >
              <DialogTitle
                as="h3"
                class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700"
              >
                {{stageColor.alias}}
              </DialogTitle>
              <div class="mt-2 px-6 ">
                  <div class="cover grid grid-cols-2 gap-4">
                    <ColorPicker
                    class="!w-56 col-span-1"
                    theme="dark"
                    :color="color"
                    :sucker-hide="true"
                    :sucker-canvas="suckerCanvas"
                    :sucker-area="suckerArea"
                    @changeColor="changeColor"
                    @openSucker="false"/>
                     <div class="col-span-1  grid grid-cols-2 gap-2">
                       <span>
                         <span class="block text-center">New Color</span>
                          <div class="mx-auto rounded-full h-11 w-11 border border-black" :style="rgba2hex(color, 'style')"></div>
                          <span class="block"> {{stageColor.value}}</span>
                          <span class="block">{{ rgba2hex('rgba('+oldColor.value+')', 'hex') }}</span>
                       </span>
                       <span>
                         <span class="block text-center">Current Color</span>
                          <div class="mx-auto rounded-full h-11 w-11 border border-black" :style="rgba2hex('rgba('+oldColor.value+')', 'style')"></div>
                          <span class="block"> {{oldColor.value}}</span>
                          <span class="block">{{ rgba2hex('rgba('+oldColor.value+')', 'hex') }}</span>
                       </span>
                  </div>
                  </div>
                 

              </div>

              <div class="mt-4 p-6">
                <button
                  type="button"
                  class="inline-flex justify-center px-4 py-2 text-sm font-medium text-blue-900 bg-blue-100 border border-transparent rounded-md hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500"
                  @click="setFormColor">
                  Save Changes 
                </button>
              </div>
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import AppHeaderSmall from './../../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject, reactive, ref} from "vue";
import { ColorPicker } from 'vue-color-kit'
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogOverlay,
  DialogTitle,
} from '@headlessui/vue'

export default {
    name: "SiteSetting",
    components: {
        ErrorsAndMessages,     
        AppHeaderSmall,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
        ColorPicker,

    },
    props: {
        errors: Object
    },
    data: () => ({
        oldColor:{
            alias: null,
            value: null
        },
        stageColor: null,
        success:false,
        color: '#59c7f9',
        suckerCanvas: null,
        suckerArea: [],
        isOpenSucker: false,
  	}),
    methods: {
       rgba2hex(rgba, ch) {
        rgba = rgba.match(
            /^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i
        );
        var prefix = ch=='style' ? 'background: ': '';
        return rgba && rgba.length === 4
            ? prefix+"#"+
                ("0" + parseInt(rgba[1], 10).toString(16)).slice(-2) +
                ("0" + parseInt(rgba[2], 10).toString(16)).slice(-2) +
                ("0" + parseInt(rgba[3], 10).toString(16)).slice(-2)
            : "";
        },
         changeColor(color) {
        const { r, g, b, a } = color.rgba
        this.color = `rgba(${r}, ${g}, ${b}, ${a})`
 
        this.stageColor.value=`${r}, ${g}, ${b}`

        },
        setFormColor (){
                   this.closeModalm()
            this.form.alias = this.stageColor.alias
            this.form.color = this.stageColor.value
   
            this.submit()
            
        },
          closeModalm() {
                this.isOpen = false
            }
    },
    setup() {
        const form = reactive({
            alias: null,
            color: null,
            _token: usePage().props.value.csrf_token
        });
        const isOpen = ref(false)
        const route = inject('$route');

        function submit() {
            Inertia.post(route('settings.color.change', {'sys_color': form.alias}), form, {
                forceFormData: true
            });
        }

        const system_colors = computed(() => usePage().props.value.system_colors);
 
        const user = computed(() => usePage().props.value.auth.user);
 
        return {
            form,
            system_colors,
            submit,
            user,
            isOpen,
            closeModal() {
                isOpen.value = false
                busy.value = false
                
            },
            openModal() {
                isOpen.value = true
            }
            
        }
    },
  
}
</script>