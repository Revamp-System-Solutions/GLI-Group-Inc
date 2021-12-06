<template>
    <div class="row">
  
        <div class="col-md-6 offset-md-3">
            <form method="post" @submit.prevent="submit">
                <h2 class="text-left">Upload Media {{stageImage}}</h2>

                <div class="form-group">
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
    props: ["stageImage"],
    setup() {
        const form = reactive({
            medianame: null,
            image: null,
            _token: usePage().props.value.csrf_token
        });

        const route = inject('$route');

        function selectFile($event) {
            form.image = $event.target.files[0];
        }

        function submit() {
            Inertia.post(route('media.store'), form, {
                forceFormData: true
            });
        }

        return {
            form, submit, selectFile
        }
    },
    mounted(){
      
    }
}
</script>

<style scoped>
    form {
        margin-top: 20px;
    }
</style>
