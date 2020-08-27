<template>
    <div >
        <div class="text-center my-3">
            <a class="cursor-pointer text-xl" @click="showMap = !showMap">
                <span v-if="!showMap">
                    Show Map <i class="fa fa-chevron-down"></i>
                </span>
                <span v-else>
                    Hide Map <i class="fa fa-chevron-up"></i>
                </span>
            </a>
        </div>
        <l-map
            v-if="showMap"
            :zoom="zoom"
            :center="center"
            :options="mapOptions"
            class="border-2 border-black rounded"
            style="height: 400px; width: 100%"
            @update:center="centerUpdate"
            @update:zoom="zoomUpdate"
            @contextmenu="makeMarker($event)"
        >
            <l-tile-layer
                :url="url"
                :attribution="attribution"
            />
            <l-marker :lat-lng="withPopup">
                <l-popup>
                    <div class="font-bold text-xl">
                        Pin an address on the map
                    </div>
                </l-popup>
            </l-marker>
        </l-map>
    </div>
</template>

<script>
import { latLng } from "leaflet";
import { LPopup, LTooltip } from "vue2-leaflet";

export default {
    components: { LPopup, LTooltip },
    data() {
        return {
            zoom: 3,
            center: latLng(37.71859, -100.37017),
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            withPopup: latLng(43.58039, -102.76982),
            currentZoom: 11.5,
            currentCenter: latLng(47.41322, -1.219482),
            mapOptions: {
                zoomSnap: 0.5
            },
            showMap: false
        };
    },

    methods: {
        zoomUpdate(zoom) {
            this.currentZoom = zoom;
        },

        centerUpdate(center) {
            this.currentCenter = center;
        },

        makeMarker(event){
            this.withPopup = latLng(event.latlng.lat, event.latlng.lng);
            this.$emit('latlng', event.latlng)
        }
    }
};
</script>
