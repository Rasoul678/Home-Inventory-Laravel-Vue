<div class="bg-gray-800 shadow-2xl py-2">
    <div class="flex justify-between items-center font-bold mx-4 md:mx-10">
        <div>
            @auth
                <a class="text-white text-3xl md:text-4xl mr-2" href="{{ route('items.index') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a>
            @endauth
        </div>
        <div>
            @auth
                <a href="/profile" class="mr-3 text-white text-3xl md:text-4xl" title="{{ Auth::user()->name }}">
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </a>
                <a href="{{ route('logout') }}"
                   class="text-3xl md:text-4xl text-white"
                   title="logout"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a class="text-3xl md:text-4xl text-white" href="{{ route('register') }}" title="register">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </a>
                <a class="ml-3 text-3xl md:text-4xl text-white" href="{{ route('login') }}" title="login">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                </a>
            @endauth
        </div>
    </div>
</div>
