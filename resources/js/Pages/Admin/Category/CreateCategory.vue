<template>


                    <form method="post" @submit.prevent="submit" class="">
                    
                            <div class="" >
                                <label for="name" class="text-lg w-1/12 mr-2">Sub-Category Name:</label>
                                <input type="text"  name="name" id="name" class="w-full px-4 py-3 rounded"   v-model="form.name" />
                            </div>
                            <div class="">
                                <label for="description" class="text-lg w-1/12 mr-2">Description:</label>
                                <input type="text" id="description" name="description" class="w-full px-4 py-3 rounded"  v-model="form.description">
                            </div>
                          
                         <div class="form-group py-3 flex w-full justify-end">
                        <input type="submit" class=" px-4 py-3 rounded w-36 text-white text-lg bg-green-600 hover:bg-green-200 hover:text-black transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" value="Save" />
                         </div>
                    </form>

</template>

<script>
import { reactive} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "CreateCategory",
    components: {

    },
    inheritAttrs: false,
    props:["stageCategory"],
    setup(props,{ emit }) {
        const form = reactive({
            name: props.stageCategory == null ? null: props.stageCategory.name,
            description: props.stageCategory == null ? null: props.stageCategory.description,
            action: props.stageCategory == null ? 'new': 'update',
            _token: usePage().props.value.csrf_token
        });


       
        function submit() {
           emit('submitCategory', form)
        }

        return {
            form, submit, 
        }
    }
}
</script>
