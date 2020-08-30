<x-master>
    <show-item inline-template>
        <div>
            <div class="text-center text-4xl font-bold my-5">{{ $item->name }}</div>
            <div class="grid grid-cols-12">
                <form
                    method="POST"
                    action="{{ route('items.upload', $item) }}"
                    class="col-start-2 col-span-10 sm:col-start-3 sm:col-span-8 grid md:col-start-4 md:col-span-6 grid grid-cols-12 gap-2"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <input
                        type="file"
                        name="image_url"
                        class="bg-gray-900 rounded text-white col-span-12 sm:col-span-8 "
                    >
                    <button type="submit" class="bg-blue-600 px-3 py-1 rounded text-white col-span-12 sm:col-span-4 inline-block">Upload Image</button>
                </form>
            </div>
        </div>
    </show-item>
</x-master>
