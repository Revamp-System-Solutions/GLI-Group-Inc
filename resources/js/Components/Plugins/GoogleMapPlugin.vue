<template>
  <GMapMap
      :options="{zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: true,
                disableDefaultUi: false
              }"
      :api-key="apiKey"
      :center="{lat:center.lat, lng:center.lng}"
      :zoom="zoom"
      map-type-id="roadmap"
      class="w-full h-96 bg-cover bg-top bg-local"
  >
   <GMapMarker
        :key="marker.id"
        v-for="marker in markers"
        :position="marker.position"
    >
   
     <GMapInfoWindow class="!bg-gray-200">
        {{marker.title}}
    </GMapInfoWindow>
   </GMapMarker>
  </GMapMap>
</template>
<script>
import {reactive, ref} from "vue";
  export default {
    name: "GoogleMapPlugin",
    components:{    },
    props:['gli_guest_tools'],
    setup() {
        const apiKey = "AIzaSyA7fIoN1YCPH02jcPZuH4veHgs63Rb8mco"
        const center ={lat:9.2865474, lng:123.2556617}
        const zoom = 16.79
        const markers = [
                          {
                            id: 'dfsldjl3r',
                            title: 'We are here',
                            position: center,
                          }
                        ]
        return {
            apiKey,
            center,
            zoom,
            markers
        }
    },
    created(){
     for(var mTool of this.$parent.$page.props.gli_guest_tools.maps){
       mTool.short_name === 'gmap_key' ? this.apiKey =  mTool.value : (this.center ={lat:Number((JSON.parse(mTool.value)).lat), lng:Number((JSON.parse(mTool.value)).lng)})
     }
   }
  }
</script>