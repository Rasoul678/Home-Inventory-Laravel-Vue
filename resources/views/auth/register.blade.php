<x-master>
    <h1 class="text-4xl text-center my-6">
        Register
    </h1>
    <div class="grid grid-cols-6 justify-center">
        <form method="POST" action="{{ route('register') }}" class="col-start-2 col-span-4 md:col-start-3 md:col-span-2">
            @csrf

            <div class="my-4">
                <label for="name" class="font-bold">{{ __('Name') }}</label>
                <input
                    id="name"
                    type="text"
                    class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                    name="name"
                    required
                    autofocus>

            </div>

            <div class="my-4">
                <label for="email" class="font-bold">{{ __('E-Mail') }}</label>
                <input
                    id="email"
                    type="email"
                    class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                    name="email"
                    required>

            </div>
            <div class="my-4">
                <label for="password" class="font-bold">{{ __('Password') }}</label>
                <input
                    id="password"
                    type="password"
                    class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                    name="password"
                    required>

            </div>
            <div class="my-4">
                <label for="password-confirm" class="font-bold">{{ __('Confirm Password') }}</label>
                <input
                    id="password-confirm"
                    type="password"
                    class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                    name="password_confirmation"
                    required>
            </div>

            <div class="my-6 text-center">
                <button type="submit" class="py-1 px-6 bg-teal-400 border-2 border-black w-full rounded mr-4 text-xl">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-master>
