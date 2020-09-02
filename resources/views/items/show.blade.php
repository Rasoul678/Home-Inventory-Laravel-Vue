<x-master>
    <show-item :item="{{ $item }}" inline-template>
        <div class="bg-gray-800 text-white w-11/12 md:w-10/12 px-2 py-3 md:p-10 mt-10 m-auto rounded">
            <div class="grid grid-cols-8 py-5">
                <div class="text-center md:text-left text-4xl font-bold col-span-8 md:col-span-6 xl:col-span-7">{{ $item->name }}</div>
                <div class="flex justify-around col-span-8 md:col-span-2 xl:col-span-1 p-3">
                    <div>
                        <form method="POST" action="{{ route('items.destroy', $item) }}" class="mr-2">
                            @method('DELETE')
                            @csrf
                            <button class="bg-red-500 px-3 py-1 rounded">Delete</button>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('items.edit', $item) }}">
                            <button class="bg-teal-300 px-3 py-1 rounded text-black">Edit</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-2 rounded p-3">
                <h1 class="text-xl md:text-3xl text-center font-bold">Products:</h1>
                <div class="overflow-x-scroll md:overflow-visible">
                    <table class="w-full mt-5">
                        @if($item->products()->count() > 0)
                            <thead>
                            <tr class="text-center">
                                <th class="px-2">#</th>
                                <th class="px-2">Buyer</th>
                                <th class="px-2">Retailer</th>
                                <th class="px-2">Inventory</th>
                                <th class="px-2" style="min-width: 120px">Purchase</th>
                                <th class="px-2" style="min-width: 130px">Expiration</th>
                            </tr>
                            </thead>
                        @else
                            <div class="text-center text-md md:text-2xl my-3">There Is No Products, Yet!</div>
                        @endif
                        @foreach($item->products as $product)
                            <tbody>
                            <tr class="text-center text-sm">
                                <td class="border px-2">{{ $loop->iteration }}</td>
                                <td class="border px-2">{{ $product->buyer->name }}</td>
                                <td class="border px-2">{{ $product->retailer->name }}</td>
                                <td class="border px-2">{{ $product->inventoryLocation->name }}</td>
                                <td class="border px-2">{{ $product->purchase_date->diffForHumans() }}</td>
                                <td class="border">{{ $product->expiration_date->diffForHumans() }}</td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="text-center mt-10">
                    <a href="{{ route('products.create', $item) }}" class="bg-blue-500 inline-block m-auto px-5 py-2 rounded">Add Product</a>
                </div>
            </div>
            <div class="border-2 rounded mt-5 p-3">
                <h1 class="text-xl md:text-3xl text-center font-bold mb-5">Images:</h1>
                <div class="grid grid-cols-12">
                    <form
                        @submit.prevent="uploadImage"
                        class="col-start-1 col-span-12 sm:col-start-2 sm:col-span-10 md:col-start-3 md:col-span-8 xl:col-start-4 xl:col-span-6  grid grid-cols-12 gap-2"
                    >
                        <input
                            type="file"
                            name="item-image"
                            accept="image/*"
                            class="rounded border col-span-12 sm:col-span-8 "
                        >
                        <button type="submit" class="bg-blue-500 px-3 py-1 rounded text-white col-span-12 sm:col-span-4 inline-block">Upload Image</button>
                    </form>
                </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-2 mt-5">
                        <div v-for="avatar in avatars" class="h-48 relative">
                            <button
                                @click="deleteImage(avatar.id)"
                                title="Delete Image"
                                class="bg-red-400 opacity-0 absolute inset-0 text-center w-full rounded text-black hover:opacity-75 text-xl">
                                <i class="fa fa-trash text-4xl"></i>
                            </button>
                            <img
                                class="h-full rounded m-auto"
                                :src="avatar.image_url"
                                alt="{{ $item->name }}"
                                title="{{ $item->name }}"
                            >
                        </div>
                    </div>
            </div>
        </div>
    </show-item>
</x-master>
