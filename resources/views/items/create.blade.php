<x-master>
    <create-item
        :user="{{ Auth::user() }}"
        inline-template
    >
        <div class="grid grid-cols-8">
            <form v-on:submit.prevent="createItem()" class="col-start-1 col-span-8 md:col-start-2 md:col-span-6 mx-5">
                <h1 class="text-center text-2xl md:text-4xl my-2 font-bold">New Item</h1>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    <div>
                        <label for="name" class="text-md md:text-xl">Name:</label>
                        <input
                            v-model="itemName"
                            id="name"
                            name="name"
                            type="text"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                    </div>
                    <div>
                        <label for="length" class="text-md md:text-xl">Length:</label>
                        <input
                            v-model="itemLength"
                            id="length"
                            name="length"
                            type="number"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                    </div>
                    <div>
                        <label for="width" class="text-md md:text-xl">Width:</label>
                        <input
                            v-model="itemWidth"
                            id="width"
                            name="width"
                            type="number"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                    </div>
                    <div>
                        <label for="heigth" class="text-md md:text-xl">Height:</label>
                        <input
                            v-model="itemHeight"
                            id="height"
                            name="height"
                            type="number"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                    </div>
                    <div>
                        <label for="volume" class="text-md md:text-xl">Volume:</label>
                        <input
                            v-model="itemVolume"
                            id="volume"
                            name="volume"
                            type="number"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                    </div>
                    <div>
                        <label for="type" class="text-md md:text-xl">Type:</label>
                        <select
                            v-model="itemType"
                            name="type_id"
                            id="type"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                            <option value="">Select...</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="company" class="text-md md:text-xl">Company:</label>
                        <select
                            v-model="itemCompany"
                            name="company_id"
                            id="company"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                            <option value="">Select...</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="shape" class="text-md md:text-xl">Shape:</label>
                        <select
                            v-model="itemShape"
                            name="shape_id"
                            id="shape"
                            class="border-2 p-2 rounded border-black w-full"
                            required
                        >
                            <option value="">Select...</option>
                            @foreach($shapes as $shape)
                                <option value="{{ $shape->id }}">{{ $shape->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-5">
                    <label for="description" class="text-md md:text-xl">Description:</label>
                    <textarea
                        v-model="itemDescription"
                        id="description"
                        name="description"
                        rows="3"
                        class="border-2 p-2 rounded border-black w-full"
                    ></textarea>
                </div>
                <button type="submit" class="mt-5 p-2 bg-teal-400 w-full rounded text-xl font-bold">Create</button>
            </form>
        </div>
    </create-item>
</x-master>
