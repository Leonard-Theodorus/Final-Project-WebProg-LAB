<nav class="bg-sky-900 px-12 py-2 sticky top-0 w-full flex items-center justify-evenly">
    <div class="space-x-4 p-1">
        <a href="{{ route('home') }}" class="text-white hover:font-bold" aria-current="page">Home</a>
        <a href="{{ route('showproduct') }}" class="text-white hover:font-bold">Show Product</a>
    </div>
    @auth
    <div class="space-x-4 p-1 flex ml-2 place-self-start items-center w-fit">
        <a href="{{ route('cart') }}" class="text-white hover:font-bold">My Cart</a>
        <a href="{{ route('transactionhistory') }}" class="text-white hover:font-bold">Transaction History</a>
        <form class="flex space-x-4" role="search">
            <input class="w-96 h-8 rounded-md pl-4" type="search" placeholder="Search" aria-label="Search">
            <button class="py-1 px-2 border border-green-800 rounded-md hover:font-bold text-white" type="submit">Search</button> 
        </form>

        <li class="relative inline-block">
            <button id="dropdownBtn" onclick="myFunction()" class="text-white hover:font-bold active:font-bold flex items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="mr-2">Profile</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/> </svg></BUTTON>
            <ul id="myDropdown" class="w-48 absolute flex flex-col bg-white rounded shadow-md mt-2 hidden">
                @auth <li><a class="px-4 py-2 block font-semibold text-gray-700 hover:bg-sky-700 hover:text-white" href="/#">{{auth()->user()->name}}</a></li> @endauth
                <li><hr class="bg-sky-700 m-0"></li>
                <li><a class="px-4 py-2 block font-semibold text-gray-700 hover:bg-sky-700 hover:text-white" href="/editprofile">Edit Profile</a></li>
                <li><a class="px-4 py-2 block font-semibold text-gray-700 hover:bg-sky-700 hover:text-white" href="/changepassword">Change Password</a></li>
            </ul>
        </li>

        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="text-white hover:font-bold">Logout</button>
        </form>
    </div>
    @else
    <div class="space-x-4 w-1/5 place-self-end">
        <button class="py-1 px-2 border rounded-md hover:font-bold"><a href="{{ route('login') }}" class="text-white">Login</a></button>
        <button class="py-1 px-2 border rounded-md hover:font-bold"><a href="{{ route('register') }}" class="text-white">Register</a></button>
    </div>
    @endauth
</nav>

<script>
    function myFunction() {
        if(document.getElementById("myDropdown").classList.contains("hidden")){
            document.getElementById("myDropdown").classList.remove("hidden");
        } else {
            document.getElementById("myDropdown").classList.add("hidden");
        }
    }
</script>