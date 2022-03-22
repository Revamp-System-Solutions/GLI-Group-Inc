<template>
    <iframe class="w-full h-96 bg-cover bg-top bg-local" id="gmap_canvas" src="https://maps.google.com/maps?q=GLI%20Group%20Inc.,%20Unit%203,%20Uypitching%20Building,%20Km.%208%20Jose%20Romero%20Road,%20Valencia,%206215%20Negros%20Oriental&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
  <!-- <GMapMap
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
  </GMapMap> -->
</template>
<script>
import {usePage} from "@inertiajs/inertia-vue3";
  export default {
    name: "GoogleMapPlugin",
    components:{    },
    props:[],
    setup() {
  
      let maps = JSON.parse(usePage().props.value.gli_guest_tools.maps[0].value)
          console.log(maps)
        const apiKey = maps['0_api_key']
        const center ={lat:maps['pin_position_latitude'], lng:maps['pin_position_longitude']}
        const zoom = maps['zoom']
        const markers = [
                          {
                            id: 'dfsldjl3r',
                            title: maps['0_pin_information'],
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
 
   }
  }
</script>