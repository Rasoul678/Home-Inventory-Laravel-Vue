<x-master>
    <h1 class="text-4xl text-center my-6">
        Login
    </h1>
    <div class="grid grid-cols-6 justify-center">
        <form method="POST" action="{{ route('login') }}" class="col-start-2 col-span-4 md:col-start-3 md:col-span-2">
            @csrf

            <div class="my-4">
                <label for="email" class="font-bold">{{ __('E-Mail') }}</label>
                <input
                    id="email"
                    type="email"
                    class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    autofocus>
            </div>
            <div class="my-4">
                <label for="password" class="font-bold">{{ __('Password') }}</label>
                <input
                    id="password"
                    type="password"
                    class="border-2 border-black rounded-md py-1 px-2 w-full text-xl"
                    name="password"
                    required
                    autocomplete="current-password">
            </div>
{{--            <div class="my-4 text-center">--}}
{{--                <input--}}
{{--                    type="checkbox"--}}
{{--                    name="remember"--}}
{{--                    id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                <label for="remember" class="font-bold">--}}
{{--                    {{ __('Remember Me') }}--}}
{{--                </label>--}}
{{--            </div>--}}
            @error('password')
            <p class="text-red-400">
                <strong>{{ $message }}</strong>
            </p>
            @enderror
            <div class="my-8 text-center">
                <button type="submit" class="py-1 px-6 bg-teal-400 border-2 border-black w-full rounded mr-4 text-xl">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</x-master>
