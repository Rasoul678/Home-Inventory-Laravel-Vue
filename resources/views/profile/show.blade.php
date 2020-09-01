<x-master>
    <h1 class="text-center text-2xl md:text-4xl font-bold mt-5">{{ auth()->user()->name }}'s Profile</h1>
    <div class="bg-gray-800 m-8 mt-3 p-10 rounded">
        <div class="text-center">
            @if(auth()->user()->avatar)
                <img
                    class="rounded-full w-32 md:w-48 m-auto border-2 border-black"
                    src="{{ auth()->user()->avatar }}"
                    alt="image">
            @else
                <i class="fa fa-user-circle-o text-6xl text-white" aria-hidden="true"></i>
            @endif
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mt-10">
            <div class="text-center p-2 text-md md:text-xl bg-gray-300 rounded"><span class="font-bold">Name</span>: {{ auth()->user()->name }}</div>
            <div class="text-center p-2 text-md md:text-xl bg-gray-300 rounded"><span class="font-bold">Email</span>: {{ auth()->user()->email }}</div>
            <div class="text-center p-2 text-md md:text-xl bg-gray-300 rounded"><span class="font-bold">Role</span>: {{ auth()->user()->role }}</div>
            <div class="text-center p-2 text-md md:text-xl bg-gray-300 rounded"><span class="font-bold">Joined at</span>: {{ auth()->user()->created_at->diffForHumans() }}</div>
        </div>
        <div class="text-center mt-10">
            <form action="{{ route('profiles.avatar', auth()->user()) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input
                    name="avatar"
                    class="text-white border rounded w-full sm:w-auto"
                    type="file"
                    accept="image/*"
                    required
                >
                <button type="submit" class="bg-teal-300 px-4 py-1 rounded w-full block mt-2 sm:w-auto sm:inline">Upload Image</button>
            </form>
        </div>
    </div>
</x-master>
