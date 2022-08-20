<template>
   <div class="h-auto 2xl:px-40 xl:px-16 lg:px-8" id="rvmp-lead-section-1">
            <div class="flex lg:flex-row flex-col-reverse h-auto z-0 relative">
                <div class="lg:w-2/6 w-full lg:h-3/4 h-full lg:py-32 lg:pl-0 p-6 lg:static absolute lg:bg-transparent rvmp-bg-main lg:bg-opacity-0 bg-opacity-80">
                    <div class="lg:py-36 lg:my-12 lg:static">
                        <div class="lg:rvmp-bg-main lg:bg-opacity-70 lg:absolute lg:top-0 xl:pr-32 lg:pr-28 lg:py-16 lg:my-20 xl:w-2/5 lg:w-1/2 w-full lg:space-y-10 space-y-5">
                        <blockquote className="self-start border-l-8 rvmp-brand-border-highlight lg:my-2" id="rvmp-lead-heading">
                                <h1 class="px-5 brand-text uppercase lg:mt-0 mt-8 xl:text-3xl text-xl font-bold" v-html="page_data.lead_text">
                                   
                                </h1>
                            </blockquote>
                            <div class="font-light italic lg:mt-20 lg:mb-10" id="rvmp-lead-text" >
                                {{page_data.lead_sub_text}}
                            </div>
                            <div class="space-x-5 flex lg:justify-start justify-center" id="rvmp-lead-cta">
                                <a :href="page_data.lead_btn1_slug" target="_blank" class="rvmp-brand-bg-main text-white px-4 py-1.5 hover:rvmp-brand-bg-darker transition ease-in-out duration-300">{{page_data.lead_btn1_text}}</a>
                                <inertia-link :href="page_data.lead_btn2_slug" class="px-4 py-1.5 text-gray-500 border-2 border-gray-500 hover:border-gray-700 transition ease-in-out duration-300">{{page_data.lead_btn2_text}}</inertia-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-4/6 w-full lg:h-auto h-96 static bg-origin-border bg-cover bg-no-repeat bg-center bg-local" id="rvmp-lead-image" style="background-image: url('/images/pages/section-1.jpg')" >&nbsp;</div>
            </div>
        </div>
</template>
<script>

export default {
    name: "LeadBanner",
    components: {

    },
    props: ['leadBannerData'],
    setup(props, {}) {
        const page_data = props.leadBannerData

        return{
            page_data
        }
	},
    computed:{
        bgString(){
           return `background-image: url('${this.page_data.lead_display_image}')`
        }
    }
}
</script>