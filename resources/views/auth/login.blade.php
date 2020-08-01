<x-master>
    <div class="grid justify-center">
        <h1 class="text-4xl text-center my-10">{{ __('Login') }}</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="my-4">
                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                <input
                    id="email"
                    type="email"
                    class="border-2 border-black rounded-md p-1"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    autofocus>

                @error('email')
                <span class="text-red-400">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="my-4 flex justify-between">
                <label for="password" class="">{{ __('Password') }}</label>
                <input
                    id="password"
                    type="password"
                    class="border-2 border-black rounded-md p-1"
                    name="password"
                    required
                    autocomplete="current-password">
                @error('password')
                <span class="text-red-400">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div class="my-4 text-center">
                <input
                    type="checkbox"
                    name="remember"
                    id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <div class="my-3 text-center">
                <button type="submit" class="py-1 px-6 bg-green-300 border-2 border-black w-full rounded-full mr-4">
                    {{ __('Login') }}
                </button>
{{--                @if (Route::has('password.request'))--}}
{{--                    <a href="{{ route('password.request') }}" class="text-blue-700">--}}
{{--                        {{ __('Forgot Your Password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}
            </div>
        </form>
    </div>
</x-master>
