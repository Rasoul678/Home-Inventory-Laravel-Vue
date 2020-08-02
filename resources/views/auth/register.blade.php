<x-master>
    <div class="grid justify-center">
        <h1 class="text-4xl text-center my-10">{{ __('Register') }}</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="my-4 flex justify-between">
                <label for="name" class="">{{ __('Name') }}</label>
                <input
                    id="name"
                    type="text"
                    class="border-2 border-black rounded-md p-1"
                    name="name"
                    required
                    autofocus>

            </div>

            <div class="my-4 flex justify-between">
                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                <input
                    id="email"
                    type="email"
                    class="border-2 border-black rounded-md p-1"
                    name="email"
                    required>

            </div>
            <div class="my-4 flex justify-between">
                <label for="password" class="">{{ __('Password') }}</label>
                <input
                    id="password"
                    type="password"
                    class="border-2 border-black rounded-md p-1"
                    name="password"
                    required>

            </div>
            <div class="my-4 flex justify-between">
                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                <input
                    id="password-confirm"
                    type="password"
                    class="border-2 border-black rounded-md p-1"
                    name="password_confirmation"
                    required>
            </div>

            <div class="my-3 text-center">
                <button type="submit" class="py-1 px-6 bg-green-300 border-2 border-black w-full rounded-full mr-4">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-master>
