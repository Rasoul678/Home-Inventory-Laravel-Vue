<x-master>
    <create-company inline-template>
        <div class="grid grid-cols-8">
            <form v-on:submit.prevent="createCompany()" class="col-start-2 col-span-6 md:col-start-3 md:col-span-4">
                <h1 class="text-center text-2xl md:text-4xl my-5 font-bold">New Company</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 xl:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="text-md md:text-xl">Company Name:</label>
                        <input
                            v-model="companyName"
                            name="name"
                            id="name"
                            type="text"
                            class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                            required
                        >
                    </div>
                    <div>
                        <label for="email" class="text-md md:text-xl">Company Email:</label>
                        <input
                            v-model="companyEmail"
                            name="email"
                            id="email"
                            type="email"
                            class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                        >
                    </div>
                </div>
                <div class="mt-5">
                    <label for="description" class="text-md md:text-xl">Description</label>
                    <textarea
                        v-model="companyDescription"
                        class="w-full border-2 border-black rounded p-5 bg-gray-800 text-white"
                        name="description"
                        id="description"
                        placeholder="Describe the Company"
                        rows="3"></textarea>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4 mt-5">
                    <div>
                        <label for="type" class="text-md md:text-xl">Type:</label>
                        <select
                            v-model="companyType"
                            name="type"
                            id="type"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                            <option value="">Select...</option>
                            <option value="retailer">Retailer</option>
                            <option value="producer">Producer</option>
                        </select>
                    </div>
                    <div>
                        <label for="logo" class="text-md md:text-xl">Logo Url:</label>
                        <input
                            v-model="companyLogo"
                            name="logo_url"
                            id="logo"
                            type="url"
                            class="border-2 p-1 px-2 rounded border-black w-full"
                        >
                    </div>
                    <div>
                        <label for="website" class="text-md md:text-xl">Website Url:</label>
                        <input
                            v-model="companyWebsite"
                            name="website_url"
                            id="website"
                            type="url"
                            class="border-2 p-1 px-2 rounded border-black w-full"
                        >
                    </div>
                </div>
                <map-company v-bind:addresses="{{ $addresses }}" @add="setAddress"></map-company>
                <button type="submit" class="mt-5 p-2 bg-teal-400 w-full rounded text-xl font-bold">Create</button>
            </form>
        </div>
    </create-company>
</x-master>
