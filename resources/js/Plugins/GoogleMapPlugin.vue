<template>
  <GMapMap
      :api-key="apiKey"
      :center="center"
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
  export default {
    name: "GoogleMapPlugin",
    components:{    },
    setup() {
        const apiKey = "AIzaSyA7fIoN1YCPH02jcPZuH4veHgs63Rb8mco"
        const center = {lat:9.2865474, lng:123.2556617}
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
    mounted(){
  }
  }
</script>