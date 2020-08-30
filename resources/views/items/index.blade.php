<x-master>
    <items v-bind:items="{{$items}}" inline-template>
        <div class="m-5 md:m-10">
            <div class="flex justify-between align-items-center">
                <span class="text-center text-2xl md:text-4xl font-bold">All Items</span>
                <a href="{{ route('items.create') }}" class="text-xl md:text-2xl bg-green-400 px-5 py-2 rounded inline-block">New Item</a>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 mt-5 gap-6">
                @forelse($items as $item)
                    <div id="container" class="h-64 p-3 relative">
                        <div id="card"  class="bg-blue-400 absolute top-0 left-0 w-full h-full rounded" style="transform-style: preserve-3d; transition: all 0.5s ease;">
                            <div id="front" class="absolute w-full h-full" style="backface-visibility: hidden">
                                @if($item->images->first())
                                    <img src="storage/{{ $item->images()->first()->image_url }}" alt="image" class="h-full rounded w-full">
                                @else
                                    <img src="https://picsum.photos/id/237/300/250" alt="image" class="h-full rounded w-full">
                                @endif
                            </div>
                            <div id="back" class="absolute w-full h-full" style="backface-visibility: hidden; transform: rotateY(180deg)">
                                <div>
                                    <a href="{{ route('items.show', $item->name) }}" class="text-center text-2xl md:text-3xl block">{{ $item->name }}</a>
                                    <div class="flex justify-between bg-gray-300 w-11/12 rounded m-auto p-2">
                                        <span>Company: </span>
                                        <span>{{ $item->company->name }}</span>
                                    </div>
                                    <div class="flex justify-between bg-gray-300 w-11/12 rounded m-auto p-2 mt-2">
                                        <span>Type: </span>
                                        <span>{{ $item->type->name }}</span>
                                    </div>
                                    <div class="flex justify-between bg-gray-300 w-11/12 rounded m-auto p-2 mt-2">
                                        <span>Added by: </span>
                                        <span>{{ $item->user->name }}</span>
                                    </div>
                                    <div class="flex justify-between bg-gray-300 w-11/12 rounded m-auto p-2 mt-2">
                                        <span>Added at: </span>
                                        <span>{{ $item->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-2xl md:text-4xl text-center bg-teal-400 rounded py-5">There is no item yet!</div>
                @endforelse
            </div>
        </div>
    </items>
</x-master>
