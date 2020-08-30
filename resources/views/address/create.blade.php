<x-master>
    <create-address inline-template>
        <div class="grid grid-cols-8">
            <form v-on:submit.prevent="createAddress()" class="col-start-2 col-span-6 md:col-start-3 md:col-span-4">
                <h1 class="text-center text-2xl md:text-4xl my-10 font-bold">New Address</h1>
                <div class="my-2">
                    <label for="street-1" class="text-md md:text-xl">Street Address 1:</label>
                    <input
                        v-model="address_1"
                        name="street_address_1"
                        id="street-1"
                        type="text"
                        class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                        required
                    >
                </div>
                <div class="my-2">
                    <label for="street-2" class="text-md md:text-xl">Street Address 2:</label>
                    <input
                        v-model="address_2"
                        name="street_address_2"
                        id="street-2"
                        type="text"
                        class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                    >
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                    <div>
                        <label for="country" class="text-md md:text-xl">Country:</label>
                        <select
                            @change="setStates()"
                            v-model="selectedCountry"
                            name="country_id"
                            id="country"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                            <option value="">Select...</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="state" class="text-md md:text-xl">State:</label>
                        <select
                            v-model="selectedState"
                            name="state_id"
                            id="state"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                            <option value="">Select...</option>
                            <option v-for="state in states" v-text="state.name" v-bind:value="state.id"></option>
                        </select>
                    </div>
                    <div>
                        <label for="city" class="text-md md:text-xl">City:</label>
                        <input
                            v-model="city"
                            name="city"
                            id="city"
                            type="text"
                            class="border-2 p-1 px-2 rounded border-black w-full"
                            required
                        >
                    </div>
                    <div>
                        <label for="zipcode" class="text-md md:text-xl">Zipcode:</label>
                        <input
                            v-model="zipcode"
                            name="zipcode"
                            id="zipcode"
                            type="text"
                            class="border-2 p-1 px-2 rounded border-black w-full"
                            required
                        >
                    </div>
                </div>
                <map-address @latlng="setLatLng"></map-address>
                <button type="submit" class="mt-5 p-2 bg-teal-400 w-full rounded text-xl font-bold">Create</button>
            </form>
        </div>
    </create-address>
</x-master>
