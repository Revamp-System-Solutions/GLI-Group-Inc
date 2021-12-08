<template>
    <div class="row">
  
        <div class="col-md-6 offset-md-3">
            <form method="post" @submit.prevent="submit">
                <h2 class="text-left">Upload Media </h2>

                <div class="form-group" v-show="checkType">
                    <label for="media_name">Media Name</label>
                    <input type="text" class="form-control"  name="media_name" id="media_name" v-model="form.media_name" />
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control" @change="selectFile">
                </div>

                <input type="submit" class="btn btn-primary btn-block" value="Save" />
            </form>
        </div>
    </div>
</template>

<script>
import AppHeader from "./../../../Partials/AppHeader";
import ErrorsAndMessages from "./../../../Partials/ErrorsAndMessages";
import {inject, reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "Create",
    components: {
        ErrorsAndMessages,
        AppHeader
    },
    inheritAttrs: false,
    props: ["stageImage","type"],
    // emits:['submitI'],
    setup(props,{ emit }) {
        const form = reactive({
            media_name: null,
            image: null,
            type: (Buffer.from(props.type, 'base64')).toString(),
            _token: usePage().props.value.csrf_token
        });
        
       
        const checkType = (form.type).startsWith('RVMP') ? false: true
        const route = inject('$route');

        function selectFile($event) {
            form.image = $event.target.files[0];
        }

        function submit() {
            form.media_name = props.stageImage.media_name==null? form.media_name:props.stageImage.media_name
            emit('submitImage', form)
        }

        return {
            form, 
            submit,
            selectFile,
            checkType
        }
    },

}
</script>

<style scoped>
    form {
        margin-top: 20px;
    }
</style>
