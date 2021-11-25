<template>
    <ul class="alert alert-danger" v-if="errors && Object.keys(errors).length > 0">
        <li v-for="error in errors" :key="error">{{error}}</li>
    </ul>
    <!-- <div class="alert alert-success" v-if="$page.props.flash.success">
        {{$page.props.flash}}
         {{$page.props.flash.success}}
    </div> -->
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert"  v-if="$page.props.flash.success">
        <p class="font-bold">{{$page.props.flash.success}}</p>
        <!-- <p class="text-sm">Some additional text to explain said message.</p> -->
    </div>
</template>

<script>
export default {
    name: "ErrorsAndMessages",
    props: ["errors"],
    
}
</script>

<style scoped>

</style>
