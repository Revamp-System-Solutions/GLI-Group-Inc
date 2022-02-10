<template>
    <div class="container mx-auto bg-transparent px-6">
        <div class=" lg:grid lg:grid-cols-5 border-t-2 rvmp-brand-border-highlight items-center bg-transparent">
            <div class="col-span-2 w-full lg:text-left text-center  lg:py-6 py-3 relative bg-transparent">
                <p class="text-sm rvmp-footer-text font-semibold mb-2 brand-logo-text inline-block">
                   <span class="inline-block uppercase"> © {{ new Date().getFullYear() }} | GLI <span class='font-light'>Group Inc.</span></span> <span class="brand-text font-light lg:inline-block block">by Revamp System Solutions</span>
                </p>
            </div>
            <div class="lg:col-span-3 col-span-1 w-full brand-text font-light lg:text-right text-center lg:py-6 relative bg-transparent text-sm">
                <a href="#" class="px-3 lg:inline-block block">Privacy Policy</a>
                <a href="#" class="px-3 lg:inline-block block">Terms And Condition</a>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "MiniFooter",
    components:{

    },
    data: () => ({

  	}),
    setup() {


        return {

        }
    },
    mounted() {

    }

}
</script>
