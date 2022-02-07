<template>
    <app-header />
    <div class="rvmp-container h-full bg-gray-100">
        <div class="h-auto 2xl:px-80 xl:px-56 lg:px-28 py-4 px-4">
            <h1 class="text-4xl text-center mb-4">
                Thank you for reaching out to us! We will get in touch with you
                as soon as we can.
            </h1>
            <p class="text-center">
                You will automatically be redirected to the home page.
            </p>
        </div>
    </div>
    <app-footer-small />
</template>

<script>
import AppHeader from "../Partials/AppHeader";
import AppFooterSmall from "../Partials/AppFooterSmall";
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "Thank you",
    components: {
        AppHeader,
        AppFooterSmall,
    },
    created() {
        setTimeout(() => Inertia.visit("/"), 5000);
    },
};
</script>
