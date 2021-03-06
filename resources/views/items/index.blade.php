<x-master>
    <items :user="{{ Auth::user() }}" v-bind:items="{{$items}}" inline-template>
        <div class="m-5 md:m-10">
            <div class="grid grid-cols-2 sm:mx-10">
                <div class="text-center sm:text-left text-2xl md:text-4xl font-bold col-span-2 sm:col-span-1 mt-5 mb-10 sm:my-1">
                    All Items
                </div>
                @can('create', \App\Item::class)
                    <div class="text-right my-auto col-span-2 sm:col-span-1">
                        <a
                            href="{{ route('items.create') }}"
                            class="text-center text-xl md:text-2xl bg-green-400 px-5 py-2 rounded inline-block w-full sm:w-auto"
                        >
                            Add New Item
                        </a>
                    </div>
                @endcan
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 mt-5 gap-4">
                @forelse($items as $item)
                    <div id="container" class="h-64 w-64 p-3 relative m-auto">
                        <div id="card"  class="bg-blue-400 absolute top-0 left-0 w-full h-full rounded" style="transform-style: preserve-3d; transition: all 0.5s ease;">
                            <div id="front" class="absolute w-full" style="backface-visibility: hidden">
                                @if($item->images->first())
                                    <img src="{{ $item->images()->first()->image_url }}" alt="{{ $item->name }}" class="h-full rounded w-full border-2 border-black">
                                @else
                                    <img src="https://picsum.photos/id/237/300/300" alt="image" class="h-full rounded w-full">
                                @endif
                            </div>
                            <div id="back" class="absolute w-full h-full" style="backface-visibility: hidden; transform: rotateY(180deg)">
                                <div>
                                    <a href="{{ route('items.show', $item->name) }}" >
                                        <div class="text-center text-2xl md:text-3xl block">{{ $item->name }}</div>
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
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-4 text-4xl md:text-4xl text-center bg-gray-800 text-gray-200 rounded-full shadow w-48 h-48 py-16 m-auto mt-20">No Item!</div>
                @endforelse
            </div>
        </div>
    </items>
</x-master>
