<template>
  <div id="rvmp-testimonials-section-1" class="bg-red-900" v-if="posts.length>0">
            <div class="uppercase text-center" id="rvmp-testimonial-heading">
                <span class="border-b-4 rvmp-brand-border-highlight text-xl font-bold pb-2.5">Our Client's Testimonial</span>
            </div>
            <div class="overflow-x-hidden 2xl:px-40 xl:px-20 lg:px-10 px-5" id="rvmp-testimonial-content">
                <Carousel :settings="settings" :breakpoints="breakpoints" :wrapAround="true" :mouseDrag="true">
                    <Slide v-for="(post,index) in posts" :key="post" :index="index">
                        <div class="carousel__item m-4 w-full h-auto shadow-md rounded-md bg-gray-50 text-center flex flex-col space-y-3 ">
                            <img :src="post.image_url" class="rounded-t-md"/>
                            <div class="p-4 testimonial-content space-y-3">
                                <p class="w-full text-center ratings text-yellow-400 space-x-2 mb-0" v-html="post.stars">

                                </p>
                                <div class="brand-text italic text-xs text-center mb-0 font-light" v-html="post.content">

                                </div>
                                <p>
                                    <strong class="text-base font-semibold leading-3 mb-0 brand-text rvmp-footer-text capitalize block">{{post.client_name}}</strong>
                                    <span class="text-xs font-light leading-3 brand-text rvmp-footer-text capitalize">{{post.client_org}}</span>
                                </p>
                            </div>
                        </div>
                    </Slide>
                    <template #addons>
                        <Pagination />
                        <Navigation />
                    </template>
                </Carousel>
            </div>
        </div>
</template>
<script>
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
export default {
    name: "Testimonial",
    components: {
Carousel, Slide, Pagination, Navigation
    },
    props: [ "carouselSettings",
        "carouselBreakpoints",
        "carouselTestimonials"],
    setup(props, {}) {
        const settings = props.carouselSettings
        const breakpoints = props.carouselBreakpoints
        const posts = props.carouselTestimonials
        return{
            settings,breakpoints,posts
        }
	}
}
</script>