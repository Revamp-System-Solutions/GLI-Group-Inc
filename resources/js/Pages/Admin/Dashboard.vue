<template>
<errors-and-messages :errors="errors"></errors-and-messages>
<div class="flex">
    <app-header-small></app-header-small>
    <div class="flex flex-row">
        <div id="content-area" class="w-full  h-auto bg-gray-50">
            <div class="h-screen">
                    DASHBOARD HERE
            </div>
        </div>
    </div>
</div>
</template>

<script>
import AppHeaderSmall from '../../Partials/AppHeaderSmall';
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";

export default {
    name: "Admin",
    components: {
        ErrorsAndMessages,

        AppHeaderSmall
    },
    props: {
        errors: Object
    },

}
</script>

