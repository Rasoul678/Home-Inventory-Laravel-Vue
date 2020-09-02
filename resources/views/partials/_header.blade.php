<div class="bg-gray-800 shadow-2xl py-2">
    <div class="flex justify-between items-center font-bold mx-4 md:mx-10">
        <div class="flex justify-between items-center">
            @auth
                <a class="text-white text-3xl md:text-4xl mr-5" href="{{ route('items.index') }}" title="Home">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a>
                @can('create', \App\Address::class)
                    <a class="text-white text-2xl md:text-3xl mr-5" href="{{ route('address.create') }}" title="Add Address">
                        <i class="fa fa-street-view"></i>
                    </a>
                @endcan
                @can('create', \App\Company::class)
                    <a class="text-white text-xl md:text-2xl" href="{{ route('company.create') }}" title="Add Company">
                        <i class="fa fa-shopping-bag"></i>
                    </a>
                @endcan
            @endauth
        </div>
        <div>
            @auth
                <a
                    href="{{ route('profiles.show', auth()->user()->name) }}"
                    class="mr-3 text-white text-3xl md:text-4xl"
                    title="{{ Auth::user()->name }}"
                >
                    @if(auth()->user()->avatar_url)
                        <img
                            class="rounded-full border-2 border-black w-12 inline"
                            src="{{ auth()->user()->avatar_url }}"
                            alt="{{ auth()->user()->name }}">
                    @else
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    @endif
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
