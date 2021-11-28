<template>
    <app-header></app-header>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="post" @submit.prevent="submit">
                <h2 class="text-left">Upload Media</h2>

                <errors-and-messages :errors="errors"></errors-and-messages>

                <div class="form-group">
                    <label for="medianame">Media Name</label>
                    <input type="text" class="form-control"  name="medianame" id="medianame" v-model="form.title" />
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
    props: {
        errors: Object
    },
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
    }
}
</script>

<style scoped>
    form {
        margin-top: 20px;
    }
</style>
