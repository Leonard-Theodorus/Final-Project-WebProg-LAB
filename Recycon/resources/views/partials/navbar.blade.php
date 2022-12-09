<nav class="bg-sky-900 flex justify-between px-12 py-2 w-full sticky top-0">
    <div class="space-x-4 p-1">
        <a href="{{ route('home') }}" class="text-white hover:font-bold" aria-current="page">Home</a>
        <a href="#" class="text-white hover:font-bold">Show Product</a>
    </div>
    <div class="space-x-4">
        <button class="py-1 px-2 border rounded-md hover:font-bold"><a href="{{ route('login') }}" class="text-white">Login</a></button>
        <button class="py-1 px-2 border rounded-md hover:font-bold"><a href="{{ route('register') }}" class="text-white">Register</a></button>
    </div>
</nav>
