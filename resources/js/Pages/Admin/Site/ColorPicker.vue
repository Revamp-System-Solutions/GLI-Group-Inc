<template>

            <form method="post" @submit.prevent="submit">
                    <div class="cover grid lg:grid-cols-2 lg:gap-4  grid-cols-1 gap-0 px-6">
                    <ColorPicker
                    class="!w-56 col-span-1"
                    theme="dark"
                    :color="rgba2hex( form.color.startsWith('rgba') ? form.color:'rgba('+form.color+')', 'hex')"
                    :sucker-hide="true"
                    :sucker-canvas="suckerCanvas"
                    :sucker-area="suckerArea"
                    @changeColor="changeColor"
                    @openSucker="false"/>
                     <div class="col-span-1  grid grid-cols-2 gap-2">
                       <span>
                         <span class="block text-center">New Color</span>
                          <div class="mx-auto rounded-full h-11 w-11 border border-black" :style="rgba2hex(form.color.startsWith('rgba') ? form.color:'rgba('+form.color+')', 'style')"></div>
                          <span class="block"> {{form.color}}</span>
                          <span class="block">{{ rgba2hex( form.color.startsWith('rgba') ? form.color:'rgba('+form.color+')', 'hex') }}</span>
                       </span>
                       <span>
                         <span class="block text-center">Current Color</span>
                          <div class="mx-auto rounded-full h-11 w-11 border border-black" :style="rgba2hex(stageColors.value.startsWith('rgba') ? stageColors.value:'rgba('+stageColors.value+')', 'style')"></div>
                          <span class="block"> {{stageColors.value}}</span>
                            <span class="block">{{ rgba2hex(stageColors.value.startsWith('rgba') ? stageColors.value:'rgba('+stageColors.value+')', 'hex') }}</span>
                       </span>
                      </div>
                </div>
                <div >
                    <input type="text" class="w-full px-4 py-3 rounded"  name="color" id="color" v-model="form.color" />
                </div>

               
                <div class=" py-3 flex w-full justify-end">
                    <input type="submit" class=" px-4 py-3 rounded w-36 text-white text-lg bg-green-600 hover:bg-green-200 hover:text-black transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" value="Save" />
                </div>
            </form>

</template>

<script>
import { reactive, ref} from "vue";
import { ColorPicker } from 'vue-color-kit'
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "CPicker",
    components: {
     ColorPicker,
    },
    inheritAttrs: false,
    props: ["stageColors"],
    data:() => ({

        color: '#59c7f9',
        suckerCanvas: null,
        suckerArea: [],
        isOpenSucker: false,
    }),
    setup(props,{ emit }) {
        const form = reactive({
            alias: props.stageColors.alias,
            color: props.stageColors.value,
            _token: usePage().props.value.csrf_token
        });
        


        function submit() {
       
            emit('submitColor', form)
        }

        return {
            form, 
            submit,
              changeColor(color) {
                const { r, g, b, a } = color.rgba
                form.color=`${r}, ${g}, ${b}`
              
            },
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
        }
    },

}
</script>
