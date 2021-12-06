<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<app-header-small></app-header-small>
  <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28">
    <h2 class="font-semibold text-3xl my-4">Site Settings</h2>
        <Disclosure v-slot="{ open }" >
					<DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
            <span class="text-xl"><i class="fas fa-palette mx-2"></i> Site Colors</span>
            <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
					</DisclosureButton>
					<DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 grid gap-0 lg:grid-cols-2 grid-cols-1 divide-y divide-gray-200 bg-opacity-50 bg-gray-100 text-sm rounded-lg">

                <template v-for="system_color in system_colors" :key="system_color">
                  <div class="p-6 lg:bg-transparent bg-gray-300">
                    <div class="text-base text-gray-900">{{ system_color.alias }} </div>
                    <div class="text-sm text-gray-500">{{ system_color.description }}</div>
                  </div>
                  <div class="lg:p-6 py-4 pl-8">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 rounded-full h-11 w-11 border border-black" :style="rgba2hex('rgba('+system_color.value+')', 'style')">

                      </div>
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900 capitalize">
                          <span class="block">{{ system_color.value }}</span>
                          <span class="block">{{ rgba2hex('rgba('+system_color.value+')', 'hex') }}</span>
                          <span @click="
                              openModal('color');
                              color = 'rgba('+system_color.value+')';
                              stageColor = system_color;
                              oldColor.alias = system_color.alias;
                              oldColor.value = system_color.value;
                            " class="block text-gray-500"> <i class="fas fa-edit"></i>change color</span>
              
                        </div>
                      </div>
                    </div>
                  </div>
                </template>
					</DisclosurePanel>
        </Disclosure>
        <Disclosure v-slot="{ open }" >
          <DisclosureButton class="my-2 flex justify-between w-full py-4 px-6 font-medium text-left text-white bg-gray-700 rounded-lg">
            <span class="text-xl"><i class="fas fa-images mx-2"></i> Site Branding</span>
            <span class="fas " :class="[open ? 'fa-chevron-up rvmp-brand-color-main' : 'fa-chevron-down text-white ']" aria-hidden="true"></span>
          </DisclosureButton>
          <DisclosurePanel class="lg:px-6 lg:pt-4 lg:pb-2 grid gap-0 lg:grid-cols-2 grid-cols-1 divide-y divide-gray-200 bg-opacity-50 bg-gray-100 text-sm rounded-lg">

                <template v-for="static_image in static_images" :key="static_image">
                  <div class="p-6">
                    <span class="text-base text-gray-900">{{ static_image.static_value }} 
                      <span @click="
                      openModal('brand');
                      stageImg=static_image"><i class="fas fa-sync"></i> Update Current Image</span></span>
                    <p>{{ static_image.description }}</p>
                  </div>
                  <div class="p-6">
                      <img v-if="static_image.image_url" class="rounded shadow-md object-contain h-48 w-full" :src="static_image.image_url" :alt="static_image.static_value">
                  </div>
                </template>
            </DisclosurePanel>
				</Disclosure>
    </div>

  <TransitionRoot appear :show="isOpen">
    <Dialog as="div" @close="closeModal">
      <div class="fixed inset-0 z-50 overflow-y-auto bg-gray-600 bg-opacity-30 ">
        <div class="min-h-screen px-4 text-center">
          <TransitionChild
      
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
          >
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
            leave-to="opacity-0 scale-95"
          >
            <div v-if="caller==='color'" class="inline-block w-full max-w-xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
              <DialogTitle as="h3" class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700">
                {{stageColor.alias}}
              </DialogTitle>
              <div class="mt-2">
                  <div class="cover grid lg:grid-cols-2 lg:gap-4  grid-cols-1 gap-0 px-6">
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
            <div v-if="caller==='brand'" class="inline-block w-full max-w-xl overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
              <DialogTitle as="h3" class="text-lg font-medium  p-6 leading-6 text-white bg-gray-700">
                update image
              </DialogTitle>
              <div class="mt-2">
                <upload-media :stageImage="stageImg"  v-if="caller==='brand'"/>
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
import UploadMedia from '../Media/UploadMedia';
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";
import {computed, inject, reactive, ref} from "vue";
import { ColorPicker } from 'vue-color-kit'
import { TransitionRoot, TransitionChild, Dialog, DialogOverlay, DialogTitle, Disclosure, DisclosureButton, DisclosurePanel} from '@headlessui/vue'

export default {
    name: "SiteSetting",
    components: {
        ErrorsAndMessages,     
        AppHeaderSmall,
        UploadMedia,
        TransitionRoot,
        TransitionChild,
        Dialog,
        DialogOverlay,
        DialogTitle,
        ColorPicker,
        Disclosure,
        DisclosureButton,
        DisclosurePanel,

    },
    props: {
        errors: Object,
        stageImage: String
    },
    data: () => ({
        oldColor:{
            alias: null,
            value: null
        },
        caller: null,
        stageColor: [],
        stageImg: [],
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
        this.color = `rgba(${r}, ${g}, ${b})`
 
        this.stageColor.value=`${r}, ${g}, ${b}`
        console.log(this.stageColor)
        },
        setFormColor (){
            this.closeModal()
            this.form.alias = this.stageColor.alias
            this.form.color = this.stageColor.value
   
            this.submit()
            
        },
         closeModal() {
                this.isOpen = false
                this.busy = false
                
        },
        openModal(cb) {
            this.isOpen = true
          this.caller=cb
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
                forceFormData: true,
            });
        }

        const system_colors = computed(() => usePage().props.value.system_colors);
        const static_images = computed(() => usePage().props.value.static_images);
        const user = computed(() => usePage().props.value.auth.user);
        return {
            form,
            system_colors,
            submit,
            user,
            static_images,
            isOpen,
           
            
        }
    },
  
}
</script>