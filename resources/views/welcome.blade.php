<x-master>
    <div class="mt-32">
        @auth
            <div class="font-bold text-3xl md:text-6xl text-center">
                Hi, {{Auth::user()->name}}
            </div>
            <div class="text-center text-3xl md:text-6xl">
                Welcome to Inventory!
            </div>
        @else
            <div class="text-center">
                <h1 class="font-bold text-3xl md:text-6xl">Home Inventory App</h1>
                <h1 class="text-3xl md:text-6xl">Let's Manage Our Stuff!</h1>
            </div>
        @endauth
    </div>
</x-master>

