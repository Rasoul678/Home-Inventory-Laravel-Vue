<x-master>
    <div class="bg-blue-400 py-4">
        <div class="flex justify-end mx-12">
            @if (Route::has('login'))
                <div class="font-bold">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="mr-6" href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <div class="font-bold text-6xl text-center">
        Laravel
    </div>
    <example-component/>
</x-master>

