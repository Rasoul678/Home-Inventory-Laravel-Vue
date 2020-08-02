<x-master>
    @auth
        <div class="font-bold text-6xl text-center">
          Hi, {{Auth::user()->name}}
        </div>
    <example-component v-bind:user="{{ Auth::user() }}"></example-component>
    @else
        <div class="font-bold text-6xl text-center">
            Home Inventory
        </div>
        <div class="text-center text-6xl">
            Please Log in.
        </div>
    @endauth
</x-master>

