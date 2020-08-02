<div class="bg-blue-400 py-4">
    <div class="flex justify-between font-bold mx-12">
        <div>
            <a class="bg-blue-300 py-2 px-4 border rounded-full" href="{{ url('/') }}">Home</a>
            <span class="text-xl">Inventory</span>
        </div>
        <div>
            @auth
                <a href="#" class="mr-2 bg-green-400 py-2 px-4 border rounded-full">
                    {{ Auth::user()->name }}
                </a>
                <a href="{{ route('logout') }}"
                   class="bg-red-400 py-2 px-4 border rounded-full"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a class="mr-2 bg-orange-400 py-2 px-4 border rounded-full" href="{{ route('login') }}">Login</a>
                <a class="bg-orange-400 py-2 px-4 border rounded-full" href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</div>
