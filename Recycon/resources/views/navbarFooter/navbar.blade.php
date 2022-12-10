<nav class="navbar bg-dark justify-content-evenly">
    <a href="/home" class="nav-link-active text-decoration-none text-light" aria-current="page">Home</a>
    <a href="/product" class="nav-link text-light">Show Product</a>

    @auth
    <a href="/cart" class="nav-link text-decoration-none text-light">My Cart</a>
    <a href="/history" class="nav-link text-decoration-none text-light">Transaction History</a>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
        </a>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/#">{{auth()->user()->name}}</a></li>
        <li><a class="dropdown-item" href="/editprofile">Edit Profile</a></li>
        <li><a class="dropdown-item" href="/changepassword">Change Password</a></li>
    </ul>
    </li>
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="dropdown-item text-light">Logout</button>
    </form>
    @else
    <a href="/login" class="btn btn-outline-light">Login</a>
    <a href="/register" class="btn btn-outline-light">Register</a>

    @endauth
</nav>
