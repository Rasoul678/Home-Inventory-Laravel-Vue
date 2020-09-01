<template>
    <div >
        <div class="text-center my-3">
            <a class="cursor-pointer text-xl" @click="toggleMap">
                <span v-if="!showMap">
                    Show Addresses <i class="fa fa-chevron-down"></i>
                </span>
                <span v-else>
                    Hide Addresses <i class="fa fa-chevron-up"></i>
                </span>
            </a>
        </div>
        <l-map
            v-if="showMap"
            :zoom="zoom"
            :center="center"
            :options="mapOptions"
            :class="classes"
            style="height: 400px; width: 100%"
            @update:center="centerUpdate"
            @update:zoom="zoomUpdate"
        >
            <l-tile-layer
                :url="url"
                :attribution="attribution"
            />
            <l-marker v-for="item in markers" :key="item.address.id" :lat-lng="item.marker">
                <l-popup>
                    <div class="font-bold text-md cursor-pointer" @click="setAddress(item.address)">
                        {{ item.address.state.name }} - {{ item.address.city }} - {{ item.address.zipcode }}
                    </div>
                </l-popup>
            </l-marker>
        </l-map>
    </div>
</template>

<script>
import { latLng } from "leaflet";
import { LPopup, LTooltip } from "vue2-leaflet";
import swal from "sweetalert";

export default {
    props: ['addresses'],

    components: { LPopup, LTooltip },
    data() {
        return {
            classes: `border-2 ${this.addresses.length ? 'border-black' : 'border-red-500'} rounded`,
            zoom: 3,
            center: latLng(37.71859, -100.37017),
            url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
            markers: [],
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

        setAddress(address){
            this.$emit('add', address.id)
        },

        toggleMap(){
            this.showMap = !this.showMap;
            if(this.addresses.length === 0 && this.showMap){
                swal({
                    title: "No Addresses!",
                    text: "Add some Addresses.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                })
                    .then((willAdd) => {
                        if (willAdd) {
                            window.location.href = '/addresses/create';
                        } else {
                            swal("You can do it later. enjoy!", {
                                icon: 'success'
                            });
                        }
                    });
            }
        }

    },

    mounted() {
        const markers = [];
        this.addresses.forEach((address) => {
            markers.push({address, marker: latLng(address.latitude, address.longitude)})
        })

        this.markers = markers;
    }
};
</script>
