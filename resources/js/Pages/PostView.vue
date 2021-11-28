<template>
    <app-header></app-header>
    <div class="mx-auto h-full lg:px-36 px-2">
            <errors-and-messages :errors="errors"></errors-and-messages>
                <h2 class="text-left">{{form.title}}</h2>
                <p>
                    {{form.content}}
                </p>
                    <img :src="image_url" width="150"  v-if="image_url" />
    </div>
    <app-footer></app-footer>
</template>

<script>
import AppHeader from "../Partials/AppHeader";
import AppFooter from "../Partials/AppFooter";
import ErrorsAndMessages from "../Partials/ErrorsAndMessages";
import {inject, reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "ViewPost",
    components: {
        ErrorsAndMessages,
        AppHeader,
        AppFooter
    },
    props: {
        errors: Object
    },
    setup() {
        const form = reactive({
            title: null,
            content: null,
            image: null,
            _token: usePage().props.value.csrf_token,
            _method: "PUT"
        });

        // retrieve post prop
        const {title, content, image_url, id } = usePage().props.value.post;
        form.title = title;
        form.content = content;

        const route = inject('$route');

        function selectFile($event) {
            form.image = $event.target.files[0];
        }

        function submit() {
            Inertia.post(route('post.update', {'id': id}), form, {
                forceFormData: true
            });
        }

        return {
            form, submit, selectFile, image_url
        }
    }
}
</script>

<style scoped>
    form {
        margin-top: 20px;
    }
</style>
