<template>

            <form method="post" @submit.prevent="submit">
                
      

                <div  >
                    <label class="text-lg w-1/12 mr-2" for="media_name">Media Name</label>
                    <input type="text" class="w-full px-4 py-3 rounded"  name="media_name" id="media_name" v-model="form.media_name" />
                </div>

               
                <div class=" py-3 flex w-full justify-end">
                    <input type="submit" class=" px-4 py-3 rounded w-36 text-white text-lg bg-green-600 hover:bg-green-200 hover:text-black transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" value="Save" />
                </div>
            </form>

</template>

<script>
import { reactive} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "UploadMedia",
    components: {

    },
    // inheritAttrs: false,
    // props: ["stageImage","type"],
    setup(props,{ emit }) {
        const form = reactive({
            media_name: null,
            image: null,

            _token: usePage().props.value.csrf_token
        });
        


        function submit() {
          
            emit('submitImage', form)
        }

        return {
            form, 
            submit,

        }
    },

}
</script>
