<x-master>
    <div class="grid grid-cols-8">
        <form
            method="POST"
            action="{{ route('products.store', $item) }}"
            class="col-start-1 col-span-8 md:col-start-2 md:col-span-6 mx-5"
        >
            @csrf
            <h1 class="text-center text-2xl md:text-4xl my-2 font-bold">New Product</h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                <div>
                    <label for="purchase" class="text-md md:text-xl">Purchase Date:</label>
                    <input
                        id="purchase"
                        name="purchase_date"
                        type="date"
                        class="border-2 p-2 rounded border-black w-full"
                        required
                    >
                </div>
                <div>
                    <label for="expiration" class="text-md md:text-xl">Expiration Date:</label>
                    <input
                        id="expiration"
                        name="expiration_date"
                        type="date"
                        class="border-2 p-2 rounded border-black w-full"
                    >
                </div>
                <div>
                    <label for="price" class="text-md md:text-xl">Purchase Price:</label>
                    <input
                        id="price"
                        name="purchase_price"
                        type="number"
                        class="border-2 p-2 rounded border-black w-full"
                        required
                    >
                </div>
                <div>
                    <label for="msrp" class="text-md md:text-xl">MSRP:</label>
                    <input
                        id="msrp"
                        name="msrp"
                        type="number"
                        class="border-2 p-2 rounded border-black w-full"
                    >
                </div>
                <div>
                    <label for="retailer" class="text-md md:text-xl">Retailer:</label>
                    <select
                        name="retailer_id"
                        id="retailer"
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
                    <label for="location" class="text-md md:text-xl">Location:</label>
                    <select
                        name="inventory_location_id"
                        id="location"
                        class="border-2 p-2 rounded border-black w-full"
                        required
                    >
                        <option value="">Select...</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="mt-5 p-2 bg-teal-400 w-full rounded text-xl font-bold">Create</button>
        </form>
    </div>
</x-master>
